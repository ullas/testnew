<section class="content-header">
  <h1>
     <?= h($orderstate->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/orderstate/"> orderstate</a></li>
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
            <td><?= h($orderstate->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $orderstate->has('customer') ? $this->Html->link($orderstate->customer->name, ['controller' => 'Customers', 'action' => 'view', $orderstate->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderstate->id) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Deiveryorders') ?></h4>
        <?php if (!empty($orderstate->deiveryorders)): ?>
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
            <?php foreach ($orderstate->deiveryorders as $deiveryorders): ?>
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
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Pickupdeiveryorders') ?></h4>
        <?php if (!empty($orderstate->pickupdeiveryorders)): ?>
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
                <th><?= __('Pickupbranch Id') ?></th>
                <th><?= __('Deliveryservicetime') ?></th>
                <th><?= __('Deliverystarttimewindow') ?></th>
                <th><?= __('Deliverydtimewindow') ?></th>
                <th><?= __('Pdtype Id') ?></th>
                <th><?= __('Pdlocationtype Id') ?></th>
                <th><?= __('Pickupaccount Id') ?></th>
                <th><?= __('Retutrnbranch Id') ?></th>
                <th><?= __('Deliverybranch Id') ?></th>
                <th><?= __('Returnaccount Id') ?></th>
                <th><?= __('Pickupservicetime') ?></th>
                <th><?= __('Pickupstarttimewindow') ?></th>
                <th><?= __('Pickuptimewindow') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($orderstate->pickupdeiveryorders as $pickupdeiveryorders): ?>
            <tr>
                <td><?= h($pickupdeiveryorders->id) ?></td>
                <td><?= h($pickupdeiveryorders->orderno) ?></td>
                <td><?= h($pickupdeiveryorders->awbumber) ?></td>
                <td><?= h($pickupdeiveryorders->shipmenttype_id) ?></td>
                <td><?= h($pickupdeiveryorders->orderstate_id) ?></td>
                <td><?= h($pickupdeiveryorders->shipmentorderdate) ?></td>
                <td><?= h($pickupdeiveryorders->distributioncenter_id) ?></td>
                <td><?= h($pickupdeiveryorders->packageweight) ?></td>
                <td><?= h($pickupdeiveryorders->packagevolume) ?></td>
                <td><?= h($pickupdeiveryorders->packagevalue) ?></td>
                <td><?= h($pickupdeiveryorders->paymenttype_id) ?></td>
                <td><?= h($pickupdeiveryorders->pickupdeliverytype_id) ?></td>
                <td><?= h($pickupdeiveryorders->partialdeliveryallowed) ?></td>
                <td><?= h($pickupdeiveryorders->returnallowed) ?></td>
                <td><?= h($pickupdeiveryorders->cancellationallowed) ?></td>
                <td><?= h($pickupdeiveryorders->pickupbranch_id) ?></td>
                <td><?= h($pickupdeiveryorders->deliveryservicetime) ?></td>
                <td><?= h($pickupdeiveryorders->deliverystarttimewindow) ?></td>
                <td><?= h($pickupdeiveryorders->deliverydtimewindow) ?></td>
                <td><?= h($pickupdeiveryorders->pdtype_id) ?></td>
                <td><?= h($pickupdeiveryorders->pdlocationtype_id) ?></td>
                <td><?= h($pickupdeiveryorders->pickupaccount_id) ?></td>
                <td><?= h($pickupdeiveryorders->retutrnbranch_id) ?></td>
                <td><?= h($pickupdeiveryorders->deliverybranch_id) ?></td>
                <td><?= h($pickupdeiveryorders->returnaccount_id) ?></td>
                <td><?= h($pickupdeiveryorders->pickupservicetime) ?></td>
                <td><?= h($pickupdeiveryorders->pickupstarttimewindow) ?></td>
                <td><?= h($pickupdeiveryorders->pickuptimewindow) ?></td>
                <td><?= h($pickupdeiveryorders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pickupdeiveryorders', 'action' => 'view', $pickupdeiveryorders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pickupdeiveryorders', 'action' => 'edit', $pickupdeiveryorders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pickupdeiveryorders', 'action' => 'delete', $pickupdeiveryorders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pickupdeiveryorders->id)]) ?>
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
        <h4><?= __('Related Pickuporders') ?></h4>
        <?php if (!empty($orderstate->pickuporders)): ?>
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
                <th><?= __('Packageweight') ?></th>
                <th><?= __('Packagevolume') ?></th>
                <th><?= __('Packagevalue') ?></th>
                <th><?= __('Paymenttype Id') ?></th>
                <th><?= __('Pickupdeliverytype Id') ?></th>
                <th><?= __('Partialdeliveryallowed') ?></th>
                <th><?= __('Returnallowed') ?></th>
                <th><?= __('Cancellationallowed') ?></th>
                <th><?= __('Distributioncenter Id') ?></th>
                <th><?= __('Pickupdeliverybranch Id') ?></th>
                <th><?= __('Pickupservicetime') ?></th>
                <th><?= __('Pickupstarttimewindow') ?></th>
                <th><?= __('Pickupendtimewindow') ?></th>
                <th><?= __('Pdaacount Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($orderstate->pickuporders as $pickuporders): ?>
            <tr>
                <td><?= h($pickuporders->id) ?></td>
                <td><?= h($pickuporders->orderno) ?></td>
                <td><?= h($pickuporders->awbumber) ?></td>
                <td><?= h($pickuporders->shipmenttype_id) ?></td>
                <td><?= h($pickuporders->orderstate_id) ?></td>
                <td><?= h($pickuporders->shipmentorderdate) ?></td>
                <td><?= h($pickuporders->packageweight) ?></td>
                <td><?= h($pickuporders->packagevolume) ?></td>
                <td><?= h($pickuporders->packagevalue) ?></td>
                <td><?= h($pickuporders->paymenttype_id) ?></td>
                <td><?= h($pickuporders->pickupdeliverytype_id) ?></td>
                <td><?= h($pickuporders->partialdeliveryallowed) ?></td>
                <td><?= h($pickuporders->returnallowed) ?></td>
                <td><?= h($pickuporders->cancellationallowed) ?></td>
                <td><?= h($pickuporders->distributioncenter_id) ?></td>
                <td><?= h($pickuporders->pickupdeliverybranch_id) ?></td>
                <td><?= h($pickuporders->pickupservicetime) ?></td>
                <td><?= h($pickuporders->pickupstarttimewindow) ?></td>
                <td><?= h($pickuporders->pickupendtimewindow) ?></td>
                <td><?= h($pickuporders->pdaacount_id) ?></td>
                <td><?= h($pickuporders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pickuporders', 'action' => 'view', $pickuporders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pickuporders', 'action' => 'edit', $pickuporders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pickuporders', 'action' => 'delete', $pickuporders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pickuporders->id)]) ?>
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
