<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Group 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Contacts</a></li>
     <li><a href="/addresses/"> Addresses</a></li>
    <li class="active">View</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <a href="/groups/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Group</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>    	
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($group->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($group->description) ?></td>
        </tr>
        
       
    </table>
       </div> <!-- table responsive -->
    </div> <!-- box body -->
     </div> <!-- box -->
    </div> <!--col -->
 </div> <!--row-->
     <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Related Tracking Items</h3>

          <div class="box-tools pull-right" >
            <a href="/vehicles/add/" class="btn btn-sm btn-info btn-flat pull-left " >Add a new Vehicle</a>
            <a href="/people/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Person</a>
            <a href="/assets/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Asset</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Assettype Id') ?></th>
                <th><?= __('Created Date') ?></th>
                
                <th><?= __('Public Asset') ?></th>
                <th><?= __('Is Active') ?></th>
              
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->trackingobjects as $trackingobjects): ?>
            <tr>
                <td><?= h($trackingobjects->id) ?></td>
                <td><?= h($trackingobjects->name) ?></td>
                <td><?= h($trackingobjects->assettype_id) ?></td>
                <td><?= h($trackingobjects->created_date) ?></td>
               
                <td><?= h($trackingobjects->public_asset) ?></td>
                <td><?= h($trackingobjects->is_active) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trackingobjects', 'action' => 'view', $trackingobjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trackingobjects', 'action' => 'edit', $trackingobjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trackingobjects', 'action' => 'delete', $trackingobjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trackingobjects->id)]) ?>
                </td>
            </tr>
              <?php endforeach; ?>
        </table>
        </div>
       </div> <!--box body -->
     </div> <!-- box -->
    </div> <!-- col -->
  </div> <!-- row -->

</section>