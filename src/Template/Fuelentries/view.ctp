<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Fleet Management</a></li>
    <li><a href="/fuelentries/"> Fuel Entries</a></li>
    <li class="active">View</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <div class="col-md-12">
  	
  	<div class="box box-primary">
  		<div class="box-body">
  		<table class="table table-hover">
            <th><?= __('Vehicle') ?></th>
            <td><?= $fuelentry->has('vehicle') ? $this->Html->link($fuelentry->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $fuelentry->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fuel Type') ?></th>
            <td><?= h($fuelentry->fueltype) ?></td>
        </tr>
        <tr>
            <th><?= __('Reference') ?></th>
            <td><?= h($fuelentry->ref) ?></td>
        </tr>
        <tr>
            <th><?= __('Mark As Personal') ?></th>
            <td><?= h($fuelentry->markaspersonal) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fuelentry->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($fuelentry->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Price Per Unit') ?></th>
            <td><?= $this->Number->format($fuelentry->priceperusnit) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor Id') ?></th>
            <td><?= $this->Number->format($fuelentry->vendor_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($fuelentry->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Partial Fill') ?></th>
            <td><?= $fuelentry->partialfill ? __('Yes') : __('No'); ?></td>
        </tr>
        </table>
 </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
