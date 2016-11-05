<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/drivers/"> Drivers</a></li>
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
            <td><?= h($driver->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Middle Name') ?></th>
            <td><?= h($driver->middlename) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($driver->lastname) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationality') ?></th>
            <td><?= h($driver->nationality) ?></td>
        </tr>
        <tr>
            <th><?= __('ID Card No') ?></th>
            <td><?= h($driver->idcardno) ?></td>
        </tr>
        <tr>
            <th><?= __('Licence No') ?></th>
            <td><?= h($driver->licenceno) ?></td>
        </tr>
        <tr>
            <th><?= __('Licence Expiry Date') ?></th>
            <td><?= h($driver->licenceexpdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= $driver->has('address') ? $this->Html->link($driver->address->name, ['controller' => 'Addresses', 'action' => 'view', $driver->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Next Of Kin') ?></th>
            <td><?= h($driver->nextofkin) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($driver->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Driving Passport No') ?></th>
            <td><?= h($driver->drivingpassportno) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $driver->has('customer') ? $this->Html->link($driver->customer->name, ['controller' => 'Customers', 'action' => 'view', $driver->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Driving License Class') ?></th>
            <td><?= h($driver->drivinglicenseclass) ?></td>
        </tr>
        <tr>
            <th><?= __('Contractor') ?></th>
            <td><?= $driver->has('contractor') ? $this->Html->link($driver->contractor->name, ['controller' => 'Contractors', 'action' => 'view', $driver->contractor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Station') ?></th>
            <td><?= $driver->has('station') ? $this->Html->link($driver->station->name, ['controller' => 'Stations', 'action' => 'view', $driver->station->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Supervisor') ?></th>
            <td><?= $driver->has('supervisor') ? $this->Html->link($driver->supervisor->id, ['controller' => 'Drivers', 'action' => 'view', $driver->supervisor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($driver->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sex') ?></th>
            <td><?= $this->Number->format($driver->sex) ?></td>
        </tr>
        <tr>
            <th><?= __('Ibutton Id') ?></th>
            <td><?= $this->Number->format($driver->ibutton_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle Id') ?></th>
            <td><?= $this->Number->format($driver->vehicle_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Offday 1') ?></th>
            <td><?= $this->Number->format($driver->offday1) ?></td>
        </tr>
        <tr>
            <th><?= __('Offday 2') ?></th>
            <td><?= $this->Number->format($driver->offday2) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($driver->dob) ?></td>
        </tr>
        <tr>
            <th><?= __('Driving Passport Expiry Date') ?></th>
            <td><?= h($driver->drivingpassportexp) ?></td>
        </tr>
        <tr>
            <th><?= __('Reporting Time') ?></th>
            <td><?= h($driver->reporingtime) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= $this->Text->autoParagraph(h($driver->photo)); ?></td>
        </tr>
     </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
</div>
</section>