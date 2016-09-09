

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    iButton 
    <small>The elecronic key used for identification</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#"> Hardware</a></li>
    <li class="active">iButtons</li>
    
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
          <h3 class="box-title">List of iButtons</h3>

          <div class="box-tools pull-right">
            <a href="/ibuttons/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new iButton</a>
         
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
                <th><?= $this->Paginator->sort('privatekey') ?></th>
                <th><?= $this->Paginator->sort('dateofpurchase') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ibuttons as $ibutton): ?>
            <tr>
                <td><?= $this->Number->format($ibutton->id) ?></td>
                <td><?= h($ibutton->code) ?></td>
                <td><?= h($ibutton->description) ?></td>
                <td><?= $ibutton->has('customer') ? $this->Html->link($ibutton->customer->name, ['controller' => 'Customers', 'action' => 'view', $ibutton->customer->id]) : '' ?></td>
                <td><?= $this->Number->format($ibutton->driver_id) ?></td>
                <td><?= h($ibutton->privatekey) ?></td>
                <td><?= h($ibutton->dateofpurchase) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ibutton->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ibutton->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ibutton->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ibutton->id)]) ?>
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

