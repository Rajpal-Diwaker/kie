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
</style>
<!-- <head>
  <title>ChartJS - bar</title>
  
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head> -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
               <h3><?php echo $active; ?></h3>
                <p>Active Users</p>
              </div>
              <a href="<?php echo base_url('Admin/userslist?status=N') ?>">  
              <div class="icon">
                <i class="ion md-man"></i> 
                <img src="https://img.icons8.com/bubbles/50/000000/user.png">
                <!-- <i class="ion ion-bag"></i> glyphicon glyphicon-user -->
              </div></a>
              <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div> 
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $Inactive; ?><sup style="font-size: 20px"></sup></h3>
                <p>In Active Users</p>
              </div>
              <a href="<?php echo base_url('Admin/userslist?status=Y') ?>">
              <div class="icon">
              <img src="https://img.icons8.com/officel/40/000000/user.png">
                <!-- <i class="ion ion-stats-bars"></i> -->
              </div></a>
              <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $admin_verify?></h3>
                <p>Admin Verify Users</p>
              </div>
              <a href="<?php echo base_url('Admin/getUsersVerifylist') ?>">
              <div class="icon">
                <!-- <i class="ion ion-person-add"></i> -->
                <img src="https://img.icons8.com/officel/50/000000/checked-user-male.png">
              </div></a>
              <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $match; ?></h3>
                <p>Match</p>
              </div>
               <a href="<?php echo base_url('Admin/getUsersMatchlist') ?>">
              <div class="icon">
                <!-- <i class="ion ion-pie-graph"></i> -->
                <img src="https://img.icons8.com/dusk/64/000000/add-user-group-woman-man.png">
              </div></a>
            </div>
          </div>
        </div>

        <!-- <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fa fa-pie-chart mr-1"></i>
                  Registred Users
                </h3>
              </div>
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                </div>
              </div>
              
       </div> -->
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

     <div class="col-md-6 col-sm-12 col-xs-12">
       <div class="graphbox clearfix">
           <canvas style="" id="bar-chart3">
           </canvas>
        </div>
    </div>

    <div class="col-md-6 col-sm-12 col-xs-12">
       <div class="graphbox clearfix">
           <canvas style="" id="bar-chart4">
           </canvas>
        </div>
    </div>

  </div>

    
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

