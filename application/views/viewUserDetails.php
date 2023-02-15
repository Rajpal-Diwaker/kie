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
img:hover {opacity: 0.3;border-radius: 50%; position: relative; float: right; background: red;color: white; top: -10px; right: -10px;}
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
	<h2 style="text-align:left;color:#000;padding:20px 0;">User Details</h2>
                        <div class="card-body">
                            <div id="form1"  class="long-form">
                                <form method="post" class="form- mgt-25"  enctype="multipart/form-data">
                                <input type="hidden" id="user_id" value="<?php echo $data[0]['user_id'];?>" name="user_id"/>
                                
                              <div class="form-group row">
                                    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="first_name"  >First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" 
                                        value="<?php echo $data[0]['first_name']; ?>" readonly /><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="last_name"  >Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" 
                                        value="<?php echo $data[0]['last_name']; ?>" readonly/><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="dob">DOB</label>
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth" 
                                        value="<?php echo $data[0]['dob']; ?>" readonly/><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label  for="mobile_no">Phone Number</label>
                                        <input type="text" class="form-control" id="mobile_no " name="mobile_no"  
                                        value="<?php echo $data[0]['mobile_no']; ?>" placeholder="Phone no" readonly/><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="email_id">Email Id</label>
                                        <input type="email" class="form-control" id="email_id" name="email_id" 
                                        value="<?php echo $data[0]['email_id']; ?>" placeholder="Email Id" readonly/><br/>
                                     </div>                    
                                 


            <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
              <label >Gender</label>
               <input type="email" class="form-control" id="gender" name="gender" 
                                        value="<?php echo $data[0]['gender_name']; ?>" placeholder="gender" readonly/><br/>

                <br/>
             </div> 

            
            <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
              <label for="nationality">Ethnicity</label>
<input type="text" class="form-control" id="nationality" name="nationality"  placeholder="nationality" value="<?php echo $data[0]['nationality']; ?>" readonly/><br/>
            </div>


        <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
            <label for="religious">Religious</label>
            <input type="text" class="form-control" id="religious" name="religious"  placeholder="Religious" 
            value="<?php echo $data[0]['religious']; ?>" readonly/><br/>
        </div>
      
  <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
      <label >Gym or Netflix</label>
       <input type="text" class="form-control" id="body_type" name="body_type"  placeholder="body_type" 
            value="<?php echo $data[0]['body_type']; ?>" readonly/><br/>
       <br/>
  </div>                             

        <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
              <label for="career">Career</label>
               <input type="text" class="form-control" id="career" name="career"  placeholder="career" 
            value="<?php echo $data[0]['career']; ?>" readonly/><br/>
          </div>

         <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
            <label for="">Match Preference</label>
<textarea class="form-control" id="MatchingData" name="MatchingData" placeholder="MatchingData" cols=30 rows=4 readonly>
  <?php echo $data['MatchingData']; ?></textarea> <br/>
        </div>

    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
            <label for="Biodata">Bio</label>
                <textarea class="form-control" id="biodata" name="biodata"
                placeholder="Biodata" cols=30 rows=4 readonly ><?php echo $data[0]['biodata']; ?> </textarea><br/>
   </div>
      </div>


      <label for="" >Picture </label> 
      <table style="margin-top:0px;">
        <?php if(count($data['img'])>1) {?>
      <?php for($i=0;$i<count($data['img']);$i++){ ?>
      <td>
      <div class="img-wrap">
        <img src="<?php print_r($data['img'][$i]); ?>" style="width:100px;height:100px;">
       </div>
     </td>
    <?php } ?> 
   <?php } ?> 
    </table>  
      <!-- <input type="file" id="image" name="image[]" multiple><br/>                               -->
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
