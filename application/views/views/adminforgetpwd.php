<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;margin:0 auto;display:table;width: 392px;padding:100px 0; }
.backgroundbg{
  background-image: url(../assets/img/bannerbg.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    height: auto;
}
form {background: #1a1a1a;
    margin: 65px auto;
    padding: 20px 10px;
    border: 0;
    border-radius: 4px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.7);}
input[type=email],input[type=password]{width:100%;padding:12px 20px;margin:24px 0;display:inline-block;border:1px solid #ccc;box-sizing:border-box;}
button {
  background-color: #ff2929;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius:30px;
  cursor: pointer;
  width: 100%;
}
.imgcontainer {text-align: center;margin: 24px 0 12px 0;}
img.avatar {width: 40%;border-radius: 50%;}
.container {padding: 15px 20px;margin-top: 0px;}
span.psw {float: right;padding-top: 16px;}
label{
	color:#fff;
}
.adminlogo{
	width:115px;
	margin:0px auto 25px auto;
}
.adminlogo img{
	max-width:100%;
}
@media screen and (max-width: 767px){
	form{
	margin:65px 15px;
}
}
@media screen and (max-width: 300px) {span.psw {display: block;float: none;}}
.error {color: red;}
</style>
</head>

<body class="backgroundbg"> 
<?php  
     $error_msg=$this->session->flashdata('error_msg');
       if(!empty($error_msg))
       { 
            print_r("<div class='error'>" .$error_msg ."</div>");
       } 
?>


<form action="<?php echo site_url('Admin/resetpwd') ?>" method="post">
  <div class="container">
<!--<div class="adminlogo">
		<img src="../assets/img/logo.png" alt="" />
	</div> -->
<h2 style="text-align:center;color:#fff;">Forgot Password</h2>
    <label for="email_id"><b>Enter Email Address </b></label>
    <input type="email" placeholder="Enter Email Address" name="email_id" id="email_id" required>
    <button type="submit"> Submit</button>
  </div>

</form>

</body>
</html>
<?php die(); ?>