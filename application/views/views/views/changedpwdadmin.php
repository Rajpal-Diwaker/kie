<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--------------Admin Stylesheet--------------->
<link href="<?php echo site_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />
<!--------------fontawesome icon--------------->
<link href="<?php echo site_url() ?>assets/css/animation.css" rel="stylesheet" type="text/css" />

<!--------------Bootstrap 4 framework--------------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- Calendar CSS -->
<link href="<?php echo site_url() ?>assets/calendar/dist/fullcalendar.css" rel="stylesheet" />
<!-------------- icons--------------->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/font-awesome/css/fontawesome-all.css" >
<link rel="stylesheet" href="<?php echo site_url() ?>assets/themify-icons/themify-icons.css" >

<!-------------- Data Table--------------->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.0/css/select.dataTables.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<!--<link rel="stylesheet" href="css/all.min.css">-->
<style>
html{
overflow:hidden;}
.dropbtn {background-color: #4CAF50;color: white;padding: 16px;font-size: 16px;border: none;}
.dropdown {position: relative;display: inline-block;padding-left: 90px;}
.dropdown-content {display: none;position: absolute;background-color: #f1f1f1;min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: -1;}
.dropdown-content a {color: black;padding: 12px 16px;text-decoration: none;display: block;}
.dropdown-content a:hover {background-color: #ddd;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}
.button1 { background-color: white; color: black; border: 2px solid #4CAF50;}
.button1:hover {background-color: #4CAF50;color: white;}
.textareal { padding: 20px;  width: 300px; height: 300px; resize: both; overflow: auto;}
.img-wrap { position: relative;}
.img-wrap .close {position: absolute;top: 2px;right: 2px;z-index: 100;}
[type=submit], button{
	background:#ff2929;
	border-radius:30px;
	padding:10px 40px;
	outline:none;
	border:0px;
	color:#fff;
}
.card{
background:#f4f6f9;
box-shadow:none;
border:0px;
}
.web-heading-bg h4{
	margin:20px 0;
}
.content-header{
display:none;}
.card-body{
background:#fff;
box-shadow:0px 0px 5px rgba(0,0,0,0.5);
max-width:500px;
margin:25px auto;}
button{
margin:15px auto 0 auto;
display:table;}
button:focus{
outline:none;
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
</head>

<body onload="openNav()">
    <div class="clearfix"></div>
        <main class="main" id="main">
          <div class="container-fluid">
            <!-------------row start--------------->
            <div class="row m-t-30">
            	<!-------------chart start--------------->
                <div class="col-12">
                    <div class="card">
<div class="web-heading-bg"><h4>Admin Password Change</h4></div>
                        <div class="card-body">
                            <div id="form1"  class="long-form">
                                
                               

<form action="<?php echo base_url('Admin/changedAdminPwd') ?>" method="post" onSubmit = "return checkPassword(this)">
  
  <div class="container">
    <label for="txtNewPassword"><b>New Password</b></label>
    <input type="password" placeholder="Enter New Password " name="txtNewPassword" required>

    <label for="password"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Confirm Password" name="txtConfirmPassword" required>
        
    <button type="submit">Update password</button>
  </div>

</form>
</div>

             </div> 
			<br>
            <br>
            <br><br><br><br>
            <br>
            <br><br><br>
			
            <div class="clearfix"></div>

                              
			</div>             
            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="<?php echo site_url() ?>assets/Chart.js/Chart.min.js"></script>
  <script src="<?php echo site_url() ?>assets/js/jquery.slimscroll.js"></script>
  <script src="<?php echo site_url() ?>assets/js/jquery.dataTables.js"></script>  

<script>
  
    function checkPassword(form) 
            { 
                password1 = form.txtNewPassword.value; 
                password2 = form.txtConfirmPassword.value; 
  
                if (password1 == '') 
                    alert ("Please enter Password"); 
                      
                else if (password2 == '') 
                    alert ("Please enter confirm password"); 
                      
                else if (password1 != password2) 
                { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 
            } 

</script>

</body>
</html>
