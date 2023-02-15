<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

<style>
body{
  height:100vh!important;
  background:#f4f6f9;
}
.content-wrapper{
  height:100%;
  min-height:100%!important;
}
.graphbox{
  width:100%;
  height:300px;
  background:#fff;
  padding:15px;
  border-radius:4px;
  margin:15px 0;
  box-shadow:0px 0px 10px rgba(0,0,0,0.6);
}
.graphbox canvas{
  width:100%;
}
.main-footer {
    position: relative!important;
    bottom: inherit!important;
  z-index:1!important;
  margin-left:-15px!important;
}
#table th, #table td{
	text-align:left;
	font-size:14px!important;
}
 #table th, .pagination a, .pagination strong{
	 background:#ff2929!important;
 }
 #table tr:hover {
    background-color: transparent!important;
}
</style>
    <section class="content">
      <div class="container-fluid">
        <div class="row">        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
              <a href="<?php echo base_url('Admin/getProject?tStatus=Running') ?>"> 
               <h3><?php echo $active; ?></h3></a>
                <p>Active Project</p>
              </div>
            </div>
        </div> 
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
              <a href="<?php echo base_url('Admin/getProject?tStatus=Initial') ?>"> 
                <h3><?php echo $upComingProject; ?></a>
                <sup style="font-size: 20px"></sup></h3>
                <p>Upcoming Project</p>
              </div>
              
            </div>
          </div>
 
          <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
               <div class="inner">
               <a href="<?php echo base_url('Admin/getProject?tStatus=OnHold') ?>"> 
               <h3><?php echo $onHold?></h3></a>
                <p>On Hold Project</p>
              </div>
              
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <!-- <h3><?php echo $freebandwidth; ?> Hours</h3> -->
                <h3><?php $selst='';
               if($freebandwidth)
               $selst='Hours'; else $selst='0'; 
               echo $freebandwidth; ?> 
               <?php echo $selst; ?></h3>
                <p>Free Bandwidth</p>
              </div>
            </div>
          </div>

        </div>
        <br><br>

        <div class="row clearfix">
    <div class="col-md-6 col-sm-12 col-xs-12">
       <div class="graphbox clearfix">
           <canvas style="" id="bar-chart">
           </canvas>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
       <div class="graphbox clearfix">
           <canvas style="" id="bar-chart2">
           </canvas>
        </div>
    </div>
  </div>


<!--     
<script>
  $(function()
  {
      //get the bar chart canvas
      var cData = JSON.parse(`<?php echo $Registered_user_chart; ?>`);
      var cData2 = JSON.parse(`<?php echo $ActiveUserChartData; ?>`);
      var cData3 = JSON.parse(`<?php echo $Registered_user_chart; ?>`);
      var cData4 = JSON.parse(`<?php echo $Registered_user_chart; ?>`);
      
      var ctx = $("#bar-chart");
      var ctx2 = $("#bar-chart2");
      var ctx3 = $("#bar-chart3");
      var ctx4 = $("#bar-chart4");

      var data = { labels: cData.label,
        datasets: [
          {
            label: cData.label,
            data: cData.data,
 backgroundColor: ["#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57", "#1D7A46","#CDA776","#CDA776","#989898","#CB252B","#E39371",],            
     borderColor: ["#CDA776","#989898","#CB252B", "#E39371","#1D7A46","#F4A460","#CDA776","#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57",],
       borderWidth: [1, 1, 1, 1, 1,1,1,1, 1, 1, 1,1,1]
          }
        ]
      };

       var data2 = { labels: cData2.label,
        datasets: [
          {
            label: cData2.label,
            data: cData2.data,
      borderColor: ["#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57", "#1D7A46","#CDA776","#CDA776","#989898","#CB252B","#E39371",],            
     backgroundColor: ["#CDA776","#989898","#CB252B", "#E39371","#1D7A46","#F4A460","#CDA776","#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57",],
       borderWidth: [1, 1, 1, 1, 1,1,1,1, 1, 1, 1,1,1]
          }
        ]
      };

       var data3 = { labels: cData3.label,
        datasets: [
          {
            label: cData3.label,
            data: cData3.data,
      borderColor: ["#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57", "#1D7A46","#CDA776","#CDA776","#989898","#CB252B","#E39371",],            
     backgroundColor: ["#CDA776","#989898","#CB252B", "#E39371","#1D7A46","#F4A460","#CDA776","#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57",],
       borderWidth: [1, 1, 1, 1, 1,1,1,1, 1, 1, 1,1,1]
          }
        ]
      };

       var data4 = { labels: cData4.label,
        datasets: [
          {
            label: cData4.label,
            data: cData4.data,
      borderColor: ["#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57", "#1D7A46","#CDA776","#CDA776","#989898","#CB252B","#E39371",],            
     backgroundColor: ["#CDA776","#989898","#CB252B", "#E39371","#1D7A46","#F4A460","#CDA776","#DEB887","#A9A9A9","#DC143C","#F4A460","#2E8B57",],
       borderWidth: [1, 1, 1, 1, 1,1,1,1, 1, 1, 1,1,1]
          }
        ]
      };

      var options = {responsive: true,title: {display: true, position: "top",text: "Monthly Registered Users Count",
          fontSize: 18,fontColor: "#111" },
        legend: {display: true, position: "bottom", labels: {fontColor: "#333",fontSize: 16 }}
      };

      var options2 = {responsive: true,title: {display: true, position: "top",text: "Monthly Active Users Count",
          fontSize: 18,fontColor: "#111" },
        legend: {display: true, position: "bottom", labels: {fontColor: "#333",fontSize: 16 }}
      };

       var options3 = {responsive: true,title: {display: true, position: "top",text: "Monthly Registered Users Count",
          fontSize: 18,fontColor: "#111" },
        legend: {display: true, position: "bottom", labels: {fontColor: "#333",fontSize: 16 }}
      };

      var options4 = {responsive: true,title: {display: true, position: "top",text: "Monthly Active Users Count",
          fontSize: 18,fontColor: "#111" },
        legend: {display: true, position: "bottom", labels: {fontColor: "#333",fontSize: 16 }}
      };

      var chart1 = new Chart(ctx, { type: "bar", data: data,options: options});
      var chart2 = new Chart(ctx2, { type: "bar", data: data2,options: options2});
      var chart3 = new Chart(ctx3, { type: "bar", data: data3,options: options3});
      var chart4 = new Chart(ctx4, { type: "bar", data: data4,options: options4});

    });
</script>

 -->
