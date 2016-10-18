<section class="content-header">
  <h1>
     <?= h($createconfig->id) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/createconfig/"> createconfig</a></li>
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
            <th><?= __('Table Name') ?></th>
            <td><?= h($createconfig->table_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Field Name') ?></th>
            <td><?= h($createconfig->field_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Datatype') ?></th>
            <td><?= h($createconfig->datatype) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $createconfig->has('customer') ? $this->Html->link($createconfig->customer->name, ['controller' => 'Customers', 'action' => 'view', $createconfig->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($createconfig->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Helpmessage') ?></th>
            <td><?= h($createconfig->helpmessage) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($createconfig->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Order') ?></th>
            <td><?= $this->Number->format($createconfig->order) ?></td>
        </tr>
        <tr>
            <th><?= __('Isselect') ?></th>
            <td><?= $createconfig->isselect ? __('Yes') : __('No'); ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
</div>
