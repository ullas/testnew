

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Devices 
    <small>The monitoring device installed in the vehicle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#"> Hardware</a></li>
    <li class="active">Devices</li>
    
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
          <h3 class="box-title">List of Devices</h3>

          <div class="box-tools pull-right">
            <a href="/devices/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Device</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>             
                <th><?= $this->Paginator->sort('install_date') ?></th>               
                
                <th><?= $this->Paginator->sort('provider_id') ?></th>
                <th><?= $this->Paginator->sort('distance_type') ?></th>
                <th><?= $this->Paginator->sort('odometersupport',['label'=>'Internal Odometer']) ?></th>
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($devices as $device): ?>
            <tr>
                <td><?= $this->Number->format($device->id) ?></td>
                <td><?= h($device->code) ?></td>
                <td><?= h($device->install_date) ?></td>
                
                <td><?= $device->has('provider') ? $this->Html->link($device->provider->name, ['controller' => 'Providers', 'action' => 'view', $device->provider->id]) : '' ?></td>
                <td><?= $this->Number->format($device->distance_type) ?></td>
                <td><?= h($device->odometersupport) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $device->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $device->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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


