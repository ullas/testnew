<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Hardware</a></li>
     <li><a href="/rfids/"> Rfids</a></li>
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
            <th><?= __('Code') ?></th>
            <td><?= h($rfid->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($rfid->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $rfid->has('customer') ? $this->Html->link($rfid->customer->name, ['controller' => 'Customers', 'action' => 'view', $rfid->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Passenger') ?></th>
            <td><?= $rfid->has('passenger') ? $this->Html->link($rfid->passenger->id, ['controller' => 'Passengers', 'action' => 'view', $rfid->passenger->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Driver') ?></th>
            <td><?= $this->Number->format($rfid->driver_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Purchase') ?></th>
            <td><?= h($rfid->dateofpurchase) ?></td>
        </tr>
        <tr>
            <th><?= __('Private Key') ?></th>
            <td><?= $rfid->privatekey ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>