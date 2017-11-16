<section class="content-header">
  <h1>
     <?= h($trip->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/trips/"> Trips</a></li>
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
            <th><?= __('Name') ?></th>
            <td><?= h($trip->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $trip->has('customer') ? $this->Html->link($trip->customer->name, ['controller' => 'Customers', 'action' => 'view', $trip->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $trip->has('vehicle') ? $this->Html->link($trip->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $trip->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Timepolicy') ?></th>
            <td><?= $trip->has('timepolicy') ? $this->Html->link($trip->timepolicy->name, ['controller' => 'Timepolicies', 'action' => 'view', $trip->timepolicy->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Route') ?></th>
            <td><?= $trip->has('route') ? $this->Html->link($trip->route->name, ['controller' => 'Routes', 'action' => 'view', $trip->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Schedule') ?></th>
            <td><?= $trip->has('schedule') ? $this->Html->link($trip->schedule->name, ['controller' => 'Schedules', 'action' => 'view', $trip->schedule->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tripstatus') ?></th>
            <td><?= $trip->has('tripstatus') ? $this->Html->link($trip->tripstatus->name, ['controller' => 'Tripstatuses', 'action' => 'view', $trip->tripstatus->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Last Location') ?></th>
            <td><?= h($trip->last_location) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehiclecategory') ?></th>
            <td><?= $trip->has('vehiclecategory') ? $this->Html->link($trip->vehiclecategory->name, ['controller' => 'Vehiclecategories', 'action' => 'view', $trip->vehiclecategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Triptype') ?></th>
            <td><?= $trip->has('triptype') ? $this->Html->link($trip->triptype->name, ['controller' => 'Triptypes', 'action' => 'view', $trip->triptype->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($trip->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Startpoint Id') ?></th>
            <td><?= $this->Number->format($trip->startpoint_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Endpoint Id') ?></th>
            <td><?= $this->Number->format($trip->endpoint_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Trackingcode') ?></th>
            <td><?= $this->Number->format($trip->trackingcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Platform') ?></th>
            <td><?= $this->Number->format($trip->platform) ?></td>
        </tr>
        <tr>
            <th><?= __('Completedstops') ?></th>
            <td><?= $this->Number->format($trip->completedstops) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($trip->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($trip->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($trip->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($trip->end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Adt') ?></th>
            <td><?= h($trip->adt) ?></td>
        </tr>
        <tr>
            <th><?= __('Aat') ?></th>
            <td><?= h($trip->aat) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt') ?></th>
            <td><?= h($trip->edt) ?></td>
        </tr>
        <tr>
            <th><?= __('Eat') ?></th>
            <td><?= h($trip->eat) ?></td>
        </tr>
        <tr>
            <th><?= __('Autogen') ?></th>
            <td><?= $trip->autogen ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Canceled') ?></th>
            <td><?= $trip->canceled ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $trip->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Fromschedule') ?></th>
            <td><?= $trip->fromschedule ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Softwaretriggered') ?></th>
            <td><?= $trip->softwaretriggered ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Hwtriggered') ?></th>
            <td><?= $trip->hwtriggered ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Locations') ?></h4>
        </div>
        <?php if (!empty($trip->locations)): ?>
        <div class="box-body">
        <table class='table table-hover'>
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
            <?php foreach ($trip->locations as $locations): ?>
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
</section>
