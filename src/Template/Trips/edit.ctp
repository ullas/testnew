<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Trip <small>Please fill the details to edit a Trip</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/trips/"> Trips</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($trip) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
         <?php
            echo $this->Form->input('name',['required' => 'required']);
            echo $this->Form->input('start_date', ['type'=>'text','empty' => true,'class'=>'datemask','required' => 'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date', ['type'=>'text','empty' => true,'class'=>'datemask','required' => 'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
            echo $this->Form->input('start_time', ['type'=>'text','empty' => true]);
            echo $this->Form->input('end_time', ['type'=>'text','empty' => true]);
            echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('route_id', ['options' => $routes, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('startpoint_id', ['label'=>'Start Point','type'=>'text','options' => $startpoints, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('endpoint_id', ['label'=>'End Point','type'=>'text','options' => $endpoints, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('schedule_id', ['options' => $schedules,'empty' => true, 'class'=>'select2']);
            echo $this->Form->input('autogen');
            echo $this->Form->input('tripstatus_id', ['label'=>'Trip Status','options' => $tripstatuses, 'empty' => true]);
            echo $this->Form->input('last_location',['label'=>'Last Location']);
            echo $this->Form->input('canceled',['label'=>'Cancelled']);
            echo $this->Form->input('active');
            echo $this->Form->input('fromschedule',['label'=>'From Schedule']);
            echo $this->Form->input('trackingcode',['label'=>'Tracking Code']);
            echo $this->Form->input('adt',['type'=>'text','label'=>'ADT','empty' => true]);
            echo $this->Form->input('aat',['type'=>'text','label'=>'AAT','empty' => true]);
            echo $this->Form->input('edt',['type'=>'text','label'=>'EDT','empty' => true]);
            echo $this->Form->input('eat',['type'=>'text','label'=>'EAT','empty' => true]);
            echo $this->Form->input('vehiclecategory_id', ['label'=>'Vehicle Category','options' => $vehiclecategories, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('platform');
			echo $this->Form->input('triptype_id', ['label'=>'Trip Type','options' => $triptypes, 'empty' => true,'class'=>'select2']);
        	echo $this->Form->input('softwaretriggered',['label'=>'Software Triggered']);
			echo $this->Form->input('hwtriggered',['label'=>'Hardware Triggered']);
        ?>
  </div>
  
          </div>
          <!-- /.tab-pane -->
         
          
        </div>
         
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->
<?php
$this->Html->css([
  'AdminLTE./plugins/datepicker/datepicker3'
  ],
  ['block' => 'css']);

$this->Html->script([
 'AdminLTE./plugins/select2/select2.full.min',
 'AdminLTE./plugins/datepicker/bootstrap-datepicker',
 '/js/dropzone/dropzone',
 'AdminLTE./plugins/iCheck/icheck.min'
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
   
   $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });
  

  });
</script>
<?php $this->end(); ?>
