<style>
.dropbtn {background-color: #4CAF50;color: white;padding: 16px;font-size: 16px;border: none;}
.dropdown {position: relative;display: inline-block;padding-left: 90px;}
.dropdown-content {display: none;position: absolute;background-color: #f1f1f1;min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: -1;}
.dropdown-content a {color: black;padding: 12px 16px;text-decoration: none;display: block;}
.dropdown-content a:hover {background-color: #ddd;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}
.button1 { background-color: white; color: black; border: 2px solid #4CAF50;}
.button1:hover {background-color: #4CAF50;color: white;}
.textareal { padding: 20px;  width: 300px; height: 300px; resize: both; overflow: auto;}
.img-wrap { position: relative;}
.img-wrap .close {position: absolute;top: 2px;right: 2px;z-index: 100;}
.dropdown-check-list {display: inline-block;}
input {height: calc(3.25rem + -17px); }
.dropdown-check-list .anchor {position: relative; cursor: pointer; display: inline-block; padding: 5px 50px 5px 10px; border: 1px solid #ccc;}
.dropdown-check-list .anchor:after {position: absolute; content: "";border-left: 2px solid black; border-top: 2px solid black;
  padding: 5px;right: 10px;top: 20%; -moz-transform: rotate(-135deg); -ms-transform: rotate(-135deg); -o-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);transform: rotate(-135deg);}
.dropdown-check-list .anchor:active:after {right: 8px; top: 21%;}
.dropdown-check-list ul.items {padding: 2px; display: none; margin: 0; border: 1px solid #ccc; border-top: none;}
.dropdown-check-list ul.items li { list-style: none;}
.dropdown-check-list.visible .anchor { color: #0094ff;}
.dropdown-check-list.visible .items { display: block;}.
textarea{text-align:left;}
.error {color: red;}
.content-header{
display:none;}
.card{
background:#f4f6f9;
box-shadow:none;
border:0px;
}
.btn-primary{
	width:90px;
	border-radius:0;
	background:#099beb;
}
.card-body{
background:#fff;
box-shadow:0px 0px 5px rgba(0,0,0,0.5);}
.main-footer{
	z-index:1!important;
	position:relative!important;
	margin-left:0!important;
}
@media screen and (max-width: 767px) {
.content-wrapper{
	margin-left:0px!important;
}
.titletag {
    font-size: 1.4rem;
}
.searchbox .button1 {
    width: 29% !important;;
margin-left:12px;
}
.searchbox .searchtxt {
    width: 65%;
}
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>

</head>

<body>
<?php  
     $error_msg=$this->session->flashdata('error_msg');
       if($error_msg)
       { 
             print_r("<div class='error'>". $error_msg . "</div>");
        } 
    ?>

    <div class="clearfix"></div>
        <main class="main" id="main">
          <div class="container-fluid">
            <!-------------Breadcrumb Navigation start--------------->
            <div class="row">
                <div class="col-md-12 m-t-40">
                </div>
            </div>
            <!-------------row start--------------->
            <div class="row m-t-30">
            	<!-------------chart start--------------->
                <div class="col-12">
                    <div class="card">
	<h2 style="text-align:left;color:#000;padding:20px 0;">Edit Project Team Details</h2>
<div class="card-body">
<div id="form1"  class="long-form">
  <form method="post" class="form- mgt-25" action="<?php echo base_url('Admin/editTeam'); ?>" enctype="multipart/form-data">
  <input type="hidden" id="user_id" value="<?php  echo $this->session->userdata('user_id'); ?>" name="user_id"/>
  <input type="hidden" value="<?php  echo $teamId; ?>" name="team_id"/>
  
<div class="form-group row">
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="first_name">Client Name</label>
          <input type="text"  name="clientId" value="<?php echo $projectClientDetails['id']; ?>" hidden/>
          <input type="text" class="form-control" id="Client_Name" name="Client_Name" 
          value="<?php echo $projectClientDetails['uName']; ?>" placeholder="Enter Name" required/><br/>
      </div>
      
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="dob">Project Name</label>
          <input type="text"  name="ProjectId" value="<?php echo $projectDetails['pId']; ?>" hidden/>
          <input type="text" class="form-control" id="ProjectName" name="ProjectName" 
          value="<?php echo $projectDetails['pName']; ?>" placeholder="Enter Project Name" required/><br/>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="email_id">Project Inchagre </label>
 <input type="hidden" value="<?php  echo $TeamProjectIncharge['ptId']; ?>" name="project_incharge_Id"/>
          <select id="project_incharge" name="project_incharge" class="form-control">  
          <option value="">-- Choose Developer --</option>
          
            <?php foreach($project_incarge as $key => $value) : 
               $selst='';
               if($value['uId']==$TeamProjectIncharge['uId'])
               $selst='selected';
               else
               $selst=''; 
                ?> 
                <option value="<?php echo $value['uId']; ?>" <?php echo $selst?>>
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
       </div>          

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  for="mobile_no">Project Incharge Hours</label>
          <input type="number" class="form-control" id="Project_R_Hours" name="Project_R_Hours"  
           value="<?php echo $TeamProjectIncharge['ptdailyHours'];?>"
            placeholder="Hours" step="0.01" min="0" max="200" /><br/>
      </div>
                 

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  for="mobile_no">IOS Developer</label>
          <input type="hidden" id="Ios_Id" value="<?php  echo $TeamProjectIOS['ptId']; ?>" name="Ios_Id"/>
            <select id="Ios" name="Ios" class="form-control">  
            <option value="">-- Choose Developer --</option>
            <?php foreach($ios as $key => $value) : 
              $selst='';
              if($value['uId']==$TeamProjectIOS['uId'])
              $selst='selected';
              else
              $selst=''; 
               ?> 
               <option value="<?php echo $value['uId']; ?>" <?php echo $selst?>>
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>              
      </div>
      
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="email_id">IOS Hours</label>
          <input type="number" class="form-control" id="IOS_R_Hours" name="IOS_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="100" 
           value="<?php echo $TeamProjectIOS['ptdailyHours'];?>" /><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  for="mobile_no">Android Developer</label>
<input type="hidden" id="Android_Id" value="<?php  echo $TeamProjectAndroid['ptId']; ?>" name="Andoid_Id"/>
          <select id="Android" name="Android" class="form-control">  
          <option value="">-- Choose Developer --</option>
            <?php foreach($android as $key => $value) : 
                  $selst='';
                  if($value['uId']==$TeamProjectAndroid['uId'])
                  $selst='selected';
                  else
                  $selst=''; 
                   ?> 
                   <option value="<?php echo $value['uId']; ?>" <?php echo $selst?>>
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
      </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="email_id">Android Hours</label>
          <input type="number" class="form-control" id="Android_R_Hours" name="Android_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="100" 
           value="<?php echo $TeamProjectAndroid['ptdailyHours'];?>"/><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  for="mobile_no">Backend Developer</label>
<input type="hidden" id="Backend_Id" value="<?php  echo $TeamProjectBackend['ptId']; ?>" name="Backend_Id"/>
          <select id="Backend" name="Backend" class="form-control">  
          <option value="">-- Choose Developer --</option>
            <?php foreach($backend as $key => $value) : 
                  $selst='';
                  if($value['uId']==$TeamProjectBackend['uId'])
                  $selst='selected';
                  else
                  $selst=''; 
                   ?> 
                   <option value="<?php echo $value['uId']; ?>" <?php echo $selst?>>
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
      </div>
      
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="email_id">Backend Hours</label>
          <input type="number" class="form-control" id="Backend_R_Hours" name="Backend_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="100"
           value="<?php echo $TeamProjectBackend['ptdailyHours'];?>" /><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  for="mobile_no">HTML Developer</label>
<input type="hidden" id="HTML_Id" value="<?php  echo $TeamProjectHTML['ptId']; ?>" name="HTML_Id"/>
          <select id="HTML" name="HTML" class="form-control">  
          <option value="">-- Choose Developer --</option>
            <?php foreach($html as $key => $value) :
                 $selst='';
                 if($value['uId']==$TeamProjectHTML['uId'])
                 $selst='selected';
                 else
                 $selst=''; 
                  ?> 
                  <option value="<?php echo $value['uId']; ?>" <?php echo $selst?>>
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
      </div>
      
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="email_id">HTML Hours</label>
          <input type="number" class="form-control" id="HTML_R_Hours" name="HTML_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="100" 
           value="<?php echo $TeamProjectHTML['ptdailyHours'];?>" 
           /><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  for="mobile_no">QA Developer</label>
<input type="hidden" id="QA_Id" value="<?php  echo $TeamProjectQA['ptId']; ?>" name="QA_Id"/>
          <select id="QA" name="QA" class="form-control">  
          <option value="">-- Choose Developer --</option>
            <?php foreach($qa as $key => $value) : 
                 $selst='';
                 if($value['uId']==$TeamProjectQA['uId'])
                 $selst='selected';
                 else
                 $selst=''; 
                  ?> 
                  <option value="<?php echo $value['uId']; ?>" <?php echo $selst?>>
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
      </div>
      
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="email_id">QA Hours</label>
          <input type="number" class="form-control" id="QA_R_Hours" name="QA_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="100" 
           value="<?php echo $TeamProjectQA['ptdailyHours'];?>"/><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  for="mobile_no">Designer </label>
<input type="hidden" id="Designer_Id" value="<?php  echo $TeamProjectDesign['ptId']; ?>" name="Designer_Id"/>
         <select id="Design" name="Designer" class="form-control">  
          <option value="">-- Choose Developer --</option>
            <?php foreach($design as $key => $value) :
                 $selst='';
                 if($value['uId']==$TeamProjectDesign['uId'])
                 $selst='selected';
                 else
                 $selst=''; 
                  ?> 
                  <option value="<?php echo $value['uId']; ?>" <?php echo $selst?>>
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
      </div>
      
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="email_id">Design Hours</label>
          <input type="number" class="form-control" id="Design_R_Hours" name="Design_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="100" 
           value="<?php echo $TeamProjectDesign['ptdailyHours']; ?>"/><br/>
       </div>

</div>
   <div class="form-group row text-center ">
    <input type="submit" class="btn btn-primary" value="Update"> 
    </div>
    
</form>
</div>
</div> 
<br>
<br>
<br><br><br>
<div class="clearfix"></div>                         
</div>             

</body>
</html>
