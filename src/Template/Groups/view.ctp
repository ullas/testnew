<section class="content-header">
  <h1>
     <?= h($group->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/group/"> group</a></li>
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
            <td><?= h($group->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($group->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $group->has('customer') ? $this->Html->link($group->customer->name, ['controller' => 'Customers', 'action' => 'view', $group->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>
        </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Fences') ?></h4>
        </div>
  		<?php if (!empty($group->fences)): ?>
        <div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Fencedata') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Trackingobject Id') ?></th>
                <th><?= __('Show On Map') ?></th>
                <th><?= __('Alerts On') ?></th>
                <th><?= __('Enter Alert') ?></th>
                <th><?= __('Enter In') ?></th>
                <th><?= __('Leave Alert') ?></th>
                <th><?= __('Leave Out') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Leave Out Time') ?></th>
                <th><?= __('Enter In Time') ?></th>
                <th><?= __('Zonetype Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->fences as $fences): ?>
            <tr>
                <td><?= h($fences->id) ?></td>
                <td><?= h($fences->name) ?></td>
                <td><?= h($fences->user_id) ?></td>
                <td><?= h($fences->fencedata) ?></td>
                <td><?= h($fences->group_id) ?></td>
                <td><?= h($fences->trackingobject_id) ?></td>
                <td><?= h($fences->show_on_map) ?></td>
                <td><?= h($fences->alerts_on) ?></td>
                <td><?= h($fences->enter_alert) ?></td>
                <td><?= h($fences->enter_in) ?></td>
                <td><?= h($fences->leave_alert) ?></td>
                <td><?= h($fences->leave_out) ?></td>
                <td><?= h($fences->customer_id) ?></td>
                <td><?= h($fences->leave_out_time) ?></td>
                <td><?= h($fences->enter_in_time) ?></td>
                <td><?= h($fences->zonetype_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fences', 'action' => 'view', $fences->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fences', 'action' => 'edit', $fences->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fences', 'action' => 'delete', $fences->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fences->id)]) ?>
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
        </div>
  		<?php if (!empty($group->locations)): ?>
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
            <?php foreach ($group->locations as $locations): ?>
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
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Renewalreminders') ?></h4>
        </div>
  		<?php if (!empty($group->renewalreminders)): ?>
        <div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Renewalstype Id') ?></th>
                <th><?= __('Duedate') ?></th>
                <th><?= __('Timethreashold') ?></th>
                <th><?= __('Notificationrequired') ?></th>
                <th><?= __('Distributionlist Id') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->renewalreminders as $renewalreminders): ?>
            <tr>
                <td><?= h($renewalreminders->id) ?></td>
                <td><?= h($renewalreminders->renewalstype_id) ?></td>
                <td><?= h($renewalreminders->duedate) ?></td>
                <td><?= h($renewalreminders->timethreashold) ?></td>
                <td><?= h($renewalreminders->notificationrequired) ?></td>
                <td><?= h($renewalreminders->distributionlist_id) ?></td>
                <td><?= h($renewalreminders->group_id) ?></td>
                <td><?= h($renewalreminders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Renewalreminders', 'action' => 'view', $renewalreminders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Renewalreminders', 'action' => 'edit', $renewalreminders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Renewalreminders', 'action' => 'delete', $renewalreminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renewalreminders->id)]) ?>
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
        <h4><?= __('Related Routes') ?></h4>
        </div>
  		<?php if (!empty($group->routes)): ?>
        <div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Start Point') ?></th>
                <th><?= __('End Point') ?></th>
                <th><?= __('The Geom') ?></th>
                <th><?= __('Trackingobject Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Buffer Size') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Group Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->routes as $routes): ?>
            <tr>
                <td><?= h($routes->id) ?></td>
                <td><?= h($routes->start_point) ?></td>
                <td><?= h($routes->end_point) ?></td>
                <td><?= h($routes->the_geom) ?></td>
                <td><?= h($routes->trackingobject_id) ?></td>
                <td><?= h($routes->customer_id) ?></td>
                <td><?= h($routes->user_id) ?></td>
                <td><?= h($routes->buffer_size) ?></td>
                <td><?= h($routes->name) ?></td>
                <td><?= h($routes->group_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Routes', 'action' => 'view', $routes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Routes', 'action' => 'edit', $routes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Routes', 'action' => 'delete', $routes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routes->id)]) ?>
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
        <h4><?= __('Related Servicereminders') ?></h4>
        </div>
  		<?php if (!empty($group->servicereminders)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Servicetask Id') ?></th>
                <th><?= __('Meterinterval') ?></th>
                <th><?= __('Daysinterval') ?></th>
                <th><?= __('Meterthreshold') ?></th>
                <th><?= __('Timethreashold') ?></th>
                <th><?= __('Notificationrequired') ?></th>
                <th><?= __('Distributionlist Id') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->servicereminders as $servicereminders): ?>
            <tr>
                <td><?= h($servicereminders->id) ?></td>
                <td><?= h($servicereminders->servicetask_id) ?></td>
                <td><?= h($servicereminders->meterinterval) ?></td>
                <td><?= h($servicereminders->daysinterval) ?></td>
                <td><?= h($servicereminders->meterthreshold) ?></td>
                <td><?= h($servicereminders->timethreashold) ?></td>
                <td><?= h($servicereminders->notificationrequired) ?></td>
                <td><?= h($servicereminders->distributionlist_id) ?></td>
                <td><?= h($servicereminders->group_id) ?></td>
                <td><?= h($servicereminders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicereminders', 'action' => 'view', $servicereminders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicereminders', 'action' => 'edit', $servicereminders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicereminders', 'action' => 'delete', $servicereminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicereminders->id)]) ?>
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
        <h4><?= __('Related Trackingobjects') ?></h4>
        </div>
  		<?php if (!empty($group->trackingobjects)): ?>
        <div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Assettype Id') ?></th>
                <th><?= __('Created Date') ?></th>
                <th><?= __('Modifield Date') ?></th>
                <th><?= __('Public Asset') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->trackingobjects as $trackingobjects): ?>
            <tr>
                <td><?= h($trackingobjects->id) ?></td>
                <td><?= h($trackingobjects->name) ?></td>
                <td><?= h($trackingobjects->assettype_id) ?></td>
                <td><?= h($trackingobjects->created_date) ?></td>
                <td><?= h($trackingobjects->modifield_date) ?></td>
                <td><?= h($trackingobjects->public_asset) ?></td>
                <td><?= h($trackingobjects->is_active) ?></td>
                <td><?= h($trackingobjects->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trackingobjects', 'action' => 'view', $trackingobjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trackingobjects', 'action' => 'edit', $trackingobjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trackingobjects', 'action' => 'delete', $trackingobjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trackingobjects->id)]) ?>
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