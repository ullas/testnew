

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Parts 
    <small>Vehicle parts management</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Fleet Management</li>
      <li class="active">Parts</li>
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
          <h3 class="box-title">List of Parts</h3>

          <div class="box-tools pull-right">
            <a href="/parts/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Part</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('partno') ?></th>
                <th><?= $this->Paginator->sort('partcategory_id') ?></th>
                <th><?= $this->Paginator->sort('manufacturer_id') ?></th>
                <th><?= $this->Paginator->sort('manufacturerpartno') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('measurementunit_id') ?></th>
                <th><?= $this->Paginator->sort('upc') ?></th>
                <th><?= $this->Paginator->sort('cost') ?></th>
                <th><?= $this->Paginator->sort('station_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parts as $part): ?>
            <tr>
                <td><?= $this->Number->format($part->id) ?></td>
                <td><?= h($part->partno) ?></td>
                <td><?= $part->has('partcategory') ? $this->Html->link($part->partcategory->name, ['controller' => 'Partcategories', 'action' => 'view', $part->partcategory->id]) : '' ?></td>
                <td><?= $part->has('manufacturer') ? $this->Html->link($part->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $part->manufacturer->id]) : '' ?></td>
                <td><?= h($part->manufacturerpartno) ?></td>
                <td><?= h($part->description) ?></td>
                <td><?= $part->has('measurementunit') ? $this->Html->link($part->measurementunit->name, ['controller' => 'Measurementunits', 'action' => 'view', $part->measurementunit->id]) : '' ?></td>
                <td><?= $this->Number->format($part->upc) ?></td>
                <td><?= $this->Number->format($part->cost) ?></td>
                <td><?= $part->has('station') ? $this->Html->link($part->station->name, ['controller' => 'Stations', 'action' => 'view', $part->station->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $part->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $part->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $part->id], ['confirm' => __('Are you sure you want to delete # {0}?', $part->id)]) ?>
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



