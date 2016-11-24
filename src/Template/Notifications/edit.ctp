<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}</div>',
     'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-10"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
     'select' => '<div class="col-sm-10"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
      'selectMultiple' => '<div class="col-sm-10"><select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-10"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];
//$this->Form->templates($myTemplates);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Notification  <small>Please fill the details to edit a Notification</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Templates</a></li>
    <li><a href="/notifications/"> Notifications</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($notification) ?>
  
  <div class="row">
  	
  	<div class="col-md-4">
  	
     <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Details</h3>
            </div>
            <div class="box-body">
            	
            	
		        <?php
		            echo $this->Form->input('name',["required"=>"required"]); ?>
					<div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                   email 
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                  SMS
                </label>
                
              </div>
               <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                   Mobile 
                </label>
                
              </div>
		          <?php  echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true,'class'=>'select2','label'=>'SMS Group']);
					echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true,'class'=>'select2','label'=>'Email Group']);
		            echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true,'class'=>'select2','label'=>'Mobile Group']);
					echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true,'class'=>'select2','label'=>'Time Zone']);
					
		        ?>
		        
		     
		        
		     </div>
    </div>
   </div>
   <div class="col-md-8">
   	
   	<?= $this->element('timepolicy') ?>
   	
   </div>
  </div>
  <div class="row">
    <div class="col-md-4">
       <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Select  Alerts</h3>
            </div>
            <div class="box-body">
               

              <!-- checkbox -->
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                   Over Speed 
                </label>
                
              </div>
               <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    No Movement 
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Idling 
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Start
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Stop
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                     Acceleration/Breaking
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Sensor Alerts
                </label>
                
              </div>
              
            
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              To learn about these alerts see  <a href="/documentation">Documentation</a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
        <div class="col-md-4">
       <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Select  Alerts</h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->

              <!-- checkbox -->
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                   Battery
                </label>
                
              </div>
               <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Panic
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Fuel
                </label>
                
              </div><div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Trip Change(Cancel/Reschedule)
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Night Driving
                </label>
                
              </div>
               <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Trip (Start/Stop)
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Excessive Driving
                </label>
                
              </div>
             
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              See documentation <a href="/documentations">Documentation</a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
        <div class="col-md-4">
       <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Select  Alerts</h3>
            </div>
            <div class="box-body">
              <!-- Minimal style -->

              <!-- checkbox -->
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                   Route Violation
                </label>
                
              </div>
               <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Communication Failure
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Zone
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    POI Visits
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Lazy Driver
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Renewal
                </label>
                
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" class="minimal-red" checked>
                    Maintenance
                </label>
                
              </div>
              

             
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              See Documentations <a href="/documentations">Documentation</a>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
    
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<?php
$this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/iCheck/all',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
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
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
 

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

  

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<?php $this->end(); ?>
