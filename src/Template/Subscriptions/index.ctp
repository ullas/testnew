

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Subscriptions 
    <small>Customised monitor for the trip</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Trip Management</li>
      <li class="active">Subscriptions</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">


  
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-12">
      
      
     
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">List of Subscriptions</h3>

          <div class="box-tools pull-right">
            <a href="/subscriptions/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Subscriptions</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('schedule_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('validfrom') ?></th>
                <th><?= $this->Paginator->sort('validtill') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('notification_id') ?></th>
                <th><?= $this->Paginator->sort('loctype') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subscriptions as $subscription): ?>
            <tr>
                <td><?= $this->Number->format($subscription->id) ?></td>
                <td><?= $subscription->has('schedule') ? $this->Html->link($subscription->schedule->name, ['controller' => 'Schedules', 'action' => 'view', $subscription->schedule->id]) : '' ?></td>
                <td><?= $subscription->has('customer') ? $this->Html->link($subscription->customer->name, ['controller' => 'Customers', 'action' => 'view', $subscription->customer->id]) : '' ?></td>
                <td><?= h($subscription->name) ?></td>
                <td><?= h($subscription->active) ?></td>
                <td><?= h($subscription->validfrom) ?></td>
                <td><?= h($subscription->validtill) ?></td>
                <td><?= $subscription->has('location') ? $this->Html->link($subscription->location->name, ['controller' => 'Locations', 'action' => 'view', $subscription->location->id]) : '' ?></td>
                <td><?= $this->Number->format($subscription->notification_id) ?></td>
                <td><?= h($subscription->loctype) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subscription->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subscription->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
      </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <div class="paginator">
        <ul class="pagination pagination-sm no-margin pull-right">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>	
         
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

   
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->


