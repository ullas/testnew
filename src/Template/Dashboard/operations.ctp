<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Operations</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $overspeedalertcount?></h3>

              <p>Over Speed</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/dashboard/overspeedmoreinfo/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo round($percentagerunning)?><sup style="font-size: 20px">%</sup></h3>

              <p>Running</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/dashboard/runningmoreinfo/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $runningdriverscount?></h3>

              <p>Drivers Reported</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/dashboard/driversmoreinfo/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $comfailurecount?></h3>

              <p>Communication Failure</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/dashboard/comfailuremoreinfo/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable" style="min-height: 180px;">
          <!-- Custom tabs (Charts with tabs)-->
          

        

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Todays Alerts</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
                <?php 
                
						   for ($x = 0; $x < count($alertscontent); $x++) 
						   {
						   	 	//adding 19800 seconds- 5:30 hrs to GMT
							    $interval[$x] = (time() + 19800) -  strtotime($alertscontent[$x]['alert_dtime']);
								// echo $interval[$x]."</br>";
							?>
                <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="" name="">
                  <!-- todo text -->
                  <span class="text"><?php echo $alertscontent[$x]['alert_message'] ?></span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i>
                  	<?php 
                  	 if($interval[$x] > 3600 )
                  	      {
                  	      	 echo gmdate('H',  $interval[$x]); echo ' hrs: ' ; 
							 echo gmdate('i',  $interval[$x])  ; echo ' mins ago';
						  }else if($interval[$x] > 60 && $interval[$x] < 3600 ) 
						  {
						  	echo gmdate('i',  $interval[$x])  ; echo ' mins ago';
						  }else {
						  		 echo ' just now';
						  }

 
                  	?> 
                 </small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <?php } 
							?>
                <!-- <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Harsh Braking (Mohd Asharaf)</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 30 mintues</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Vehicle KL-60 6714 Started</span>
                  <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 dhouray</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Trip Strated for Vehicle KL01-3124</span>
                  <small class="label label-success"><i class="fa fa-clock-o"></i> 1 hour</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Vehicle KL-12 6743 Reacching in 30 Minutes</span>
                  <small class="label label-primary"><i class="fa fa-clock-o"></i> 2 hour</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Continious Drive Detected for Vehicle KL-01 5465 </span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 3 hour</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li> -->
              </ul>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->


        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map  was here -->

          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Jobs Today</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $scheduledjobcount?>" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Scheduled</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $inprogressjobcount?>" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">In Progress</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-3 text-center">  
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $completedjobcount?>" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Completed</div>
                </div>
                <!-- ./col -->
                 <div class="col-xs-3 text-center">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $notstartedjobcount?>" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Not Started</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          

        </section>
        <section class="col-lg-5 connectedSortable">

          <!-- Map  was here -->

          <!-- solid sales graph -->
          <div class="box box-solid bg-blue-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Work Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-blue btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $openworkordercount?>" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Open</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-3 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $overdueworkordercount?>" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Overdue</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-3 text-center">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $deferredworkordercount?>" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Deffered</div>
                </div>
                <!-- ./col -->
                 <div class="col-xs-3 text-center">
                  <input type="text" class="knob" data-readonly="true" value="<?php echo $closedworkordercount?>" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Closed</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
     
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 ">
        	
        	<!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Trip In Progress</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
              	<?php 
                
						   for ($x = 0; $x < count($results); $x++) 
						   {
						   	 	
								 
							?>
              	
                <div class="col-sm-4">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left"><?php echo $results[$x]['name']?></span>
                    <small class="pull-right"><?php echo $results[$x]['percent']?>%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: <?php echo $results[$x]['percent']?>%;"></div>
                  </div>
                  
				<!-- /.col -->
               </div>
               
               <?php } 
							?>
              <!-- /.row -->
            </div>
            
          </div>
          <!-- /.box -->
        	
        </div>	
        </section>
        	
        </div>

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
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  '/js/raphael-min.js',
  'AdminLTE./plugins/morris/morris.min',
  'AdminLTE./plugins/sparkline/jquery.sparkline.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
  'AdminLTE./plugins/knob/jquery.knob',
 '/js/moment.min.js',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
    <script type="text/javascript">
     

     

      

      /* jQueryKnob */
      $(".knob").knob();

     

      

     

     

    </script>
<?php  $this->end(); ?>
