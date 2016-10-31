<section class="content-header">
  <h1>
     <?= h($template->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/template/"> template</a></li>
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
            <th><?= __('Customer') ?></th>
            <td><?= $template->has('customer') ? $this->Html->link($template->customer->name, ['controller' => 'Customers', 'action' => 'view', $template->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($template->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($template->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Templatetype') ?></th>
            <td><?= $template->has('templatetype') ? $this->Html->link($template->templatetype->name, ['controller' => 'Templatetypes', 'action' => 'view', $template->templatetype->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Alertcategory') ?></th>
            <td><?= $template->has('alertcategory') ? $this->Html->link($template->alertcategory->name, ['controller' => 'Alertcategories', 'action' => 'view', $template->alertcategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($template->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Templatecat') ?></th>
            <td><?= h($template->templatecat) ?></td>
        </tr>
        <tr>
            <th><?= __('Templatetext') ?></th>
            <td><?= h($template->templatetext) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($template->id) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
        <h4><?= __('Related Jobs') ?></h4>
        <?php if (!empty($template->jobs)): ?>
        </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Jobdate') ?></th>
                <th><?= __('Trackingobject Id') ?></th>
                <th><?= __('Assigned By') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Jobtime') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Timepolicy Id') ?></th>
                <th><?= __('Template Id') ?></th>
                <th><?= __('Endcustomername') ?></th>
                <th><?= __('Endcustomermailid') ?></th>
                <th><?= __('Endcustomerphone') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Distance') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($template->jobs as $jobs): ?>
            <tr>
                <td><?= h($jobs->id) ?></td>
                <td><?= h($jobs->jobdate) ?></td>
                <td><?= h($jobs->trackingobject_id) ?></td>
                <td><?= h($jobs->assigned_by) ?></td>
                <td><?= h($jobs->title) ?></td>
                <td><?= h($jobs->description) ?></td>
                <td><?= h($jobs->jobtime) ?></td>
                <td><?= h($jobs->comments) ?></td>
                <td><?= h($jobs->customer_id) ?></td>
                <td><?= h($jobs->timepolicy_id) ?></td>
                <td><?= h($jobs->template_id) ?></td>
                <td><?= h($jobs->endcustomername) ?></td>
                <td><?= h($jobs->endcustomermailid) ?></td>
                <td><?= h($jobs->endcustomerphone) ?></td>
                <td><?= h($jobs->location_id) ?></td>
                <td><?= h($jobs->status) ?></td>
                <td><?= h($jobs->distance) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
 
        <?php endif; ?>
    </div>
</div>
