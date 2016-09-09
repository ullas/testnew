

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Trips 
    <small>An instance of your schedule</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Trip Management</li>
      <li class="active">Trips</li>
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
          <h3 class="box-title">List of Trips</h3>

          <div class="box-tools pull-right">
            <a href="/trips/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Trip</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                       
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('start_time') ?></th>
                <th><?= $this->Paginator->sort('end_time') ?></th>              
         
                
               
                
                <th><?= $this->Paginator->sort('tripstatus_id') ?></th>
               
                
               
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trips as $trip): ?>
            <tr>
                <td><?= $this->Number->format($trip->id) ?></td>
                <td><?= h($trip->name) ?></td>
                <td><?= h($trip->start_date) ?></td>
                <td><?= $trip->has('vehicle') ? $this->Html->link($trip->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $trip->vehicle->id]) : '' ?></td>
                <td><?= h($trip->start_time) ?></td>
                <td><?= h($trip->end_time) ?></td>
                <td><?= $trip->has('tripstatus') ? $this->Html->link($trip->tripstatus->name, ['controller' => 'Tripstatuses', 'action' => 'view', $trip->tripstatus->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trip->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trip->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?>
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





