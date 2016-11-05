<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Trip Management</a></li>
    <li><a href="/servicesentries/"> Schedules</a></li>
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
            <th><?= __('Schedule') ?></th>
            <td><?= $subscription->has('schedule') ? $this->Html->link($subscription->schedule->name, ['controller' => 'Schedules', 'action' => 'view', $subscription->schedule->id]) : '' ?></td>
        </tr>
        <!-- <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $subscription->has('customer') ? $this->Html->link($subscription->customer->name, ['controller' => 'Customers', 'action' => 'view', $subscription->customer->id]) : '' ?></td>
        </tr> -->
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($subscription->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $subscription->has('location') ? $this->Html->link($subscription->location->name, ['controller' => 'Locations', 'action' => 'view', $subscription->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Loctype') ?></th>
            <td><?= h($subscription->loctype) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($subscription->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Notification Id') ?></th>
            <td><?= $this->Number->format($subscription->notification_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Validfrom') ?></th>
            <td><?= h($subscription->validfrom) ?></td>
        </tr>
        <tr>
            <th><?= __('Validtill') ?></th>
            <td><?= h($subscription->validtill) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $subscription->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div><!-- box -->
  
  </div><!-- col12-->
  </div>
  </section>
