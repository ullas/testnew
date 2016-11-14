<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
     <li><a href="/eventtypes/"> Event Types</a></li>
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
            <td><?= h($eventtype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Model') ?></th>
            <td><?= h($eventtype->model) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventtype->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= $this->Number->format($eventtype->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Provider') ?></th>
            <td><?= $this->Number->format($eventtype->provider) ?></td>
        </tr>
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>