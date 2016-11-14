<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
     <li><a href="/Trackingobjects/"> Tracking Objects</a></li>
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
            <td><?= h($trackingobject->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Assettype') ?></th>
            <td><?= $trackingobject->has('assettype') ? $this->Html->link($trackingobject->assettype->name, ['controller' => 'Assettypes', 'action' => 'view', $trackingobject->assettype->id]) : '' ?></td>
        </tr>
       
        <tr>
            <th><?= __('Created Date') ?></th>
            <td><?= h($trackingobject->created_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Modifield Date') ?></th>
            <td><?= h($trackingobject->modifield_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Public Asset') ?></th>
            <td><?= $trackingobject->public_asset ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $trackingobject->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
     </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>