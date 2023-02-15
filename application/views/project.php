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
   <!-- <button class="btn btn-info">
    <a href="<?php echo base_url('Admin/exportTocsv'); ?>">Export To CSV</a>
   </button> -->
<br>
<div class="table-responsive tablewrap">
   <table id="table" class="w3-table-all">
          <tr> 
          <th>Id</th>
          <th>Project Name</th>
          <th>Description</th>
          <th>Start Date</th>
          <th>Estimate End Date</th>
          <th>Hourly Rate</th>
          <th>Total Hours</th>
          <th>Phase</th>           
          <th>Project Status</th>           
          <th style="min-width:70px">Action </th>  
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
          <td id_data="<?php echo $value['pId']; ?>"><?php echo $i; ?></td>  
          <td style="color:blue;text-align:left;">
          <a href="<?php echo base_url('Admin/viewProject?projectId='.$value['pId']);?>">
          <?php echo $value['pName'];?></a></td>
          <td><?php echo $value['pDescription'];?></td>
          <td width="90px"><?php echo $value['pStartDate'];?></td>
          <td width="90px"><?php echo $value['pEndDate'];?></td>
          <td><?php echo $value['pHourlyRate'];?></td>
          <td><?php echo $value['pTotalHours'];?></td>
          <td><?php echo $value['status'];?></td>
          <td><?php echo $value['tStatus'];?></td>
          <td>
          <select class="form-control" id="tStatus" name="tStatus" style="height:calc(3.25rem -15px)" >
              <option class="select">----Status---</option>
              <option value="OnHold">OnHold</option>
              <option value="Starting">Running</option>
              <option value="Initial">Initial</option>
              <option value="Complete">Complete</option>
              <option value="Delay">Delay</option>
              <option value="Terminate">Terminate</option>
          </select>
          <a href="<?php echo base_url('Admin/viewProject?projectId='.$value['pId']);?>">
        <button class="btn btn-info">View</button></a>
          </td>
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
 $(document).ready(function() {
        $('select[name="tStatus"]').on('change', function() {            
            var status = $('option:selected', this).text();
            var projectId = $(this).parent().parent().find('td').attr('id_data');;
            if(status) {
                $.ajax({
                    url: "<?php echo base_url("Admin/chnagePojectStatus");?>",
                    type: "POST",
                    data: {tStatus:status,projectId:projectId},
                      success: function(data) {
                    //   alert(data);
                      window.location.reload();
                    }
                });
            }else{
                window.location.reload();
            }
        });
    });
    
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
