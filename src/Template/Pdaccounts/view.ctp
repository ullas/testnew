<section class="content-header">
  <h1>
     <?= h($pdaccount->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/pdaccount/"> pdaccount</a></li>
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
            <td><?= h($pdaccount->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($pdaccount->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($pdaccount->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Aprtment') ?></th>
            <td><?= h($pdaccount->aprtment) ?></td>
        </tr>
        <tr>
            <th><?= __('Street') ?></th>
            <td><?= h($pdaccount->street) ?></td>
        </tr>
        <tr>
            <th><?= __('Landmark') ?></th>
            <td><?= h($pdaccount->landmark) ?></td>
        </tr>
        <tr>
            <th><?= __('Locality') ?></th>
            <td><?= h($pdaccount->locality) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($pdaccount->city) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($pdaccount->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($pdaccount->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Pincode') ?></th>
            <td><?= h($pdaccount->pincode) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $pdaccount->has('customer') ? $this->Html->link($pdaccount->customer->name, ['controller' => 'Customers', 'action' => 'view', $pdaccount->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pdaccount->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= $this->Number->format($pdaccount->code) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Deiveryorders') ?></h4>
        <?php if (!empty($pdaccount->deiveryorders)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Orderno') ?></th>
                <th><?= __('Awbumber') ?></th>
                <th><?= __('Shipmenttype Id') ?></th>
                <th><?= __('Orderstate Id') ?></th>
                <th><?= __('Shipmentorderdate') ?></th>
                <th><?= __('Distributioncenter Id') ?></th>
                <th><?= __('Packageweight') ?></th>
                <th><?= __('Packagevolume') ?></th>
                <th><?= __('Packagevalue') ?></th>
                <th><?= __('Paymenttype Id') ?></th>
                <th><?= __('Pickupdeliverytype Id') ?></th>
                <th><?= __('Partialdeliveryallowed') ?></th>
                <th><?= __('Returnallowed') ?></th>
                <th><?= __('Cancellationallowed') ?></th>
                <th><?= __('Pickupdeliverybranch Id') ?></th>
                <th><?= __('Deliveryservicetime') ?></th>
                <th><?= __('Deliverystarttimewindow') ?></th>
                <th><?= __('Deliverydtimewindow') ?></th>
                <th><?= __('Pdlocationtype Id') ?></th>
                <th><?= __('Pdaccount Id') ?></th>
                <th><?= __('Returnbranch Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pdaccount->deiveryorders as $deiveryorders): ?>
            <tr>
                <td><?= h($deiveryorders->id) ?></td>
                <td><?= h($deiveryorders->orderno) ?></td>
                <td><?= h($deiveryorders->awbumber) ?></td>
                <td><?= h($deiveryorders->shipmenttype_id) ?></td>
                <td><?= h($deiveryorders->orderstate_id) ?></td>
                <td><?= h($deiveryorders->shipmentorderdate) ?></td>
                <td><?= h($deiveryorders->distributioncenter_id) ?></td>
                <td><?= h($deiveryorders->packageweight) ?></td>
                <td><?= h($deiveryorders->packagevolume) ?></td>
                <td><?= h($deiveryorders->packagevalue) ?></td>
                <td><?= h($deiveryorders->paymenttype_id) ?></td>
                <td><?= h($deiveryorders->pickupdeliverytype_id) ?></td>
                <td><?= h($deiveryorders->partialdeliveryallowed) ?></td>
                <td><?= h($deiveryorders->returnallowed) ?></td>
                <td><?= h($deiveryorders->cancellationallowed) ?></td>
                <td><?= h($deiveryorders->pickupdeliverybranch_id) ?></td>
                <td><?= h($deiveryorders->deliveryservicetime) ?></td>
                <td><?= h($deiveryorders->deliverystarttimewindow) ?></td>
                <td><?= h($deiveryorders->deliverydtimewindow) ?></td>
                <td><?= h($deiveryorders->pdlocationtype_id) ?></td>
                <td><?= h($deiveryorders->pdaccount_id) ?></td>
                <td><?= h($deiveryorders->returnbranch_id) ?></td>
                <td><?= h($deiveryorders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Deiveryorders', 'action' => 'view', $deiveryorders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Deiveryorders', 'action' => 'edit', $deiveryorders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deiveryorders', 'action' => 'delete', $deiveryorders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deiveryorders->id)]) ?>
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
