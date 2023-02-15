<style>
.dropbtn {background-color: #4CAF50;color: white;padding: 16px;font-size: 16px;border: none;}
.dropdown {position: relative;display: inline-block;padding-left: 90px;}
.dropdown-content {display: none;position: absolute;background-color: #f1f1f1;min-width: 160px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);z-index: -1;}
.dropdown-content a {color: black;padding: 12px 16px;text-decoration: none;display: block;}
.dropdown-content a:hover {background-color: #ddd;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}
.button1 { background-color: white; color: black; border: 2px solid #4CAF50;}
.button1:hover {background-color: #4CAF50;color: white;}
.textareal { padding: 20px;  width: 300px; height: 300px; resize: both; overflow: auto;}
.img-wrap { position: relative;}
.img-wrap .close {position: absolute;top: 2px;right: 2px;z-index: 100;}
.dropdown-check-list {display: inline-block;}
input {height: calc(3.25rem + -17px); }
.dropdown-check-list .anchor {position: relative; cursor: pointer; display: inline-block; padding: 5px 50px 5px 10px; border: 1px solid #ccc;}
.dropdown-check-list .anchor:after {position: absolute; content: "";border-left: 2px solid black; border-top: 2px solid black;
  padding: 5px;right: 10px;top: 20%; -moz-transform: rotate(-135deg); -ms-transform: rotate(-135deg); -o-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);transform: rotate(-135deg);}
.dropdown-check-list .anchor:active:after {right: 8px; top: 21%;}
.dropdown-check-list ul.items {padding: 2px; display: none; margin: 0; border: 1px solid #ccc; border-top: none;}
.dropdown-check-list ul.items li { list-style: none;}
.dropdown-check-list.visible .anchor { color: #0094ff;}
.dropdown-check-list.visible .items { display: block;}.
textarea{text-align:left;}
.error {color: red;}
.content-header{
display:none;}
.card{
background:#f4f6f9;
box-shadow:none;
border:0px;
}
.card-body{
background:#fff;
box-shadow:0px 0px 5px rgba(0,0,0,0.5);}
.btn-primary{
	width:90px;
	border-radius:0;
	background:#099beb ;
}
.main-footer{
	z-index:1!important;
}
.content-wrapper{
	overflow:hidden;
}
@media screen and (max-width: 767px) {
.content-wrapper{
	margin-left:0px!important;
}
.titletag {
    font-size: 1.4rem;
}
.searchbox .button1 {
    width: 29% !important;;
margin-left:12px;
}
.searchbox .searchtxt {
    width: 65%;
}
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>

</head>

<body>
<?php  
     $error_msg=$this->session->flashdata('error_msg');
       if($error_msg)
       { 
             print_r("<div class='error'>". $error_msg . "</div>");
        } 
    ?>

    <div class="clearfix"></div>
        <main class="main" id="main">
          <div class="container-fluid">
            <!-------------Breadcrumb Navigation start--------------->
            <div class="row">
                <div class="col-md-12 m-t-40">
                </div>
            </div>
            <!-------------row start--------------->
            <div class="row m-t-30">
            	<!-------------chart start--------------->
                <div class="col-12">
                    <div class="card">
	<h2 style="text-align:left;color:#000;padding:20px 0;">Employee Details</h2>
<div class="card-body">
<div id="form1"  class="long-form">
  <form method="post" class="form- mgt-25" action="<?php echo base_url('Admin/addUser'); ?>" enctype="multipart/form-data">
  <input type="hidden" id="user_id" value="<?php  echo $this->session->userdata('user_id'); ?>" name="user_id"/>
  
<div class="form-group row">
      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="first_name">EMPLOYEE ID</label>
          <input type="text" class="form-control" id="EMP_ID" name="EMP_ID" placeholder="Enter Employee Id" 
          required/><br/>
      </div>
       <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="dob">First Name</label>
          <input type="text" class="form-control" id="FirstName" name="FirstName"
          placeholder="Enter First Name" required/><br/>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="dob">Last Name</label>
          <input type="text" class="form-control" id="LastName" name="LastName" 
          placeholder="Enter Last Name" required/><br/>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="dob">Email </label>
          <input type="email" class="form-control" id="email" name="email" 
          placeholder="Enter Email " required/><br/>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="dob">Mobile Number </label>
          <input type="number" class="form-control" id="mobileNo" name="mobileNo" 
          placeholder="Enter Mobile No" required/><br/>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
          <label for="email_id">Dapartment </label>
          <select id="dept" name="dept" class="form-control">  
          <option>-- Choose Department --</option>
            <?php foreach($dept as $key => $value) : ?> 
                <option value="<?php echo $value['dId']; ?>">
                <?php echo $value['dName']; ?>
                </option>  
            <?php endforeach;?>    
            </select>  
       </div>          

      
</div>
   <div class="form-group row text-center ">
    <input type="submit" class="btn btn-primary" value="Save"> 
    </div>
    
</form>
</div>
</div> 
<br>
<br>
<br><br><br>
<div class="clearfix"></div>                         
</div>             

</body>
</html>
