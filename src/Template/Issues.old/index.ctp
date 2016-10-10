

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Issues 
    <small>Issues  related service and inspections</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Fleet Management</li>
      <li class="active">Issues</li>
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
          <h3 class="box-title">List of Issues</h3>

          <div class="box-tools pull-right">
            <a href="/issues/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Issue</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('reportedon') ?></th>
                <th><?= $this->Paginator->sort('summary') ?></th>
                <th><?= $this->Paginator->sort('odometer') ?></th>
                <th><?= $this->Paginator->sort('reportedby_id') ?></th>
                <th><?= $this->Paginator->sort('assignedto_id') ?></th>
                <th><?= $this->Paginator->sort('tags') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($issues as $issue): ?>
            <tr>
                <td><?= $this->Number->format($issue->id) ?></td>
                <td><?= $issue->has('vehicle') ? $this->Html->link($issue->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $issue->vehicle->id]) : '' ?></td>
                <td><?= h($issue->reportedon) ?></td>
                <td><?= h($issue->summary) ?></td>
                <td><?= $this->Number->format($issue->odometer) ?></td>
                <td><?= $this->Number->format($issue->reportedby_id) ?></td>
                <td><?= $this->Number->format($issue->assignedto_id) ?></td>
                <td><?= h($issue->tags) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $issue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $issue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $issue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issue->id)]) ?>
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



