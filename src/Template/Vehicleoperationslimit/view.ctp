<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/vehicleoperationslimit/"> Vehicle Operations Limit</a></li>
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
            <th><?= __('Odometer Offset') ?></th>
            <td><?= h($vehicleoperationslimit->odometer_offset) ?></td>
        </tr>
        <tr>
            <th><?= __('I Button') ?></th>
            <td><?= $vehicleoperationslimit->has('i_button') ? $this->Html->link($vehicleoperationslimit->i_button->id, ['controller' => 'Ibuttons', 'action' => 'view', $vehicleoperationslimit->i_button->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehice Id') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->vehice_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Speed Limit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->speed_limit) ?></td>
        </tr>
        <tr>
            <th><?= __('Battery Voltage') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->battery_voltage) ?></td>
        </tr>
        <tr>
            <th><?= __('Accelaration Limit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->accelarationlimit) ?></td>
        </tr>
        <tr>
            <th><?= __('Breaking Limit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->breakinglimit) ?></td>
        </tr>
        <tr>
            <th><?= __('Crash Limit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->crashlimit) ?></td>
        </tr>
        <tr>
            <th><?= __('Shut Limit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->shutlimit) ?></td>
        </tr>
        <tr>
            <th><?= __('Continuous Run Time') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->continiousruntime) ?></td>
        </tr>
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
