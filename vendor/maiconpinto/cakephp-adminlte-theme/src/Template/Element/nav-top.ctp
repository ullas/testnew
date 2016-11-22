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
                    <li class="header">You have 4 messages</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- start message -->
                                <a href="#">
                                    <div class="pull-left">
                                        <?php echo $this->Html->image('user2-160x160.jpg', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                                    </div>
                                    <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <!-- end message -->
                        </ul>
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">10 unacknowlged notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-users text-aqua"></i> GJ-4532 - Trip Started
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown user user-menu" >
            	<!-- <div class="btn-group"> -->
                  <!-- <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button> -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i>
                </a>
                  <ul class="dropdown-menu pull-right" role="menu" style = "width : 800px">
                  	<li class="header bg-aqua">		
		              Manage Master data 
		            </li>
                  	<li class="user-body">
		               <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Contractors" data-remote="false" data-toggle="modal" data-target="#myModal" >Contractors</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Currencies">Currencies</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Departments">Departments</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Inspectionstatuses">Inspectionstatuses</a>
		                  </div>
		                  
		                </div>
		                <!-- /.row --><div class="divider"></div>
		              
		                <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Manufacturers">Manufacturers</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Ownerships">Ownerships</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Partcategories">Partcategories</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Ownerships">Ownerships</a>
		                  </div>
		                  
		                  
		                </div> <!-- /.row --><div class="divider"></div>
		               
		                
		                <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Purposes">Purposes</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Servicecompleted">Servicecompleted</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Units">Units</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Servicetasks">Servicetasks</a>
		                  </div>
		                </div> <!-- /.row --><div class="divider"></div>
		                <div class="row">
		                  
		                 
		                  <div class="col-xs-3 text-center">
		                    <a href="Renewalstypes">Renewalstypes</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Stations">Stations</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Symbols">Symbols</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Templatetypes">Templatetypes</a>
		                  </div>
		                </div> <!-- /.row --><div class="divider"></div>
		               
		                <div class="row">
		                  <div class="col-xs-3 text-center">
		                    <a href="Workorderstatuses">Workorderstatuses</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Vehiclecategories">Vehiclecategories</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Vehiclestatuses">Vehiclestatuses</a>
		                  </div>
		                  <div class="col-xs-3 text-center">
		                    <a href="Vehicletypes">Vehicletypes</a>
		                  </div>
		                </div>
		                
		               
		               
		              </li>
                  </ul>
                <!-- </div> -->
            </li>
            <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-lightbulb-o"></i>
                    <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li class="header">Master Data</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                        	 <li><!-- Task item -->
                              <a href="Assettypes" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Assettypes
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Contractors" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Contractors
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Currencies" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Currencies
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Departments" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Departments
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Devicemodels" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Devicemodels
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Driverdetectionmodes" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Driverdetectionmodes
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Eventtypes" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Eventtypes
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Inspectionstatuses" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Inspectionstatuses
							  </a>
                            </li><li><!-- Task item -->
                              <a href="Manufacturers" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Manufacturers
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Measurementunits" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Measurementunits
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Ownerships" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Ownerships
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Partcategories" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Partcategories
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Providers" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Providers
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Purposes" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Purposes
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Renewalstypes" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Renewalstypes
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Servicecompleted" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Servicecompleted
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Servicedocuments" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Servicedocuments
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Servicetasks" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Servicetasks
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Stations" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Stations
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Symbols" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Symbols
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Templatetypes" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Templatetypes
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Tripstatuses" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Tripstatuses
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Triptypes" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Triptypes
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Vehiclecategories" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Vehiclecategories
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Vehiclestatuses" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Vehiclestatuses
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Vehicletypes" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Vehicletypes
							  </a>
                            </li>
                            <li><!-- Task item -->
                              <a href="Workorderstatuses" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
							    Workorderstatuses
							  </a>
                            </li>
                            
                            <!-- end task item -->
                        </ul>
                        
                        
                    </li>
                    <li class="footer">
                        
                    </li>
                </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
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