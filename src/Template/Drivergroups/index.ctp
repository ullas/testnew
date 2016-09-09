

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Driver Groups 
    <small>A named group of drivers in the organisation</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#"> Groups</a></li>
    <li class="active">Driver Groups</li>
    
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
          <h3 class="box-title">List of Drivers</h3>

          <div class="box-tools pull-right">
            <a href="/drivergroups/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Driver Group</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('defaultdriver_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($drivergroups as $drivergroup): ?>
            <tr>
                <td><?= $this->Number->format($drivergroup->id) ?></td>
                <td><?= h($drivergroup->name) ?></td>
                <td><?= h($drivergroup->description) ?></td>
                <td><?= $drivergroup->has('defaultdriver') ? $this->Html->link($drivergroup->defaultdriver->id, ['controller' => 'Drivers', 'action' => 'view', $drivergroup->defaultdriver->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $drivergroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $drivergroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $drivergroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drivergroup->id)]) ?>
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
            <?= $this->Paginator->prev('' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' ') ?>
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