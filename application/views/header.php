<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Techugo Backend Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url() ?>assets/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo site_url() ?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo site_url() ?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo site_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo site_url() ?>assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo site_url() ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo site_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"> </script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"> </script> 
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<style>
#table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 8px;
  min-width:50px;
  min-height: 10px;
  /* display: inline-block; */
}

#table tr:nth-child(even){background-color: #f2f2f2;}

#table tr:hover {background-color: #ddd;}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
  height: 8px;
  width: 20px;
}
.adminimg{
	position:relative;
	width:35px;
	height:35px;
	margin:0 20px;
}
.adminimg .image{
	position:relative;
	width:35px;
	height:35px;
	overflow:hidden;
	border-radius:50%;
	box-shadow:0px 0px 5px rgba(0,0,0,0.2);
}
.adminimg .image{
	box-shadow:0px 0px 10px rgba(0,0,0,0.5);
}
.adminimg .image img{
	max-width:100%;
	box-shadow:none;
}
.logobox{
	border-bottom:1px solid #4f5962;
}
.logoheader{
	text-align:center;
	margin:10px auto;
}
.logoheader img{
	max-width:100%;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
.fa-power-off{
	font-size:21px;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}
#mobile{
	display:none;
}
#desktop{
	display:block;
}
@media screen and (max-width: 767px) {
#desktop{
	display:none;
}
#mobile{
	display:block;
}
}
</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav" id="mobile">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
	<ul class="navbar-nav" id="desktop"><li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">

    </ul>
	<a href="#" class="adminimg"><div class="image">
          <img src="../assets/img/user2.jpg" class="img-circle elevation-2" alt="User Image">
        </div></a>
    <a href="<?php echo site_url('Admin/logout') ?>" class="d-block"><i class="fa fa-power-off"></i> </a>
  </nav> 

  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
		<div class="logobox">
			<div class="logoheader">
				<img src="<?php echo site_url() ?>assets/img/techugo_white.png" alt="" height="30" width="110" />
			</div>
		</div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/dashboard'); ?>" class="nav-link">
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <p>
              Project
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/getProject'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List of Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/addProject'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Project</p>
                </a>
              </li>
            </ul>
          </li>

     <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <p>
              Users
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/users'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List of Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/freeResource'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List of Free Resource</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/addUser'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">              
              <p>
                Team
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/getTeamList'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List of Team</p>
                </a>
              </li>
              </ul>
          </li>

          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">              
              <p>
                Activity
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/getActivityList'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List of Activity</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="<?php echo base_url('Admin'); ?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Activity</p>
                </a>
              </li>
              </ul>
          </li> -->
            </ul>
          </li> 
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 250px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
