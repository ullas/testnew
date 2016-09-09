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
        <span class="info-box-icon bg-aqua"><i class="ion ion-android-car"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Vehicle Tracked</span>
          <span class="info-box-number">110</span>
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
          <span class="info-box-text">Active Vehicles</span>
          <span class="info-box-number">108</span>
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
        <span class="info-box-icon bg-green"><i class="ion ion-android-car"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Running Vehicles</span>
          <span class="info-box-number">60</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Non Safe Drivers</span>
          <span class="info-box-number">2</span>
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
                <span class="progress-number"><b>160</b>/320</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-aqua" style="width: 50%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Harsh Breaking</span>
                <span class="progress-number"><b>20</b>/160</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-red" style="width: 14%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Fence Violations</span>
                <span class="progress-number"><b>23</b>/230</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-green" style="width: 10%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Eccessive Acceleration</span>
                <span class="progress-number"><b>20</b>/410</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-yellow" style="width: 5%"></div>
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
                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                <h5 class="description-header">35,210.43(KM)</h5>
                <span class="description-text">TOTAL DISTANCE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                <h5 class="description-header">8,000(Lt)</h5>
                <span class="description-text">FUEL USAGE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                <h5 class="description-header">863(Hrs)</h5>
                <span class="description-text">Non productive Hours</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                <h5 class="description-header">1200(Hrs)</h5>
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
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Driver</th>
                <th>Department</th>
                <th>Score</th>
                <th>Summary</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                <td>Call of Duty IV</td>
                <td><span class="label label-danger">32</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-danger">21</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>iPhone 6 Plus</td>
                <td><span class="label label-danger">18</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-warning">16</span></td>
                <td>
                  <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-warning">12</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>iPhone 6 Plus</td>
                <td><span class="label label-warning">11</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                <td>Call of Duty IV</td>
                <td><span class="label label-success">10</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                </td>
              </tr>
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
          <span class="info-box-number">120</span>

          <div class="progress">
            <div class="progress-bar" style="width: 50%"></div>
          </div>
              <span class="progress-description">
                3 In Progress
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jobs Completed</span>
          <span class="info-box-number">17</span>

          <div class="progress">
            <div class="progress-bar" style="width: 20%"></div>
          </div>
              <span class="progress-description">
                136 Jobs Pending
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Service Renewals</span>
          <span class="info-box-number">10</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
              <span class="progress-description">
                10 Completed Today
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pending Maintenance</span>
          <span class="info-box-number">21</span>

          <div class="progress">
            <div class="progress-bar" style="width: 40%"></div>
          </div>
              <span class="progress-description">
                6 Completed Today
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
            data: [86, 32, 45, 64, 55, 80, 78,62]
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
      
      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
      var pieChart = new Chart(pieChartCanvas);
      var PieData = [
        {
          value: 700,
          color: "#f56954",
          highlight: "#f56954",
          label: "Chrome"
        },
        {
          value: 500,
          color: "#00a65a",
          highlight: "#00a65a",
          label: "IE"
        },
        {
          value: 400,
          color: "#f39c12",
          highlight: "#f39c12",
          label: "FireFox"
        }
      ];
      var pieOptions = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: "#fff",
        //Number - The width of each segment stroke
        segmentStrokeWidth: 1,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps: 100,
        //String - Animation easing effect
        animationEasing: "easeOutBounce",
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: false,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        //String - A tooltip template
        tooltipTemplate: "<%=value %> <%=label%> users"
      };
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions);
      //-----------------
      //- END PIE CHART -
      //-----------------

        /* jVector Maps
       * ------------
       * Create a world map with markers
       */
      $('#world-map-markers').vectorMap({
        map: 'world_mill_en',
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        backgroundColor: 'transparent',
        regionStyle: {
          initial: {
            fill: 'rgba(210, 214, 222, 1)',
            "fill-opacity": 1,
            stroke: 'none',
            "stroke-width": 0,
            "stroke-opacity": 1
          },
          hover: {
            "fill-opacity": 0.7,
            cursor: 'pointer'
          },
          selected: {
            fill: 'yellow'
          },
          selectedHover: {}
        },
        markerStyle: {
          initial: {
            fill: '#00a65a',
            stroke: '#111'
          }
        },
        markers: [
          {latLng: [41.90, 12.45], name: 'Vatican City'},
          {latLng: [43.73, 7.41], name: 'Monaco'},
          {latLng: [-0.52, 166.93], name: 'Nauru'},
          {latLng: [-8.51, 179.21], name: 'Tuvalu'},
          {latLng: [43.93, 12.46], name: 'San Marino'},
          {latLng: [47.14, 9.52], name: 'Liechtenstein'},
          {latLng: [7.11, 171.06], name: 'Marshall Islands'},
          {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
          {latLng: [3.2, 73.22], name: 'Maldives'},
          {latLng: [35.88, 14.5], name: 'Malta'},
          {latLng: [12.05, -61.75], name: 'Grenada'},
          {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
          {latLng: [13.16, -59.55], name: 'Barbados'},
          {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
          {latLng: [-4.61, 55.45], name: 'Seychelles'},
          {latLng: [7.35, 134.46], name: 'Palau'},
          {latLng: [42.5, 1.51], name: 'Andorra'},
          {latLng: [14.01, -60.98], name: 'Saint Lucia'},
          {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
          {latLng: [1.3, 103.8], name: 'Singapore'},
          {latLng: [1.46, 173.03], name: 'Kiribati'},
          {latLng: [-21.13, -175.2], name: 'Tonga'},
          {latLng: [15.3, -61.38], name: 'Dominica'},
          {latLng: [-20.2, 57.5], name: 'Mauritius'},
          {latLng: [26.02, 50.55], name: 'Bahrain'},
          {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
        ]
      });

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