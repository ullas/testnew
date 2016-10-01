

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Fuel Entries 
    <small>The log book of your fuel expenses</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Fleet Management</li>
      <li class="active">Fuel Entries</li>
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
          <h3 class="box-title">List of Fuel Entries</h3>

          <div class="box-tools pull-right">
            <a href="/fuelentries/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Fuel Entry</a>
         
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
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('odometer') ?></th>
                <th><?= $this->Paginator->sort('priceperusnit') ?></th>
                <th><?= $this->Paginator->sort('fueltype') ?></th>
                <th><?= $this->Paginator->sort('vendor_id') ?></th>
                <th><?= $this->Paginator->sort('ref') ?></th>
                <th><?= $this->Paginator->sort('partialfill') ?></th>
                <th><?= $this->Paginator->sort('markaspersonal') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fuelentries as $fuelentry): ?>
            <tr>
                <td><?= $this->Number->format($fuelentry->id) ?></td>
                <td><?= $fuelentry->has('vehicle') ? $this->Html->link($fuelentry->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $fuelentry->vehicle->id]) : '' ?></td>
                <td><?= h($fuelentry->date) ?></td>
                <td><?= $this->Number->format($fuelentry->odometer) ?></td>
                <td><?= $this->Number->format($fuelentry->priceperusnit) ?></td>
                <td><?= h($fuelentry->fueltype) ?></td>
                <td><?= $this->Number->format($fuelentry->vendor_id) ?></td>
                <td><?= h($fuelentry->ref) ?></td>
                <td><?= h($fuelentry->partialfill) ?></td>
                <td><?= h($fuelentry->markaspersonal) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fuelentry->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fuelentry->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fuelentry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelentry->id)]) ?>
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




