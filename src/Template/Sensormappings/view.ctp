<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Contacts</a></li>
     <li><a href="/addresses/"> Addresses</a></li>
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
            <td><?= h($address->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= h($address->designation) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($address->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $address->has('customer') ? $this->Html->link($address->customer->name, ['controller' => 'Customers', 'action' => 'view', $address->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile') ?></th>
            <td><?= h($address->mobile) ?></td>
        </tr>
        <tr>
            <th><?= __('Apartment') ?></th>
            <td><?= h($address->apartment) ?></td>
        </tr>
        <tr>
            <th><?= __('Street Name') ?></th>
            <td><?= h($address->streetname) ?></td>
        </tr>
        <tr>
            <th><?= __('Land Mark') ?></th>
            <td><?= h($address->landmark) ?></td>
        </tr>
        <tr>
            <th><?= __('Area Name') ?></th>
            <td><?= h($address->areaname) ?></td>
        </tr>
        <tr>
            <th><?= __('Country Short Code') ?></th>
            <td><?= h($address->countryshortcode) ?></td>
        </tr>
        <tr>
            <th><?= __('State Short Code') ?></th>
            <td><?= h($address->stateshortcode) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($address->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Pincode') ?></th>
            <td><?= h($address->pincode) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Current Address') ?></th>
            <td><?= $address->iscurrentAddress ? __('Yes') : __('No'); ?></td>
        </tr>
   </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>