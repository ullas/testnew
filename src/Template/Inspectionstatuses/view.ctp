<section class="content-header">
  <h1>
     <?= h($inspectionstatus->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/inspectionstatus/"> inspectionstatus</a></li>
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
            <td><?= h($inspectionstatus->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $inspectionstatus->has('customer') ? $this->Html->link($inspectionstatus->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspectionstatus->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inspectionstatus->id) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Inspections') ?></h4>
        <?php if (!empty($inspectionstatus->inspections)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Descriptions') ?></th>
                <th><?= __('Inspectionfom Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Inspectionstatus Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($inspectionstatus->inspections as $inspections): ?>
            <tr>
                <td><?= h($inspections->id) ?></td>
                <td><?= h($inspections->name) ?></td>
                <td><?= h($inspections->descriptions) ?></td>
                <td><?= h($inspections->inspectionfom_id) ?></td>
                <td><?= h($inspections->customer_id) ?></td>
                <td><?= h($inspections->date) ?></td>
                <td><?= h($inspections->inspectionstatus_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Inspections', 'action' => 'view', $inspections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Inspections', 'action' => 'edit', $inspections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inspections', 'action' => 'delete', $inspections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspections->id)]) ?>
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
