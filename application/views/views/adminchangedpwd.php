<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;margin-left: 400px;width: 462px; }
form {border: 3px solid #f1f1f1;}
input[type=text],input[type=password]{width:100%;padding:12px 20px;margin:8px 0;display:inline-block;border:1px solid #ccc;box-sizing:border-box;margin-left:-25px;}
button {background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 50%;margin-left: -25px;}
button:hover {opacity: 0.8;}
.imgcontainer {text-align: center;margin: 24px 0 12px 0;}
img.avatar {width: 40%;border-radius: 50%;}
.container {padding: 16px;margin-top: 0px;margin-bottom: -54px;height: 268px;margin-left: 24px;}
span.psw {float: right;padding-top: 16px;}
[type=submit], button{
	background:#ff2929;
	border-radius:30px;
	padding:10px 40px;
	outline:none;
	border:0px;
	color:#fff;
}
@media screen and (max-width: 300px) {span.psw {display: block;float: none;}}
</style>
</head>

<body> 
<h2 style="margin-top:50px;">Change Password</h2>
<?php  
     $error_msg=$this->session->flashdata('error_msg');
       if(!empty($error_msg))
       { 
            echo $error_msg;
       } 
?>

<form action="<?php echo site_url('Admin/updatePassword') ?>" method="post">
  <div class="container">
    <label for="txtNewPassword"><b>Enter Password </b></label>
    <input type="password" placeholder="Enter Password" name="txtNewPassword" id="txtNewPassword" required>
    <label for="txtConfirmPassword"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter confirm Password" id="txtConfirmPassword" name="txtConfirmPassword" required>
    <input type="hidden"  name="email_id" value="<?php echo $email_id?>">
    <input type="hidden"  name="token" value="<?php echo $forget_pwd_string ?>">
    <button type="submit">Update Password</button>
  </div>
</form>

</body>
</html>
<?php die(); ?>