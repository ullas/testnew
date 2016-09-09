

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Passenger Groups 
    <small>All passengers in a vehicle are grouped here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Group</a></li>
    <li class="active">Passenger Group</li>
    
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
          <h3 class="box-title">List of Passenger Groups</h3>

          <div class="box-tools pull-left">
            <a href="/vendors/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Vendor</a>
         
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
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('system') ?></th>
                <th><?= $this->Paginator->sort('enabled') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passengergroups as $passengergroup): ?>
            <tr>
                <td><?= $this->Number->format($passengergroup->id) ?></td>
                <td><?= h($passengergroup->name) ?></td>
                <td><?= h($passengergroup->description) ?></td>
                <td><?= $passengergroup->has('customer') ? $this->Html->link($passengergroup->customer->name, ['controller' => 'Customers', 'action' => 'view', $passengergroup->customer->id]) : '' ?></td>
                <td><?= h($passengergroup->system) ?></td>
                <td><?= h($passengergroup->enabled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $passengergroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $passengergroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $passengergroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passengergroup->id)]) ?>
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
  