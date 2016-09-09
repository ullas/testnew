

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Drivers 
    <small>Details of the drives in your organisation</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#"> Fleet Management</a></li>
    <li class="active">Drivers</li>
    
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
            <a href="/drivers/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Driver</a>
         
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
                <th><?= $this->Paginator->sort('middlename') ?></th>
                <th><?= $this->Paginator->sort('lastname') ?></th>
                <th><?= $this->Paginator->sort('dob') ?></th>
                <th><?= $this->Paginator->sort('sex') ?></th>
                <th><?= $this->Paginator->sort('nationality') ?></th>
                <th><?= $this->Paginator->sort('idcardno') ?></th>
                <th><?= $this->Paginator->sort('licenceno') ?></th>
                <th><?= $this->Paginator->sort('licenceexpdate') ?></th>
                <th><?= $this->Paginator->sort('address_id') ?></th>
                <th><?= $this->Paginator->sort('nextofkin') ?></th>
                <th><?= $this->Paginator->sort('comments') ?></th>
                <th><?= $this->Paginator->sort('ibutton_id') ?></th>
                <th><?= $this->Paginator->sort('rfid_id') ?></th>
                <th><?= $this->Paginator->sort('drivingpassportno') ?></th>
                <th><?= $this->Paginator->sort('drivingpassportexp') ?></th>
                <th><?= $this->Paginator->sort('isibutton') ?></th>
                <th><?= $this->Paginator->sort('isrfid') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($drivers as $driver): ?>
            <tr>
                <td><?= $this->Number->format($driver->id) ?></td>
                <td><?= h($driver->name) ?></td>
                <td><?= h($driver->middlename) ?></td>
                <td><?= h($driver->lastname) ?></td>
                <td><?= h($driver->dob) ?></td>
                <td><?= $this->Number->format($driver->sex) ?></td>
                <td><?= h($driver->nationality) ?></td>
                <td><?= h($driver->idcardno) ?></td>
                <td><?= h($driver->licenceno) ?></td>
                <td><?= h($driver->licenceexpdate) ?></td>
                <td><?= $driver->has('address') ? $this->Html->link($driver->address->name, ['controller' => 'Addresses', 'action' => 'view', $driver->address->id]) : '' ?></td>
                <td><?= h($driver->nextofkin) ?></td>
                <td><?= h($driver->comments) ?></td>
                <td><?= $this->Number->format($driver->ibutton_id) ?></td>
                <td><?= $this->Number->format($driver->rfid_id) ?></td>
                <td><?= h($driver->drivingpassportno) ?></td>
                <td><?= h($driver->drivingpassportexp) ?></td>
                <td><?= h($driver->isibutton) ?></td>
                <td><?= h($driver->isrfid) ?></td>
                <td><?= $driver->has('customer') ? $this->Html->link($driver->customer->name, ['controller' => 'Customers', 'action' => 'view', $driver->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $driver->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $driver->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $driver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]) ?>
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