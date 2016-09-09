

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    DL 
    <small>Addresses are grouped here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#"> Contacts</a></li>
    <li class="active">DL</li>
    
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
          <h3 class="box-title">List of Address Groups</h3>

          <div class="box-tools pull-right">
            <a href="/distributionlists/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new DL</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <thead>
            <tr>
                
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
               
                <th><?= $this->Paginator->sort('system') ?></th>
                <th><?= $this->Paginator->sort('enabled') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($distributionlists as $distributionlist): ?>
            <tr>
                <td><?= h($distributionlist->name) ?></td>
                <td><?= h($distributionlist->description) ?></td>
                
                <td><?= h($distributionlist->system) ?></td>
                <td><?= h($distributionlist->enabled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $distributionlist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $distributionlist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $distributionlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distributionlist->id)]) ?>
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