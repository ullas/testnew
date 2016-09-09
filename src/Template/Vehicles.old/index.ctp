

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Vehicles 
    <small>The vehicles monitered and managed by Maptell Zorba</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tracking Objects</li>
      <li class="active">Vehicles</li>
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
          <h3 class="box-title">List of Vehicles</h3>

          <div class="box-tools pull-right">
             <a href="/vehicles/add/" class="btn btn-sm btn-success" aria-label="Add a new vehicle"><i class="fa fa-plus" aria-hidden="true"></i></a>
           <a class="btn btn-sm btn-default" href="#" aria-label="Settings">
             <i class="fa fa-cog" aria-hidden="true"></i>
           </a>
         
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
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('plateno') ?></th>
                <th><?= $this->Paginator->sort('vin',['title'=>'VIN/SIN']) ?></th>
                <th><?= $this->Paginator->sort('vehicletype_id',['title'=>'Vehicle Type']) ?></th>
               <th class="actions"><?= __('Actions') ?></th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                 <?php foreach ($vehicles as $vehicle): ?>
            <tr>
                <td><?= $this->Number->format($vehicle->id) ?></td>
                <td><?= $vehicle->has('vehicletype') ? $this->Html->link($vehicle->vehicletype->name, ['controller' => 'Vehicletypes', 'action' => 'view', $vehicle->vehicletype->id]) : '' ?></td>
              
                <td><?= h($vehicle->code) ?></td>
                <td><?= h($vehicle->plateno) ?></td>
                <td><?= h($vehicle->vin) ?></td>
               <td><?=  h($vehicle->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?>
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





