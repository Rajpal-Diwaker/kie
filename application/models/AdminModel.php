<?php 

class AdminModel extends CI_Model 
{

  public function __construct(){
          parent::__construct();
          $this->load->database();
          date_default_timezone_set("Asia/Kolkata");
      }
    
  public function jsonP($res)
  {
    echo '<pre>';
    print_r($res);
    die;
  }    
  public function saveToken($postData,$access_token){
        $current_date=Date('Y-m-d H:i:s');
        $expiretoken=date('Y-m-d H:i:s', strtotime($current_date. ' + 1 days'));
        $data=array('user_id' => $postData['uId'],
               'access_token' => $access_token,
            'expire_datetime' => $expiretoken,
           'created_datetime' => $current_date);
        $this->db->update('tbl_access_token',array('deleted'=>'Y'),'user_id='.$postData['uId']);
        $this->db->set($data)->insert('tbl_access_token');
        return true;
      }


  public function getUserData(){     
    $this->db->select("t1.uId,t1.uEmpId,t1.uFirstName,t1.uLastName,t1.uEmail,t1.uMobileNo,");
    $this->db->select("(CASE WHEN uId IN(81) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=uDeptId),' (Ios) ')
    WHEN uId IN(131,79,147) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=uDeptId),' (Android) ')
    WHEN uId IN(75) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=uDeptId),' (Backend) ')
    else (SELECT dName FROM tbl_department WHERE dId=uDeptId) END) AS DeptName ");
    $this->db->from('tbl_user as t1'); 
    $this->db->join('tbl_project_team as t2','t1.uId=t2.ptTeamMemberId','left');
    $this->db->where('uRoleId!=','1');
    $this->db->where('t1.status','active');
    $this->db->where_in('t1.uDeptId',[1,2,3,4,5,6,7]);
    $this->db->group_by('uId');
    $query = $this->db->get();
    $res=$query->result_array();
    // echo $this->db->last_query(); die();
    $i=0;
                    foreach($res as $key=>$value){
                        $res[$i]['ProjectName']=$this->getUsersTotalProject($res[$i]['uId']); // total no of poject
                        $res[$i]['assignHours']=$this->getTotalAssignHours($res[$i]['uId']); // total no of hours assign project wise
                        // $res[$i]['assignHours']=$this->getTotalAssignHours($res[$i]['uId']);
                        $res[$i]['freeTime']=$this->getDashboardUserFreetimeData($res[$i]['uId']); //total free time daily
                        $i++;
                    }    
    return $res;
  }
  
  public function getUsersTotalProject($userId){     
    $sql="SELECT GROUP_CONCAT(ptProjectId) as ptProjectId FROM(SELECT ptProjectId  FROM `tbl_project_team`  WHERE ptTeamMemberId='".$userId."' 
    UNION SELECT ptProjectId  FROM `tbl_projectmanger_project`  WHERE ptTeamMemberId='".$userId."') AS ptProjectId   ";  
    $query = $this->db->query($sql);    
    $result = $query->result_array();
        if(!empty($result[0]['ptProjectId'])){    
          $sql2="SELECT GROUP_CONCAT(pName) as pName FROM `tbl_project` WHERE  pId IN(".$result[0]['ptProjectId'].") ";    
          $query2 = $this->db->query($sql2);    
          $result2 = $query2->result_array();
          return $result2[0]['pName'];
        }else{ 
          return;
        } 
  }

  public function getTotalAssignHours($userId){     
    $sql="SELECT GROUP_CONCAT(ptdailyHours)ptdailyHours FROM (SELECT SUM(ptdailyHours),ptdailyHours ,ptProjectId FROM 
    (SELECT ptdailyHours,ptProjectId FROM `tbl_projectmanger_project`  WHERE ptTeamMemberId='".$userId."' 
     UNION ALL SELECT ptdailyHours, ptProjectId FROM `tbl_project_team`  WHERE ptTeamMemberId='".$userId."') AS t1 GROUP  BY ptProjectId) AS t2";  
    $query = $this->db->query($sql);    
    // echo $this->db->last_query(); die;
    $result = $query->result_array();
    // $this->jsonP($result);die;
        if(!empty($result[0]['ptdailyHours'])){
            return $result[0]['ptdailyHours'];
          }else{
            return;
          }
  }

  public function getDashboardUserFreeTimeData($userId){    
    $sql="SELECT IFNULL((CASE WHEN (SELECT SUM( total) FROM ((SELECT SUM(ptdailyHours) total FROM `tbl_project_team` WHERE ptTeamMemberId=".$userId." AND `status`='active' )
    UNION (SELECT SUM(ptdailyHours) total FROM `tbl_projectmanger_project` WHERE ptTeamMemberId=".$userId." AND `status`='active') ) AS total ) >=8 THEN 0.00 
    WHEN (SELECT SUM( total) FROM ((SELECT SUM(ptdailyHours) total FROM `tbl_project_team` WHERE ptTeamMemberId=".$userId." AND `status`='active' )
    UNION (SELECT SUM(ptdailyHours) total FROM `tbl_projectmanger_project` WHERE ptTeamMemberId=".$userId." AND `status`='active') ) AS total ) <8 
    THEN 8-(SELECT SUM( total) FROM ((SELECT SUM(ptdailyHours) total FROM `tbl_project_team` WHERE ptTeamMemberId=".$userId." AND `status`='active' )
    UNION (SELECT SUM(ptdailyHours) total FROM `tbl_projectmanger_project` WHERE ptTeamMemberId=".$userId." AND `status`='active') ) AS total ) 
    END),'8.00') AS totalFreeTime";
  
    // $sql="SELECT ifnull((CASE WHEN (SELECT  SUM(ptdailyHours) FROM `tbl_project_team` WHERE ptTeamMemberId=".$userId."  AND `status`='active') >=8 
    // THEN  0.00 WHEN (SELECT SUM(ptdailyHours) FROM `tbl_project_team` WHERE ptTeamMemberId=".$userId."  AND `status`='active') <8
    // THEN  8-(SELECT  SUM(ptdailyHours) FROM `tbl_project_team` WHERE ptTeamMemberId=".$userId."  AND `status`='active')
    // END),'8.00') AS totalFreeTime";

    $query=$this->db->query($sql);  
    // echo $this->db->last_query();die;
    $res=$query->result_array();
    return $res[0]['totalFreeTime'];
  }
  
        
  
  public function getFreeUserData(){     
    $sql="SELECT 8-SUM(`ptdailyHours`) AS totalFreeHours ,ptTeamMemberId ,t2.`uFirstName`,t2.`uLastName`,(SELECT dName FROM `tbl_department` WHERE dId=t2.uDeptId AND `status`='active') AS DeptName 
    FROM tbl_project_team AS t1 JOIN tbl_user AS t2 ON t2.`uId`=t1.`ptTeamMemberId`  and t1.status='active' and t2.status='active' GROUP BY ptTeamMemberId";    
    $query = $this->db->query($sql);    
    $result = $query->result_array();

    $sql2="SELECT 8-SUM(`ptdailyHours`) AS totalFreeHours ,ptTeamMemberId ,t2.`uFirstName`,t2.`uLastName`,(SELECT dName FROM `tbl_department` WHERE dId=t2.uDeptId AND `status`='active') AS DeptName 
    FROM tbl_projectmanger_project AS t1 JOIN tbl_user AS t2 ON t2.`uId`=t1.`ptTeamMemberId`  and t1.status='active' and t2.status='active' GROUP BY ptTeamMemberId";    
    $query2 = $this->db->query($sql2);    
    $result2 = $query2->result_array();

    $res=array_unique(array_merge($result,$result2),SORT_REGULAR);

    return $res;
  }



public function getDashboardUserHourlyData($userId){     
  $this->db->select("SUM(times) as totalTime");
  $this->db->from('tbl_timesheet as t1'); 
  $this->db->where('createdAt',$userId);
  $this->db->where('t1.status','active');
  $this->db->group_by('projectId,createdAt');
  $query = $this->db->get();
  $res=$query->result_array();
  $totalH='';
    if(!empty($res)){
      $i=0;
      foreach($res as $key=>$value){
        $totalH=$totalH.','.$res[$i]['totalTime'];
        $i++;
      }
      $Totaltime=explode(",",$totalH);
      unset($Totaltime[0]);
      $Totaltime=implode($Totaltime,",");  
    }else{
      $Totaltime='0.00';
    }
  return $Totaltime;
}

public function getDashboardUserDailyEffortData($userId){     
  $this->db->select("SUM(times) as totalTime");
  $this->db->from('tbl_timesheet as t1'); 
  $this->db->where('createdAt',$userId);
  $this->db->where('t1.status','active');
  $this->db->where('DATE(createdDate)=DATE(DATE_SUB(NOW(), INTERVAL 1 DAY))');
  $this->db->group_by('projectId,createdAt');
  $query = $this->db->get();
  $res=$query->result_array();
  $totalH='';
      if(!empty($res)){
        $i=0;
        foreach($res as $key=>$value){
          $totalH=$totalH.','.$res[$i]['totalTime'];
          $i++;
        }
        $Totaltime=explode(",",$totalH);
        unset($Totaltime[0]);
        $Totaltime=implode($Totaltime,",");  
      }else{
        $Totaltime='0.00,0.00';
      }
  return $Totaltime;
}

public function getUserProject($userId){        
  $this->db->select(" t2.*,ptdailyHours");
  $this->db->select("(CASE WHEN uId IN(81) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t3.uDeptId),' (Ios) ')
  WHEN uId IN(131,79,147) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t3.uDeptId),' (Android) ')
  WHEN uId IN(75) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t3.uDeptId),' (Backend) ')
  else (SELECT dName FROM tbl_department WHERE dId=t3.uDeptId) END) AS DeptName ");
  $this->db->from('tbl_project_team as t1');   
  $this->db->join('tbl_project as t2','t1.ptProjectId=t2.pId'); 
  $this->db->join('tbl_user as t3','t1.ptTeamMemberId=t3.uId'); 
  $this->db->where('t1.status','active');
  $this->db->where('t2.deleted','active');
  $this->db->where('t3.status','active');
  $this->db->where('t1.ptTeamMemberId',$userId);
  $query = $this->db->get();
  $result = $query->result_array();

  $this->db->select(" t2.*,ptdailyHours");
  $this->db->select("(CASE WHEN uId IN(81) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t3.uDeptId),' (PM) ')
  WHEN uId IN(131,79,147) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t3.uDeptId),' (PM) ')
  WHEN uId IN(75) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t3.uDeptId),' (PM) ')
  else concat((SELECT dName FROM tbl_department WHERE dId=t3.uDeptId),'(PM)') END) AS DeptName ");
  $this->db->from('tbl_projectmanger_project as t1'); 
  $this->db->join('tbl_project as t2','t1.ptProjectId=t2.pId'); 
  $this->db->join('tbl_user as t3','t1.ptTeamMemberId=t3.uId'); 
  $this->db->where('t1.status','active');
  $this->db->where('t2.deleted','active');
  $this->db->where('t3.status','active');
  $this->db->where('t1.ptTeamMemberId',$userId);
  $query2 = $this->db->get();
  // echo $this->db->last_query();die;
  $result2 = $query2->result_array();
  
  // $res=array_unique(array_merge($result,$result2),SORT_REGULAR);
  $res=array_merge($result,$result2);
//  echo '<pre>';
//   print_r($res);die;
  // echo $this->db->last_query();die;
  return $res;
}
 
public function getActiveProject(){        
  $this->db->select("count(pId) as totalActiveProject");
  $this->db->from('tbl_project as t1'); 
  $this->db->where('t1.deleted','active');
  $this->db->where('t1.tStatus','Running');
  $query = $this->db->get();
  $result = $query->result_array();
  return $result[0]['totalActiveProject'];
}
 

public function getonHoldProject() {        
  $this->db->select("count(pId) as totalActiveProject");
  $this->db->from('tbl_project as t1'); 
  $this->db->where('t1.deleted','active');
  $this->db->where('t1.tStatus','OnHold');
  $query = $this->db->get();
  $result = $query->result_array();
  return $result[0]['totalActiveProject'];
}

public function getFreeBandwidth(){ 
  // $sql="SELECT ((SELECT COUNT(uId) FROM `tbl_user` WHERE `status`='active' AND uRoleId!=1
  // AND uDeptId IN (1,2,3,4,5,6,7)) *8)-(SELECT SUM(ptdailyHours) FROM `tbl_project_team`  AS t1 JOIN tbl_user AS t2 ON t1.ptTeamMemberId=t2.uId
  // WHERE t1.status='active'  AND t2.status='active' AND uDeptId IN (1,2,3,4,5,6,7)) AS totalFreeTime "; 

  $sql="SELECT t1.ptProjectId,t1.ptdailyHours,t1.ptTeamId,t1.ptTeamMemberId 
  FROM `tbl_project_team` AS t1 WHERE t1.`status`='active' UNION 
  SELECT t1.ptProjectId,t1.ptdailyHours,t1.ptTeamId,t1.ptTeamMemberId 
  FROM `tbl_projectmanger_project` AS t1  WHERE t1.`status`='active'";      
  $query = $this->db->query($sql);
  $result = $query->result_array();
  // echo '<pre>';print_r($result);die;

  if(empty($result[0]['ptdailyHours']))
  {
    $sql2="SELECT ((SELECT COUNT(uId) FROM `tbl_user` WHERE `status`='active' AND uRoleId!=1
    AND uDeptId IN (1,2,3,4,5,6,7)) *8) AS totalFreeTime ";       
    $query2 = $this->db->query($sql2);
    $result2 = $query2->result_array();     
    return $result2[0]['totalFreeTime'];      
  }
  else
  {
    $total='0.00';
    $i=0;
    foreach($result as $key=>$value)
    {
      $total+=$value['ptdailyHours'];
      $i++;
    }
    $sql3="SELECT ((SELECT COUNT(uId) FROM `tbl_user` WHERE `status`='active' AND uRoleId!=1
       AND uDeptId IN (1,2,3,4,5,6,7))*8)-$total as totalFreeTime";
    $query3 = $this->db->query($sql3);
    $result3 = $query3->result_array();     
    // echo '<pre>';print_r($total);print_r($result3);print_r($result);die;
    return $result3[0]['totalFreeTime'];

  }

  // echo $this->db->last_query();die; 
}

public function getUpcomingProject(){        
  $this->db->select("count(pId) as totalActiveProject");
  $this->db->from('tbl_project as t1'); 
  $this->db->where('t1.deleted','active');
  $this->db->where('t1.tStatus','Initial');
  $query = $this->db->get();
  $result = $query->result_array();
  return $result[0]['totalActiveProject'];
}

public function getMileStoneByUserId($userId){        
  $this->db->select("t1.mId,t1.mName,mProjectId,DATE(mDueDate) AS mDueDate,DATE(mDeliveryDate) AS mDeliveryDate,");
  $this->db->select("mDeliveryable,mTotalHours,t1.`status`,pName");
  $this->db->from('tbl_milestone as t1'); 
  $this->db->join('tbl_project_team as t2','t1.mProjectId = t2.ptProjectId'); 
  $this->db->join('tbl_project as t3','pId = t2.ptProjectId'); 
  $this->db->where('t1.status','active');
  $this->db->where('t2.status','active');
  $this->db->where('t3.deleted','active');
  $this->db->where('t2.ptTeamMemberId',$userId);
  $query = $this->db->get();
  return $result = $query->result_array();
}

public function getProjectTeamMembersByUserId($userId){        
  $this->db->select("GROUP_CONCAT(DISTINCT ptProjectId) as ptProjectIds");
  $this->db->from('tbl_project_team as t1'); 
  $this->db->where('t1.status','active');
  $this->db->where('t1.ptTeamMemberId',$userId);
  $query = $this->db->get();
  $result = $query->result_array();
  if(!empty($result)){
      $ptProjectIds=$this->reverse_split($result[0]['ptProjectIds']);
      $this->db->select("ptdailyHours,uId,uEmpId,uFirstName,uLastName,uEmail,uMobileNo,DATE(t1.createdDate)AS createdDate,t1.status");
      $this->db->select("(SELECT tName FROM `tbl_team` WHERE `status`='active' AND tId=t2.ptTeamId)TeamName,pName");
      $this->db->from('tbl_user as t1'); 
      $this->db->join('tbl_project_team as t2','t1.uId=t2.ptTeamMemberId');
      $this->db->join('tbl_project as t3','pId=t2.ptProjectId');      
      $this->db->where('t1.status','active');
      $this->db->where('t2.status','active');
      $this->db->where("FIND_IN_SET (ptProjectId,'".$ptProjectIds."')");
      $query = $this->db->get();
      $res = $query->result_array();
      // echo $this->db->last_query();die;
      return $res;
    }else{
      return $result;    
    }
}

public function getProject($rowno,$rowperpage,$search=""){        
    $this->db->select('pId,pUniqueId,pName,pDescription,pStartDate,pEndDate,pHourlyRate,');
    $this->db->select('pTotalHours,`status`,tStatus, DATE(createdDate) AS createdDate');
    $this->db->from('tbl_project as t1'); 
    $this->db->where('t1.deleted','active');
    
      if($_GET['tStatus']){
        $this->db->where('t1.tStatus',$_GET['tStatus']);
      }
    $this->db->order_by("pId", "desc");
    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
    // echo $this->db->last_query(); die;
    return $result = $query->result_array();
  }

public function getTimeSheet($rowno,$rowperpage,$search=""){        
    $this->db->select("t1.*,(SELECT tName FROM `tbl_tasks` WHERE tId=taskId) AS taskName,DATE(t1.createdDate) AS createdDate,");
    $this->db->select("(SELECT pName FROM `tbl_project`  WHERE pId=projectId) AS ProjectName,");
    $this->db->select("CONCAT(t2.uFirstName,'  ',uLastName) AS userName,pTotalHours");
    $this->db->select("(SELECT SUM(times) FROM `tbl_timesheet` WHERE projectId=t1.projectId AND createdAt=t2.uId) totalWorkingHours");
    $this->db->from('tbl_timesheet as t1'); 
    $this->db->join('tbl_user as t2','t1.createdAt=t2.uId'); 
    $this->db->join('tbl_project as t3','t1.projectId=pId'); 
    $this->db->where('t1.status','active');
    $this->db->where('t2.status','active');
    $this->db->where('t3.deleted','active');
    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
    return $result = $query->result_array();
  }              
  
  public function viewTimeSheet($projectId){        
    $this->db->select("t1.*,(SELECT tName FROM `tbl_tasks` WHERE tId=taskId) AS taskName,DATE(t1.createdDate) AS createdDate,");
    $this->db->select("(SELECT pName FROM `tbl_project`  WHERE pId=projectId) AS ProjectName,");
    $this->db->select("CONCAT(t2.uFirstName,'  ',uLastName) AS userName,pTotalHours");
    $this->db->select("(SELECT SUM(times) FROM `tbl_timesheet` WHERE projectId=t1.projectId AND createdAt=t2.uId) totalWorkingHours");
    $this->db->from('tbl_timesheet as t1'); 
    $this->db->join('tbl_user as t2','t1.createdAt=t2.uId'); 
    $this->db->join('tbl_project as t3','t1.projectId=pId'); 
    $this->db->where('t1.status','active');
    $this->db->where('t2.status','active');
    $this->db->where('t3.deleted','active');
    $this->db->where('t1.projectId',$projectId);
    $query = $this->db->get();
    return $result = $query->result_array();
  }            


public function reverse_split($postdata){
  $user_id=explode(",",str_replace(" ","",$postdata));
  sort($user_id);
  $user_id=array_unique($user_id);
  return $user_id=implode(",",$user_id);  
 }

public function getProjectById($projectId){        
  $this->db->select('pId,pUniqueId,pName,pDescription,pStartDate,pEndDate,pHourlyRate,');
  $this->db->select('pTotalHours,`status`,tStatus, DATE(createdDate) AS createdDate');
  $this->db->from('tbl_project as t1'); 
  $this->db->where('t1.deleted','active');
  $this->db->where('t1.pId',$projectId);
  $query = $this->db->get();
  return $result = $query->result_array();
}

 
public function getMileStoneByProjectId($projectId){        
  $this->db->select('`mId`,mName,mProjectId,DATE(mDuedate) AS mDuedate,status,');
  $this->db->select('DATE(mDeliveryDate) AS mDeliveryDate,mDeliveryable,mTotalHours');
  $this->db->from('tbl_milestone as t1'); 
  $this->db->where('t1.status','active');
  $this->db->where('t1.mProjectId',$projectId);
  $query = $this->db->get();
  return $result = $query->result_array();
}
 
public function getProjectClientById($projectId){        
  $this->db->select('t1.*,t2.firstName,t2.LastName,t2.Email,t2.Phone,Occupation');
  $this->db->from('tbl_clients as t1'); 
  $this->db->join('tbl_contacts as t2','t1.id=t2.ClientID');
  $this->db->join('tbl_project as t3','t1.id=t3.clientId');
  $this->db->where('t3.pId',$projectId);
  $query = $this->db->get();
  // echo $this->db->last_query();die;
  return $result = $query->result_array();
}

public function getProjectTeamById($projectId){        
  $this->db->select("t1.*");
  $this->db->from('tbl_team as t1'); 
  $this->db->where('t1.projectId',$projectId);
  $query = $this->db->get();
  return $result = $query->result_array();
}
 
public function getProjectTeamMembersById($projectId){   
  
  $this->db->select("uId,uEmpId,uFirstName,uLastName,uEmail,uMobileNo,DATE(t1.createdDate)AS createdDate,t1.`status`,t1.uDeptId,");
  $this->db->select("ptdailyHours,(SELECT tName FROM `tbl_team` WHERE `status`='active' AND tId=t2.ptTeamId)TeamName");
  $this->db->select("(CASE WHEN uId IN(81) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t1.uDeptId),' (Ios) ')
  WHEN uId IN(131,79,147) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t1.uDeptId),' (Android) ')
  WHEN uId IN(75) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t1.uDeptId),' (Backend) ')
  else (SELECT dName FROM tbl_department WHERE dId=t1.uDeptId) END) AS DeptName ");
  $this->db->from('tbl_user as t1'); 
  $this->db->join('tbl_project_team as t2','t1.uId=t2.ptTeamMemberId');
  $this->db->where('t2.ptProjectId',$projectId);  
  $query = $this->db->get();
  // echo $this->db->last_query();
  $result = $query->result_array();
  
  $this->db->select("uId,uEmpId,uFirstName,uLastName,uEmail,uMobileNo,DATE(t1.createdDate)AS createdDate,t1.`status`,t1.uDeptId,");
  $this->db->select("ptdailyHours,(SELECT tName FROM `tbl_team` WHERE `status`='active' AND tId=t2.ptTeamId)TeamName");
  $this->db->select("(CASE WHEN uId IN(81) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t1.uDeptId),' (Project-PM) ')
  WHEN uId IN(131,79,147) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t1.uDeptId),' (Project-PM) ')
  WHEN uId IN(75) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t1.uDeptId),' (Project-PM) ')
  ELSE CONCAT((SELECT dName FROM tbl_department WHERE dId=t1.uDeptId), '(Project-PM) ')
  END) AS DeptName ");
  $this->db->from('tbl_user as t1'); 
  $this->db->join('tbl_projectmanger_project as t2','t1.uId=t2.ptTeamMemberId');
  $this->db->where('t2.ptProjectId',$projectId);  
  $query2 = $this->db->get();
  // echo $this->db->last_query(); die;
  $result2 = $query2->result_array();
  
  // $res=array_unique(array_merge($result,$result2),SORT_REGULAR);
  $res=array_merge($result,$result2);

  return $res;
}

public function getProjectTimeSheets($projectId){        
  $this->db->select('tId,times,taskid,projectId,comments,`status`,DATE(createdDate) AS createdDate');
  $this->db->from('tbl_timesheet as t1'); 
  $this->db->where('t1.projectId',$projectId);  
  $query = $this->db->get();
  return $result = $query->result_array();
}

public function getTeamList($rowno,$rowperpage,$search=""){    
    $this->db->select("t1.*,t2.ptProjectId");
    $this->db->from('tbl_team as t1'); 
    $this->db->join('tbl_projectmanger_project as t2','t1.tId=t2.ptTeamId'); 
    $this->db->where('t1.status=','active');
    $this->db->where('t2.status=','active');
    $this->db->group_by('t1.tId');
    $this->db->order_by("tId", "desc");
    $query = $this->db->get();
    $result = $query->result_array();
    $i=0;
    foreach($result as $key => $value) 
    {
      $result[$i]['teamMemberCount']=$this->projectMemberCount($value['ptProjectId']); 
      $i++;   
    }    
    return $result;
  }

  public function projectMemberCount($projectId)
  {     
  $sql="SELECT COUNT(ptTeamMemberId) ptTeamMemberId FROM (SELECT  ptTeamMemberId FROM `tbl_project_team` WHERE status='active' and ptProjectId='".$projectId."' 
  UNION 
  SELECT ptTeamMemberId FROM `tbl_projectmanger_project` WHERE status='active' and ptProjectId='".$projectId."') AS ptTeamMemberId";
   $query = $this->db->query($sql);
   $result = $query->result_array();
   return $result[0]['ptTeamMemberId'];
   
 }


public function getAllTeamMembersById($teamId){    
  $this->db->select("t2.uEmpId,uFirstName,uLastName,uEmail,uMobileNo,t2.status,ptdailyHours,");
  $this->db->select("(CASE WHEN uId IN(81) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t2.uDeptId),' (Ios) ')
  WHEN uId IN(131,79,147) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t2.uDeptId),' (Android) ')
  WHEN uId IN(75) THEN CONCAT((SELECT dName FROM tbl_department WHERE dId=t2.uDeptId),' (Backend) ')
  else (SELECT dName FROM tbl_department WHERE dId=t2.uDeptId) END) AS DeptName ");
  $this->db->from('tbl_project_team as t1'); 
  $this->db->join('tbl_user as t2','t1.ptTeamMemberId=t2.uId');
  $this->db->where('t1.status','active');
  $this->db->where('ptTeamId',$teamId);
  $query = $this->db->get();
  // echo $this->db->last_query();die;
  $result = $query->result_array();


  $this->db->select("t2.uEmpId,uFirstName,uLastName,uEmail,uMobileNo,t2.status,ptdailyHours,");
  // $this->db->select("(SELECT dName FROM tbl_department WHERE dId=t2.uDeptId) AS DeptName");
  $this->db->select("concat('(Project-PM) ',(SELECT dName FROM tbl_department WHERE dId=t2.uDeptId)) AS DeptName ");
  $this->db->from('tbl_projectmanger_project as t1'); 
  $this->db->join('tbl_user as t2','t1.ptTeamMemberId=t2.uId');
  $this->db->where('t1.status','active');
  $this->db->where('ptTeamId',$teamId);
  $query2 = $this->db->get();
  $result2 = $query2->result_array();

  // $res=array_unique(array_merge($result,$result2),SORT_REGULAR);
  $res=array_merge($result,$result2);
  
  return $res;
}

public function getAllTeamMembersByIds($teamId){    
  $this->db->select("ptId,`t2`.`uEmpId`, CONCAT(`uFirstName`,  '  ',`uLastName`) AS uName, ptdailyHours,uId,t2.uDeptId");
  $this->db->select("(SELECT dName FROM tbl_department WHERE dId=t2.uDeptId) AS DeptName ");
  $this->db->from('tbl_project_team as t1'); 
  $this->db->join('tbl_user as t2','`t1`.`ptTeamMemberId`=`t2`.`uId`');
  $this->db->where('t1.status','active');
  $this->db->where('ptTeamId',$teamId);
  $query = $this->db->get();
  // echo $this->db->last_query(); die;
  return $result = $query->result_array();
}

public function getProjectManager($teamId){    
  $this->db->select("ptId,`t2`.`uEmpId`, CONCAT(`uFirstName`,  '  ',`uLastName`) AS uName, ptdailyHours,uId");  
  $this->db->select("(SELECT dName FROM tbl_department WHERE dId=t2.uDeptId) AS DeptName ");
  $this->db->from('tbl_projectmanger_project as t1'); 
  $this->db->join('tbl_user as t2','`t1`.`ptTeamMemberId`=`t2`.`uId`');
  $this->db->where('t1.status','active');
  $this->db->where('ptTeamId',$teamId);
  $query = $this->db->get();
  // echo $this->db->last_query(); die;
  return $result = $query->result_array();
}


public function getTeamProject($teamId){    
  $sql="SELECT pId,pName,clientId FROM `tbl_project` WHERE deleted='active' 
  AND pId =(SELECT  DISTINCT ptProjectId FROM tbl_projectmanger_project  WHERE ptTeamId='".$teamId."' AND `status`='active')";
  $query = $this->db->query($sql);
  $result = $query->result_array();
  // echo $this->db->last_query(); die;
  return $result[0];
}

public function getProjectClient($teamId){    
  $clientId=$this->getTeamProject($teamId);
  if(!empty($clientId['clientId'])){
        $this->db->select("FirstName as uName,id");
        $this->db->from('tbl_contacts as t1'); 
        $this->db->where('ClientID',$clientId['clientId']);
        $query = $this->db->get();
        // echo $this->db->last_query(); die;
         $result = $query->result_array();
        return $result[0];
      }
}

public function getActivityList($rowno,$rowperpage,$search=""){    
  $this->db->select('*');
  $this->db->from('tbl_activity as t1'); 
  $this->db->limit($rowperpage, $rowno); 
  $query = $this->db->get();
  return $result = $query->result_array();
}


public function getUser($deptId){    
  $this->db->select("CONCAT(CONCAT(UCASE(MID(uFirstName,1,1)),MID(uFirstName,2)) ,' ', CONCAT(UCASE(MID(uLastName,1,1)),MID(uLastName,2))) as  UserName,uId");
  $this->db->from('tbl_user as t1'); 
  $this->db->where('status','active');
  // $this->db->where('uDeptId',$deptId);
  if($deptId=='1') 
   {
    $where = '(uDeptId="'.$deptId.'" or uId in(81))';
    //  $this->db->where_in('uId',[81]); //ios 

   }else if($deptId=='2'){
      // $this->db->where_in('uId',[131,79,147]); // android
      $where = '(uDeptId="'.$deptId.'" or uId in(131,79,147))';

    } else if($deptId=='3'){

      // $this->db->where_in('uId',[75]); //backend
      $where = '(uDeptId="'.$deptId.'" or uId in(75))';

    }else{
    // $this->db->where('uDeptId',$deptId);
    $where = '(uDeptId="'.$deptId.'")';
    }

  $this->db->where($where);
  $query = $this->db->get();
  // echo $this->db->last_query();die;
  return $result = $query->result_array();
}

public function removeBlanckfield($data){
  foreach ($data as $field => $key){
     if (empty($key)){
      unset($data[$field]);
     }
 } 
 return $data;
}   

public function removeArrayRecursive($mainArray){
    foreach ($mainArray as $key => $mainData){
      foreach ($mainData as $key2 => $subData){
          if(empty($mainData['ptTeamMemberId'])){
              unset($mainArray[$key]);
              break;
          }
      }
  }
  $data=array_values($mainArray);
  return $data;
  }

  
public function saveActivity($projectId,$activityId)
{        
  $this->db->insert('tbl_activity_log', array('project_id'=>$projectId,'activity_id'=>$activityId));
  
  return true;
}


public function addProject($postdata){    
  $data=$this->removeBlanckfield($postdata);
  // echo '<pre>';print_r($postdata);die;

  // save client data
  $clientData = array('Name'=>$data['ProjectName']);
  $this->db->insert('tbl_clients', $clientData);
  $clientId=$this->db->insert_id();

  //save client contact data
  $clientContactData = array('FirstName'=>$data['Client_Name'],'ClientID'=>$clientId);
  $this->db->insert('tbl_contacts', $clientContactData);
  $clientContactId=$this->db->insert_id();
  
  // save project data
  $projectData = array('pName'=>$data['ProjectName'],'clientId'=>$clientId,'tStatus'=>'Initial','createdAt'=>$data['user_id']);
  $this->db->insert('tbl_project', $projectData);
  $projectId=$this->db->insert_id();
  $this->saveActivity($projectId,'1'); // project started activity

  //save team data
  $teamData = array('tName'=>$data['ProjectName'],'tDescription'=>$data['ProjectName'],'createdAt'=>$data['user_id'],'status'=>'active');
  $this->db->insert('tbl_team', $teamData);
  $teamId=$this->db->insert_id();
  $this->saveActivity($projectId,'15'); // Team created activity
  
  // Project Incharge Data Save
  if(!empty($postdata['project_incharge']))
  {
      // echo 'Project Incarge data save ';
      $postdataproject_incharge=$postdata['project_incharge'];
      $postdataProjectHours=$postdata['Project_R_Hours'];
       $projectMemberData = array('ptTeamId'=>$teamId,'ptTeamMemberId'=>$postdataproject_incharge,'ptProjectId'=>$projectId,
       'createdAt'=>$data['user_id'],'ptdailyHours'=>$postdataProjectHours);
       $this->db->insert('tbl_projectmanger_project', $projectMemberData);
       $this->saveActivity($projectId,'2'); // Project Manager Assign activity
  }

  // Ios Data Save
  if(!empty($postdata['Ios'][0]))
  {
      // echo 'Ios data save ';
      $postdataIos=$postdata['Ios'];
      $postdataIosHours=$postdata['IOS_R_Hours'];
      $projectMemberData=[];
      for($i=0;$i<count($postdataIos);$i++)
      {
         $data=$this->db->select("ptId")
                        ->from('tbl_project_team as t1')
                        ->where('status','active')
                        ->where('ptTeamMemberId',$postdataIos[$i])
                        ->where('ptTeamId',$teamId)
                        ->where('ptProjectId',$projectId)
                        ->get()->result_array();   

            if(empty($data))
            {
              $projectMemberData[] = array('ptTeamId'=>$teamId,
              'ptTeamMemberId'=>$postdataIos[$i],'ptProjectId'=>$projectId,
              'createdAt'=>$data['user_id'],'ptdailyHours'=>$postdataIosHours[$i]);
               $this->db->insert('tbl_project_team', $projectMemberData[$i]);
               $this->saveActivity($projectId,'3'); // Ios Developer Assign activity

            }            
      }
  }
  // die;
  
  // Android Data Save
  if(!empty($postdata['Android'][0]))
  {
    // echo 'Android data save ';
      $postdataAndroid=$postdata['Android'];
      $postdataAndroidHours=$postdata['Android_R_Hours'];
      $projectMemberData=[];
      for($i=0;$i<count($postdataAndroid);$i++)
      {   
        $data=$this->db->select("ptId")
                      ->from('tbl_project_team as t1')
                      ->where('status','active')
                      ->where('ptTeamMemberId',$postdataAndroid[$i])
                      ->where('ptTeamId',$teamId)
                      ->where('ptProjectId',$projectId)
                      ->get()->result_array();   

              if(empty($data))
              {
                  $projectMemberData[] = array('ptTeamId'=>$teamId,
                  'ptTeamMemberId'=>$postdataAndroid[$i],'ptProjectId'=>$projectId,
                  'createdAt'=>$data['user_id'],'ptdailyHours'=>$postdataAndroidHours[$i]);
                    // print_r($projectMemberData[$i]);
                  $this->db->insert('tbl_project_team', $projectMemberData[$i]);
                  $this->saveActivity($projectId,'4'); // Android Developer Assign activity
              }   
    }
  }
  
  // backend Data Save
  if(!empty($postdata['Backend'][0]))
  {
      // echo 'backend data save ';
      $postdataBackend=$postdata['Backend'];
      $postdataBackendHours=$postdata['Backend_R_Hours'];
      $projectMemberData=[];
      for($i=0;$i<count($postdataBackend);$i++)
      {
         $data=$this->db->select("ptId")
                        ->from('tbl_project_team as t1')
                        ->where('status','active')
                        ->where('ptTeamMemberId',$postdataBackendHours[$i])
                        ->where('ptTeamId',$teamId)
                        ->where('ptProjectId',$projectId)
                        ->get()->result_array();   

                if(empty($data))
                {
                  $projectMemberData[] = array('ptTeamId'=>$teamId,
                  'ptTeamMemberId'=>$postdataBackend[$i],'ptProjectId'=>$projectId,
                  'createdAt'=>$data['user_id'],'ptdailyHours'=>$postdataBackendHours[$i]);
                  $this->db->insert('tbl_project_team', $projectMemberData[$i]);
                  $this->saveActivity($projectId,'5'); // Backend Developer Assign activity
                }  
      }
  }

  
  // Html Data Save
  if(!empty($postdata['HTML']))
  {
      // echo 'Html data save';
      $postdataHTML=$postdata['HTML'];
      $postdataHTMLHours=$postdata['HTML_R_Hours'];
      $projectMemberData=[];
      $projectMemberData = array('ptTeamId'=>$teamId,'ptTeamMemberId'=>$postdataHTML,'ptProjectId'=>$projectId,
       'createdAt'=>$data['user_id'],'ptdailyHours'=>$postdataHTMLHours);
       $this->db->insert('tbl_project_team', $projectMemberData);
       $this->saveActivity($projectId,'6'); // HTML Developer Assign activity
  }

  // QA Data Save
  if(!empty($postdata['QA']))
  {
      // echo 'QA data save ';
      $postdataQA=$postdata['QA'];
      $postdataQAHours=$postdata['QA_R_Hours'];
      $projectMemberData=[];
       $projectMemberData = array('ptTeamId'=>$teamId,'ptTeamMemberId'=>$postdataQA,'ptProjectId'=>$projectId,
       'createdAt'=>$data['user_id'],'ptdailyHours'=>$postdataQAHours);
       $this->db->insert('tbl_project_team', $projectMemberData);
       $this->saveActivity($projectId,'16'); // QA Developer Assign activity
  }

  // Designer Data Save
  if(!empty($postdata['Design']))
  {
      // echo 'Designer data save ';
      $postdataDesign=$postdata['Design'];
      $postdataDesignHours=$postdata['Design_R_Hours'];
      $projectMemberData=[];
       $projectMemberData = array('ptTeamId'=>$teamId,'ptTeamMemberId'=>$postdataDesign,'ptProjectId'=>$projectId,
       'createdAt'=>$data['user_id'],'ptdailyHours'=>$postdataDesignHours);
       $this->db->insert('tbl_project_team', $projectMemberData);
       $this->saveActivity($projectId,'7'); // Designer Assign activity
  }

  $this->projectSaveEmailsend($postdata);

  return true;
}

public function getDepartment()
{    
  $this->db->select("dId,dName");
  $this->db->from('tbl_department as t1'); 
  $this->db->where('status','active');
  $query = $this->db->get();
  return $result = $query->result_array();
}


public function addUser($postdata){    
  $savedata=array('uEmpId'=>$postdata['EMP_ID'],'uFirstName'=>$postdata['FirstName'],'uLastName'=>$postdata['LastName'],
                  'uEmail'=>$postdata['email'],'uMobileNo'=>$postdata['mobileNo'],'createdAt'=>$postdata['user_Id'],
                  'uDeptId'=>$postdata['dept'],'uRoleId'=>'2');
  $this->db->insert('tbl_user', $savedata);
  return  true;
}

public function updateTeam($postdata){
  // echo '<pre>'; print_r($postdata); die;

  if($postdata['clientId']){
    $this->db->where('id',$postdata['clientId']);
    $this->db->update('tbl_contacts', array('FirstName'=>$postdata['Client_Name']));
  }
  if($postdata['ProjectId']){
    $this->db->where('pId',$postdata['ProjectId']);
    $this->db->update('tbl_project', array('pName'=>$postdata['ProjectName'],'updatedDate'=>Date('Y-m-d H:i:s'),
    'updatedAt'=>$this->session->userdata('user_id')));
  }
  if($postdata['team_id']){
    $this->db->where('tId',$postdata['team_id']);
    $this->db->update('tbl_team', array('tName'=>$postdata['ProjectName'],'updatedDate'=>Date('Y-m-d H:i:s'),
    'updatedAt'=>$this->session->userdata('user_id')));
    $this->saveActivity($postdata['ProjectId'],'17'); // project details updated activity
  }

  //project Incharge
  if($postdata['project_incharge_Id']||($postdata['project_incharge'])){
    if(!empty($postdata['project_incharge_Id'])){
      $this->db->where('ptId',$postdata['project_incharge_Id']);
      $this->db->update('tbl_projectmanger_project', array('ptTeamMemberId'=>$postdata['project_incharge'],
      'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
      'ptdailyHours'=>$postdata['Project_R_Hours'],'updatedDate'=>Date('Y-m-d H:i:s'),
      'updatedAt'=>$this->session->userdata('user_id')));
       $this->saveActivity($postdata['ProjectId'],'18'); // project Manager updated activity
    }else{
      $this->db->insert('tbl_projectmanger_project',array('ptTeamMemberId'=>$postdata['project_incharge'],
      'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
      'ptdailyHours'=>$postdata['Project_R_Hours'],'createdDate'=>Date('Y-m-d H:i:s'),
      'createdAt'=>$this->session->userdata('user_id')));
       $this->saveActivity($postdata['ProjectId'],'12'); // New project Manager assign activity
    }
    
  }

  //ios
  if(!empty($postdata['Ios_Id'])){    
    // echo 'ios';
          for($i=0;$i<count($postdata['Ios_Id']);$i++){
             $data=$this->db->select("ptId")
                            ->from('tbl_project_team as t1')
                            ->where('status','active')
                            ->where('ptTeamMemberId',$postdata['Ios'][$i])
                            ->where('ptTeamId',$postdata['team_id'])
                            ->where('ptProjectId',$postdata['ProjectId'])
                            ->get()->result_array();   
                            // echo $this->db->last_query();                                  
                if(!empty($data)){
                  //updatating previous team member details
                    $this->db->where('ptId',$data[0]['ptId']);
                    $this->db->update('tbl_project_team', array('ptTeamMemberId'=>$postdata['Ios'][$i],
                    'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                    'ptdailyHours'=>$postdata['IOS_R_Hours'][$i],'updatedDate'=>Date('Y-m-d H:i:s'),
                    'updatedAt'=>$this->session->userdata('user_id')));  
                     $this->saveActivity($postdata['ProjectId'],'19'); // Ios developer details changed activity
                    // echo $this->db->last_query();   
                  }else{    
                    if(!empty($postdata['Ios'][$i])){
                //Inserting New team member details
                  $this->db->insert('tbl_project_team',array('ptTeamMemberId'=>$postdata['Ios'][$i],
                  'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                  'ptdailyHours'=>$postdata['IOS_R_Hours'][$i],'createdDate'=>Date('Y-m-d H:i:s'),
                  'createdAt'=>$this->session->userdata('user_id')));
                  // echo $this->db->last_query();
                  $this->saveActivity($postdata['ProjectId'],'8'); // New Ios developer assign activity
                    }
                  }  
         }
  }
  
  //Android
  if(!empty($postdata['Android_Id'])){     
    // echo 'andoid';
        for($i=0;$i<count($postdata['Android_Id']);$i++){
           $data=$this->db->select("ptId")
                          ->from('tbl_project_team as t1')
                          ->where('status','active')
                          ->where('ptTeamMemberId',$postdata['Android'][$i])
                          ->where('ptTeamId',$postdata['team_id'])
                          ->where('ptProjectId',$postdata['ProjectId'])
                          ->get()->result_array();
                          // echo $this->db->last_query();
              if(!empty($data)){
                //updatating previous team member details
                  $this->db->where('ptId',$data[0]['ptId']);
                  $this->db->update('tbl_project_team', array('ptTeamMemberId'=>$postdata['Android'][$i],
                  'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                  'ptdailyHours'=>$postdata['Android_R_Hours'][$i],'updatedDate'=>Date('Y-m-d H:i:s'),
                  'updatedAt'=>$this->session->userdata('user_id'))); 
                  // echo $this->db->last_query();   
                  $this->saveActivity($postdata['ProjectId'],'20'); // Android developer details changed activity
              }else{
                if(!empty($postdata['Android'][$i])){
                    //Inserting New team member details
                      $this->db->insert('tbl_project_team',array('ptTeamMemberId'=>$postdata['Android'][$i],
                      'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                      'ptdailyHours'=>$postdata['Android_R_Hours'][$i],'createdDate'=>Date('Y-m-d H:i:s'),
                      'createdAt'=>$this->session->userdata('user_id')));     
                      // echo $this->db->last_query();               
                      $this->saveActivity($postdata['ProjectId'],'9'); // New Android developer assign activity  
                  }
              }    
       }    
  }

  
  //Backend
  if(!empty($postdata['Backend_Id'])){
    // echo 'backend';
      for($i=0;$i<count($postdata['Backend_Id']);$i++){
             $data=$this->db->select("ptId")
                            ->from('tbl_project_team as t1')
                            ->where('status','active')
                            ->where('ptTeamMemberId',$postdata['Backend'][$i])
                            ->where('ptTeamId',$postdata['team_id'])
                            ->where('ptProjectId',$postdata['ProjectId'])
                            ->get()->result_array();
                            // echo $this->db->last_query();
              if(!empty($data)){   
                //updatating previous team member details               
                $this->db->where('ptId',$data[0]['ptId']);
                $this->db->update('tbl_project_team', array('ptTeamMemberId'=>$postdata['Backend'][$i],
                'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                'ptdailyHours'=>$postdata['Backend_R_Hours'][$i],'updatedDate'=>Date('Y-m-d H:i:s'),
                'updatedAt'=>$this->session->userdata('user_id')));   
                // echo $this->db->last_query();    
                $this->saveActivity($postdata['ProjectId'],'21'); // Backend developer detail updated activity                    
              }else{       
                if(!empty($postdata['Backend'][$i])){   //Inserting New team member details     
                      $this->db->insert('tbl_project_team',array('ptTeamMemberId'=>$postdata['Backend'][$i],
                      'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                      'ptdailyHours'=>$postdata['Backend_R_Hours'][$i],'createdDate'=>Date('Y-m-d H:i:s'),
                      'createdAt'=>$this->session->userdata('user_id')));
                      // echo $this->db->last_query();
                      $this->saveActivity($postdata['ProjectId'],'11'); // New backend developer assign activity  
                  }
                }
           }              
    }

  //HTML
    if(!empty($postdata['HTML'])){
          $data=$this->db->select("ptId")
                          ->from('tbl_project_team as t1')
                          ->where('status','active')
                          ->where('ptTeamMemberId',$postdata['HTML'])
                          ->where('ptTeamId',$postdata['team_id'])
                          ->where('ptProjectId',$postdata['ProjectId'])
                          ->get()->result_array();
                        // echo $this->db->last_query();
           if(!empty($data)){  
              $this->db->where('ptId',$postdata['HTML_Id']);
              $this->db->update('tbl_project_team', array('ptTeamMemberId'=>$postdata['HTML'],
              'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
              'ptdailyHours'=>$postdata['HTML_R_Hours'],'updatedDate'=>Date('Y-m-d H:i:s'),
              'updatedAt'=>$this->session->userdata('user_id')));
              $this->saveActivity($postdata['ProjectId'],'23'); // HTML developer detail updated activity  
          }else{
              $this->db->insert('tbl_project_team',array('ptTeamMemberId'=>$postdata['HTML'],
              'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
              'ptdailyHours'=>$postdata['HTML_R_Hours'],'createdDate'=>Date('Y-m-d H:i:s'),
              'createdAt'=>$this->session->userdata('user_id')));
              $this->saveActivity($postdata['ProjectId'],'10'); // New HTML developer assign activity  
         } 
  }

  //QA
     if(!empty($postdata['QA'])){
            $data=$this->db->select("ptId")
                          ->from('tbl_project_team as t1')
                          ->where('status','active')
                          ->where('ptTeamMemberId',$postdata['QA'])
                          ->where('ptTeamId',$postdata['team_id'])
                          ->where('ptProjectId',$postdata['ProjectId'])
                          ->get()->result_array();
                        // echo $this->db->last_query();
                  if(!empty($data)){  
                      $this->db->where('ptId',$postdata['QA_Id']);
                      $this->db->update('tbl_project_team', array('ptTeamMemberId'=>$postdata['QA'],
                      'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                      'ptdailyHours'=>$postdata['QA_R_Hours'],'updatedDate'=>Date('Y-m-d H:i:s'),
                      'updatedAt'=>$this->session->userdata('user_id'))); 
                      $this->saveActivity($postdata['ProjectId'],'22'); // QA details changed  activity  
                    }else{
                      // if(!empty($postdata['Backend'][$i])){   //Inserting New team member details     
                      $this->db->insert('tbl_project_team',array('ptTeamMemberId'=>$postdata['QA'],
                      'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                      'ptdailyHours'=>$postdata['QA_R_Hours'],'createdDate'=>Date('Y-m-d H:i:s'),
                      'createdAt'=>$this->session->userdata('user_id')));
                      $this->saveActivity($postdata['ProjectId'],'25'); // New QA developer assign activity  
                  } 
          }   

    //Designer
        if(!empty($postdata['Designer'])){
          $data=$this->db->select("ptId")
                          ->from('tbl_project_team as t1')
                          ->where('status','active')
                          ->where('ptTeamMemberId',$postdata['Designer'])
                          ->where('ptTeamId',$postdata['team_id'])
                          ->where('ptProjectId',$postdata['ProjectId'])
                          ->get()->result_array();
                        // echo $this->db->last_query();
              if(!empty($data)){  
                $this->db->where('ptId',$postdata['Designer_Id']);
                $this->db->update('tbl_project_team', array('ptTeamMemberId'=>$postdata['Designer'],
                'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                'ptdailyHours'=>$postdata['Design_R_Hours'],'updatedDate'=>Date('Y-m-d H:i:s'),
                'updatedAt'=>$this->session->userdata('user_id')));
                $this->saveActivity($postdata['ProjectId'],'24'); // Designer details Updated activity  
              }else{
                $this->db->insert('tbl_project_team',array('ptTeamMemberId'=>$postdata['Designer'],
                'ptTeamId'=>$postdata['team_id'],'ptProjectId'=>$postdata['ProjectId'],    
                'ptdailyHours'=>$postdata['Design_R_Hours'],'createdDate'=>Date('Y-m-d H:i:s'),
                'createdAt'=>$this->session->userdata('user_id')));  
                $this->saveActivity($postdata['ProjectId'],'13'); // New Designer developer assign activity        
                } 
      }

    $this->projectEditEmailsend($postdata);
  return  true;
}




public function chnagePojectStatus(){    
  $cc=[];
      $saveData=array('updatedAt'=>$this->session->userdata('user_id'),
              'updatedDate'=>Date('Y-m-d h:i:s'),'tStatus'=>$this->input->post('tStatus'));                  
                $this->db->where('pId',$this->input->post('projectId'));
                $this->db->update('tbl_project', $saveData);
                $this->saveActivity($this->input->post('projectId'),'14'); // project started activity
    
  $user_data=$this->db->select('t2.uId,t2.uEmpId,uFirstName,uLastName,uEmail,uMobileNo,t3.pName,t3.tStatus')
                        ->from('tbl_project_team AS t1')
                        ->join('tbl_user as t2','t1.ptTeamMemberId=t2.uId')
                        ->join('tbl_project as t3','t1.ptProjectId=t3.pId')
                        ->where('t2.uDeptId','7')
                        ->where('t1.ptProjectId',$this->input->post('projectId'))
                        ->where('t1.status','active')
                        ->where('t2.status','active')
                        ->where('t3.deleted','active')
                        ->get()->result_array();

    $to=$user_data[0]['uEmail'];
    $msg=$this->load->view('projectStatusChangeEmailTemplate',$user_data[0],true);  
    $subject="Project status changed";
     // $cc=implode(",",$cc);
    $this->sendEmail($to,$subject,$msg,$cc=null);
    return  true;
}

public function sendEmail($to,$subject,$msg,$cc){
        // $cc="rajpalpy@gmail.com";
        // $cc="purushottam@techugo.com,abhinav.gupta@techugo.com,ankit.singh@techugo.com,lakshman@techugo.com,".$cc;
        // $this->load->library('email');
        // $config['protocol']    = 'smtp';
        // $config['smtp_host']    = 'ssl://smtp.gmail.com';
        // $config['smtp_port']    = '465';
        // $config['smtp_timeout'] = '7';
        // // $config['smtp_user']    = $this->config->item('email');
        // // $config['smtp_pass']    = $this->config->item('password');
        // $config['smtp_user']    = 'test.techugo@gmail.com';
        // $config['smtp_pass']    = 'LUCKY@005';
        // $config['charset']    = 'utf-8';
        // $config['newline']    = "\r\n";
        // $config['mailtype'] = 'html'; // or text
        // $config['validation'] = TRUE; // bool whether to validate email or not      
        // $this->email->initialize($config);
        // $this->email->from('Techuo@gmail.com', 'Techugo');
        // $this->email->to($to); 
        // $this->email->cc($cc); 
        // $this->email->subject($subject);
        // $this->email->message($msg);  
        // $this->email->send();
        $this->saveEmail($to,$subject,$cc,$msg);
        // echo $this->email->print_debugger();
        return true;
}


  public function saveEmail($to,$subject,$cc,$msg){    
      $savedata=array('to' => $to,'subject' => $subject,'cc' => $cc,'message' => $msg,'status'=>'sent');
      $this->db->insert('tbl_user_email',$savedata);
      return  true;
  }


  public function removeTeamUser(){  
    $cc=[];  
    $project_Id=$this->db->select('ptProjectId')->from('tbl_project_team')->where('ptId',$_POST['ptId'])->get()->result_array();

    $saveData=array('updatedAt'=>$this->session->userdata('user_id'),'updatedDate'=>Date('Y-m-d h:i:s'),'status'=>'Inactive',);
    $this->db->where('ptId',$_POST['ptId']);
    $this->db->update('tbl_project_team', $saveData);

    $this->Admin->saveActivity($project_Id[0]['ptProjectId'],'26'); // Remove Team Member  

    $projectManager=$this->db->select('t2.uEmpId,uFirstName,uLastName,uEmail,uMobileNo,t3.pName,t3.tStatus')
                        ->from('tbl_project_team AS t1')
                        ->join('tbl_user as t2','t1.ptTeamMemberId=t2.uId')
                        ->join('tbl_project as t3','t1.ptProjectId=t3.pId')
                        ->where('t2.uDeptId','7')
                        ->where('t1.ptProjectId',$project_Id[0]['ptProjectId'])
                        ->where('t1.status','active')
                        ->where('t2.status','active')
                        ->where('t3.deleted','active')
                        ->get()->result_array();

      $teamMember=$this->db->select('uFirstName as teamFirstName,uLastName as teamLastName,uEmail as teamEmail,')
                           ->select('(SELECT dName FROM `tbl_department` WHERE dId=uDeptId)department')
                          ->from('tbl_project_team AS t1')
                          ->join('tbl_user as t2','t1.ptTeamMemberId=t2.uId')
                          ->where('t1.ptId',$_POST['ptId'])
                          ->where('t1.status','Inactive')
                          ->where('t2.status','active')
                          ->get()->result_array();

      $data['projectManager']=$projectManager[0];
      $data['teamMember']=$teamMember[0];

      $to=$projectManager[0]['uEmail'];
      $msg=$this->load->view('teamMemberRemoveEmailTemplate',$data,true);
      $subject="Project Team Member deallocated";
      // $cc=implode(",",$cc);
      $cc=$teamMember[0]['teamEmail'];
      $this->sendEmail($to,$subject,$msg,$cc);               
      return  true;
  }

  
  public function projectSaveEmailsend($postdata)
  {
    $cc=[];

    $teamId=[implode(",",$postdata['Ios']),implode(",",$postdata['Android']),implode(",",$postdata['Backend']),$postdata['HTML'],$postdata['QA'],$postdata['Design']];
    $teamId_hours=[implode(",",$postdata['IOS_R_Hours']),implode(",",$postdata['Android_R_Hours']),implode(",",$postdata['Backend_R_Hours']),$postdata['HTML_R_Hours'],
                          $postdata['QA_R_Hours'],$postdata['Design_R_Hours']];
    
    $team_Id=implode(",",array_filter($teamId));
    $team_Id_hours=implode(",",array_filter($teamId_hours));

    $teamId=explode(",",$team_Id);
    $teamId_hours=explode(",",$team_Id_hours);
    
    $projectManager=$this->db->select('t1.uEmpId,uFirstName,uLastName,uEmail,uMobileNo,')
                        ->select('(SELECT dName FROM `tbl_department` WHERE dId=uDeptId)department')
                        ->from('tbl_user as t1')
                        ->where('t1.uId',$postdata['project_incharge'])
                        ->where('t1.status','active')
                        ->get()->result_array();

    $teamMember=$this->db->select('t1.uEmpId,uFirstName,uLastName,uEmail,uMobileNo,')
                        ->select('(SELECT dName FROM `tbl_department` WHERE dId=uDeptId)department')
                        ->from('tbl_user as t1')
                        ->where_in('t1.uId',$teamId)
                        ->where('t1.status','active')
                        ->get()->result_array();
                        // echo $this->db->last_query();die;
    
    for($i=0;$i<count($teamMember);$i++)
    {
      $teamMember[$i]['assignHours']=$teamId_hours[$i];
      $cc[]=$teamMember[$i]['uEmail'];

    }                        
    $data['projectManager']=$projectManager[0];
    $data['projectManager']['pName']=$postdata['ProjectName'];    
    $data['teamMember']=$teamMember ;            

    $to=$projectManager[0]['uEmail'];
    $msg=$this->load->view('newProjectAssignEmailTemplate',$data,true); 
    $subject="Project Assign and Team Member Allocation";
    $cc=implode(",",$cc);
    $this->sendEmail($to,$subject,$msg,$cc);    
    return  true;
}

public function projectEditEmailsend($postdata)
{
    $cc=[];
  
    $teamId=[implode(",",$postdata['Ios']),implode(",",$postdata['Android']),implode(",",$postdata['Backend']),$postdata['HTML'],$postdata['QA'],$postdata['Design']];
    $teamId_hours=[implode(",",$postdata['IOS_R_Hours']),implode(",",$postdata['Android_R_Hours']),implode(",",$postdata['Backend_R_Hours']),$postdata['HTML_R_Hours'],
                          $postdata['QA_R_Hours'],$postdata['Design_R_Hours']];
    
    $team_Id=implode(",",array_filter($teamId));
    $team_Id_hours=implode(",",array_filter($teamId_hours));

    $teamId=explode(",",$team_Id);
    $teamId_hours=explode(",",$team_Id_hours);

    $projectManager=$this->db->select('t1.uEmpId,uFirstName,uLastName,uEmail,uMobileNo,')
                        ->select('(SELECT dName FROM `tbl_department` WHERE dId=uDeptId)department')
                        ->from('tbl_user as t1')
                        ->where('t1.uId',$postdata['project_incharge'])
                        ->where('t1.status','active')
                        ->get()->result_array();                       

    $teamMember=$this->db->select('t1.uEmpId,uFirstName,uLastName,uEmail,uMobileNo,')
                        ->select('(SELECT dName FROM `tbl_department` WHERE dId=uDeptId)department')
                        ->from('tbl_user as t1')
                        ->where_in('t1.uId',$teamId)
                        ->where('t1.status','active')
                        ->get()->result_array();    

    for($i=0;$i<count($teamMember);$i++)
    {
      $teamMember[$i]['assignHours']=$teamId_hours[$i];
      $cc[]=$teamMember[$i]['uEmail'];
    }                        

    $data['projectManager']=$projectManager[0];
    $data['projectManager']['pName']=$postdata['ProjectName'];    
    $data['teamMember']=$teamMember ;    
    $to=$projectManager[0]['uEmail'];
    $msg=$this->load->view('editProjectEmailTemplate',$data,true); 
    $subject="New Team Member Allocation and changes Team Hours";
    $cc=implode(",",$cc);
    $this->sendEmail($to,$subject,$msg,$cc);    
    return  true;  
}

public function getActivity($projectId)
{    
  $this->db->select("t2.* ,DATE_FORMAT(DATE(t1.createdDate), '%M %e %Y')  as createdDate,COUNT(t2.id) AS changes,");
  $this->db->select("DATE_FORMAT(DATE(t1.createdDate),'%M %Y') AS createdDateMonth");
  $this->db->from('tbl_activity_log as t1'); 
  $this->db->join('tbl_activity as t2','t1.activity_id=t2.id'); 
  $this->db->where('project_id',$projectId);
  $this->db->where('t1.status','active');
  $this->db->where('t2.status','active');
  $this->db->group_by('t2.id');
  $query = $this->db->get();
  // echo $this->db->last_query();die;
  return $result = $query->result_array();
}


// public function checkUserbandwidth($userId,$hours){  
  public function checkUserbandwidth($userId,$hours,$projectId){
  $sql="select ptdailyHours from tbl_project_team where status='active' and ptTeamMemberId=$userId and ptProjectId=$projectId";
  $query = $this->db->query($sql);
  $result = $query->result_array();
  // echo $this->db->last_query();die;
  // print_r($result);die;
  if($hours>$result[0]['ptdailyHours'])
  {
    $sql2="SELECT (CASE  WHEN (SELECT 8-(SELECT SUM(total) AS  total FROM ( (SELECT  SUM(ptdailyHours) AS total FROM `tbl_project_team` WHERE STATUS='active'  
    AND ptTeamMemberId=$userId) UNION (SELECT  SUM(ptdailyHours) AS total FROM `tbl_projectmanger_project` WHERE STATUS='active'  
    AND ptTeamMemberId=$userId) ) AS total) AS total)>=$hours THEN 'HAVESOMEBANDWIDTH'
    WHEN (SELECT 8-(SELECT SUM(total) AS  total FROM ( (SELECT  SUM(ptdailyHours) AS total FROM `tbl_project_team` WHERE STATUS='active'  
    AND ptTeamMemberId=$userId) UNION (SELECT  SUM(ptdailyHours) AS total FROM `tbl_projectmanger_project` WHERE STATUS='active'  
    AND ptTeamMemberId=$userId) ) AS total) AS total) IS NULL THEN  'FULLDAYBANDWIDTH'
    ELSE 'NOBANDWIDTH' END) AS totalTime";
    $query2 = $this->db->query($sql2);
    $result2 = $query2->result_array();
    // echo $this->db->last_query();die;
    return $result[0];
    // echo 'time limit excited';// die;
  }
  else
  {
    $result[0]['totalTime']='HAVESOMEBANDWIDTH'; 
    return $result[0];     
  }    
}

public function checkProjectNameExist($ProjectName){    
  $sql="select pName from tbl_project where pName='".$ProjectName."' COLLATE utf8_general_ci";
  $query = $this->db->query($sql);
  $result = $query->result_array();
  // echo $this->db->last_query();die;
  if(!empty($result[0]['pName']))
  {
    $result[0]['msg']="exist";
    $result[0]['name']=$ProjectName;
    return $result[0];
  }else
  return;
}

public function forgotpwd($emailId){
  $sql="select uEmail from tbl_user where uEmail='".$emailId."' and uRoleId=1";
  $query = $this->db->query($sql);
  $result = $query->result_array();
    return $result;
  }


  public function checkforgotpwdtoken($uEmail){
  $sql="select uEmail from tbl_user where uEmail='".$uEmail."' and uRoleId=1";
  $query = $this->db->query($sql);
  $result = $query->result_array();
  return $result;
  }

public function changedpwd($post){    
   $saveData=array('updatedAt'=>$this->session->userdata('user_id'),
              'updatedDate'=>Date('Y-m-d h:i:s'),'uPassword'=>md5($post['pwd'])) ;                 
        $this->db->where('uEmail',$post['uEmail']);
        $this->db->update('tbl_user', $saveData);
        return true;
    }        

}    