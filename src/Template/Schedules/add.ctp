
<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}</div>',
     'label' => '<label class="col-sm-3 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
     'select' => '<div class="col-sm-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];
$this->Form->templates($myTemplates);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Schedule
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"> Trip management </a></li>
    <li><a href="/shedules/"> Shedules</a></li>
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
            echo $this->Form->input('validfrom', ['empty' => true,'class'=>'datemask','type'=>'text']);
            echo $this->Form->input('validtill', ['empty' => true,'class'=>'datemask','type'=>'text']);
            echo $this->Form->input('startloc_id',['class'=>'select2']);
            echo $this->Form->input('endloc_id',['class'=>'select2']);
            echo $this->Form->input('route_id',['class'=>'select2']);
            echo $this->Form->input('start_time', ['empty' => true,'class'=>'datemask','type'=>'text','class'=>'timepicker']);
            echo $this->Form->input('end_time', ['empty' => true,'type'=>'text','class'=>'timepicker']);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('timepolicy_id',['class'=>'select2']);
            echo $this->Form->input('default_driver_id',['class'=>'select2']);
            echo $this->Form->input('default_veh_id',['class'=>'select2']);
            echo $this->Form->input('name');
            echo $this->Form->input('nodays');
            echo $this->Form->input('brktime_bfr_nxt_trip');
            echo $this->Form->input('default_paxgrpid');
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
                  <button type="submit" class="btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->
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
 

    

  

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<?php $this->end(); ?>
