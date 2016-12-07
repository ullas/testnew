<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Reminders</a></li>
     <li><a href="/servicereminders/"> Service Reminders</a></li>
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
            <td><?= $servicereminder->has('distributionlist') ? $this->Html->link($servicereminder->distributionlist->name, ['controller' => 'Distributionlists', 'action' => 'view', $servicereminder->distributionlist->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Group') ?></th>
            <td><?= $servicereminder->has('group') ? $this->Html->link($servicereminder->group->name, ['controller' => 'Groups', 'action' => 'view', $servicereminder->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Service Task Id') ?></th>
            <td><?= $this->Number->format($servicereminder->servicetask_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Meter Interval') ?></th>
            <td><?= $this->Number->format($servicereminder->meterinterval) ?></td>
        </tr>
        <tr>
            <th><?= __('Days Interval') ?></th>
            <td><?= $this->Number->format($servicereminder->daysinterval) ?></td>
        </tr>
        <tr>
            <th><?= __('Meter Threshold') ?></th>
            <td><?= $this->Number->format($servicereminder->meterthreshold) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Threshold') ?></th>
            <td><?= $this->Number->format($servicereminder->timethreashold) ?></td>
        </tr>
        <tr>
            <th><?= __('Notification Required') ?></th>
            <td><?= $servicereminder->notificationrequired ? __('Yes') : __('No'); ?></td>
        </tr>
      </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
