<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Device 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Hardware</a></li>
     <li><a href="/devices/"> Devices</a></li>
    <li class="active">View</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <a href="/devices/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Device</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($device->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $device->has('customer') ? $this->Html->link($device->customer->name, ['controller' => 'Customers', 'action' => 'view', $device->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Installed By') ?></th>
            <td><?= h($device->installed_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Certified By') ?></th>
            <td><?= h($device->certified_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($device->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Provider') ?></th>
            <td><?= $device->has('provider') ? $this->Html->link($device->provider->name, ['controller' => 'Providers', 'action' => 'view', $device->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($device->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Distance Type') ?></th>
            <td><?= $this->Number->format($device->distance_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Initodometer') ?></th>
            <td><?= $this->Number->format($device->initodometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Install Date') ?></th>
            <td><?= h($device->install_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometersupport') ?></th>
            <td><?= $device->odometersupport ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div> <!-- table responsive -->
    </div> <!-- box body -->
     </div> <!-- box -->
    </div> <!--col -->
 </div> <!--row-->
 </section>
