<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  	<li><a href="/assets/"><i class="fa fa-cube"></i> Delivery Orders</a></li>
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
            <th><?= __('orderno') ?></th>
            <td><?= h($deiveryorder->orderno) ?></td>
        </tr>
        <tr>
            <th><?= __('awbumber') ?></th>
            <td><?= h($deiveryorder->awbumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Shipment type') ?></th>
            <td><?= $deiveryorder->has('shipmenttype') ? $this->Html->link($deiveryorder->shipmenttype->name, ['controller' => 'Shipmenttypes', 'action' => 'view', $deiveryorder->shipmenttype->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Order State') ?></th>
            <td><?= $deiveryorder->has('orderstate') ? $this->Html->link($deiveryorder->orderstate->name, ['controller' => 'Orderstates', 'action' => 'view', $deiveryorder->orderstate->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('shipmentorderdate') ?></th>
            <td><?= h($deiveryorder->shipmentorderdate) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Distribution Center') ?></th>
            <td><?= $deiveryorder->has('distributioncenter') ? $this->Html->link($deiveryorder->distributioncenter->name, ['controller' => 'Distributioncenteres', 'action' => 'view', $deiveryorder->distributioncenter->id]) : '' ?></td>
        </tr>
        
        
        
       
   </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
