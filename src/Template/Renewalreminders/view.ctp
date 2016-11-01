<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Reminders</a></li>
     <li><a href="/renewalreminders/"> Renewal Reminders</a></li>
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
            <th><?= __('Distribution List') ?></th>
            <td><?= $renewalreminder->has('distributionlist') ? $this->Html->link($renewalreminder->distributionlist->name, ['controller' => 'Distributionlists', 'action' => 'view', $renewalreminder->distributionlist->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Group') ?></th>
            <td><?= $renewalreminder->has('group') ? $this->Html->link($renewalreminder->group->name, ['controller' => 'Groups', 'action' => 'view', $renewalreminder->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $renewalreminder->has('customer') ? $this->Html->link($renewalreminder->customer->name, ['controller' => 'Customers', 'action' => 'view', $renewalreminder->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($renewalreminder->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Renewal Type Id') ?></th>
            <td><?= $this->Number->format($renewalreminder->renewalstype_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Due Date') ?></th>
            <td><?= $this->Number->format($renewalreminder->duedate) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Threshold') ?></th>
            <td><?= $this->Number->format($renewalreminder->timethreashold) ?></td>
        </tr>
        <tr>
            <th><?= __('Notification Required') ?></th>
            <td><?= $renewalreminder->notificationrequired ? __('Yes') : __('No'); ?></td>
        </tr>
   </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>

