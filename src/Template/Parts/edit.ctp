<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Parts <small>Please fill the details to edit a Part</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li><a href="/Parts/"> Parts</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($part)?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            
            echo $this->Form->input('partno',['label'=>'Part Number ','templateVars' => ['help' => 'Internal part identifier. Must be unique per part.'],'required' => 'required']);
            echo $this->Form->input('partcategory_id', ['options' => $partcategories, 'empty' => true,'label'=>'Part Category','class'=>'select2','required' => 'required']);
            echo $this->Form->input('manufacturer_id', ['options' => $manufacturers, 'empty' => true,'class'=>'select2','required' => 'required']);
            echo $this->Form->input('manufacturerpartno',['label'=>'Manufacturer Part Number','templateVars' => ['help' => 'Manufacturer specific part number that can differentiate the part from an internal number.'],'required' => 'required']);
            echo $this->Form->input('description');
            echo $this->Form->input('measurementunit_id', ['options' => $measurementunits, 'empty' => true,'label'=>'Measurement Unit','class'=>'select2']);
            echo $this->Form->input('upc');
            echo $this->Form->input('cost');
            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true,'class'=>'select2']);
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
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/iCheck/all',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
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
    $(".datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
    $(".timepicker").timepicker({
      showInputs: false
    });

  });
</script>
<?php $this->end(); ?>      	  
