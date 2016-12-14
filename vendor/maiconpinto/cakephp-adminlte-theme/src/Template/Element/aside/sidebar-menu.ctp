<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
   <!-- <li class="header">SUMMARY</li>-->
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/dashboard'); ?>"><i class="glyphicon glyphicon-stats"></i>Manager Dashboard</a></li>
            <li><a href="<?php echo $this->Url->build('/dashboard/operations'); ?>"><div class="pull-left image mptl-monitoring"></div>Operations Dashboard</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-eye"></i> <span>Live Monitoring</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
            <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/tracking/'); ?>"><i class="fa fa-eye "></i> <span>Tracking</span></a></li>
             <li><a href="<?php echo $this->Url->build('/tripmonitor'); ?>"><i class="fa fa-desktop "></i> <span>Trip Monitoring</span></a></li>
           </ul>

    </li>


     <li class="treeview">
        <a href="#">
            <i class="fa fa-history"></i> <span>Logs</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/messages'); ?>"><i class="glyphicon glyphicon-envelope"></i>Messages <span class="label label-primary pull-right">13</span></a></li>
            <li><a href="<?php echo $this->Url->build('/alerts'); ?>"><i class="glyphicon glyphicon-bell"></i>Alerts <span class="label label-primary pull-right">13</span></a></li>
            <li><a href="<?php echo $this->Url->build('/drivers/logs'); ?>"><i class="glyphicon glyphicon-list-alt"></i> <span>Driver Logs</span></a></li>
            <li><a href="<?php echo $this->Url->build('/playback'); ?>"><i class="glyphicon glyphicon-repeat"></i> <span>Play Back</span></a></li>

        </ul>
    </li>

     <li class="header">OPERATIONS</li>
     <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-th"></i> <span>Trip Management</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/schedules'); ?>"><i class="glyphicon glyphicon-list"></i>Schedules <span class="label label-primary pull-right">13</span></a></li>
            <li><a href="<?php echo $this->Url->build('/trips'); ?>"><i class="fa fa-road"></i>Trip</a></li>
            <li><a href="<?php echo $this->Url->build('/subscriptions'); ?>"><i class="fa fa-link"></i>Subscriptions</a></li>
            <li><a href="<?php echo $this->Url->build('/assigments'); ?>"><i class="fa fa-external-link"></i>Assignments</a></li>
             <li><a href="<?php echo $this->Url->build('/jobs'); ?>"><i class="fa fa-flag-checkered"></i>Jobs</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-bus"></i> <span>Fleet Management</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/servicesentries'); ?>"><i class="fa fa-wrench"></i>Service Entries </a></li>
            <li><a href="<?php echo $this->Url->build('/fuelentries'); ?>"><i class="fa fa-tint"></i>Fuel Entries </a></li>
            <li><a href="<?php echo $this->Url->build('/inspections'); ?>"><i class="glyphicon glyphicon-ok-circle"></i>Inspections <span class="label label-primary pull-right">13</span></a></li>
            <li><a href="<?php echo $this->Url->build('/issues'); ?>"><i class="glyphicon glyphicon-warning-sign"></i>Issues <span class="label label-primary pull-right">13</span></a></li>
            <li><a href="<?php echo $this->Url->build('/workorders'); ?>"><i class="glyphicon glyphicon-list-alt"></i>Work Orders <span class="label label-primary pull-right">13</span></a></li>
            <li><a href="<?php echo $this->Url->build('/parts'); ?>"><i class="glyphicon glyphicon-equalizer"></i>Parts</a></li>
            <li><a href="<?php echo $this->Url->build('/drivers'); ?>"><div class="pull-left image mptl-driver"></div>Drivers </a></li>
        </ul>
    </li>


    <?php if ($loggedinuser['role'] == "admin"):  ?>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-puzzle-piece"></i> <span>Administration</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="treeview">
        <a href="#">
            <i class="fa fa-puzzle-piece"></i> <span>Tracking Items</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/vehicles'); ?>"><i class="fa fa-bus"></i>Vehicles</a></li>
            <li><a href="<?php echo $this->Url->build('/people'); ?>"><i class="fa fa-user"></i>People</a></li>
            <li><a href="<?php echo $this->Url->build('/assets'); ?>"><i class="fa fa-cube"></i>Assets</a></li>

        </ul>
    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Hardware</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/devices'); ?>"><i class="fa fa-ticket"></i> Devices</a></li>
            <li><a href="<?php echo $this->Url->build('/ibuttons'); ?>"><i class="fa fa-dot-circle-o"></i> iButtons</a></li>
            <li><a href="<?php echo $this->Url->build('/rfids'); ?>"><i class="fa fa-credit-card"></i> RFID Tags</a></li>
            <li><a href="<?php echo $this->Url->build('/simcards'); ?>"><i class="fa fa-credit-card"></i> SIM Cards</a></li>

        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-object-group"></i>
            <span>Groups</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/groups'); ?>"><i class="fa fa-cubes"></i> Groups</a></li>
            <li><a href="<?php echo $this->Url->build('/passengergroups'); ?>"><div class="pull-left image mptl-pax"></div> Passenger Groups</a></li>
            <li><a href="<?php echo $this->Url->build('/drivergroups'); ?>"><i class="ion ion-person-stalker"></i> Driver Groups</a></li>

        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <div class="pull-left image mptl-abook"></div><span>Contacts</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/addresses'); ?>"><i class="ion ion-android-contact"></i>Addesses</a></li>
            <li><a href="<?php echo $this->Url->build('/distributionlists'); ?>"><i class="ion ion-android-contacts"></i>Distribution Lists</a></li>

        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-table"></i> <span>Templates</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/templates'); ?>"><i class="fa fa-table"></i>Email</a></li>

            <li><a href="<?php echo $this->Url->build('/notifications'); ?>"><div class="pull-left image mptl-notify"></div>Notifications</a></li>

        </ul>
    </li>
     <li class="treeview">
        <a href="#">
            <i class="fa fa-map-o"></i> <span>Geography</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/locations'); ?>"><i class="fa fa-map-pin"></i> Locations</a></li>
            <li><a href="<?php echo $this->Url->build('/fences'); ?>"><i class="fa fa-map-signs"></i>Fences</a></li>
            <li><a href="<?php echo $this->Url->build('/routes'); ?>"><i class="ion ion-map"></i>Routes</a></li>

        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-bell-o"></i> <span>Reminders</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/servicereminders'); ?>"><i class="fa fa-wrench"></i> <span>Service</span></a></li>
            <li><a href="<?php echo $this->Url->build('/renewalreminders'); ?>"><i class="fa fa-lightbulb-o"></i> <span>Renewal</span></a></li>

        </ul>
    </li>

    <li><a href="<?php echo $this->Url->build('/vendors'); ?>"><i class="fa fa-book"></i> <span>Vendors</span></a></li>

        </ul>
    </li>
    <?php endif; ?>








     <li class="header">REPORTS</li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Reports</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/reports/group'); ?>"><div class="pull-left image mptl-greports"></div>Group Reports</a></li>
            <li><a href="<?php echo $this->Url->build('/reports/individul'); ?>"><div class="pull-left image mptl-ireports"></div>Individual Reports</a></li>

        </ul>
    </li>



</ul>
<?php } ?>
