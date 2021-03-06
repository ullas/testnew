<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Sensormappings<small>Please fill the details to create a Sensormapping</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="/Sensormappings/">Sensormappings</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($sensormapping) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
      <?php
            echo $this->Form->input('device_id',['label'=>'Device','options' => $devices,'class'=>'select2']);
            
            //echo $this->Form->input('ai1',['label'=>'Analog Input 1','class'=>'select2','options' => array(0,1,2,3), 'empty' => true]);
			
            echo $this->Form->input('ai1',['label'=>'Analog Input 1','class'=>'select2','options' => array('Disabled', 'Fuel Level', 'Temperature','Trip-End'), 'empty' => true]);
			echo $this->Form->input('ai2',['label'=>'Analog Input 2','class'=>'select2','options' => array('Disabled', 'Fuel Level', 'Temperature','Trip-End'), 'empty' => true]);
			echo $this->Form->input('ai3',['label'=>'Analog Input 3','class'=>'select2','options' => array('Disabled', 'Fuel Level', 'Temperature','Trip-End'), 'empty' => true]);
			echo $this->Form->input('ai4',['label'=>'Analog Input 4','class'=>'select2','options' => array('Disabled', 'Fuel Level', 'Temperature','Trip-End'), 'empty' => true]);
            
            echo $this->Form->input('di1',['label'=>'Digital Input 1','class'=>'select2','options' => array('Disabled', 'Door', 'Seat Belt','Wiper','Trip-Start','Unloading-Start','Unloading-End','Trip-End'), 'empty' => true]);
			echo $this->Form->input('di2',['label'=>'Digital Input 2','class'=>'select2','options' => array('Disabled', 'Door', 'Seat Belt','Wiper','Trip-Start','Unloading-Start','Unloading-End','Trip-End'), 'empty' => true]);
			echo $this->Form->input('di3',['label'=>'Digital Input 3','class'=>'select2','options' => array('Disabled', 'Door', 'Seat Belt','Wiper','Trip-Start','Unloading-Start','Unloading-End','Trip-End'), 'empty' => true]);
			echo $this->Form->input('di4',['label'=>'Digital Input 4','class'=>'select2','options' => array('Disabled', 'Door', 'Seat Belt','Wiper','Trip-Start','Unloading-Start','Unloading-End','Trip-End'), 'empty' => true]);
           
		    echo $this->Form->input('do1',['label'=>'Digital Output 1','class'=>'select2','options' => array('Disabled', 'Buzzer'), 'empty' => true]);
			echo $this->Form->input('do2',['label'=>'Digital Output 2','class'=>'select2','options' => array('Disabled', 'Buzzer'), 'empty' => true]);
			echo $this->Form->input('do3',['label'=>'Digital Output 3','class'=>'select2','options' => array('Disabled', 'Buzzer'), 'empty' => true]);
			echo $this->Form->input('do4',['label'=>'Digital Output 4','class'=>'select2','options' => array('Disabled', 'Buzzer'), 'empty' => true]);
           
		    echo $this->Form->input('ai1_type',['label'=>'Analog Input 1 Type','class'=>'select2','options' => array('None', 'Below Threshold', 'Above Threshold','Range(Inside)','Range(Outside)'), 'empty' => true]);
			echo $this->Form->input('ai2_type',['label'=>'Analog Input 2 Type','class'=>'select2','options' => array('None', 'Below Threshold', 'Above Threshold','Range(Inside)','Range(Outside)'), 'empty' => true]);
			echo $this->Form->input('ai3_type',['label'=>'Analog Input 3 Type','class'=>'select2','options' => array('None', 'Below Threshold', 'Above Threshold','Range(Inside)','Range(Outside)'), 'empty' => true]);
			echo $this->Form->input('ai4_type',['label'=>'Analog Input 4 Type','class'=>'select2','options' => array('None', 'Below Threshold', 'Above Threshold','Range(Inside)','Range(Outside)'), 'empty' => true]);
			 
			echo $this->Form->input('di1_type',['label'=>'Digital Input 1 Type','class'=>'select2','options' => array('None', 'On Activation', 'On Deactivation','On Toggle'), 'empty' => true]);
			echo $this->Form->input('di2_type',['label'=>'Digital Input 2 Type','class'=>'select2','options' => array('None', 'On Activation', 'On Deactivation','On Toggle'), 'empty' => true]);
			echo $this->Form->input('di3_type',['label'=>'Digital Input 3 Type','class'=>'select2','options' => array('None', 'On Activation', 'On Deactivation','On Toggle'), 'empty' => true]);
			echo $this->Form->input('di4_type',['label'=>'Digital Input 4 Type','class'=>'select2','options' => array('None', 'On Activation', 'On Deactivation','On Toggle'), 'empty' => true]);
			
			echo $this->Form->input('ai1_val1',['label'=>'Analog Input 1 Min Value', 'empty' => true]);
            echo $this->Form->input('ai2_val1',['label'=>'Analog Input 2 Min Value', 'empty' => true]);
			echo $this->Form->input('ai3_val1',['label'=>'Analog Input 3 Min Value', 'empty' => true]);
			echo $this->Form->input('ai4_val1',['label'=>'Analog Input 4 Min Value', 'empty' => true]);
			
			echo $this->Form->input('ai1_val2',['label'=>'Analog Input 1 Max Value', 'empty' => true]);
            echo $this->Form->input('ai2_val2',['label'=>'Analog Input 2 Max Value', 'empty' => true]);
			echo $this->Form->input('ai3_val2',['label'=>'Analog Input 3 Max Value', 'empty' => true]);
			echo $this->Form->input('ai4_val2',['label'=>'Analog Input 4 Max Value', 'empty' => true]);
			
			echo $this->Form->input('ai1_ref',['label'=>'Analog Input 1 Ref Voltage', 'empty' => true]);
            echo $this->Form->input('ai2_ref',['label'=>'Analog Input 2 Ref Voltage', 'empty' => true]);
			echo $this->Form->input('ai3_ref',['label'=>'Analog Input 3 Ref Voltage', 'empty' => true]);
			echo $this->Form->input('ai4_ref',['label'=>'Analog Input 4 Ref Voltage', 'empty' => true]);
			
			
        ?>
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
  
