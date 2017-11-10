<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Fleet Management</a></li>
    <li><a href="/issues/"> Issues</a></li>
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
            <th><?= __('Service Entry') ?></th>
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
            <th><?= __('Reported By') ?></th>
            <td><?= $this->Number->format($issue->reportedby_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Overdue Odometer') ?></th>
            <td><?= $this->Number->format($issue->overdueodometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Reported on') ?></th>
            <td><?= h($issue->reportedon) ?></td>
        </tr>
        <tr>
            <th><?= __('Due Date') ?></th>
            <td><?= h($issue->duedate) ?></td>
        </tr>
        <tr>
            <th><?= __('Mark As Void') ?></th>
            <td><?= $issue->markasvoid ? __('Yes') : __('No'); ?></td>
        </tr>
         <tr>
            <th><?= __('Description') ?></th>
            <td><?= $this->Text->autoParagraph(h($issue->description)); ?></td>
        </tr>
        </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div>
</section>
