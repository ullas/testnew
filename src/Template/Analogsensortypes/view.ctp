<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
     <li><a href="/Contractors/"> Contractors</a></li>
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
            <td><?= h($contractor->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Descrtption') ?></th>
            <td><?= h($contractor->descrtption) ?></td>
        </tr>
        
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>