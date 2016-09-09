<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    People 
    <small>The individuals tracked by mobile or a tracker device</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tracking Objects</li>
      <li class="active">People</li>
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
          <h3 class="box-title">List of People Tracked</h3>

          <div class="box-tools pull-right">
            <a href="/people/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Person</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id',['title'=>'ID']) ?></th>
                <th><?= $this->Paginator->sort('trackingobject_id',['title'=>'Name']) ?></th>
                <th><?= $this->Paginator->sort('age') ?></th>
                <th><?= $this->Paginator->sort('designation') ?></th>
               
                <th><?= $this->Paginator->sort('city') ?></th>
                
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $person): ?>
            <tr>
                <td><?= $this->Number->format($person->id) ?></td>
               
                <td><?= h($person->trackingobject->name)?></td>
                <td><?= $this->Number->format($person->age) ?></td>
                <td><?= h($person->designation) ?></td>
                
                <td><?= h($person->city) ?></td>
                
                <td><?= h($person->email) ?></td>
                <td><?= h($person->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
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
