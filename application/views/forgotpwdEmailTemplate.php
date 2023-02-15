<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin: 0 auto; border: 1px solid #ccc;">
<tbody><tr>
</tr>
<tr>
<td align="center" bgcolor="#fff" style="padding:20px 20px 20px 20px;border: 1px solid #ccc;">
   <img src="http://52.27.53.102/techugo_panel/assets/img/Techugo_logo.png" alt="ProUI Logo" style="width:200px;">
</td>
</tr> 
<tr>
<td bgcolor="#ffffff" style="padding: 20px; color:#555555; font-family:Arial,sans-serif; font-size:14px; line-height:24px; border-bottom:1px solid #ccc">
	<p>Dear Admin,<br>
   Greetings from <b>Techugo!</b><br>
   We have received a request to reset the password. <br>   
   Click on the link below to reset your password using our secure server:  <br><br>
   <a href="<?php echo base_url();?>Admin/checkforgotpwdtoken?resetlink=<?php echo base64_encode(base64_encode($uEmail))?>">[Reset password Link]</a>.<br><br>
   
   Best Wishes,<br>
   <b>Team Techugo</b>
   </p>
</td>
</tr>
</tbody>
</table>