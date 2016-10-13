<section class="content-header">
  <h1>
     <?= h($inspection->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/inspection/"> inspection</a></li>
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
            <td><?= h($inspection->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Descriptions') ?></th>
            <td><?= h($inspection->descriptions) ?></td>
        </tr>
        <tr>
            <th><?= __('Inspectionfom') ?></th>
            <td><?= $inspection->has('inspectionfom') ? $this->Html->link($inspection->inspectionfom->name, ['controller' => 'Inspectionfoms', 'action' => 'view', $inspection->inspectionfom->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $inspection->has('customer') ? $this->Html->link($inspection->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspection->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Inspectionstatus') ?></th>
            <td><?= $inspection->has('inspectionstatus') ? $this->Html->link($inspection->inspectionstatus->name, ['controller' => 'Inspectionstatuses', 'action' => 'view', $inspection->inspectionstatus->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $inspection->has('vehicle') ? $this->Html->link($inspection->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $inspection->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inspection->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($inspection->date) ?></td>
        </tr>
       </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
