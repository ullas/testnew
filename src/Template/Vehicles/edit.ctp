<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}<div class="col-sm-offset-3 col-sm-6 style="margin-top:18px">{{help}}</div></div>',
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
    Vehicle Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tracking Items</a></li>
    <li> <a href="/vehicles/">Vehicles</a></li>
    <li class="active">View </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($vehicle) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li  class="active"><a href="#details" data-toggle="tab">Details</a></li>	
            <li><a href="#specs" data-toggle="tab">Specifications</a></li>
           <li><a href="#engine" data-toggle="tab">Engine Details</a></li>
        
         
          <li><a href="#wheel" data-toggle="tab">Wheel&Tyre</a></li>
          <li><a href="#fluids" data-toggle="tab">Fluids</a></li>
          <li ><a href="#purchase" data-toggle="tab">Purchase</a></li>         
          <li><a href="#attach" data-toggle="tab">Attachments</a></li>
          
          
           
        </ul>
        <div class="active tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
             	
                <?php 
                 
             	    echo $this->Form->input('name',['label'=>'Name*','templateVars' => ['help' => 'A nickname to distinguish this vehicle']]);
             	    echo $this->Form->input('code',['templateVars' => ['help' => 'Vehicle Identification Number or Serial Number']]);
             	    echo $this->Form->input('plateno',['label'=>'License Plate']);
		           
		            echo $this->Form->input('vehicletype_id', ['options' => $vehicletypes, 
		                             'templateVars' => ['help' => 'Select your vehicle category'],
		                             'empty' => true,'class'=>'select2','label'=>'Type']);
		            echo $this->Form->input('year',['templateVars' => ['help' => 'e.g 2008,1973']]);
		            echo $this->Form->input('make',['templateVars' => ['help' => 'e.g Maruthi,Ford etc.']]);
		            echo $this->Form->input('model',['templateVars' => ['help' => 'Cressida,Sunny,i10 etc.']]);
		            echo $this->Form->input('trim',['templateVars' => ['help' => 'C class,XE,Sports etc.']]);
		            echo $this->Form->input('registationloc',['label'=>'Registration Location']);
		            echo $this->Form->input('vehiclestatus_id',['options'=>$vehiclestatuses, 'class' =>'select2', 'empty' => false,'templateVars' => ['help' => 'Current status of this vehicle']]);
		            //echo $this->Form->input('vehiclestatus_id', ['options' => $vehiclestatuses, 'empty' => true]);
          
		            echo $this->Form->input('driver_id', ['options' => $drivers, 'empty' => true,'class'=>'select2']);
		            echo $this->Form->input('ownership_id', ['options' => $ownerships, 'empty' => false,'class'=>'select2']);
		            echo $this->Form->input('symbol_id', ['options' => $symbols, 'empty' => true,'class'=>'select2']);
		            
		            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true,'class'=>'select2']);
		            echo $this->Form->input('department_id', ['options' => $departments, 'empty' => true,'class'=>'select2']);
		            echo $this->Form->input('odometer');
		            echo $this->Form->input('description');
		            echo $this->Form->input('regstate');
		            echo $this->Form->input('color');
		            echo $this->Form->input('bodytype',['label'=>'Body Type','templateVars' => ['help' => 'Body type (XUV, Sedan, etc...)']]);
		            echo $this->Form->input('bodysubtype',['label'=>'Body Type','templateVars' => ['help' => 'Extended Cab, Crew Cab, etc...']]);
		            
					?>
					<div class="form-group">
		                <label class="col-sm-3 control-label">MSRP</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-dollar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="msrp" name="msrp">
		                  
		                </div>
		                <div class="col-sm-12" style="padding-left:0px">Manufacturer suggested retail price</div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>
		            <?php
		            
		            echo $this->Form->input('purpose_id', ['options' => $purposes, 'empty' => true,'class'=>'select2']);
             	   ?>
             	 
            </div>
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="specs">
             <div class="form-horizontal">
              <?php
            echo $this->Form->input('vehiclespecification.width');
            echo $this->Form->input('vehiclespecification.height');
            echo $this->Form->input('vehiclespecification.length');
            echo $this->Form->input('vehiclespecification.interiorvolume');
            echo $this->Form->input('vehiclespecification.passengervolume');
            echo $this->Form->input('vehiclespecification.cargovolume');
            echo $this->Form->input('vehiclespecification.groudclearance');
            echo $this->Form->input('vehiclespecification.bedlength');
            echo $this->Form->input('vehiclespecification.curbweight');
            echo $this->Form->input('vehiclespecification.grossweight');
            echo $this->Form->input('vehiclespecification.towingcapacity');
            echo $this->Form->input('vehiclespecification.epacity');
            echo $this->Form->input('vehiclespecification.epahighway');
            echo $this->Form->input('vehiclespecification.epacombined');          
            echo $this->Form->input('vehiclespecification.maxpayload');
        ?>
            </div>
     
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="engine">
             <div class="form-horizontal">
              <?php
            echo $this->Form->input('vehicleengine.enginesummary');
            echo $this->Form->input('vehicleengine.brand');
            echo $this->Form->input('vehicleengine.aspiration');
            echo $this->Form->input('vehicleengine.blocktype');
            echo $this->Form->input('vehicleengine.bore');
            echo $this->Form->input('vehicleengine.camtype');
            
            echo $this->Form->input('vehicleengine.compression');
            echo $this->Form->input('vehicleengine.cylinders');
            echo $this->Form->input('vehicleengine.displacement');
            echo $this->Form->input('vehicleengine.fuel_induction');
            echo $this->Form->input('vehicleengine.fuel_quality');
            echo $this->Form->input('vehicleengine.max_hp');
            echo $this->Form->input('vehicleengine.max_torque');
            echo $this->Form->input('vehicleengine.redline_rpm');
            echo $this->Form->input('vehicleengine.stroke');
            echo $this->Form->input('vehicleengine.valves');
            echo $this->Form->input('transmission_summary');
            echo $this->Form->input('trasmission_brand');
            echo $this->Form->input('transmission_type');
            echo $this->Form->input('traasmission_gears');
        ?>
            </div>
           </div>
          <!-- Tab Pane-->
          
          
          
           <div class="tab-pane" id="wheel">
             <div class="form-horizontal">
               <?php
            
            echo $this->Form->input('vehiclewheelstyre.drivetype');
            echo $this->Form->input('vehiclewheelstyre.breaksystem');
            echo $this->Form->input('vehiclewheelstyre.fronttrackwidth');
            echo $this->Form->input('vehiclewheelstyre.reartrackwidth');
            echo $this->Form->input('vehiclewheelstyre.wheelbase');
            echo $this->Form->input('vehiclewheelstyre.frontwheeldia');
            echo $this->Form->input('vehiclewheelstyre.rearwheeldia');
            echo $this->Form->input('vehiclewheelstyre.rearaxil');
            echo $this->Form->input('vehiclewheelstyre.fronttyretype');
            echo $this->Form->input('vehiclewheelstyre.fronttyrepsi');
            echo $this->Form->input('vehiclewheelstyre.reartyretype');
            echo $this->Form->input('vehiclewheelstyre.reartyrepsi');
        ?>
            </div>
           </div>
          <!-- Tab Pane-->
          
          
          

          <div class="tab-pane" id="fluids">
            <div class="form-horizontal">
               <?php
           
            echo $this->Form->input('vehiclefluid.fueltype');
            echo $this->Form->input('vehiclefluid.fuelquality');
            echo $this->Form->input('vehiclefluid.fueltank1_capacity');
            echo $this->Form->input('vehiclefluid.fueltank2_capacity');
            echo $this->Form->input('vehiclefluid.oil_capacity');
        ?>
            </div>
          </div>
          <!-- /.tab-pane -->
          
          <div class=" tab-pane" id="purchase">
            <div class="form-horizontal">
                <?php
           
            echo $this->Form->input('vehiclepurchase.price');
            echo $this->Form->input('vehiclepurchase.currency_id',['class'=>'select2']);
            echo $this->Form->input('vehiclepurchase.purchasedate', ['type'=>'text','empty' => true,'class'=>'datemask']);
            echo $this->Form->input('vehiclepurchase.purchasepodometer');
            echo $this->Form->input('vehiclepurchase.warrantyexpdate', ['type'=>'text','empty' => true,'class'=>'datemask']);
            echo $this->Form->input('vehiclepurchase.warrentyexpmeter');
            echo $this->Form->input('vehiclepurchase.comments');
           
             ?>
            </div>
          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="attach">
            <div class="form-horizontal">
               
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
                <div class="col-sm-offset-6 col-sm-12">
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
   $(".select2").select2({ width: '100%' });
   $(".datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
/*
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

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

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });*/
  });
</script>
<?php $this->end(); ?>

