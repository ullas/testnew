<section class="content-header">
  <h1>
     <?= h($worklorderlineitem->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/worklorderlineitem/"> worklorderlineitem</a></li>
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
            <td><?= h($worklorderlineitem->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Workorder') ?></th>
            <td><?= $worklorderlineitem->has('workorder') ? $this->Html->link($worklorderlineitem->workorder->id, ['controller' => 'Workorders', 'action' => 'view', $worklorderlineitem->workorder->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $worklorderlineitem->has('customer') ? $this->Html->link($worklorderlineitem->customer->name, ['controller' => 'Customers', 'action' => 'view', $worklorderlineitem->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($worklorderlineitem->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Workordertype Id') ?></th>
            <td><?= $this->Number->format($worklorderlineitem->workordertype_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Labour') ?></th>
            <td><?= $this->Number->format($worklorderlineitem->labour) ?></td>
        </tr>
        <tr>
            <th><?= __('Parts') ?></th>
            <td><?= $this->Number->format($worklorderlineitem->parts) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
</div>
