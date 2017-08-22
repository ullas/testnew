<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Fleet Management</a></li>
    <li><a href="/workorders/"> Work Orders</a></li>
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
            <th><?= __('Vehicle') ?></th>
            <td><?= $workorder->has('vehicle') ? $this->Html->link($workorder->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $workorder->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lables') ?></th>
            <td><?= h($workorder->lables) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= $workorder->has('vendor') ? $this->Html->link($workorder->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $workorder->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Invoice Number') ?></th>
            <td><?= h($workorder->invoicenumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone Number') ?></th>
            <td><?= h($workorder->phonenumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($workorder->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($workorder->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Workorder Status') ?></th>
            <td><?= $this->Number->format($workorder->workorderstatus_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($workorder->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Labour') ?></th>
            <td><?= $workorder->labour ?></td>
        </tr>
        <tr>
            <th><?= __('Parts') ?></th>
            <td><?= $workorder->parts ?></td>
        </tr>
        <tr>
            <th><?= __('Discount') ?></th>
            <td><?= $workorder->dicount ?></td>
        </tr>
        <tr>
            <th><?= __('Tax') ?></th>
            <td><?= $workorder->tax ?></td>
        </tr>
        <tr>
            <th><?= __('Issued By') ?></th>
            <td><?= $workorder->issuedby_id ?></td>
        </tr>
        <tr>
            <th><?= __('Assigned By') ?>/th>
            <td><?= $workorder->assignedby_id ?></td>
        </tr>
        <tr>
            <th><?= __('Assign To') ?></th>
            <td><?= $workorder->assignto_id ?></td>
        </tr>
        <tr>
            <th><?= __('Issue Date') ?></th>
            <td><?= h($workorder->issuedate) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($workorder->startdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Completion Date') ?></th>
            <td><?= h($workorder->completiondate) ?></td>
        </tr>
        <tr>
            <th><?= __('Void') ?></th>
            <td><?= $workorder->void ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
      </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div>
</section>
