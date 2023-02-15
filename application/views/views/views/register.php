<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sowtex</title>
</head>

<body>


<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin:0 auto; border: 1px solid #ccc;" width="520">
 <tbody>
 <tr>
 <td align="center" bgcolor="#fff" style="padding:20px 20px 20px 20px;border: 1px solid #ccc;">
  <img src="http://r3allove.com/assets/images/logo2.png" alt="ProUI Logo" style="display:block">
 </td>
 </tr> 
 <tr>
 <td bgcolor="#ffffff" style="padding:20px; color:#555555; font-family: Arial,sans-serif; font-size:14px; line-height:24px; border-bottom:1px solid #ccc;">
  <b>Dear Admin ,</b><br>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to inform you that <?php echo $first_name?> <?php echo $last_name?> Registred with R3allove.com<br> <br>
   Users details are blow :<br><br>
    <br>
   <table cellspacing="0" cellpadding="0" border="0">
      <tbody>
          <tr>
              <td>First Name</td>
              <td>&nbsp;:&nbsp;<?php echo $first_name?></td>
          </tr>          
          <tr>
           <td>Last Name</td>
              <td>&nbsp;:&nbsp;<?php echo $last_name?></td>
          </tr>
          <tr>
              <td>Email ID</td>
              <td>&nbsp;:&nbsp;<?php echo $email_id?></td>
          </tr>   
          <tr>
              <td>Phone Number</td>
              <td>&nbsp;:&nbsp;<?php echo $mobile_no?></td>
          </tr>              
      </tbody>
  </table>

</body>
</html>