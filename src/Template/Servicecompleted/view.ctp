<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
     <li><a href="/servicecompleted/"> Services Completed</a></li>
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
            <th><?= __('Service Entry') ?></th>
            <td><?= $servicecompleted->has('servicesentry') ? $this->Html->link($servicecompleted->servicesentry->name, ['controller' => 'Servicesentries', 'action' => 'view', $servicecompleted->servicesentry->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Services Completed') ?></th>
            <td><?= h($servicecompleted->servicescompleted) ?></td>
        </tr>
        
      </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
