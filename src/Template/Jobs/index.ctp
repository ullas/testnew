

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Jobs 
    <small>Assigned work for your staff</small>
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
          <h3 class="box-title">List of Jobs</h3>

          <div class="box-tools pull-right">
            <a href="/jobs/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Job</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('jobdate',['label'=>'Date']) ?></th>
                <th><?= $this->Paginator->sort('trackingobject_id',['label'=>'Tracker']) ?></th>
                <th><?= $this->Paginator->sort('assigned_by') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
               
                <th><?= $this->Paginator->sort('jobtime') ?></th>
               
                
                <th><?= $this->Paginator->sort('endcustomername',['label'=>'Client']) ?></th>
                
                
               
               
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= $this->Number->format($job->id) ?></td>
                <td><?= h($job->jobdate) ?></td>
                <td><?= $job->has('trackingobject') ? $this->Html->link($job->trackingobject->name, ['controller' => 'Trackingobjects', 'action' => 'view', $job->trackingobject->id]) : '' ?></td>
                <td><?= h($job->assigned_by) ?></td>
                <td><?= h($job->title) ?></td>
                
                <td><?= h($job->jobtime) ?></td>
                
                
                <td><?= h($job->endcustomername) ?></td>
               
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
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


