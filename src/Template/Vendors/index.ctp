

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Vendors 
    <small>Your service and items providers</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Vendor</li>
    
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
          <h3 class="box-title">List of vendors</h3>

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
                  <th><?= $this->Paginator->sort('id',['title'=>'ID']) ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('contactname',['title'=>'Contact Name']) ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                
                <th class="actions"><?= __('Actions') ?></th>
              </tr>
              </thead>
              <tbody>
                 <?php foreach ($vendors as $vendor): ?>
            <tr>
                <td><?= $this->Number->format($vendor->id) ?></td>
                <td><?= h($vendor->name) ?></td>
                <td><?= h($vendor->phone) ?></td>                
                <td><?= h($vendor->country) ?></td>
                <td><?= h($vendor->contactname) ?></td>
                <td><?= h($vendor->email) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vendor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendor->id)]) ?>
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






