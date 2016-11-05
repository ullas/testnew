<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Tracking Objects</a></li>
     <li><a href="/assets/"> Assets</a></li>
    <li class="active">View</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <div class="col-md-12">
  	
  	<div class="box box-primary">
  		<div class="box-body">
  		<table class="table table-hover">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($asset->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Tracking Object') ?></th>
            <td><?= $asset->has('trackingobject') ? $this->Html->link($asset->trackingobject->name, ['controller' => 'Trackingobjects', 'action' => 'view', $asset->trackingobject->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Asset Type') ?></th>
            <td><?= $asset->has('assettype') ? $this->Html->link($asset->assettype->name, ['controller' => 'Assettypes', 'action' => 'view', $asset->assettype->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($asset->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Symbol') ?></th>
            <td><?= $asset->has('symbol') ? $this->Html->link($asset->symbol->name, ['controller' => 'Symbols', 'action' => 'view', $asset->symbol->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= $asset->has('department') ? $this->Html->link($asset->department->name, ['controller' => 'Departments', 'action' => 'view', $asset->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Station') ?></th>
            <td><?= $asset->has('station') ? $this->Html->link($asset->station->name, ['controller' => 'Stations', 'action' => 'view', $asset->station->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Purpose') ?></th>
            <td><?= $asset->has('purpose') ? $this->Html->link($asset->purpose->name, ['controller' => 'Purposes', 'action' => 'view', $asset->purpose->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($asset->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Stationary') ?></th>
            <td><?= $asset->isstationary ? __('Yes') : __('No'); ?></td>
        </tr>
   </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
