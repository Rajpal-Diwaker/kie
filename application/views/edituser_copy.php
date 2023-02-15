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

</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>

</head>

<body>
<?php  
     $error_msg=$this->session->flashdata('error_msg');
       if($error_msg)
       { 
            echo $error_msg;
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
                        <div class="card-body">
                            <div id="form1"  class="long-form">
                                <div class="web-heading-bg bg-light"><h4>User Details</h4></div>
                                <form method="post" class="form- mgt-25" action="<?php echo base_url('Admin/edit_user'); ?>" enctype="multipart/form-data">
                                <input type="hidden" id="user_id" value="<?php echo $data[0]['user_id'];?>" name="user_id"/>
                                
                              <div class="form-group row">
                                    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="first_name"  >First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" 
                                        value="<?php echo $data[0]['first_name']; ?>" required/><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="last_name"  >Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" 
                                        value="<?php echo $data[0]['last_name']; ?>"required/><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="dob">DOB</label>
                                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" 
                                        value="<?php echo $data[0]['dob']; ?>"required/><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label  for="mobile_no">Phone Number</label>
                                        <input type="text" class="form-control" id="mobile_no " name="mobile_no"  
                                        value="<?php echo $data[0]['mobile_no']; ?>" placeholder="Phone no" readonly/><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="email_id">Email Id</label>
                                        <input type="email" class="form-control" id="email_id" name="email_id" 
                                        value="<?php echo $data[0]['email_id']; ?>" placeholder="Email Id" required/><br/>
                                     </div>                    
                                 
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label >Gender</label>
                                        <select class="form-control" style="height:calc(3.25rem -15px)" >
                                          <option class="select" name="gender">Select</option>
                                          <option value="<?php echo $data[0]['gender']; ?>" selected><?php echo $data[0]['gender']; ?></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="trans female">Transgender female</option>
                                            <option value="trans male'">Transgender male</option>
                                            <option value="not confirm">Not Confirm</option>
                                            <option value="not listed">Not listed</option>
                                            <option value="not listed">No Answer </option>
                                        </select>
                                        <br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" class="form-control" id="nationality" name="nationality"  placeholder="Nationality" 
                                        value="<?php echo $data[0]['nationality']; ?>" /><br/>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="religious">Religious</label>
                                        <input type="text" class="form-control" id="religious" name="religious"  placeholder="Religious" 
                                        value="<?php echo $data[0]['religious']; ?>" /><br/>
                                     </div>
                                    
                                    <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                         <label for="body_type">Body Type</label>
                                        <textarea class="form-control" id="body_type" name="body_type"  placeholder="Body Type" cols=40  rows=6><?php echo $data[0]['body_type']; ?></textarea> <br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                         <label for="career">Career</label>
                                          <textarea class="form-control" id="career" name="career"  placeholder="Career" cols=40  rows=6><?php echo $data[0]['career']; ?>
                                          </textarea> <br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="Mother First Name">Personality Type</label>
                                            <textarea class="form-control" id="personality_type" name="personality_type"  
                                            placeholder="Personality Type" cols=40  rows=6><?php echo $data[0]['personality_type']; ?> </textarea><br/>
                                    </div>
                                     <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="">Match Preference</label>
                                        <table><td>  
                                              <select id="Matching" name="Matching[]" multiple="multiple" style="height: 153px;width: 280px">  
                                              <?php foreach($data['MatchingData'] as $key => $value) : ?> 
                                                  <?php if($value['selected']=='Y') { ?> 
                                                      <option value="<?php echo $value['id']; ?>" selected="yes"><?php echo $value['name']; ?></option>  
                                                  <?php }else {?>
                                                      <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>  
                                                  <?php } ?>  
                                              <?php endforeach;?>    
                                              </select>  
                                            </td> 
                                       </table>  
                                      <br/>
                                    </div>
                                  </div>

                                <div class="col-md-3 col-sm-4 col-xs-6 mobile-screen-form">
                                        <label for="Biodata">Biodata</label>
                                            <textarea class="form-control" id="biodata" name="biodata"  style="width: 643px;"
                                            placeholder="Biodata" cols=80  rows=7><?php echo $data[0]['biodata']; ?> </textarea><br/>
                               </div>

                                  <label for="" >Profile Picture </label> 
                                  <table style="margin-top:0px;">
                                  <?for($i=0;$i<count($data['img']);$i++){ ?>
                                  <td>

                                  <div class="img-wrap">
                                        <span class="close">&times;</span>
                                        <input type="text" id="img_ids"  value="<?php print_r($data['img_ids'][$i]); ?>" hidden>
                                    <img src="<?php print_r($data['img'][$i]); ?>" style="width:100px;hwight:100px;">
                                   </div>
                                 </td>
                               <?php } ?> 
                                </table>  
                              
                                  <input type="file" id="image" name="image[]" multiple><br/>                              
                                <div class="form-group row text-center ">
                                  <div class="col-md-12  ">
                                    <div class="apply-btn">
                                <input type="submit" class="button button1" id="update" style="width:200px;" value="update"></div>
                                    </div>
                                </div>
                            </form>
</div>
</div> 
<br>
<br>
<br><br><br>
<div class="clearfix"></div>                         
</div>             

<script>
$('.img-wrap').on('click',function()
{
   var getval =  $(this).parent().find('input').val();
   r=confirm("Are You Sure Remove The Image!!");
  //  alert(getval);

  // if (r == true) 
  // {
  //   txt = "You pressed OK!";
  // } 
  // else 
  // {
  //   txt = "You pressed Cancel!";
  // }

  $.ajax({
    url: '<?php echo base_url() ?>',
    type: 'DELETE',
    alert(getval);
    success: function(result) {
        // Do something with the result
    }
  });
});

</script>

</body>
</html>
