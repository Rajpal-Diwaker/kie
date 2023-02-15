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
.circle {
      border-radius: 50%;
      padding: 0.25em 0.8em;
    }
.card-body{
background:#fff;
box-shadow:0px 0px 5px rgba(0,0,0,0.5);}
.main-footer{
	position:relative!important;
	bottom:inherit!important;
	left:inherit!important;
	right:inherit!important;
	margin-left:0px!important;
	z-index:1!important;
}
.btn-primary{
	background:#099beb!important;
	border-radius:0px;
	width:90px;
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
.label {
    width: 200px;
}
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

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
	<h2 style="text-align:left;color:#000;padding:20px 0;">Project Details</h2>
<div class="card-body">
<div id="form1"  class="long-form">
  <form method="post" class="form- mgt-25" action="<?php echo base_url('Admin/addProject'); ?>" enctype="multipart/form-data">
  <input type="hidden" id="user_id" value="<?php  echo $this->session->userdata('user_id'); ?>" name="user_id"/>
  
<div class="form-group row">
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="first_name">Client Name</label>
          <input type="text" class="form-control" id="Client_Name" name="Client_Name" placeholder="Enter Name" 
          required/><br/>
      </div>
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="dob">Project Name</label>
          <input type="text" class="form-control" id="ProjectName" name="ProjectName" placeholder="Enter Project Name" 
          required/><br/>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label >Project Inchagre </label>
          <select id="project_incharge" name="project_incharge" class="form-control" required>  
          <option value="">-- Choose Developer --</option>
            <?php foreach($project_incharge as $key => $value) : ?> 
                <option value="<?php echo $value['uId']; ?>">
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
       </div>          

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  >Project Incharge Hours</label>
          <input type="number" class="form-control" id="Project_R_Hours" name="Project_R_Hours"  
           placeholder="Hours" value="" step="0.01" min="1" max="8" disabled required/><br/>
      </div>

<div class="IosBox">
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form IosAdd">
          <label  style="width: 278px;">IOS Developer</label>      
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
                  <input type="number" class="form-control" style="width: 278px;" value="" 
                  id="IOS_R_Hours" name="IOS_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" disabled/><br/> 
           <span class="btn btn-primary circle Iosremove" id="Iosremove" style="width: 30px;height: 27px;margin-left:247px;margin-top:-39px;display:none;">-</span>
 </div>
    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form IosAdd">
        <span class="btn btn-primary circle NewIosAdded" id="NewIosAdded" style="width: 30px;height: 25px;margin-left:247px;margin-top:-27px;display:none;">+</span>
    </div>
</div>


<div class="AndroidBox"> 
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form AndroidAdd">
          <label  style="width: 278px;">Android Developer</label>      
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
                  <input type="number" class="form-control" style="width: 278px;" value="" 
                  id="Android_R_Hours" name="Android_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" disabled/><br/> 
           <span class="btn btn-primary Androidremove"  id="Androidremove" style="width: 30px;height: 27px;margin-left:247px;margin-top:-39px;display:none;">-</span>
 </div>
    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form AndroidAdd">
        <span class="btn btn-primary NewAndroidAdded" id="NewAndroidAdded" style="width: 30px;height: 25px;margin-left:247px;margin-top:-27px;display:none;">+</span>
    </div>
</div>

<div class="BackendBox">
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form BackendAdd">
          <label  style="width: 278px;">Backend Developer</label>      
          <input type="hidden" id="Backend_Id" value="<?php  echo $TeamBackend['ptId']; ?>" name="Backend_Id[]"/>
                <select id="Backend" name="Backend[]" class="form-control Backend" style="width: 278px;">             
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
                  <input type="number" class="form-control Backend_R_Hours" style="width: 278px;" value="" 
                  id="Backend_R_Hours" name="Backend_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" disabled/><br/> 
           <span class="btn btn-primary Backendremove" id="Backendremove" style="width: 30px;height: 27px;margin-left:247px;margin-top:-39px;display:none;">-</span>
 </div>
    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form BackendAdd">
        <span class="btn btn-primary NewBackendAdded" id="NewBackendAdded" style="width: 30px;height: 25px;margin-left:247px;margin-top:-27px;display:none;">+</span>
    </div>
</div>

<div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label   style="width: 200px;">HTML Developer</label>
          <select id="HTML" name="HTML" class="form-control">  
          <option value="">-- Choose Developer --</option>
            <?php foreach($html as $key => $value) : ?> 
                <option value="<?php echo $value['uId']; ?>">
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
      
          <label  style="width: 200px;">HTML Hours</label>
          <input type="number" class="form-control" id="HTML_R_Hours" name="HTML_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="8" disabled/><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label   style="width: 200px;">QA Developer</label>
          <select id="QA" name="QA" class="form-control">  
          <option value="">-- Choose Developer --</option>
            <?php foreach($qa as $key => $value) : ?> 
                <option value="<?php echo $value['uId']; ?>">
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
      </div>
      
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  style="width: 200px;">QA Hours</label>
          <input type="number" class="form-control" id="QA_R_Hours" name="QA_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="8" disabled/><br/>
       </div>

       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label   style="width: 200px;">Designer </label>
          <select id="Design" name="Design" class="form-control">  
          <option value="">-- Choose Developer --</option>
            <?php foreach($design as $key => $value) : ?> 
                <option value="<?php echo $value['uId']; ?>">
                <?php echo $value['UserName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
      </div>
                
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label  style="width: 200px;">Design Hours</label>
          <input type="number" class="form-control" id="Design_R_Hours" name="Design_R_Hours" 
           placeholder="Hours" step="0.01" min="0" max="8" disabled/><br/>
       </div>

</div>
   <div class="form-group row text-center ">
    <input type="submit" class="btn btn-primary" value="Save"> 
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
                +'<select id="Ios" name="Ios[]" class="form-control" style="width: 278px;">'             
                +'<option  value="">-- Choose IOS Developer --</option>'
                +'<?php foreach($ios as $key => $value) :?>' 
                +'<option value="<?php echo $value['uId']; ?>">'
                +'<?php echo $value['UserName']; ?> </option> <?php endforeach;?> </select>'
                +'<label  style="width: 278px;">IOS Hours</label>'
                +'<input type="number" class="form-control" style="width: 278px;"' 
                +'id="IOS_R_Hours" name="IOS_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8" /><br/>' 
                +'<span class="btn btn-primary IosremoveNew" style="width: 30px;height: 27px;margin-left:247px;'
                +'margin-top:-39px;">-</span>');
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
                +'<span class="btn btn-primary AndroidremoveNew" style="width: 30px;height: 27px;margin-left:247px;'
                +'margin-top:-39px;">-</span>');
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
                +'<select id="Backend" name="Backend[]" class="form-control " style="width: 278px;">'             
                +'<option value="">-- Choose Backend Developer --</option>'
                +'<?php foreach($backend as $key => $value) :?>' 
                +'<option value="<?php echo $value['uId']; ?>">'
                +'<?php echo $value['UserName']; ?> </option> <?php endforeach;?> </select>'
                +'<label  style="width: 278px;">Backend Hours</label>'
                +'<input type="number" class="form-control" style="width: 278px;"' 
                +'id="Backend_R_Hours" name="Backend_R_Hours[]" placeholder="Hours" step="0.01" min="0" max="8"/><br/>' 
                +'<span class="btn btn-primary BackendremoveNew" style="width: 30px;height: 27px;margin-left:247px;'
                +'margin-top:-39px;">-</span>');
});

$('.BackendBox').on('click','.BackendremoveNew',function() 
{
  if (confirm('Are you sure you want to Remove The developer'))
  {
        $(this).parent().remove();
 } 
 });

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
                 alert('Developer does not have bandwidth '); 
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
                // // console.log(data.totalTime);
                if(data.totalTime=="NOBANDWIDTH")
                {
                 $('#Design_R_Hours').val('');
                 $('#Design_R_Hours').focus();
                 alert('Developer does not have bandwidth '); 
                }
            }
    });
});

$(document).ready(function() { 
    // $(.NewAndroidAdded).hide();
}); 


// $( window ).load(function() {
// // $(.NewAndroidAdded).hide();
// });
// window.onload = function() {
//    document.getElementById('#Project_R_Hours').disabled = true;
//    document.getElementById('#IOS_R_Hours').disabled = true;
//    document.getElementById('#Android_R_Hours').disabled = true;
//    document.getElementById('#Backend_R_Hours').disabled = true;
//    document.getElementById('#HTML_R_Hours').disabled = true;
//    document.getElementById('#QA_R_Hours').disabled = true;
//    document.getElementById('#Design_R_Hours').disabled = true;
// };


</script> 
</body>
</html>

