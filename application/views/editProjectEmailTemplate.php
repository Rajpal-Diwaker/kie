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
    
    Inform you that some details are updated of your <b><?php echo $projectManager['pName']?></b>  Project . <br><br>
    These are the detail of your team <br><br>

    <?php foreach($teamMember as $key=>$value): ?>

    First Name: <?php echo $value['uFirstName']?>  <?php echo $value['uLastName']?><br>
    Department: <?php echo $value['department']?><br>
    Assign Hours : <?php echo $value['assignHours']?> <br><br>
    
    <?php endforeach;?>

    <br><br>

   Thanks & Regards<br>
   <b>Team Techugo</b>
   </p>
</td>
</tr>
</tbody>
</table>

