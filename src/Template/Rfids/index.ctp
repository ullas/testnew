

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    RFID Tags
    <small>The smart tags used for identification</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#"> Hardware</a></li>
    <li class="active">RFID</li>
    
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
          <h3 class="box-title">List of RFID Tags</h3>

          <div class="box-tools pull-right">
            <a href="/rfids/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new RFID</a>
         
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
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('driver_id') ?></th>
                <th><?= $this->Paginator->sort('passenger_id') ?></th>
                <th><?= $this->Paginator->sort('privatekey') ?></th>
                <th><?= $this->Paginator->sort('dateofpurchase') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rfids as $rfid): ?>
            <tr>
                <td><?= $this->Number->format($rfid->id) ?></td>
                <td><?= h($rfid->code) ?></td>
                <td><?= h($rfid->description) ?></td>
                <td><?= $rfid->has('customer') ? $this->Html->link($rfid->customer->name, ['controller' => 'Customers', 'action' => 'view', $rfid->customer->id]) : '' ?></td>
                <td><?= $this->Number->format($rfid->driver_id) ?></td>
                <td><?= $rfid->has('passenger') ? $this->Html->link($rfid->passenger->id, ['controller' => 'Passengers', 'action' => 'view', $rfid->passenger->id]) : '' ?></td>
                <td><?= h($rfid->privatekey) ?></td>
                <td><?= h($rfid->dateofpurchase) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rfid->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rfid->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rfid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfid->id)]) ?>
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

