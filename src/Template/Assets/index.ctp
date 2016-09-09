

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Assets 
    <small>Stationary or moving items tracked other than vehicle or people</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Tracking Items</a></li>
    <li class="active">Asset</li>
    
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
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <a href="/assets/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Asset</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('trackingobject_id',['label'=>'Name']) ?></th>
                <th><?= $this->Paginator->sort('assettype_id') ?></th>
                <th><?= $this->Paginator->sort('location') ?></th>
                <th><?= $this->Paginator->sort('isstationary') ?></th>
                <th><?= $this->Paginator->sort('symbol_id') ?></th>
                <th><?= $this->Paginator->sort('department_id') ?></th>
                <th><?= $this->Paginator->sort('station_id') ?></th>
                <th><?= $this->Paginator->sort('purpose_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assets as $asset): ?>
            <tr>
                <td><?= $this->Number->format($asset->id) ?></td>
                
                <td><?= h($asset->trackingobject->name) ?></td>
                <td><?= $asset->has('assettype') ? $this->Html->link($asset->assettype->name, ['controller' => 'Assettypes', 'action' => 'view', $asset->assettype->id]) : '' ?></td>
                <td><?= h($asset->location) ?></td>
                <td><?= h($asset->isstationary) ?></td>
                <td><?= $asset->has('symbol') ? $this->Html->link($asset->symbol->name, ['controller' => 'Symbols', 'action' => 'view', $asset->symbol->id]) : '' ?></td>
                <td><?= $asset->has('department') ? $this->Html->link($asset->department->name, ['controller' => 'Departments', 'action' => 'view', $asset->department->id]) : '' ?></td>
                <td><?= $asset->has('station') ? $this->Html->link($asset->station->name, ['controller' => 'Stations', 'action' => 'view', $asset->station->id]) : '' ?></td>
                <td><?= $asset->has('purpose') ? $this->Html->link($asset->purpose->name, ['controller' => 'Purposes', 'action' => 'view', $asset->purpose->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $asset->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $asset->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $asset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asset->id)]) ?>
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
