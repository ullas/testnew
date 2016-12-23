<section class="content-header">
  <h1>
     <?= h($schedule->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/schedule/"> schedule</a></li>
    <li class="active">View</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <div class="col-md-12">
  	
  	<div class="box box-primary">
  		<div class="box-body">
  		<table class="table table-hover">
        <tr>
            <th><?= __('Route') ?></th>
            <td><?= $schedule->has('route') ? $this->Html->link($schedule->route->name, ['controller' => 'Routes', 'action' => 'view', $schedule->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $schedule->has('customer') ? $this->Html->link($schedule->customer->name, ['controller' => 'Customers', 'action' => 'view', $schedule->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Timepolicy') ?></th>
            <td><?= $schedule->has('timepolicy') ? $this->Html->link($schedule->timepolicy->name, ['controller' => 'Timepolicies', 'action' => 'view', $schedule->timepolicy->id]) : '' ?></td>
        </tr>
        <tr>
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
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Subscriptions') ?></h4>
        <?php if (!empty($schedule->subscriptions)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Schedule Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Validfrom') ?></th>
                <th><?= __('Validtill') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Notification Id') ?></th>
                <th><?= __('Loctype') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($schedule->subscriptions as $subscriptions): ?>
            <tr>
                <td><?= h($subscriptions->id) ?></td>
                <td><?= h($subscriptions->schedule_id) ?></td>
                <td><?= h($subscriptions->customer_id) ?></td>
                <td><?= h($subscriptions->name) ?></td>
                <td><?= h($subscriptions->active) ?></td>
                <td><?= h($subscriptions->validfrom) ?></td>
                <td><?= h($subscriptions->validtill) ?></td>
                <td><?= h($subscriptions->location_id) ?></td>
                <td><?= h($subscriptions->notification_id) ?></td>
                <td><?= h($subscriptions->loctype) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Subscriptions', 'action' => 'view', $subscriptions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subscriptions', 'action' => 'edit', $subscriptions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subscriptions', 'action' => 'delete', $subscriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
 
        <?php endif; ?>
    </div>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Trips') ?></h4>
        <?php if (!empty($schedule->trips)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('Start Time') ?></th>
                <th><?= __('End Time') ?></th>
                <th><?= __('Timepolicy Id') ?></th>
                <th><?= __('Route Id') ?></th>
                <th><?= __('Startpoint Id') ?></th>
                <th><?= __('Endpoint Id') ?></th>
                <th><?= __('Schedule Id') ?></th>
                <th><?= __('Autogen') ?></th>
                <th><?= __('Tripstatus Id') ?></th>
                <th><?= __('Last Location') ?></th>
                <th><?= __('Canceled') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Fromschedule') ?></th>
                <th><?= __('Trackingcode') ?></th>
                <th><?= __('Adt') ?></th>
                <th><?= __('Aat') ?></th>
                <th><?= __('Edt') ?></th>
                <th><?= __('Eat') ?></th>
                <th><?= __('Vehiclecategory Id') ?></th>
                <th><?= __('Platform') ?></th>
                <th><?= __('Triptype Id') ?></th>
                <th><?= __('Softwaretriggered') ?></th>
                <th><?= __('Hwtriggered') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($schedule->trips as $trips): ?>
            <tr>
                <td><?= h($trips->id) ?></td>
                <td><?= h($trips->name) ?></td>
                <td><?= h($trips->start_date) ?></td>
                <td><?= h($trips->end_date) ?></td>
                <td><?= h($trips->customer_id) ?></td>
                <td><?= h($trips->vehicle_id) ?></td>
                <td><?= h($trips->start_time) ?></td>
                <td><?= h($trips->end_time) ?></td>
                <td><?= h($trips->timepolicy_id) ?></td>
                <td><?= h($trips->route_id) ?></td>
                <td><?= h($trips->startpoint_id) ?></td>
                <td><?= h($trips->endpoint_id) ?></td>
                <td><?= h($trips->schedule_id) ?></td>
                <td><?= h($trips->autogen) ?></td>
                <td><?= h($trips->tripstatus_id) ?></td>
                <td><?= h($trips->last_location) ?></td>
                <td><?= h($trips->canceled) ?></td>
                <td><?= h($trips->active) ?></td>
                <td><?= h($trips->fromschedule) ?></td>
                <td><?= h($trips->trackingcode) ?></td>
                <td><?= h($trips->adt) ?></td>
                <td><?= h($trips->aat) ?></td>
                <td><?= h($trips->edt) ?></td>
                <td><?= h($trips->eat) ?></td>
                <td><?= h($trips->vehiclecategory_id) ?></td>
                <td><?= h($trips->platform) ?></td>
                <td><?= h($trips->triptype_id) ?></td>
                <td><?= h($trips->softwaretriggered) ?></td>
                <td><?= h($trips->hwtriggered) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trips', 'action' => 'view', $trips->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trips', 'action' => 'edit', $trips->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trips', 'action' => 'delete', $trips->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trips->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
 
        <?php endif; ?>
    </div>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($schedule->locations)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pointdata') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Accesslevel') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Reg Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($schedule->locations as $locations): ?>
            <tr>
                <td><?= h($locations->id) ?></td>
                <td><?= h($locations->pointdata) ?></td>
                <td><?= h($locations->name) ?></td>
                <td><?= h($locations->user_id) ?></td>
                <td><?= h($locations->customer_id) ?></td>
                <td><?= h($locations->accesslevel) ?></td>
                <td><?= h($locations->group_id) ?></td>
                <td><?= h($locations->reg_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $locations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locations', 'action' => 'edit', $locations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locations', 'action' => 'delete', $locations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
 
        <?php endif; ?>
    </div>
</div>
