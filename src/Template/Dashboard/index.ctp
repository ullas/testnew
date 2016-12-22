<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small> Managers Dashboard</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-puzzle-piece"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"> Total Items</span>
          <span class="info-box-number"><?php echo $totalcount ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-teal "><i class="fa ion-android-car"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Vehicles Tracked</span>
          <span class="info-box-number"><?php echo $vehiclescount ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">People Tracked</span>
          <span class="info-box-number"><?php echo $peoplecount ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Assets Tracked</span>
          <span class="info-box-number"><?php echo $assetcount ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Vehicle/Fuel Utilisation</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-wrench"></i></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </div>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Vehicle Utilsation</strong>
              </p>

              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" style="height: 180px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Critical Violations(Aug/YTD)</strong>
              </p>

              <div class="progress-group">
                <span class="progress-text">OverSpeed</span>
                <span class="progress-number"><b><?php echo $overspeedalertcount ?></b>/<?php echo $totaloverspeedalertcount ?></span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-aqua" style="width:<?php echo ($overspeedalertcount/$totaloverspeedalertcount * 100);  ?>%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Harsh Breaking</span>
                <span class="progress-number"><b><?php echo $harshbreakingalertcount ?></b>/<?php echo $totalharshbreakingalertcount ?></span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-red" style="width: <?php echo ($harshbreakingalertcount/$totalharshbreakingalertcount * 100);  ?>%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Fence Violations</span>
                <span class="progress-number"><b><?php echo $fenceviolationalertcount ?></b>/<?php echo $totalfenceviolationalertcount ?></span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-green" style="width:<?php echo ($fenceviolationalertcount/$totalfenceviolationalertcount * 100);  ?>%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Eccessive Acceleration</span>
                <span class="progress-number"><b><?php echo $eccessiveaccelalertcount?></b>/<?php echo $totaleccessiveaccelalertcount ?></span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-yellow" style="width:<?php echo ($eccessiveaccelalertcount/$totaleccessiveaccelalertcount * 100);  ?>%;"></div>
                </div>
              </div>
              <!-- /.progress-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
        <div class="box-footer">
        	<p class="text-center">Current Month Utilisation</p>
          <div class="row">
          	
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="<?php echo $cls1 ?>"></i> <?php echo abs(round(($distancecount-$lastmonthdistancecount)/$lastmonthdistancecount *100))?>%</span>
                <h5 class="description-header"><?php echo $distancecount?>(KM)</h5>
                <span class="description-text">TOTAL DISTANCE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-yellow"><i class="<?php echo $cls2 ?>"></i> <?php echo abs(round(($fuelsum-$lastmonthfuelsum)/$lastmonthfuelsum*100))?>%</span>
                <h5 class="description-header"><?php echo $fuelsum?>(Lt)</h5>
                <span class="description-text">FUEL USAGE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="<?php echo $cls3 ?>"></i> <?php echo abs(round(($nonprodhrssum-$lastmonthnonprodhrssum) / $lastmonthnonprodhrssum*100))?>%</span>
                <h5 class="description-header"><?php echo round($nonprodhrssum)?>(Hrs)</h5>
                <span class="description-text">Non productive Hours</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          
            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <span class="description-percentage text-red"><i class="<?php echo $cls4 ?>"></i> <?php echo abs(round(($runtimesum-$lastmonthruntimesum) / $lastmonthruntimesum*100))?>%</span>
                <h5 class="description-header"><?php echo round($runtimesum)?>(Hrs)</h5>
                <span class="description-text">TOTAL RUNTIME</span>
              </div>
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-8">
     

      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Drivers RAG Summary</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Driver</th>
                <th>Distance</th>
                <th>Score</th>
                <th>Summary</th>
              </tr>
              </thead>
              <tbody>
              	<?php 
					for ($x = 0; $x < count($ragcontent); $x++) { ?>
						<tr>
                		<td><?php echo $ragcontent[$x]['driver_code']; ?></td>
                		<td><?php echo $ragcontent[$x]['distance']; ?></td>
                		<td><span class="label label-danger">32</span></td>
                		<td>
                  			<div class="sparkbar" data-color="#00a65a" data-height="20">
                  				<?php echo $ragcontent[$x]['ose']; ?>,
                  				<?php echo $ragcontent[$x]['oste']; ?>,
                  				<?php echo $ragcontent[$x]['hbe']; ?>,
                  				<?php echo $ragcontent[$x]['eae']; ?>,
                  				<?php echo $ragcontent[$x]['pbe']; ?>,
                  				<?php echo $ragcontent[$x]['nde']; ?>,
                  				<?php echo $ragcontent[$x]['ede']; ?>,
                  				<?php echo $ragcontent[$x]['dte']; ?>
                  			</div>
                		</td>
              			</tr>
				<?php } 
				?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Show full report</a>
          
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4">
      <!-- Info Boxes Style 2 -->
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Trips Today</span>
          <span class="info-box-number"><?php echo $tripscount ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: <?php echo $widthtrip ?>%"></div>
          </div>
              <span class="progress-description">
                <?php echo $currenttripscount ?> In Progress
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jobs Completed</span>
          <span class="info-box-number"><?php echo $jobcount ?></span>

          <div class="progress"> 
            <div class="progress-bar" style="width: <?php echo $widthjob ?>%"></div>
          </div>
              <span class="progress-description">
                <?php echo $pendingjobcount ?> Jobs Pending 
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Service Reminders</span>
          <span class="info-box-number"><?php echo $totalremindercount ?></span>

          <div class="progress">
            <div class="progress-bar" style="width: <?php echo $widthreminder?>%"></div>
          </div>
              <span class="progress-description">
                 <?php echo $remindercount ?> Completed Today
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pending Maintenance</span>
          <span class="info-box-number"><?php echo $totalpendingmaintenancecount ?> </span>

          <div class="progress">
            <div class="progress-bar" style="width: <?php echo $widthpendingmaintenance ?>%"></div>
          </div>
              <span class="progress-description">
                <?php echo $pendingmaintenancecount ?>  Completed Today
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->

     

     
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<?php
$this->Html->css([
    'AdminLTE./plugins/iCheck/flat/blue',
    'AdminLTE./plugins/morris/morris',
    'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2',
    'AdminLTE./plugins/datepicker/datepicker3',
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/sparkline/jquery.sparkline.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
  'AdminLTE./plugins/chartjs/Chart.min',

], 
['block' => 'script']); 
?>

<?php $this->start('scriptBotton'); ?>
    <script type="text/javascript">
      //-----------------------
      //- MONTHLY SALES CHART -
      //-----------------------

      // Get context with jQuery - using jQuery's .get() method.
      var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
      // This will get the first returned node in the jQuery collection.
      var salesChart = new Chart(salesChartCanvas);

      var salesChartData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct","Nov","Dec"],
        datasets: [
          {
            label: "Fuel Utilisation",
            fillColor: "rgb(210, 214, 222)",
            strokeColor: "rgb(210, 214, 222)",
            pointColor: "rgb(210, 214, 222)",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgb(220,220,220)",
            data: [86, 32, 45, 64, 55, 80, 78, 62]
          },
          {
            label: "Vehicle Utilisation",
            fillColor: "rgba(60,141,188,0.9)",
            strokeColor: "rgba(60,141,188,0.8)",
            pointColor: "#3b8bba",
            pointStrokeColor: "rgba(60,141,188,1)",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(60,141,188,1)",
            data: [28, 48, 40, 19, 86, 27, 90,32]
          }
          
        ]
      };

      var salesChartOptions = {
        //Boolean - If we should show the scale at all
        showScale: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: false,
        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - Whether the line is curved between points
        bezierCurve: true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension: 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot: true,
        //Number - Radius of each point dot in pixels
        pointDotRadius: 4,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke: true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill: true,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true
      };

      //Create the line chart
      salesChart.Line(salesChartData, salesChartOptions);

      //---------------------------
      //- END MONTHLY SALES CHART -
      //---------------------------
      
      
      
        /* SPARKLINE CHARTS
       * ----------------
       * Create a inline charts with spark line
       */

      //-----------------
      //- SPARKLINE BAR -
      //-----------------
      $('.sparkbar').each(function () {
        var $this = $(this);
        $this.sparkline('html', {
          type: 'bar',
          height: $this.data('height') ? $this.data('height') : '30',
          barColor: $this.data('color')
        });
      });

      //-----------------
      //- SPARKLINE PIE -
      //-----------------
      $('.sparkpie').each(function () {
        var $this = $(this);
        $this.sparkline('html', {
          type: 'pie',
          height: $this.data('height') ? $this.data('height') : '90',
          sliceColors: $this.data('color')
        });
      });

      //------------------
      //- SPARKLINE LINE -
      //------------------
      $('.sparkline').each(function () {
        var $this = $(this);
        $this.sparkline('html', {
          type: 'line',
          height: $this.data('height') ? $this.data('height') : '90',
          width: '100%',
          lineColor: $this.data('linecolor'),
          fillColor: $this.data('fillcolor'),
          spotColor: $this.data('spotcolor')
        });
      });

    </script>
<?php $this->end(); ?>