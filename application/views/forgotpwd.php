<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;margin-left0 auto;text-align:center; display:flex;align-items:center;margin:0;padding:0;}
h2{    
  font-size: 28px;
    margin-top: 10px;
  text-align:center;
  margin-bottom:0px;
  color:#fff;
}
.backgroundbg{
  background-image: url('../assets/img/background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    height: 100vh;
}
input[type=text], input[type=password],input[type=email] {
  display:inline-block;
  width: 350px;
  padding: 12px 10px;
  margin: 10px 0 25px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  margin-right:25px;
  margin-top:0;
}

button{
  background-color: #099beb;
  font-size:21px;
  color: white;
  padding: 8px 20px;
  margin: 10px 0;
  border: none;
  border-radius:0px;
  cursor: pointer;
  width: 100px;
  outline:none;
}
button:focus{
  outline:none;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

span.psw {
  text-align:center;
  display:block;
  margin-top:100px;
}
form{

  margin: 325px auto 0 auto;
}
span.psw a, span.psw a:hover{
  font-size: 14px;
  color:#a9a9a9;
  text-decoration:none;
}
label{
  color:#fff;
}
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: auto) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.error {
  color: red;
  margin-right: 530px;
}
.success {
  color: green;
  margin-right: 530px;
}
@media screen and (max-width: 767px){
body{
  margin-left:0;
}
  form{
  margin:65px 15px;
}
}
</style>
</head>
<body class="backgroundbg">


<form action="<?php echo base_url('Admin/forgotpwd') ?>" method="post">

<?php  
     $error_msg=$this->session->flashdata('error_msg');
     $success=$this->session->flashdata('success');
       if($error_msg)
       { 
           print_r("<span class='error'>". $error_msg . "</span>");
        } 
      if($success)
       { 
           print_r("<span class='success'>". $success . "</span>");
        } 
    ?>
  <div class="container">
      <input type="email" placeholder="Enter Email Id" name="uEmail" required><br>
        <button type="submit" style="width: 214px;">Reset Password</button>    
  </div>
</form>

</body>
</html>
