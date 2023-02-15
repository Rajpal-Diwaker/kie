<script src="https://www.w3schools.com/lib/w3.js"></script>
<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet" />
 <style>
#table th, #table td{
	text-align:center;
	font-size:14px!important;
}
 #table th, .pagination a, .pagination strong{
	 background:#ff2929!important;
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
  <input type="text" id="search" placeholder="Search..." class="form-control searchtxt" >
  </div>

<br>

<div class="table-responsive tablewrap">
<table id="table" class="w3-table-all">
          <tr> 
          <th>Id</th>
          <th width="50px">Time</th>
          <th style="min-width:50px">Project Name </th>
          <th>User Name </th>
          <th>Date</th>
          <th>Comment </th>
          <th>Total Hours </th>
          <th>Invest Hours</th>
          <th>Status</th>
          <!-- <th>Action </th>   -->
          </tr>
         
          <?php $i=1; ?>
          <?php if(count($projectTimeSheets) == 0)
              {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
              }
              ?> 
          <?php foreach($projectTimeSheets as $key => $value) { ?>
          <tr class="item">       
          <td><?php echo $i; ?></td>  
          <td><?php echo $value['times'];?></td>
          <td><?php echo $value['ProjectName'];?></td>
          <td><?php echo $value['userName'];?></a></td>
          <td><?php echo $value['createdDate'];?></td>
          <td><?php echo $value['comments'];?></td>
          <td><?php echo $value['pTotalHours']; ?></td>
          <td><?php echo $value['totalWorkingHours']; ?></td>
          <td><?php echo $value['status'];?></td>
          <?php $i++;?>
          </tr>
          
          <?php } ?>
          
    </table>
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

<script>
$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});
</script>