<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');

class Admin extends CI_Controller
{

public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('AdminModel','Admin'); 
        $this->load->model('Common_model','commonModel'); 
        $this->success = array("responseCode" => "200");
        $this->failed = array("responseCode" => "0");
        $this->load->library('upload');
        date_default_timezone_set("Asia/Kolkata");			
        $this->load->library('pagination');   
}


public function index(){
    if($this->session->userdata('logged_in')==1){
        redirect('Admin/dashboard');
    }else{
        $this->load->view('login');
    } 
}

public function validateMandagoryFields($postData, $mendatoryFields){
		$res = false;
		foreach ($mendatoryFields as $field){
			if (!isset($postData[$field]) || strlen($postData[$field]) == 0){
				$this->failed["responseMessage"] = "$field can't be left blank";
				$res = $this->failed;
				break;
			}
		}
		return $res;
}
 
public function login(){
        if ($this->input->post()){
    			$mendatoryFields = array('uEmail', 'upassword');
                $res = $this->validateMandagoryFields($this->input->post(), $mendatoryFields);  	
                
            if ($res != false){
                $this->session->set_flashdata('error_msg', 'Request Parameters Not Valid .');
				Redirect('Admin');
            }else {
                $postData['uEmail']=$this->input->post('uEmail');
				$postData['upassword']=md5($this->input->post('upassword'));
				$isUser = $this->commonModel->getSingle('tbl_user',['uEmail' => $postData['uEmail'],'upassword'=>$postData['upassword'],
                'status'=> 'active','uroleId'=> '1']); 

                if(!empty($isUser[0])){	
				    $this->success['responseMessage'] = 'Admin login successfully';
                    $access_token = md5($isUser[0]['mobileNo']);
                    $this->Admin->saveToken($isUser[0],$access_token);    
					$isUser['token']= $access_token;				
					$newdata = array('username'=> 'admin','email'=>$postData['uEmail'],'logged_in' => TRUE,'token'=>$access_token,
					'user_id'=>$isUser[0]['uId']);
					$this->session->set_userdata($newdata);
					$result['data']=$isUser['0'];
                    $responce = array_merge($this->success, $result);
                    Redirect('Admin/dashboard');

                }else{
					$this->session->set_flashdata('error_msg', 'Invalid details.');
					Redirect('Admin');
				}
            }	
        }else{
			$this->session->set_flashdata('error_msg', 'Select post method.');
			Redirect('Admin');
		}	  
    }


public function logout(){
        $this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('Admin' ,'refresh');
	}

public function dashboard(){
        if($this->session->userdata('logged_in')==1){
            $result['active']=$this->Admin->getActiveProject();
            $result['upComingProject']=$this->Admin->getUpcomingProject();
            $result['onHold']=$this->Admin->getOnHoldProject();
            $result['freebandwidth']=$this->Admin->getFreeBandwidth();
            // print_r($result);die;
            $this->load->view('header');
            $this->load->view('dashboard',$result);
            $this->load->view('footer');
        }else{
          Redirect('Admin');
        }
    }
    
       
public function getTotalAssignHours(){

    $data['res'] = $this->Admin->getTotalAssignHours($_POST['userId']);          
    echo '<pre>';print_r($data);die;
}
    
public function users($rowno=0){
        if($this->session->userdata('logged_in')==1){
                    $data['title'] = 'Users List';
                    $data['res'] = $this->Admin->getUserData();          
                    // echo '<pre>';print_r($data);die;
                    $this->load->view('header');
                    $this->load->view('users',$data);
                    $this->load->view('footer');
        }else{
            Redirect('Admin');
        }
	}
        
     
public function freeResource($rowno=0){
    if($this->session->userdata('logged_in')==1){
                $data['title'] = 'List of Free Resource';
                $data['res'] = $this->Admin->getUserData();       
                foreach($data['res'] as $key=> $value){
                    if($value['freeTime']=='0.00'){
                        unset($data['res'][$key]);
                    }
                 }
                $this->load->view('header');
                $this->load->view('freeResource',$data);
                $this->load->view('footer');
    }else{
        Redirect('Admin');
    }
}

public function viewUserProject(){
    if($this->session->userdata('logged_in')==1){
        $userId=$this->input->get('userId');
        $result['projectDetails'] = $this->Admin->getUserProject($userId) ;
        // $result['projectMileStone'] = $this->Admin->getMileStoneByUserId($userId);
        // $result['projectTeamMembers'] = $this->Admin->getProjectTeamMembersByUserId($userId);
        $result['title'] = 'User Project Details';
        // echo '<pre>';print_r($result);die;
        $this->load->view('header');
        $this->load->view('viewUserProject',$result);
        $this->load->view('footer');
    }else{
        Redirect('Admin');
    }
}


public function getTimeSheet($rowno=0){
    if($this->session->userdata('logged_in')==1){
                 $search_text = "";
                if($this->input->post('submit') != NULL ){
                  $search_text = $this->input->post('search');
                  $this->session->set_userdata(array("search"=>$search_text));
                }else{
                  if($this->session->userdata('search') != NULL)
                     $search_text = $this->session->userdata('search');
                }
                $rowperpage = 20;
                if($rowno != 0)
                $rowno = ($rowno-1) * $rowperpage;    
                $allcount = 0;
                $users_record = $this->Admin->getTimeSheet($rowno,$rowperpage,$search_text);    
                $config['base_url'] = base_url().'Admin/getTimeSheet';
                $config['use_page_numbers'] = TRUE;
                $config['total_rows'] = $allcount;
                $config['per_page'] = $rowperpage;
                $this->pagination->initialize($config);
                $data['pagination'] = $this->pagination->create_links();
                $data['result'] = $users_record;
                $data['row'] = $rowno;
                $data['search'] = $search_text;
                $data['title'] = 'User Time Sheets';
                $this->load->view('header');
                $this->load->view('timesheets',$data);
                $this->load->view('footer');
    }else{
        Redirect('Admin');
    }
}

public function viewTimesheets(){
    if($this->session->userdata('logged_in')==1){            
        $projectId=$this->input->get('projectId');
        $result['projectTimeSheets'] = $this->Admin->viewTimeSheet($projectId);
        $result['title'] = 'Project Time Sheets';
        $this->load->view('header');
        $this->load->view('Viewtimesheets',$result);
        $this->load->view('footer');
    }else{
        Redirect('Admin');
    }   
}

public function getProject($rowno=0){
        if($this->session->userdata('logged_in')==1){
                    $search_text = "";
                    if($this->input->post('submit') != NULL ){
                      $search_text = $this->input->post('search');
                      $this->session->set_userdata(array("search"=>$search_text));
                      }else{
                      if($this->session->userdata('search') != NULL)
                         $search_text = $this->session->userdata('search');
                    }
                    $rowperpage = 20;
                    if($rowno != 0)
                    $rowno = ($rowno-1) * $rowperpage;    
                    $allcount = 10;
                    // print_r($_GET);die;
                    $users_record = $this->Admin->getProject($rowno,$rowperpage,$search_text);    
                    $config['base_url'] = base_url().'Admin/getProject';
                    $config['use_page_numbers'] = TRUE;
                    $config['total_rows'] = $allcount;
                    $config['per_page'] = $rowperpage;
                    $this->pagination->initialize($config);
                    $config['reuse_query_string'] = TRUE;
                    $this->pagination->initialize($config);
                    $data['pagination'] = $this->pagination->create_links();
                    $data['result'] = $users_record;
                    $data['row'] = $rowno;
                    $data['search'] = $search_text;
                    if($_GET['tStatus']=='Initial')
                    {
                       $data['title'] = 'Upcoming Project List';
                    }
                    else
                    { 
                        if($_GET['tStatus']=='OnHold')
                        {
                            $data['title'] = 'OnHold Project List';
                        }
                        else
                        {
                            $data['title'] = 'Active Project List';
                        }
                    }    
                    // echo '<pre>';print_r($data);die;
                    $this->load->view('header');
                    $this->load->view('project',$data);
                    $this->load->view('footer');                     
        }
    }    

          
public function viewProject(){
    if($this->session->userdata('logged_in')==1){
        $projectId=$this->input->get('projectId');
        $result['projectDetails'] = $this->Admin->getProjectById($projectId) ;
        $result['projectMileStone'] = $this->Admin->getMileStoneByProjectId($projectId);
        $result['projectClient'] = $this->Admin->getProjectClientById($projectId);
        $result['projectTeamMembers'] = $this->Admin->getProjectTeamMembersById($projectId);
        $result['projectTimesheets'] = $this->Admin->getProjectTimeSheets($projectId);
        $result['title'] = 'Project Details';
        // echo '<pre>';print_r($result);die;
        $this->load->view('header');
        $this->load->view('viewProject',$result);
        $this->load->view('footer');
    }else{
        Redirect('Admin');
    }
}

public function chnagePojectStatus(){
    if($this->session->userdata('logged_in')==1){
       if($this->input->post()){
            $this->Admin->chnagePojectStatus();
            return true;             
        }
    }else{
        Redirect('Admin');
    }
}


public function Activity(){
    if($this->session->userdata('logged_in')==1)
    {
        
        $data['activityData']=$this->Admin->getActivity($_GET['projectId']);    
        // echo '<pre>';print_r($data);     die;
        $this->load->view('header');
        $this->load->view('activity',$data);
        $this->load->view('footer');  
        
    }else{
        Redirect('Admin');
    }
}

public function getTeamList($rowno=0){
        if($this->session->userdata('logged_in')==1){
                    $search_text = "";
                    if($this->input->post('submit') != NULL ){
                      $search_text = $this->input->post('search');
                      $this->session->set_userdata(array("search"=>$search_text));
                    }else{
                      if($this->session->userdata('search') != NULL)
                         $search_text = $this->session->userdata('search');
                    }
                    $rowperpage = 20;
                    if($rowno != 0)
                    $rowno = ($rowno-1) * $rowperpage;    
                    $allcount = 0;
                    $users_record = $this->Admin->getTeamList($rowno,$rowperpage,$search_text);    
                    $config['base_url'] = base_url().'Admin/getTeamList';
                    $config['use_page_numbers'] = TRUE;
                    $config['total_rows'] = $allcount;
                    $config['per_page'] = $rowperpage;
                    $this->pagination->initialize($config);
                    $config['reuse_query_string'] = TRUE;
                    $this->pagination->initialize($config);
                    $data['pagination'] = $this->pagination->create_links();
                    $data['result'] = $users_record;
                    $data['row'] = $rowno;
                    $data['search'] = $search_text;
                    $data['title'] = 'Teams';
                    // echo '<pre>';print_r($data);die;
                    $this->load->view('header');
                    $this->load->view('teams',$data);
                    $this->load->view('footer');                     
        }
    } 


public function viewTeam(){
    if($this->session->userdata('logged_in')==1){            
        $teamId=$this->input->get('teamId');
        $result['TeamMembers'] = $this->Admin->getAllTeamMembersById($teamId);
        $result['title'] = 'Team Members';
        // echo '<pre>';print_r($result);die;
        $this->load->view('header');
        $this->load->view('teamView',$result);
        $this->load->view('footer');
    }else{
        Redirect('Admin');
    }
   
}

public function editTeam(){
    if($this->session->userdata('logged_in')==1){     
        if($this->input->post())
        {
            // echo '<pre>'; print_r($_POST);   die;
            $this->Admin->updateTeam($_POST);
           redirect('Admin/getTeamList');
        }else{       
            $result['teamId']=$this->input->get('teamId');
            $result['TeamMembers'] = $this->Admin->getAllTeamMembersByIds($result['teamId']);
            $result['getProjectManager'] = $this->Admin->getProjectManager($result['teamId']);
            $result['title'] = 'Team Members';
            $result['ios'] = $this->Admin->getUser(1);
            $result['android'] = $this->Admin->getUser(2);
            $result['backend'] = $this->Admin->getUser(3);
            $result['qa'] = $this->Admin->getUser(4);
            $result['html'] = $this->Admin->getUser(5);
            $result['design'] = $this->Admin->getUser(6);
            $result['project_incharge'] = $this->Admin->getUser(7);
            $result['projectDetails'] = $this->Admin->getTeamProject($result['teamId']);
            $result['projectClientDetails'] = $this->Admin->getProjectClient($result['teamId']);     
            $res=$this->teamSeprationList($result);
            // echo '<pre>'; print_r($res); die;
            $this->load->view('header');
            $this->load->view('editTeam',$res);
            $this->load->view('footer');
        }
    }else{
        Redirect('Admin');
    }
   
}

public function teamSeprationList($result){    
    // echo 'hello';
    foreach ($result['TeamMembers'] as $key => $subData){
        // echo '<pre>';print_r($subData);die;

        // ios devloper and project manager also (81)
        if(in_array($subData['uId'],array(81))){
            $result['TeamProjectIOS'][]=$subData;
        }
        // android devloper and project manager also (131,79,147)    
        if(in_array($subData['uId'],array(131,79,147))){
            $result['TeamProjectAndroid'][]=$subData;
        }
        // backend devloper and project manager also (75)
        if(in_array($subData['uId'],array(75))){
            $result['TeamProjectBackend'][]=$subData;
        }

        if($subData['DeptName']=='IOS'){
            $result['TeamProjectIOS'][]=$subData;
        }                      
        if($subData['DeptName']=='Android'){           
            $result['TeamProjectAndroid'][]=$subData;
      }
      if($subData['DeptName']=='Backend'){
          $result['TeamProjectBackend'][]=$subData;        
      }
      if($subData['DeptName']=='QA'){
          $result['TeamProjectQA']=$subData;
      }
      if($subData['DeptName']=='HTML'){        
          $result['TeamProjectHTML']=$subData;
      }
      if($subData['DeptName']=='Design'){
          $result['TeamProjectDesign']=$subData;
      }
    //   if($subData['DeptName'] == 'Project-Incharge'){
    //       $result['TeamProjectIncharge']=$subData;
    //   }
      if($subData['DeptName'] =='Delivery'){
          $result['TeamProjectDelivery']=$subData;
      }
    }
    return $result;
}
public function getActivityList($rowno=0){
    if($this->session->userdata('logged_in')==1){
                $search_text = "";
                if($this->input->post('submit') != NULL ){
                  $search_text = $this->input->post('search');
                  $this->session->set_userdata(array("search"=>$search_text));
                }else{
                  if($this->session->userdata('search') != NULL)
                     $search_text = $this->session->userdata('search');
                }
                $rowperpage = 30;
                if($rowno != 0)
                $rowno = ($rowno-1) * $rowperpage;    
                $allcount = 0;
                $users_record = $this->Admin->getActivityList($rowno,$rowperpage,$search_text);    
                $config['base_url'] = base_url().'Admin/getActivityList';
                $config['use_page_numbers'] = TRUE;
                $config['total_rows'] = $allcount;
                $config['per_page'] = $rowperpage;
                $this->pagination->initialize($config);
                $config['reuse_query_string'] = TRUE;
                $this->pagination->initialize($config);
                $data['pagination'] = $this->pagination->create_links();
                $data['result'] = $users_record;
                $data['row'] = $rowno;
                $data['search'] = $search_text;
                // echo '<pre>';print_r($data);die();
                $data['title'] = 'Activity list';
                $this->load->view('header');
                $this->load->view('activityList',$data);
                $this->load->view('footer');                     
    }
} 

public function addProject(){
        if($this->session->userdata('logged_in')==1){               
            if($this->input->post()){
                // echo '<pre>';print_r($_POST);die;
               $this->Admin->AddProject($this->input->post());
                Redirect('Admin/getProject');                
            }else{
            $result['ios'] = $this->Admin->getUser(1);
            $result['android'] = $this->Admin->getUser(2);
            $result['backend'] = $this->Admin->getUser(3);
            $result['qa'] = $this->Admin->getUser(4);
            $result['html'] = $this->Admin->getUser(5);
            $result['design'] = $this->Admin->getUser(6);
            $result['project_incharge'] = $this->Admin->getUser(7);
            // echo '<pre>';print_r($result);die();
            $this->load->view('header');
            $this->load->view('addProject',$result);
            $this->load->view('footer');
            }
        }else{
            Redirect('Admin');
        }
	   
    }


public function removeTeamUser()
{
    if($this->session->userdata('logged_in')==1){            
        if($this->input->post())
        {            
             $this->Admin->removeTeamUser();
             return true;
        }
    }else{
        Redirect('Admin');
    }
   
}

public function addUser(){
    if($this->session->userdata('logged_in')==1){            
        if($this->input->post()){
            // $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|xss_clean|edit_unique[users.user_name.'.$id.']');
            $this->Admin->addUser($this->input->post());
            Redirect('Admin/users');                
        }else{
        $result['dept'] = $this->Admin->getDepartment();
        $this->load->view('header');
        $this->load->view('addUser',$result);
        $this->load->view('footer');
        }
    }else{
        Redirect('Admin');
    }
}


public function viewActivity(){
    if($this->session->userdata('logged_in')==1){            
        if($this->input->post()){
            // $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|xss_clean|edit_unique[users.user_name.'.$id.']');
            $this->Admin->addUser($this->input->post());
            Redirect('Admin/users');                
        }else{
        $result['dept'] = $this->Admin->getDepartment();
        $this->load->view('header');
        $this->load->view('addUser',$result);
        $this->load->view('footer');
        }
    }else{
        Redirect('Admin');   
    }
  }

public function checkUserbandwidth(){
    if($this->session->userdata('logged_in')==1){      
        $userId=$_POST['userId'];              
        $hours=$_POST['hours']; 
        $projectId=$_POST['projectId']; 
        $result = $this->Admin->checkUserbandwidth($userId,$hours,$projectId);        
        echo json_encode($result);     
    }
  }


  public function checkProjectNameExist(){
    if($this->session->userdata('logged_in')==1){                   
        $projectName=$_POST['projectName']; 
        $result = $this->Admin->checkProjectNameExist($projectName);        
        echo json_encode($result); 
    }
  }


public function forgotpwd(){
    if($this->input->post()){
        $res=$this->Admin->forgotpwd($_POST['uEmail']);
                if($res[0]['uEmail'])
                {
                    $token=base64_encode(base64_encode($res[0]['uEmail']));
                    $to=$_POST['uEmail'];   
                    $msg=$this->load->view('forgotpwdEmailTemplate',$res[0],true); 
                    $subject="Forgot Password";         
                    $this->sendEmail2($to,$subject,$msg,$cc=null);
                 $this->session->set_flashdata('success', 'Reset password link send to email Address successfully');
                  unset($_SESSION['error_msg']);
                    $this->load->view('forgotpwd');
                }else{
                $this->session->set_flashdata('error_msg', 'Invalid email Address ');
                $this->load->view('forgotpwd');
                }         
        }else{
        $this->load->view('forgotpwd');
      } 
}

public function checkforgotpwdtoken(){    
        $uEmail=base64_decode(base64_decode($_GET['resetlink']));
        $check=$this->Admin->checkforgotpwdtoken($uEmail);
        $this->load->view('changedpwd',$check[0]);    
}

public function changedpwd(){
        if($this->input->post()){
        $postdata=$_POST;
        $validity=$this->Admin->changedpwd($postdata);
        redirect('Admin');
    }else{
        $this->load->view('changedpwd');
    }
}

public function sendEmail2($to,$subject,$msg,$cc){
        $this->load->library('email');
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'test.techugo@gmail.com';
        $config['smtp_pass']    = 'LUCKY@005';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or text
        $config['validation'] = TRUE; // bool whether to validate email or not      
        $this->email->initialize($config);
        $this->email->from('Techuo@gmail.com', 'Techugo');
        $this->email->to($to); 
        $this->email->cc($cc); 
        $this->email->subject($subject);
        $this->email->message($msg);  
        $this->email->send();
        echo $this->email->print_debugger();
        return true;
}

}