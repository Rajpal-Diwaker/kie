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
    width: 29% !important;
margin-left:12px;
}
.searchbox .searchtxt {
    width: 65%;
}
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>

</head>

<!-- <body> -->
<body onload="loadData(
  <?php if(empty($TeamProjectIOS)){ echo '1';}else{echo '2';}?>, // (1=default load 2 = for nothing) for ios user default one sample
  <?php if(empty($TeamProjectAndroid)){ echo '1';}else{echo '2';}?> ,// for android user default one sample
  <?php if(empty($TeamProjectBackend)){ echo '1';}else{echo '2';}?> // for backend user default one sample
)">

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
            <div class="row">
                <div class="col-md-12 m-t-40">
                </div>
            </div>
            <div class="row m-t-30">
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
          <label >Project Inchagre </label>
       <input type="hidden" value="<?php  echo $getProjectManager[0]['ptId']; ?>" name="project_incharge_Id"/>
          <select id="project_incharge" name="project_incharge" class="form-control" required>  
          <option value="">-- Choose Project Incharge --</option>          
            <?php foreach($project_incharge as $key => $value) : $selst='';  
               if($value['uId']==$getProjectManager[0]['uId'])   $selst='selected';
                else $selst=''; 
                ?> 
                <option value="<?php echo $value['uId']; ?>" <?php echo $selst?>>
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
       </div>          

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label >Project Incharge Hours</label>
          <input type="number" class="form-control" id="Project_R_Hours" name="Project_R_Hours"  
           value="<?php echo $getProjectManager[0]['ptdailyHours'];?>"
            placeholder="Hours" step="0.01" min="0" max="8" required/><br/>
      </div>

 <div class="IosBox">
 <?php if(!empty($TeamProjectIOS)) {  
            foreach($TeamProjectIOS as $TeamIOS) { 
                  $uName=$TeamIOS['uName']; $uId=$TeamIOS['uId']; $ptdailyHours=$TeamIOS['ptdailyHours'];    
          ?> 
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form IosAdd">
          <label  style="width: 278px;">IOS Developer</label>      
          <input type="hidden" id="Ios_Id" value="<?php  echo $TeamIOS['ptId']; ?>" name="Ios_Id[]"/>
                <select id="Ios" name="Ios[]" class="form-control" style="width: 278px;">             
                <option  value="">-- Choose IOS Developer --</option>
                <?php foreach($ios as $key => $value) : $sel='selected';
                  if($value['uId']==$uId)  $sel='selected';
                  else   $sel='';
                ?> 
                  <option value="<?php echo $value['uId']; ?>" <?php echo $sel?>>
                  <?php echo $value['UserName']; ?>
                  </option>  
              <?php endforeach;?>    
            </select>                     
                  <label  style="width: 278px;">IOS Hours</label>
                  <input type="number" class="form-control" style="width: 278px;" value="<?php echo $ptdailyHours ?>" 
                  id="IOS_R_Hours" name="IOS_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" /><br/> 
           <span class="btn btn-primary Iosremove" id="<?php  echo $TeamIOS['ptId']; ?>" 
           style="width: 30px;height: 27px;margin-left:248px;margin-top:-39px;">-</span>
 </div>
 <?php  }
    }?>
    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form IosAdd">
        <span class="btn btn-primary NewIosAdded" style="width: 30px;height: 25px;margin-left:248px;margin-top:-27px;">+</span>
    </div>
</div>


<div class="AndroidBox">
<?php if(!empty($TeamProjectAndroid)){           
         foreach($TeamProjectAndroid as $TeamAndroid){ $uName=$TeamAndroid['uName']; $uId=$TeamAndroid['uId'];  
          $ptdailyHours=$TeamAndroid['ptdailyHours'];          
     ?>  
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form AndroidAdd">
          <label  style="width: 278px;">Android Developer</label>      
          <input type="hidden" id="Android_Id" value="<?php  echo $TeamAndroid['ptId']; ?>" name="Android_Id[]"/>
                <select id="Android" name="Android[]" class="form-control" style="width: 278px;">             
                <option value="">-- Choose Android Developer --</option>
                <?php foreach($android as $key => $value) : $sel='selected';
                  if($value['uId']==$uId)  $sel='selected';
                  else   $sel='';
                ?> 
                  <option value="<?php echo $value['uId']; ?>" <?php echo $sel?>>
                  <?php echo $value['UserName']; ?>
                  </option>  
              <?php endforeach;?>    
            </select>                     
                  <label  style="width: 278px;">Android Hours</label>
                  <input type="number" class="form-control" style="width: 278px;" value="<?php echo $ptdailyHours ?>" 
                  id="Android_R_Hours" name="Android_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" /><br/> 
           <span class="btn btn-primary Androidremove"  style="width: 30px;height: 27px;margin-left:248px;margin-top:-39px;">-</span>
 </div>
 <?php  }
    }?>
    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form AndroidAdd">
        <span class="btn btn-primary NewAndroidAdded" style="width: 30px;height: 25px;margin-left:248px;margin-top:-27px;">+</span>
    </div>
</div>


<div class="BackendBox">
<?php if(!empty($TeamProjectBackend)){ $i=1;
               foreach($TeamProjectBackend as $TeamBackend){ 
               $uName=$TeamBackend['uName']; $uId=$TeamBackend['uId']; $ptdailyHours=$TeamBackend['ptdailyHours'];    
        ?>
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form BackendAdd">
          <label  style="width: 278px;">Backend Developer</label>      
          <input type="hidden" id="Backend_Id" value="<?php  echo $TeamBackend['ptId']; ?>" name="Backend_Id[]"/>
                <select id="Backend" name="Backend[]" class="form-control" style="width: 278px;">             
                <option  value="">-- Choose Backend Developer --</option>
                <?php foreach($backend as $key => $value) : $sel='selected';
                  if($value['uId']==$uId)  $sel='selected';
                  else   $sel='';
                ?> 
                  <option value="<?php echo $value['uId']; ?>" <?php echo $sel?>>
                  <?php echo $value['UserName']; ?>
                  </option>  
              <?php endforeach;?>    
            </select>                     
                  <label  style="width: 278px;">Backend Hours</label>
                  <input type="number" class="form-control" style="width: 278px;" value="<?php echo $ptdailyHours ?>" 
                  id="Backend_R_Hours" name="Backend_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" /><br/> 
           <span class="btn btn-primary Backendremove"  style="width: 30px;height: 27px;margin-left:248px;margin-top:-39px; ">-</span>
 </div>
 <?php  }
    }?>
    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form BackendAdd">
        <span class="btn btn-primary NewBackendAdded"  style="width: 30px;height: 25px;margin-left:248px;margin-top:-27px;">+</span>
    </div>
</div>

<div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
<label  style="width: 278px;">HTML Developer</label>
<input type="hidden" id="HTML_Id" value="<?php  echo $TeamProjectHTML['ptId']; ?>" name="HTML_Id"/>
          <select id="HTML" name="HTML" class="form-control" style="width: 278px;">  
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
      
          <label  style="width: 278px;">HTML Hours</label>
          <input type="number" class="form-control" id="HTML_R_Hours" name="HTML_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="100" style="width: 278px;"
           value="<?php echo $TeamProjectHTML['ptdailyHours'];?>" 
           /><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label >QA Developer</label>
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
          <label >QA Hours</label>
          <input type="number" class="form-control" id="QA_R_Hours" name="QA_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="100" 
           value="<?php echo $TeamProjectQA['ptdailyHours'];?>"/><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label >Designer </label>
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
          <label >Design Hours</label>
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
<div class="clearfix"></div>                         
</div>             

<script>
function randomNumber() {
        var x = Math.floor((Math.random() * 9999) + 1);
        return x;
      }

ids=randomNumber();
$('.NewIosAdded').click(function() {
    $('.IosAdd:last').before('<div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form IosAdd">'
          +'<label  style="width: 278px;">IOS Developer</label>  '    
          +'<input type="hidden" id="Ios_Id" value='+ids+' name="Ios_Id[]"/>'
                +'<select id="Ios" name="Ios[]" class="form-control" style="width: 278px;">'             
                +'<option  value="">-- Choose IOS Developer --</option>'
                +'<?php foreach($ios as $key => $value) :?>' 
                +'<option value="<?php echo $value['uId']; ?>">'
                +'<?php echo $value['UserName']; ?> </option> <?php endforeach;?> </select>'
                +'<label  style="width: 278px;">IOS Hours</label>'
                +'<input type="number" class="form-control" style="width: 278px;"' 
                +'id="IOS_R_Hours" name="IOS_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" /><br/>' 
                +'<span class="btn btn-primary IosremoveNew"  style="width: 30px;height: 27px;margin-left:248px;'
                +'margin-top:-39px;">-</span>');
});

$('.IosBox').on('click','.Iosremove',function() {
  removeId=$(this).attr('id') ;
  if (confirm('Are you sure you want to Remove The developer'))
  {
        $.ajax({
            url: "<?php echo base_url('Admin/removeTeamUser'); ?>", 
            method:'post',
            data:{ptId:removeId},
            success: function(res)
            {
              // alert(res);
              $(this).parent().remove();
              // console.log(res);
              location.reload();

            }
      });
  }
});

$('.IosBox').on('click','.IosremoveNew',function() 
{
  if (confirm('Are you sure you want to Remove The developer'))
  {
        $(this).parent().remove();
 } 
 });


 $('.NewAndroidAdded').click(function() {
    $('.AndroidAdd:last').before('<div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form AndroidAdd">'
          +'<label  style="width: 278px;">Android Developer</label>  '    
          +'<input type="hidden" id="Android_Id" value='+ids+' name="Android_Id[]"/>'
                +'<select id="Android" name="Android[]" class="form-control" style="width: 278px;">'             
                +'<option  value="">-- Choose Android Developer --</option>'
                +'<?php foreach($android as $key => $value) :?>' 
                +'<option value="<?php echo $value['uId']; ?>">'
                +'<?php echo $value['UserName']; ?> </option> <?php endforeach;?> </select>'
                +'<label  style="width: 278px;">IOS Hours</label>'
                +'<input type="number" class="form-control" style="width: 278px;"' 
                +'id="Android_R_Hours" name="Android_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" /><br/>' 
                +'<span class="btn btn-primary AndroidremoveNew" style="width: 30px;height: 27px;margin-left:248px;'
                +'margin-top:-39px;">-</span>');
});

$('.AndroidBox').on('click','.Androidremove',function() {
  removeId=document.getElementById("Android_Id").value;
  // alert(removeId);
  if (confirm('Are you sure you want to Remove The developer'))
  {
        $.ajax({
            url: "<?php echo base_url('Admin/removeTeamUser'); ?>", 
            method:'post',
            data:{ptId:removeId},
            success: function(res)
            {
              $(this).parent().remove();
              // console.log(res);
              location.reload();

            }
      });
  }
});

$('.AndroidBox').on('click','.AndroidremoveNew',function() 
{
  if (confirm('Are you sure you want to Remove The developer'))
  {
        $(this).parent().remove();
 } 
 });


 $('.NewBackendAdded').click(function() {
    $('.BackendAdd:last').before('<div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form BackendAdd">'
          +'<label  style="width: 278px;">Backend Developer</label>  '    
          +'<input type="hidden" id="Backend_Id" value='+ids+' name="Backend_Id[]"/>'
                +'<select id="Backend" name="Backend[]" class="form-control" style="width: 278px;">'             
                +'<option value="">-- Choose Backend Developer --</option>'
                +'<?php foreach($backend as $key => $value) :?>' 
                +'<option value="<?php echo $value['uId']; ?>">'
                +'<?php echo $value['UserName']; ?> </option> <?php endforeach;?> </select>'
                +'<label  style="width: 278px;">Backend Hours</label>'
                +'<input type="number" class="form-control" style="width: 278px;"' 
                +'id="Backend_R_Hours" name="Backend_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8"  /><br/>' 
                +'<span class="btn btn-primary BackendremoveNew" style="width: 30px;height: 27px;margin-left:248px;'
                +'margin-top:-39px;">-</span>');
});

$('.BackendBox').on('click','.Backendremove',function() {
  removeId=document.getElementById("Backend_Id").value;
  // alert(removeId);
  if (confirm('Are you sure you want to Remove The developer'))
  {
        $.ajax({
            url: "<?php echo base_url('Admin/removeTeamUser'); ?>", 
            method:'post',
            data:{ptId:removeId},
            success: function(res)
            {
              $(this).parent().remove();
              // console.log(res);
              location.reload();

            }
      });
  }
});

$('.BackendBox').on('click','.BackendremoveNew',function() 
{
  if (confirm('Are you sure you want to Remove The developer'))
  {
        $(this).parent().remove();
 } 
 });

function loadData(IosTeamData,AndroidTeamData,BackendTeamData) 
{ 
  if(IosTeamData=='1'){$('.NewIosAdded').click();}
  if(AndroidTeamData=='1'){$('.NewAndroidAdded').click();}
  if(BackendTeamData=='1'){$('.NewBackendAdded').click();}
  
}


$("#project_incharge").change(function(){$("#Project_R_Hours").removeAttr("disabled");$("#Project_R_Hours").val('');});

$("#Ios").change(function(){$("#IOS_R_Hours").removeAttr("disabled");$("#IOS_R_Hours").val('');
    $("#Iosremove").css('display','inline-block');$("#NewIosAdded").css('display','inline-block');
});

$("#Android").change(function(){$("#Android_R_Hours").removeAttr("disabled");$("#Android_R_Hours").val('');
    $("#Androidremove").css('display','inline-block');$("#NewAndroidAdded").css('display','inline-block');});

$("#Backend").change(function(){$("#Backend_R_Hours").removeAttr("disabled");$("#Backend_R_Hours").val('');
    $("#Backendremove").css('display','inline-block');$("#NewBackendAdded").css('display','inline-block');});

$("#HTML").change(function(){$("#HTML_R_Hours").removeAttr("disabled");$("#HTML_R_Hours").val('');});
$("#QA").change(function(){$("#QA_R_Hours").removeAttr("disabled");$("#QA_R_Hours").val('');});
$("#Design").change(function(){$("#Design_R_Hours").removeAttr("disabled");$("#Design_R_Hours").val('');});


$("#Project_R_Hours").change(function(){
    hours=$('#Project_R_Hours').val();
    userId=$('#project_incharge').val();    
    // console.log('hours=',hours,'userId----',userId)
    $.ajax({
            url: "<?php echo base_url('Admin/checkUserbandwidth'); ?>", 
            method:'post',
            data:{'hours':hours,'userId':userId},
            success: function(res)
            {
                var data = $.parseJSON(res);
                // console.log(data.totalTime);
                if(data.totalTime=="NOBANDWIDTH")
                {
                 $('#Project_R_Hours').val('');
                 $('#Project_R_Hours').focus();
                 alert('Developer does not have bandwidth '); 
                }
            }
    });
});

//ios bandwidth check
$("#IOS_R_Hours").change(function(){
    hours=$('#IOS_R_Hours').val();
    userId=$('#Ios').val();    
    // console.log('hours=',hours,'userId----',userId)
    $.ajax({
            url: "<?php echo base_url('Admin/checkUserbandwidth'); ?>", 
            method:'post',
            data:{'hours':hours,'userId':userId},
            success: function(res)
            {
                var data = $.parseJSON(res);
                // console.log(data.totalTime);
                if(data.totalTime=="NOBANDWIDTH")
                {
                 $('#IOS_R_Hours').val('');
                 $('#IOS_R_Hours').focus();
                 alert('Developer does not have bandwidth '); 
                }
            }
    });
});

//android bandwidth check
$("#Android_R_Hours").change(function(){
    hours=$('#Android_R_Hours').val();
    userId=$('#Android').val();    
    // console.log('hours=',hours,'userId----',userId)
    $.ajax({
            url: "<?php echo base_url('Admin/checkUserbandwidth'); ?>", 
            method:'post',
            data:{'hours':hours,'userId':userId},
            success: function(res)
            {
                var data = $.parseJSON(res);
                // console.log(data.totalTime);
                if(data.totalTime=="NOBANDWIDTH")
                {
                 $('#Android_R_Hours').val('');
                 $('#Android_R_Hours').focus();
                 alert('Developer does not have bandwidth'); 
                }
            }
    });
});


//backend bandwidth check
$("#Backend_R_Hours").change(function(){
    hours=$('#Backend_R_Hours').val();
    userId=$('#Backend').val();    
    // console.log('hours=',hours,'userId----',userId)
    $.ajax({
            url: "<?php echo base_url('Admin/checkUserbandwidth'); ?>", 
            method:'post',
            data:{'hours':hours,'userId':userId},
            success: function(res)
            {
                var data = $.parseJSON(res);
                // console.log(data.totalTime);
                if(data.totalTime=="NOBANDWIDTH")
                {
                 $('#Backend_R_Hours').val('');
                 $('#Backend_R_Hours').focus();
                 alert('Developer does not have bandwidth '); 
                }
            }
    });
});

//HTML bandwidth check
$("#HTML_R_Hours").change(function(){
    hours=$('#HTML_R_Hours').val();
    userId=$('#HTML').val();    
    // console.log('hours=',hours,'userId----',userId)
    $.ajax({
            url: "<?php echo base_url('Admin/checkUserbandwidth'); ?>", 
            method:'post',
            data:{'hours':hours,'userId':userId},
            success: function(res)
            {
                var data = $.parseJSON(res);
                // console.log(data.totalTime);
                if(data.totalTime=="NOBANDWIDTH")
                {
                 $('#HTML_R_Hours').val('');
                 $('#HTML_R_Hours').focus();
                 alert('Developer does not have bandwidth '); 
                }
            }
    });
});

//QA bandwidth check
$("#QA_R_Hours").change(function(){
    hours=$('#QA_R_Hours').val();
    userId=$('#QA').val();    
    // console.log('hours=',hours,'userId----',userId)
    $.ajax({
            url: "<?php echo base_url('Admin/checkUserbandwidth'); ?>", 
            method:'post',
            data:{'hours':hours,'userId':userId},
            success: function(res)
            {
                var data = $.parseJSON(res);
                // console.log(data.totalTime);
                if(data.totalTime=="NOBANDWIDTH")
                {
                 $('#QA_R_Hours').val('');
                 $('#QA_R_Hours').focus();
                 alert('Developer does not have bandwidth '); 
                }
            }
    });
});


//Design bandwidth check
$("#Design_R_Hours").change(function(){
    hours=$('#Design_R_Hours').val();
    userId=$('#Design').val();    
    // console.log('hours=',hours,'userId----',userId)
    $.ajax({
            url: "<?php echo base_url('Admin/checkUserbandwidth'); ?>", 
            method:'post',
            data:{'hours':hours,'userId':userId},
            success: function(res)
            {
                var data = $.parseJSON(res);
                // console.log(data.totalTime);
                if(data.totalTime=="NOBANDWIDTH")
                {
                 $('#Design_R_Hours').val('');
                 $('#Design_R_Hours').focus();
                 alert('Developer does not have bandwidth '); 
                }
            }
    });
});
// $(document).ready(function() {
//   // alert(IosTeamData)
//       alert("document ready occurred!");
// });

// $(window).load(function() {
//       alert("window load occurred!");
// });


</script>
</body>
</html>
