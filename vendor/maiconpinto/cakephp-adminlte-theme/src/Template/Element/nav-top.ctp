<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have <?php echo $totalmessagescount ?> messages</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                        	<?php 
						   for ($x = 0; $x < count($messagescontent); $x++) {
						   			
									//adding 19800 seconds- 5:30 hrs to GMT
							    	$interval[$x] = (time() + 19800) -  strtotime($messagescontent[$x]['msg_dtime']);
							
							 ?>
                            <li><!-- start message -->
                                <a href="#">
                                    <div class="pull-left">
                                        <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                                    </div>
                                    <h4>
                                         <?php echo $messagescontent[$x]['message'] ?>
                                        
                                    </h4>
                                    <p> <small><i class="fa fa-clock-o"></i>&nbsp;
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
                                    	 ?>&nbsp;</small></p>
                                </a>
                            </li>
                            <!-- end message -->
                            <?php } 
							?>
                        </ul>
                    </li>
                    <li class="footer"><a href="/messages/">See All Messages</a></li>
                </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning"><?php echo $totalnonackalertcount ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header"><?php echo $totalnonackalertcount ?> unacknowlged notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                           <?php 
						   for ($x = 0; $x < count($alertcontent); $x++) { ?>
                           <li>
                                <a href="#">
                                	<i class="fa fa-users text-aqua"></i><?php echo $alertcontent[$x]['alert']; ?> 
                            	</a>
                            </li>
                            <?php } 
							?>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <?php if ($loggedinuser['role'] == "admin"):  ?>
            <li class="dropdown user user-menu" >
            	<!-- <div class="btn-group"> -->
                  <!-- <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button> -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i>
                </a>
                  <ul class="dropdown-menu pull-right" role="menu" style = "width : 800px">
                  	<li class="navtop-header">
		              <h4 >Manage Master data</h4>
		            </li>
                  	<li class="user-body">
		               <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Contractors" data-remote="false" data-toggle="modal" data-target="#myModal" >Contractors</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Currencies" data-remote="false" data-toggle="modal" data-target="#myModal">Currencies</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Departments" data-remote="false" data-toggle="modal" data-target="#myModal">Departments</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Inspectionstatuses" data-remote="false" data-toggle="modal" data-target="#myModal">Inspection Statuses</a>
		                  </div>

		                </div>
		                <!-- /.row --><div class="divider"></div>

		                <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Manufacturers" data-remote="false" data-toggle="modal" data-target="#myModal">Manufacturers</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Ownerships" data-remote="false" data-toggle="modal" data-target="#myModal">Ownerships</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Partcategories" data-remote="false" data-toggle="modal" data-target="#myModal">Part Categories</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Simproviders" data-remote="false" data-toggle="modal" data-target="#myModal">SIM Providers</a>
		                  </div>


		                </div> <!-- /.row --><div class="divider"></div>


		                <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Purposes" data-remote="false" data-toggle="modal" data-target="#myModal">Purposes</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Servicecompleted" data-remote="false" data-toggle="modal" data-target="#myModal">Service Completed</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Measurementunits" data-remote="false" data-toggle="modal" data-target="#myModal">Units</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Servicetasks" data-remote="false" data-toggle="modal" data-target="#myModal">Service Tasks</a>
		                  </div>
		                </div> <!-- /.row --><div class="divider"></div>
		                <div class="row">


		                  <div class="col-xs-3 text-center">
		                    <a href="Renewalstypes" data-remote="false" data-toggle="modal" data-target="#myModal">Renewal Types</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Stations" data-remote="false" data-toggle="modal" data-target="#myModal">Stations</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Symbols" data-remote="false" data-toggle="modal" data-target="#myModal">Symbols</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Templatetypes" data-remote="false" data-toggle="modal" data-target="#myModal">Template Types</a>
		                  </div>
		                </div> <!-- /.row --><div class="divider"></div>

		                <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Workorderstatuses" data-remote="false" data-toggle="modal" data-target="#myModal">Work Order Statuses</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Vehiclecategories" data-remote="false" data-toggle="modal" data-target="#myModal">Vehicle Categories</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Vehiclestatuses" data-remote="false" data-toggle="modal" data-target="#myModal">Vehicle Statuses</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Vehicletypes" data-remote="false" data-toggle="modal" data-target="#myModal">Vehicle Types</a>
		                  </div>
		                </div> <!-- /.row --><div class="divider"></div>

		                 <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Analogsensortypes" data-remote="false" data-toggle="modal" data-target="#myModal">Analog Sensor Types</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Digitalsensortypes" data-remote="false" data-toggle="modal" data-target="#myModal">Digital Sensor Types</a>
		                  </div>
		                </div>
		              </li>
                  </ul>
                <!-- </div> -->
            </li>
            <?php endif; ?>

            <!-- User Account: style can be found in dropdown.less  user2-160x160.jpg -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'user-image', 'alt' => 'User Image')); ?>
                    <span class="hidden-xs"> <?php echo $loggedinuser['username'];  ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>

                        <p>
                            <?php echo $loggedinuser['username'];  ?>
                            <small>Member since Nov. 2012</small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                                        <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="/Users/logout" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>
