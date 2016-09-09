<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Passeger Group 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Groups</a></li>
    <li class="active">Passenger Group</li>
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
            <a href="/passengergroups/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Passenger Group</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($passengergroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($passengergroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $passengergroup->has('customer') ? $this->Html->link($passengergroup->customer->name, ['controller' => 'Customers', 'action' => 'view', $passengergroup->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($passengergroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('System') ?></th>
            <td><?= $passengergroup->system ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Enabled') ?></th>
            <td><?= $passengergroup->enabled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
      </div> <!-- table responsive -->
    </div> <!-- box body -->
     </div> <!-- box -->
    </div> <!--col -->
 </div> <!--row-->
      <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Related Trips</h3>

          <div class="box-tools pull-right">
            <a href="/trips/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Trip</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
               
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('Start Time') ?></th>
                <th><?= __('End Time') ?></th>
                
                <th><?= __('Startpoint Id') ?></th>
                <th><?= __('Endpoint Id') ?></th>
                <th><?= __('Schedule Id') ?></th>
                
               
                <th><?= __('Tripstatus Id') ?></th>
                <th><?= __('Last Location') ?></th>
               
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($passengergroup->trips as $trips): ?>
            <tr>
                <td><?= h($trips->id) ?></td>
                <td><?= h($trips->name) ?></td>
                <td><?= h($trips->start_date) ?></td>
                <td><?= h($trips->end_date) ?></td>
                
                <td><?= h($trips->vehicle_id) ?></td>
                <td><?= h($trips->start_time) ?></td>
                <td><?= h($trips->end_time) ?></td>
                
                <td><?= h($trips->startpoint_id) ?></td>
                <td><?= h($trips->endpoint_id) ?></td>
                <td><?= h($trips->schedule_id) ?></td>
               
               
                <td><?= h($trips->tripstatus_id) ?></td>
                <td><?= h($trips->last_location) ?></td>
               
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trips', 'action' => 'view', $trips->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trips', 'action' => 'edit', $trips->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trips', 'action' => 'delete', $trips->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trips->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
         </div>
       </div> <!--box body -->
     </div> <!-- box -->
    </div> <!-- col -->
  </div> <!-- row -->
 <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Related Addresses</h3>

          <div class="box-tools pull-right">
            <a href="/addresses/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Address</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
    
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Middle Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Sex') ?></th>
                <th><?= __('Age') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Mobile') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($passengergroup->passengers as $passengers): ?>
            <tr>
                <td><?= h($passengers->id) ?></td>
                <td><?= h($passengers->first_name) ?></td>
                <td><?= h($passengers->middle_name) ?></td>
                <td><?= h($passengers->last_name) ?></td>
                <td><?= h($passengers->active) ?></td>
                <td><?= h($passengers->sex) ?></td>
                <td><?= h($passengers->age) ?></td>
                <td><?= h($passengers->address) ?></td>
                <td><?= h($passengers->phone) ?></td>
                <td><?= h($passengers->mobile) ?></td>
                <td><?= h($passengers->comments) ?></td>
                <td><?= h($passengers->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Passengers', 'action' => 'view', $passengers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Passengers', 'action' => 'edit', $passengers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Passengers', 'action' => 'delete', $passengers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passengers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
       </table>
        </div>
       </div> <!--box body -->
     </div> <!-- box -->
    </div> <!-- col -->
  </div> <!-- row -->

</section>
