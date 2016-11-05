<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Trip Management</a></li>
    <li><a href="/jobs/"> Jobs</a></li>
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
            <th><?= __('Trackingobject') ?></th>
            <td><?= $job->has('trackingobject') ? $this->Html->link($job->trackingobject->name, ['controller' => 'Trackingobjects', 'action' => 'view', $job->trackingobject->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Assigned By') ?></th>
            <td><?= h($job->assigned_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($job->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($job->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($job->comments) ?></td>
        </tr>
        <!-- <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $job->has('customer') ? $this->Html->link($job->customer->name, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
        </tr> -->
        <tr>
            <th><?= __('Timepolicy') ?></th>
            <td><?= $job->has('timepolicy') ? $this->Html->link($job->timepolicy->name, ['controller' => 'Timepolicies', 'action' => 'view', $job->timepolicy->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('End Customer Name') ?></th>
            <td><?= h($job->endcustomername) ?></td>
        </tr>
        <tr>
            <th><?= __('End Customer Mail ID') ?></th>
            <td><?= h($job->endcustomermailid) ?></td>
        </tr>
        <tr>
            <th><?= __('End Customer Phone') ?></th>
            <td><?= h($job->endcustomerphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $job->has('location') ? $this->Html->link($job->location->name, ['controller' => 'Locations', 'action' => 'view', $job->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($job->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Template Id') ?></th>
            <td><?= $this->Number->format($job->template_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($job->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Distance') ?></th>
            <td><?= $this->Number->format($job->distance) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Date') ?></th>
            <td><?= h($job->jobdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Time') ?></th>
            <td><?= h($job->jobtime) ?></td>
        </tr>
    </table>
</div><!-- box -->
  
  </div><!-- col12-->
  </div>
  </section>
