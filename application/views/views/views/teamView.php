<script src="https://www.w3schools.com/lib/w3.js"></script>
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
}
.searchbox .searchtxt{
	width:85%;
	border: 1px solid #ccc;
    height: 40px;
    border-radius: 30px;
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
.btn-success a, .btn-danger a, .btn-info a, .btn-success a:hover, .btn-danger a:hover, .btn-info a:hover{
	color:#fff;
	text-decoration:none;
}
.btn.btn-info{
	margin-bottom:10px;
}
.tablewrap{
	max-height:370px;
	overflow:scroll;
	overflow-x:hidden;
	margin-bottom:15px;
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
  <div class="searchbox">
  <!-- <form method='post' action="<?= base_url() ?>Admin/users">
   <input type='text' name='search' class="form-control searchtxt" placeholder="Search ......"
   <?php if(!empty($search)) {?> value='<?= $search ?>' <?php }else {?> value='' <?php }?> > 
   <input type='submit' name='submit' value='search' class="button button1">
   </form> -->
  </div>
   <!-- <button class="btn btn-info">
    <a href="<?php echo base_url('Admin/exportTocsv'); ?>">Export To CSV</a>
   </button> -->
<br>
<div class="table-responsive tablewrap">
   <table id="table" class="w3-table-all">
          <tr> 
          <th>Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Department</th>
          <th>Assign Hours</th>
          <th>Status</th>
          <!-- <th style="min-width:70px">Action </th>   -->
          </tr>
         
          <?php $i=1; ?>
          <?php if(count($TeamMembers) == 0)
              {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
              }
              ?> 
          <?php foreach($TeamMembers as $key => $value) { ?>
          <tr class="item">       
          <td><?php echo $i; ?></td>  
          <td><?php echo $value['uFirstName'];?></td>
          <td><?php echo $value['uLastName'];?></td>
          <td><?php echo $value['uEmail'];?></td>
          <td><?php echo $value['uMobileNo'];?></td>
          <td><?php echo $value['DeptName'];?></td>
          <td><?php echo $value['ptdailyHours'];?></td>
          <td><?php echo $value['status'];?></td>
          <!-- <td> -->
          <!-- <button class="btn btn-success"> </button> -->
          <!-- <button class="btn btn-info"> <a href="<?php echo base_url('Admin')?>">View</a></button> -->
          <!-- </td> -->
          <?php $i++;?>
          </tr>
          
          <?php } ?>
          
    </table>
  </div>
    
<style>
.main-footer{
	position:absolute!important;
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

<script>

$('th').click(function(){
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc){rows = rows.reverse()}
    for (var i = 0; i < rows.length; i++){table.append(rows[i])}
})
function comparer(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
    }
}
function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
</script>