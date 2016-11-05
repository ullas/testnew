<section class="content-header">
  <h1>
     <?= h($devicemodel->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/devicemodel/"> devicemodel</a></li>
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
            <td><?= h($devicemodel->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $devicemodel->has('customer') ? $this->Html->link($devicemodel->customer->name, ['controller' => 'Customers', 'action' => 'view', $devicemodel->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($devicemodel->id) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Devices') ?></h4>
        <?php if (!empty($devicemodel->devices)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Install Date') ?></th>
                <th><?= __('Installed By') ?></th>
                <th><?= __('Certified By') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Provider Id') ?></th>
                <th><?= __('Distance Type') ?></th>
                <th><?= __('Odometersupport') ?></th>
                <th><?= __('Initodometer') ?></th>
                <th><?= __('Devicemodel Id') ?></th>
                <th><?= __('Simcard Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($devicemodel->devices as $devices): ?>
            <tr>
                <td><?= h($devices->id) ?></td>
                <td><?= h($devices->code) ?></td>
                <td><?= h($devices->customer_id) ?></td>
                <td><?= h($devices->install_date) ?></td>
                <td><?= h($devices->installed_by) ?></td>
                <td><?= h($devices->certified_by) ?></td>
                <td><?= h($devices->comments) ?></td>
                <td><?= h($devices->provider_id) ?></td>
                <td><?= h($devices->distance_type) ?></td>
                <td><?= h($devices->odometersupport) ?></td>
                <td><?= h($devices->initodometer) ?></td>
                <td><?= h($devices->devicemodel_id) ?></td>
                <td><?= h($devices->simcard_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Devices', 'action' => 'view', $devices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Devices', 'action' => 'edit', $devices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Devices', 'action' => 'delete', $devices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devices->id)]) ?>
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
