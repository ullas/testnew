<?php echo $this->element('templateelement'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     New Schedule <small>Please fill the details to create a new Schedule</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Trip Management </a></li>
    <li><a href="/schedules/"> Schedules</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($schedule) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
          <?php
            echo $this->Form->input('name',['required' => 'required']);
            echo $this->Form->input('validfrom', ['required' => 'required','label'=>'Valid From','empty' => true,'class'=>'datemask','type'=>'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('validtill', ['required' => 'required','label'=>'Valid Till','empty' => true,'class'=>'datemask','type'=>'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('startloc_id',['label'=>'Start Location','class'=>'select2','empty' => true]);
            echo $this->Form->input('endloc_id',['label'=>'End Location','class'=>'select2','empty' => true]);
            echo $this->Form->input('route_id',['class'=>'select2','empty' => true]);
            echo $this->Form->input('start_time', ['empty' => true,'class'=>'timepicker']);
            echo $this->Form->input('end_time', ['empty' => true,'class'=>'timepicker']);
            echo $this->Form->input('timepolicy_id',['label'=>'Time Policy','class'=>'select2','empty' => true]);
            echo $this->Form->input('default_driver_id',['label'=>'Default Driver','class'=>'select2','empty' => true]);
            echo $this->Form->input('default_veh_id',['label'=>'Default Vehicle','class'=>'select2','empty' => true]);
            echo $this->Form->input('nodays',['label'=>'No Of Days',]);
            echo $this->Form->input('brktime_bfr_nxt_trip',['label'=>'Break Time Before Next Trip',]);
            echo $this->Form->input('default_paxgrpid',['label'=>'Default Passenger Group','empty' => true]);
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
  'AdminLTE./plugins/datepicker/datepicker3'  ],
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
       