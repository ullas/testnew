

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Service Entries 
    <small>The log book of your vehicle services</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Fleet Management</li>
      <li class="active">Service Entries</li>
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
          <h3 class="box-title">List of Service Entries</h3>

          <div class="box-tools pull-right">
            <a href="/servicesentries/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Service Entry</a>
         
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
                <th><?= $this->Paginator->sort('odometer') ?></th>
                <th><?= $this->Paginator->sort('refer') ?></th>
                <th><?= $this->Paginator->sort('labour') ?></th>
                <th><?= $this->Paginator->sort('parts') ?></th>
                <th><?= $this->Paginator->sort('tax') ?></th>
                <th><?= $this->Paginator->sort('markasvoid') ?></th>
                <th><?= $this->Paginator->sort('vendor_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicesentries as $servicesentry): ?>
            <tr>
                <td><?= $this->Number->format($servicesentry->id) ?></td>
                <td><?= $servicesentry->has('vehicle') ? $this->Html->link($servicesentry->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $servicesentry->vehicle->id]) : '' ?></td>
                <td><?= $this->Number->format($servicesentry->odometer) ?></td>
                <td><?= h($servicesentry->refer) ?></td>
                <td><?= $this->Number->format($servicesentry->labour) ?></td>
                <td><?= h($servicesentry->parts) ?></td>
                <td><?= $this->Number->format($servicesentry->tax) ?></td>
                <td><?= h($servicesentry->markasvoid) ?></td>
                <td><?= $servicesentry->has('vendor') ? $this->Html->link($servicesentry->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $servicesentry->vendor->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servicesentry->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servicesentry->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servicesentry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicesentry->id)]) ?>
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



