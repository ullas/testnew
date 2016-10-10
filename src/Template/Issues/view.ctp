<section class="content-header">
  <h1>
     <?= h($issue->id) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/issue/"> issue</a></li>
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
            <td><?= $issue->has('vehicle') ? $this->Html->link($issue->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $issue->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Summary') ?></th>
            <td><?= h($issue->summary) ?></td>
        </tr>
        <tr>
            <th><?= __('Tags') ?></th>
            <td><?= h($issue->tags) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $issue->has('customer') ? $this->Html->link($issue->customer->name, ['controller' => 'Customers', 'action' => 'view', $issue->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Workorder') ?></th>
            <td><?= $issue->has('workorder') ? $this->Html->link($issue->workorder->id, ['controller' => 'Workorders', 'action' => 'view', $issue->workorder->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Servicesentry') ?></th>
            <td><?= $issue->has('servicesentry') ? $this->Html->link($issue->servicesentry->id, ['controller' => 'Servicesentries', 'action' => 'view', $issue->servicesentry->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($issue->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($issue->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Reportedby Id') ?></th>
            <td><?= $this->Number->format($issue->reportedby_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Overdueodometer') ?></th>
            <td><?= $this->Number->format($issue->overdueodometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Reportedon') ?></th>
            <td><?= h($issue->reportedon) ?></td>
        </tr>
        <tr>
            <th><?= __('Duedate') ?></th>
            <td><?= h($issue->duedate) ?></td>
        </tr>
        <tr>
            <th><?= __('Markasvoid') ?></th>
            <td><?= $issue->markasvoid ? __('Yes') : __('No'); ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
    <div class="row">
    	<div class="col-md-12">
  	
  	    <div class="box box-primary"><div class="box-body">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($issue->description)); ?>
       </div></div></div>
    </div>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Issuedocuments') ?></h4>
        <?php if (!empty($issue->issuedocuments)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Issue Id') ?></th>
                <th><?= __('Docs') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($issue->issuedocuments as $issuedocuments): ?>
            <tr>
                <td><?= h($issuedocuments->id) ?></td>
                <td><?= h($issuedocuments->name) ?></td>
                <td><?= h($issuedocuments->issue_id) ?></td>
                <td><?= h($issuedocuments->docs) ?></td>
                <td><?= h($issuedocuments->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Issuedocuments', 'action' => 'view', $issuedocuments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Issuedocuments', 'action' => 'edit', $issuedocuments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Issuedocuments', 'action' => 'delete', $issuedocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issuedocuments->id)]) ?>
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
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($issue->addresses)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Designation') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Mobile') ?></th>
                <th><?= __('Apartment') ?></th>
                <th><?= __('Streetname') ?></th>
                <th><?= __('Landmark') ?></th>
                <th><?= __('Areaname') ?></th>
                <th><?= __('Countryshortcode') ?></th>
                <th><?= __('Stateshortcode') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Pincode') ?></th>
                <th><?= __('Iscurrentaddress') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($issue->addresses as $addresses): ?>
            <tr>
                <td><?= h($addresses->id) ?></td>
                <td><?= h($addresses->name) ?></td>
                <td><?= h($addresses->designation) ?></td>
                <td><?= h($addresses->email) ?></td>
                <td><?= h($addresses->customer_id) ?></td>
                <td><?= h($addresses->mobile) ?></td>
                <td><?= h($addresses->apartment) ?></td>
                <td><?= h($addresses->streetname) ?></td>
                <td><?= h($addresses->landmark) ?></td>
                <td><?= h($addresses->areaname) ?></td>
                <td><?= h($addresses->countryshortcode) ?></td>
                <td><?= h($addresses->stateshortcode) ?></td>
                <td><?= h($addresses->city) ?></td>
                <td><?= h($addresses->pincode) ?></td>
                <td><?= h($addresses->iscurrentaddress) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
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
