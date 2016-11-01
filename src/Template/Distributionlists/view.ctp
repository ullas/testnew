<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Contacts</a></li>
     <li><a href="/distributionlists/"> Distribution Lists</a></li>
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
            <td><?= h($distributionlist->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($distributionlist->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $distributionlist->has('customer') ? $this->Html->link($distributionlist->customer->name, ['controller' => 'Customers', 'action' => 'view', $distributionlist->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($distributionlist->id) ?></td>
        </tr>
        <tr>
            <th><?= __('System') ?></th>
            <td><?= $distributionlist->system ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Enabled') ?></th>
            <td><?= $distributionlist->enabled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>