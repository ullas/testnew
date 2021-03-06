
<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   New  Schedule  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Schedules"> Schedules</a></li>
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
        // echo $this->Form->input('start_date', ['type'=>'text','empty' => true,'class'=>'datemask','required' => 'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
           
        echo $this->Form->input('validfrom', ['type'=>'text','empty' => true,'class'=>'datemask','label'=>'Valid From','required' => 'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
          echo $this->Form->input('validtill', ['type'=>'text','empty' => true,'class'=>'datemask','label'=>'Valid Till','required' => 'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
         
                   //	echo $this->Form->input('validfrom', ['empty' => true,'type'=>'text', 'class'=>'datemask','required'=>'required']);
                   	//echo $this->Form->input('validtill', ['empty' => true,'type'=>'text', 'class'=>'datemask','required'=>'required']);
                  	echo $this->Form->input('startloc_id', [ 'empty' => true,'class'=>'select2']);
					echo $this->Form->input('endloc_id',[ 'empty' => true,'class'=>'select2']);
					echo $this->Form->input('route_id', ['options' => $routes, 'empty' => true,'class'=>'select2']);
					echo $this->Form->input('start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            		echo $this->Form->input('end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
           
					//echo $this->Form->input('start_time',['empty' => true,'type'=>'text', 'class'=>'timepicker']);
					//echo $this->Form->input('end_time',['empty' => true,'type'=>'text', 'class'=>'timepicker']);
					echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true,'class'=>'select2']);
					echo $this->Form->input('default_driver_id', ['options' => $drivers,'class'=>'select2']);
					echo $this->Form->input('default_veh_id', ['label'=>'Default Vehicle','options' => $defaultVehs,'class'=>'select2']);
					echo $this->Form->input('name');
					echo $this->Form->input('nodays',['label'=>'No of Days']);
					echo $this->Form->input('brktime_bfr_nxt_trip',['label'=>'Break time before next trip']);
					echo $this->Form->input('default_paxgrpid', ['label'=>'Passenger Group','options' => $passengergroups,'class'=>'select2']);
					echo $this->Form->input('locations._ids', ['required' => 'required','options' => $locations,'class'=>'select2']);
					echo $this->Form->input('drivers._ids', ['options' => $drivers,'class'=>'select2']);
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
'AdminLTE./plugins/datepicker/datepicker3',
   
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min'
    // 'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  // 'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  '/js/moment.min.js',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
  'AdminLTE./plugins/iCheck/icheck.min',
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {

   // $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });


  });
</script>
<?php $this->end(); ?>

       