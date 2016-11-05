<section class="content-header">
  <h1>
     <?= h($vehiclelease->id) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/vehiclelease/"> vehiclelease</a></li>
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
            <th><?= __('Vendor') ?></th>
            <td><?= $vehiclelease->has('vendor') ? $this->Html->link($vehiclelease->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $vehiclelease->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ifsccode') ?></th>
            <td><?= h($vehiclelease->ifsccode) ?></td>
        </tr>
        <tr>
            <th><?= __('Swiftcode') ?></th>
            <td><?= h($vehiclelease->swiftcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Notes') ?></th>
            <td><?= h($vehiclelease->notes) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclelease->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Maonthypayment') ?></th>
            <td><?= $this->Number->format($vehiclelease->maonthypayment) ?></td>
        </tr>
        <tr>
            <th><?= __('Amountfinanced') ?></th>
            <td><?= $this->Number->format($vehiclelease->amountfinanced) ?></td>
        </tr>
        <tr>
            <th><?= __('Interestrate') ?></th>
            <td><?= $this->Number->format($vehiclelease->interestrate) ?></td>
        </tr>
        <tr>
            <th><?= __('Residualvalue') ?></th>
            <td><?= $this->Number->format($vehiclelease->residualvalue) ?></td>
        </tr>
        <tr>
            <th><?= __('Accountnumber') ?></th>
            <td><?= $this->Number->format($vehiclelease->accountnumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer Id') ?></th>
            <td><?= $this->Number->format($vehiclelease->customer_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle Id') ?></th>
            <td><?= $this->Number->format($vehiclelease->vehicle_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Startdate') ?></th>
            <td><?= h($vehiclelease->startdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Enddate') ?></th>
            <td><?= h($vehiclelease->enddate) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
</div>
