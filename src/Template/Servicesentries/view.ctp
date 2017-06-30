<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Fleet Management</a></li>
    <li><a href="/servicesentries/"> Service Entries</a></li>
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
            <th><?= __('Reference') ?></th>
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
        <!-- <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $servicesentry->has('customer') ? $this->Html->link($servicesentry->customer->name, ['controller' => 'Customers', 'action' => 'view', $servicesentry->customer->id]) : '' ?></td>
        </tr> -->
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($servicesentry->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicesentry->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
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
            <th><?= __('Date Of Service') ?></th>
            <td><?= h($servicesentry->dateofservice) ?></td>
        </tr>
        <tr>
            <th><?= __('Mark As Void') ?></th>
            <td><?= $servicesentry->markasvoid ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td> <?= $this->Text->autoParagraph(h($servicesentry->comments)); ?></td>
        </tr>
        </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
  </div>
  
  	    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Services Completed') ?></h4>
        <?php if (!empty($servicesentry->servicetasks)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                
            </tr>
            <?php foreach ($servicesentry->servicetasks as $servicetasks): ?>
            <tr>
                
                <td><?= h($servicetasks->name) ?></td>
                <td><?= h($servicetasks->description) ?></td>
                <!-- <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicetasks', 'action' => 'view', $servicetasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicetasks', 'action' => 'edit', $servicetasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicetasks', 'action' => 'delete', $servicetasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicetasks->id)]) ?>
                </td> -->
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
        <h4><?= __('Issues Solved') ?></h4>
        <?php if (!empty($servicesentry->issues)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                
            </tr>
            <?php foreach ($servicesentry->issues as $issues): ?>
            <tr>
                
                <td><?= h($issues->summary) ?></td>
                <td><?= h($issues->description) ?></td>
                <!-- <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicetasks', 'action' => 'view', $servicetasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicetasks', 'action' => 'edit', $servicetasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicetasks', 'action' => 'delete', $servicetasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicetasks->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </table>
        </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
 
        <?php endif; ?>
    </div>
  
  </section>
  
  
