<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Trip Management</a></li>
    <li><a href="/servicesentries/"> Schedules</a></li>
    <li class="active">View</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <div class="col-md-12">
  	
  	<div class="box box-primary">
  		<div class="box-body">
  		<table class="table table-hover">
        <!-- <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $schedule->has('customer') ? $this->Html->link($schedule->customer->name, ['controller' => 'Customers', 'action' => 'view', $schedule->customer->id]) : '' ?></td>
        </tr>
        <tr> -->
            <th><?= __('Name') ?></th>
            <td><?= h($schedule->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Startloc Id') ?></th>
            <td><?= $this->Number->format($schedule->startloc_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Endloc Id') ?></th>
            <td><?= $this->Number->format($schedule->endloc_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Route Id') ?></th>
            <td><?= $this->Number->format($schedule->route_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Timepolicy Id') ?></th>
            <td><?= $this->Number->format($schedule->timepolicy_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Driver Id') ?></th>
            <td><?= $this->Number->format($schedule->default_driver_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Veh Id') ?></th>
            <td><?= $this->Number->format($schedule->default_veh_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Nodays') ?></th>
            <td><?= $this->Number->format($schedule->nodays) ?></td>
        </tr>
        <tr>
            <th><?= __('Brktime Bfr Nxt Trip') ?></th>
            <td><?= $this->Number->format($schedule->brktime_bfr_nxt_trip) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Paxgrpid') ?></th>
            <td><?= $this->Number->format($schedule->default_paxgrpid) ?></td>
        </tr>
        <tr>
            <th><?= __('Validfrom') ?></th>
            <td><?= h($schedule->validfrom) ?></td>
        </tr>
        <tr>
            <th><?= __('Validtill') ?></th>
            <td><?= h($schedule->validtill) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($schedule->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($schedule->end_time) ?></td>
        </tr>
    </table>
 </div><!-- box -->
  
  </div><!-- col12-->
  </div>
  </section>
