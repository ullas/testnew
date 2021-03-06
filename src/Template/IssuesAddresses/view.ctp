<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
     <li><a href="/IssuesAddresses/"> Issue Addresses</a></li>
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
            <th><?= __('Issue') ?></th>
            <td><?= $issuesAddress->has('issue') ? $this->Html->link($issuesAddress->issue->id, ['controller' => 'Issues', 'action' => 'view', $issuesAddress->issue->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= $issuesAddress->has('address') ? $this->Html->link($issuesAddress->address->name, ['controller' => 'Addresses', 'action' => 'view', $issuesAddress->address->id]) : '' ?></td>
        </tr>
        
      </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>