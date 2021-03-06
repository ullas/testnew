<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Groups</a></li>
     <li><a href="/drivergroups/"> Driver Groups</a></li>
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
            <td><?= h($drivergroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($drivergroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Driver') ?></th>
            <td><?= $drivergroup->has('defaultdriver') ? $this->Html->link($drivergroup->defaultdriver->id, ['controller' => 'Drivers', 'action' => 'view', $drivergroup->defaultdriver->id]) : '' ?></td>
        </tr>
        
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
