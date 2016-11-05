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
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($trip->name) ?></td>
        </tr>
        <!-- <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $trip->has('customer') ? $this->Html->link($trip->customer->name, ['controller' => 'Customers', 'action' => 'view', $trip->customer->id]) : '' ?></td>
        </tr> -->
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $trip->has('vehicle') ? $this->Html->link($trip->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $trip->vehicle->id]) : '' ?></td>
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
            <th><?= __('Startpoint') ?></th>
            <td><?= $trip->has('startpoint') ? $this->Html->link($trip->startpoint->name, ['controller' => 'Locations', 'action' => 'view', $trip->startpoint->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Endpoint') ?></th>
            <td><?= $trip->has('endpoint') ? $this->Html->link($trip->endpoint->name, ['controller' => 'Locations', 'action' => 'view', $trip->endpoint->id]) : '' ?></td>
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
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($trip->id) ?></td>
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
            <th><?= __('From Schedule') ?></th>
            <td><?= $trip->fromschedule ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
  </div>
  </section>
