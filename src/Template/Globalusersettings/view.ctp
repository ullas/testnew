<section class="content-header">
  <h1>
     <?= h($globalusersetting->id) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/globalusersetting/"> globalusersetting</a></li>
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
            <th><?= __('Key') ?></th>
            <td><?= h($globalusersetting->key) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= h($globalusersetting->value) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $globalusersetting->has('user') ? $this->Html->link($globalusersetting->user->username, ['controller' => 'Users', 'action' => 'view', $globalusersetting->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Module') ?></th>
            <td><?= h($globalusersetting->module) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($globalusersetting->id) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
</div>
