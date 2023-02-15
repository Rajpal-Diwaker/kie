<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin:0 auto; border: 1px solid #ccc;">
<tbody>
<tr>
<td align="center" bgcolor="#fff" style="padding:20px 20px 20px 20px;border: 1px solid #ccc;">
   <img src="<?php echo base_url('upload');?>/techugologo.jpg" alt="ProUI Logo" style="width:200px;">
</td>
</tr> 
<tr>
<td bgcolor="#ffffff" style="padding:20px; color:#555555; font-family:Arial,sans-serif; font-size:14px; line-height:24px; border-bottom:1px solid #ccc">
	<p>Dear <?php echo $projectManager['uFirstName']?> <?php echo $projectManager['uLastName']?>,<br>
    
    Inform you that your Project <b> <?php echo $projectManager['pName']?></b>  one of your team member has <br> be deallocated from the Project. <br><br>
    These are the detail are blow <br><br>

    First Name: <?php echo $teamMember['teamFirstName']?> <?php echo $teamMember['teamLastName']?><br>
    Department: <?php echo $teamMember['department']?><br>
    Project : <?php echo $projectManager['pName']?><br>
    
    <br><br>

    <b> Thanks & Regards<br>
     Team Techugo</b>
   </p>
</td>
</tr>
</tbody>
</table>

