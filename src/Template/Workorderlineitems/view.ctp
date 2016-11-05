<section class="content-header">
  <h1>
     <?= h($workorderlineitem->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/workorderlineitem/"> workorderlineitem</a></li>
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
            <td><?= h($workorderlineitem->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Workorder') ?></th>
            <td><?= $workorderlineitem->has('workorder') ? $this->Html->link($workorderlineitem->workorder->id, ['controller' => 'Workorders', 'action' => 'view', $workorderlineitem->workorder->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $workorderlineitem->has('customer') ? $this->Html->link($workorderlineitem->customer->name, ['controller' => 'Customers', 'action' => 'view', $workorderlineitem->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($workorderlineitem->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Workordertype Id') ?></th>
            <td><?= $this->Number->format($workorderlineitem->workordertype_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Labour') ?></th>
            <td><?= $this->Number->format($workorderlineitem->labour) ?></td>
        </tr>
        <tr>
            <th><?= __('Parts') ?></th>
            <td><?= $this->Number->format($workorderlineitem->parts) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
</div>
