

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Schedules 
    <small>The time table for your pre-planned trips</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Trip Management</li>
      <li class="active">Schedules</li>
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
          <h3 class="box-title">List of Schedules</h3>

          <div class="box-tools pull-right">
            <a href="/schedules/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Schedule</a>
         
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
                <th><?= $this->Paginator->sort('validfrom') ?></th>
                <th><?= $this->Paginator->sort('validtill') ?></th>
                <th><?= $this->Paginator->sort('startloc_id') ?></th>
                <th><?= $this->Paginator->sort('endloc_id') ?></th>
                <th><?= $this->Paginator->sort('start_time') ?></th>
                <th><?= $this->Paginator->sort('end_time') ?></th>
                <th><?= $this->Paginator->sort('default_driver_id') ?></th>
                <th><?= $this->Paginator->sort('default_veh_id') ?></th>
               
                
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
            <tr>
                <td><?= $this->Number->format($schedule->id) ?></td>
                 <td><?= h($schedule->name) ?></td>
                <td><?= h($schedule->validfrom) ?></td>
                <td><?= h($schedule->validtill) ?></td>
                <td><?= $this->Number->format($schedule->startloc_id) ?></td>
                <td><?= $this->Number->format($schedule->endloc_id) ?></td>
                
                <td><?= h($schedule->start_time) ?></td>
                <td><?= h($schedule->end_time) ?></td>
                <td><?= $this->Number->format($schedule->default_driver_id) ?></td>
                <td><?= $this->Number->format($schedule->default_veh_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $schedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?>
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
