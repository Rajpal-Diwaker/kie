<!-- <script src="https://www.w3schools.com/lib/w3.js"></script> -->
<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet" />
 <style>
#table th, #table td{
	text-align:left;
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
  <div class="searchbox">
  <input type="text" id="search" placeholder="Search..." class="form-control searchtxt" >
</div>
<br>
<div class="table-responsive tablewrap">
   <table id="table" class="w3-table-all">
          <tr> 
          <th>Id</th>
          <th width="50px">Description</th>
          <th>Status</th>
          <!-- <th style="min-width:230px">Action </th>   -->
          </tr>
         
          <?php $i=1; ?>
          <?php if(count($result) == 0)
              {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
              }
              ?> 
          <?php foreach($result as $key => $value) { ?>
          <tr class="item">       
          <td><?php echo $i; ?></td>  
          <td><?php echo $value['description'];?></td>
          <td><?php echo $value['status'];?></td>
          <!-- <td>
          <button class="btn btn-success">
          <a href="<?php echo base_url(''); ?>">deactive</a></button>
          <button class="btn btn-info">
          <a href="<?php echo base_url(); ?>">View</a></button>
          </td> -->
          <?php $i++;?>
          </tr>
          
          <?php } ?>
          
    </table>
  </div>
      <div class="pagination">
      <?= $pagination; ?>
   </div>
</div>

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