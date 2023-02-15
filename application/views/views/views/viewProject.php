<!-- <script src="https://www.w3schools.com/lib/w3.js"></script> -->
<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet" />
 <style>
#table th, #table td{
	text-align:center;
	font-size:14px!important;
}
 #table th, .pagination a, .pagination strong{
	 background:#099beb!important;
 }
 #table tr:hover {
    background-color: transparent!important;
}
.content-header{
	display:none!important;
}
.content-wrapper{
	padding:15px;
}
.titletag{
	font-size:1.8rem;
	float:left;
}
.activity-btn button{
	background:#099beb!important;
	border-radius:0px!important;
	padding:7px!important;
	float:right;
}
.w3-table-all{
	margin-bottom:15px;
}
.searchbox .searchtxt{
	width:85%;
	border: 1px solid #ccc;
    height: 40px;
    border-radius: 30px;
	margin-bottom:0;
}
.searchbox .searchtxt:focus{
	outline:none!important;
	box-shadow:none!important;
}
.searchbox .button1{
	width:12%!important;
	margin-left:25px!important;
	background:#ff2929!important;
	border:0px!important;
	border-radius:30px!important;
	color:#fff!important;
	outline:none!important;
	padding:7px!important;
}
.searchbox .button1:focus{
	outline:none!important;
}
.searchbox .button1:hover{
	color:#fff!important;
}
#table td button{
	color:#fff;
    font-size: 15px;
    padding: 5px 8px;
	margin:2px auto;
	width:100px;
}
button{
  width:12%!important;
	margin-left:25px!important;
	background:#ff2929!important;
	border:0px!important;
	border-radius:30px!important;
	color:#fff!important;
	outline:none!important;
	padding:7px!important;
}
.btn-success a, .btn-danger a, .btn-info a, .btn-success a:hover, .btn-danger a:hover, .btn-info a:hover{
	color:#fff;
	text-decoration:none;
}
.btn.btn-info{
	margin-bottom:10px;
	margin-top:10px!important;
}
.tablewrap{
	max-height:450px;
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
margin-left:12px!important;
}
.searchbox .searchtxt {
    width: 65%;
}
}
 </style>
<div class="titletag text-dark"><?php echo $title; ?></div>
  <div class="activity-btn">
  <a href="<?php echo base_url('Admin/Activity')?>"><button class="btn btn-success">Lifecycle</button></a></div>
  <br>
  <br>
<br>
<div class="table-responsive tablewrap">
   <table id="table" class="w3-table-all">
          <tr> 
          <th>Project Id</th>
          <th>Project Name</th>
          <th>Description</th>
          <th>Start Date</th>
          <th>Estimate End Date</th>
          <th>Hourly Rate</th>
          <th>Total Hours</th>
          <th>Status</th>           
          </tr>         
          <?php $i=1; ?>
          <?php if(count($projectDetails) == 0)
              {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
              }
              ?> 
          <?php foreach($projectDetails as $key => $value) { ?>
          <tr class="item">       
          <td><?php echo $value['pId']; ?></td>  
          <td><?php echo $value['pName'];?></td>
          <td><?php echo $value['pDescription'];?></td>
          <td width="50px"><?php echo $value['pStartDate'];?></td>
          <td width="50px"><?php echo $value['pEndDate'];?></td>
          <td><?php echo $value['pHourlyRate'];?></td>
          <td><?php echo $value['pTotalHours'];?></td>
          <td><?php echo $value['status'];?></td>
          </tr>
          <?php } ?>
    </table>
  </div>

  <br><br>

<div class="titletag text-dark">Client Details </div>
<table id="table" class="w3-table-all">
      <tr> 
      <th>Id</th>
      <th style="width:75px;">First Name</th>
      <th>Last Name</th>
      <th>Email </th>
      <th>Phone </th>
      <th>Occupation </th>
      <th>Address </th>
      </tr>
     
      <?php $i=1; ?>
      <?php if(count($projectClient) == 0)
          {
            echo "<tr>";
            echo "<td colspan='3'>No record found.</td>";
            echo "</tr>";
          }
          ?> 
      <?php foreach($projectClient as $key => $value) { ?>
      <tr class="item">       
      <td><?php echo $i; ?></td>  
      <td><?php echo $value['firstName'];?></td>
      <td><?php echo $value['LastName'];?></td>
      <td><?php echo $value['Email'];?></td>
      <td><?php echo $value['Phone'];?></td>
      <td><?php echo $value['Occupation'];?></td>
      <td>
      <?php echo $value['Street1'],' ',$value['City'],' ',$value['State'],' ',$value['Zip'],' ',$value['Country']?>

      </td>
      <?php $i++;?>
      </tr>
      
      <?php } ?>    
</table>


  <br><br>
    <div class="titletag text-dark">Project Mile Stone </div>
    <table id="table" class="w3-table-all">
          <tr> 
          <th>MileStone Id</th>
          <th width="50px">Name</th>
          <th width="50px">Start Date</th>
          <th width="50px"> Deliverable</th>
          <th width="50px"> Delivery Date</th>
          <th width="50px"> Hours</th>
          <th>Status </th>
          </tr>         
          <?php $i=1; ?>
          <?php if(count($projectMileStone) == 0)
              {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
              }
              ?> 
          <?php foreach($projectMileStone as $key => $value) { ?>
          <tr class="item">       
          <td><?php echo $value['mId']; ?></td>  
          <td><?php echo $value['mName'];?></td>
          <td><?php echo $value['mDuedate'];?></td>
          <td ><?php echo $value['mDeliveryable'];?></td>
          <td ><?php echo $value['mDeliveryDate'];?></td>
          <td ><?php echo $value['mTotalHours'];?></td>
          <td><?php echo $value['status'];?></td>
          <?php $i++;?>
          </tr>
          
          <?php } ?>
          
    </table>   

    <br><br>
    <div class="titletag text-dark">Project Team Members </div>
    <table id="table" class="w3-table-all">
          <tr> 
          <th>Id</th>          
          <th width="50px">First Name</th>
          <th width="50px">Last Name</th>
          <th width="50px">Email</th>     
          <th width="50px">Assign Hours</th>              
          <th>Status</th>
          </tr>
         
          <?php $i=1; ?>
          <?php if(count($projectTeamMembers) == 0)
              {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
              }
              ?> 
          <?php foreach($projectTeamMembers as $key => $value) { ?>
          <tr class="item">       
          <td><?php echo $i; ?></td>           
          <td><?php echo $value['uFirstName'];?></td>
          <td ><?php echo $value['uLastName'];?></td>
          <td ><?php echo $value['uEmail'];?></td>
          <td><?php echo $value['ptdailyHours'];?></td>
          <td><?php echo $value['status'];?></td>
          <?php $i++;?>
          </tr>
          
          <?php } ?>
          
    </table>

           
<style>
.main-footer{
	position: relative!important;
    margin-left: 0!important;

	z-index:1!important;
}
.pagination
{
display:block!important;
 float: none;
 margin: 10px;
text-align:right!important;
}
  .pagination a,.pagination strong 
  {
    border: 1px;
    padding: 10px;
    background: #4caf50;
    margin-right: 2px;
    border-radius: 5px;
    color: #fff;
}
th {
  cursor: pointer;
  background-color: coral;
}
</style>
         
<style>
.main-footer{
	position:relative!important;
}
.pagination
{
display:block!important;
 float: none;
 margin: 10px;
text-align:right!important;
}
  .pagination a,.pagination strong 
  {
    border: 1px;
    padding: 10px;
    background: #4caf50;
    margin-right: 2px;
    border-radius: 5px;
    color: #fff;
}
th {
  cursor: pointer;
  background-color: coral;
}
</style>
