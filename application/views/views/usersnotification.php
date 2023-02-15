<script src="https://www.w3schools.com/lib/w3.js"></script>
<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet" />
 <style>
 <style>
 #table td, #table th{
	 text-align:center;
 }
#table td{
  font-size:13px!important;
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
  width:75px;
}
.btn-success a, .btn-danger a, .btn-info a, .btn-success a:hover, .btn-danger a:hover, .btn-info a:hover{
  color:#fff;
  text-decoration:none;
}
 #table td, #table th{
	 text-align:center;
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
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
<div class="table-responsive">
    <table id="table" class="w3-table-all">
          <tr> 
          <th>Id</th>
          <th>Picture</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Id</th>
          <th>Mobile Number</th>
          <th>DOB</th>
          <th>Gender</th> 
          <th style="min-width:0px">Match Preference</th>
          <th style="min-width:145px">Action &nbsp;&nbsp;&nbsp;&nbsp; 
            <a style="display:inline-block; margin-bottom:3px; width:80px;" href="<?php echo base_url('Admin/update_notification?status=on'); ?>"/>
            <button class="btn btn-success">Activate</button> </a>
            <a style="width:80px;" href="<?php echo base_url('Admin/update_notification?status=off'); ?>"/>
            <button class="btn btn-info">Deactivate</button> 
          </a>
          </th> 
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
          <td><div style="width:60px;height:60px;border-radius:50%;position:relative;overflow:hidden;">
            <img src="<?php echo $value['imageurl'];?>" style="width:100%;height:100%;"/></div></td>
          <td><?php echo $value['first_name'];?></td>
          <td><?php echo $value['last_name'];?></td>
          <td><?php echo $value['email_id'];?></td>
          <td><?php echo $value['mobile_no'];?></td>
          <td><?php echo $value['dob'];?></td>
          <td><?php echo $value['gender_name'];?></td>
          <!-- <td><?php echo $value['nationality'];?></td>
          <td><?php echo $value['biodata'];?></td>
          <td><?php echo $value['body_type'];?></td>
          <td><?php echo $value['religious'];?></td>
          <td> <?php echo $value['career']; ?> </td> -->
          <td><?php echo $value['sexual_attration'];?></td>
          <td>
          <?php if($value['notification'] == 'off') { ?>
          <!-- <button class="btn btn-success">
               <a href="<?php echo base_url('Admin/notification?id='.$value['user_id'].'&status=On'); ?>">
               On
               </a>
          </button> -->


         <label class="switch">
              <input type="checkbox" id="notification" onClick="doChecked(<?php echo $value['user_id']; ?>)" value="<?php echo $value['user_id']; ?>">
              <span class="slider round"></span>
            </label> 

          <?php } else { ?>
           <!-- <button class="btn btn-danger">
               <a href="<?php echo base_url('Admin/notification?id='.$value['user_id'].'&status=off'); ?>">
               Off
               <a>
          </button> -->
              <label class="switch">
              <input type="checkbox" id="notification" value="<?php echo $value['user_id']; ?>" 
              onClick="unChecked(<?php echo $value['user_id']; ?>);" checked>
              <span class="slider round"></span>
            </label> 
          <?php } ?>

          </td><?php $i++;?>
          </tr>
          <?php };?> 
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


function doChecked(user_id)
{    

  if(doChecked)
  {
  $.ajax({
            url: '<?php echo base_url('Admin/notification'); ?>',
            type: 'GET',
            data: {'status': 'on','id': user_id},
            success: function(response) 
            {
            }
         });
  }
}

function unChecked(user_id)
{    

   if(unChecked)
   {
      $.ajax({
                url: '<?php echo base_url('Admin/notification'); ?>',
                type: 'GET',
                data: {'status': 'off','id': user_id},
                success: function(response) 
                {
                  
                }
             });
    }
}
  </script>