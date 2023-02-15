<script src="https://www.w3schools.com/lib/w3.js"></script>
<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet" />
 <style>
#table th, #table td{
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
  <form method='post' action="<?= base_url() ?>Admin/users">
   <input type='text' name='search' class="form-control searchtxt" placeholder="Search ......"
   <?php if(!empty($search)) {?> value='<?= $search ?>' <?php }else {?>
    value=''
<?php }?>
>
   <input type='submit' name='submit' value='search' class="button button1">
   </form>
  </div>
  <!--  <button class="btn btn-info">
    <a href="<?php echo base_url('Admin/exportTocsv'); ?>">ExportToCSV</a>
   </button>
 -->
<div class="table-responsive">
   <table id="table" class="w3-table-all">
          <tr> 
          <th>Id</th>
          <th>Request Sender Name</th>
          <th>Reciver Name</th>
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
          <td><?php echo $value['sender_name'];?></td>
          <td><?php echo $value['Reciver_name'];?></td>
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
  let tid = "#table";
let headers = document.querySelectorAll(tid + " th");

// Sort the table element when clicking on the table headers
headers.forEach(function(element, i) 
{
  element.addEventListener("click", function() {
    w3.sortHTML(tid, ".item", "td:nth-child(" + (i + 1) + ")");
  });
})
  </script>