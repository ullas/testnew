<section class="content-header">
  <h1>
     <?= h($servicesentry->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/servicesentries/"> servicesentries</a></li>
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
            <th><?= __('Vehicle') ?></th>
            <td><?= $servicesentry->has('vehicle') ? $this->Html->link($servicesentry->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $servicesentry->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Refer') ?></th>
            <td><?= h($servicesentry->refer) ?></td>
        </tr>
        <tr>
            <th><?= __('Parts') ?></th>
            <td><?= h($servicesentry->parts) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= $servicesentry->has('vendor') ? $this->Html->link($servicesentry->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $servicesentry->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $servicesentry->has('customer') ? $this->Html->link($servicesentry->customer->name, ['controller' => 'Customers', 'action' => 'view', $servicesentry->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($servicesentry->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicesentry->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odo') ?></th>
            <td><?= $this->Number->format($servicesentry->odo) ?></td>
        </tr>
        <tr>
            <th><?= __('Labour') ?></th>
            <td><?= $this->Number->format($servicesentry->labour) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax') ?></th>
            <td><?= $this->Number->format($servicesentry->tax) ?></td>
        </tr>
        <tr>
            <th><?= __('Dateofservice') ?></th>
            <td><?= h($servicesentry->dateofservice) ?></td>
        </tr>
        <tr>
            <th><?= __('Markasvoid') ?></th>
            <td><?= $servicesentry->markasvoid ? __('Yes') : __('No'); ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
    <div class="row">
    	<div class="col-md-12">
  	
  	    <div class="box box-primary"><div class="box-body">
        <h4><?= __('Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($servicesentry->comments)); ?>
       </div></div></div>
    </div>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Servicecompleted') ?></h4>
        <?php if (!empty($servicesentry->servicecompleted)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Servicesentry Id') ?></th>
                <th><?= __('Servicescompleted') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($servicesentry->servicecompleted as $servicecompleted): ?>
            <tr>
                <td><?= h($servicecompleted->id) ?></td>
                <td><?= h($servicecompleted->servicesentry_id) ?></td>
                <td><?= h($servicecompleted->servicescompleted) ?></td>
                <td><?= h($servicecompleted->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicecompleted', 'action' => 'view', $servicecompleted->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicecompleted', 'action' => 'edit', $servicecompleted->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicecompleted', 'action' => 'delete', $servicecompleted->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicecompleted->id)]) ?>
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
        <h4><?= __('Related Servicedocuments') ?></h4>
        <?php if (!empty($servicesentry->servicedocuments)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Servicesentry Id') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($servicesentry->servicedocuments as $servicedocuments): ?>
            <tr>
                <td><?= h($servicedocuments->id) ?></td>
                <td><?= h($servicedocuments->servicesentry_id) ?></td>
                <td><?= h($servicedocuments->data) ?></td>
                <td><?= h($servicedocuments->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicedocuments', 'action' => 'view', $servicedocuments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicedocuments', 'action' => 'edit', $servicedocuments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicedocuments', 'action' => 'delete', $servicedocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicedocuments->id)]) ?>
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
