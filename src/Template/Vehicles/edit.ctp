
<?php echo $this->element('templateelement'); ?>
 <style>
 div#myDropZone {
    width: 100%;
    min-height: 500px;
    border : 1.9px dashed #008FE2;display: table;
}
.dz-message {
	color:#333;
	font-size:26px;
    font-weight: 400;
  	display: table-cell;
   vertical-align: middle;
}
.dz-clickable {
    cursor: pointer;
}
.dz-max-files-reached {
    cursor: default;
}
.upload-btn{
	font-size:16px;font-weight: 400;padding:8px;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Vehicle <small>Please fill the details to edit a Vehicle</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Administration</a></li>
    <li><a href="#">Tracking Items</a></li>
    <li> <a href="/vehicles/">Vehicles</a></li>
    <li class="active">Edit </li>
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
          <li ><a href="#lease" data-toggle="tab">Lease</a></li>
          <li><a href="#docs" data-toggle="tab">Attachments</a></li>
        </ul>
        <div class=" tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
               <?php
                echo $this->Form->input('name',['label'=>'Name','templateVars' => ['help' => 'A short name to distinguish this vehicle'],'required' => 'required']);
              	echo $this->Form->input('code',['templateVars' => ['help' => 'Vehicle Identification Number or Serial Number']]);
              	echo $this->Form->input('plateno',['label'=>'License Plate']);
 		            echo $this->Form->input('vehicletype_id', ['options' => $vehicletypes,
 		                             'templateVars' => ['help' => 'Select your vehicle category'],
 		                             'empty' => true,'class'=>'select2','label'=>'Type' ,'required' => 'required']);
 		            echo $this->Form->input('year',['templateVars' => ['help' => 'e.g. 2008, 2016']]);
 		            echo $this->Form->input('make',['templateVars' => ['help' => 'e.g. Maruthi, Ford etc.']]);
 		            echo $this->Form->input('model',['templateVars' => ['help' => 'Cressida, Sunny, i10 etc.']]);
 		            echo $this->Form->input('trim',['templateVars' => ['help' => 'C class, XE, Sports etc.']]);
 		            echo $this->Form->input('registationloc',['label'=>'Registration Location']);
 		            echo $this->Form->input('vehiclestatus_id',['label'=>'Status','options'=>$vehiclestatuses, 'class' =>'select2', 'empty' => false,'templateVars' => ['help' => 'Current status of this vehicle'],'required' => 'required']);
 		            //echo $this->Form->input('vehiclestatus_id', ['options' => $vehiclestatuses, 'empty' => true]);
 		            echo $this->Form->input('ownership_id', ['label'=>'Ownership','options' => $ownerships, 'empty' => false,'class'=>'select2','required' => 'required']);
 		            echo $this->Form->input('symbol_id', ['options' => $symbols, 'empty' => true,'class'=>'select2']);
 		            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true,'class'=>'select2']);
 		            echo $this->Form->input('department_id', ['options' => $departments, 'empty' => true,'class'=>'select2']);
 		            echo $this->Form->input('odometer');
 		            echo $this->Form->input('description');
 		            echo $this->Form->input('regstate',['label'=>'Registration State']);
 		            echo $this->Form->input('color');
 		            echo $this->Form->input('bodytype',['label'=>'Body Type','templateVars' => ['help' => 'Vehicle body configuration. SUV, Sedan, hatchback etc..']]);
 		            echo $this->Form->input('bodysubtype',['label'=>'Body Subtype','templateVars' => ['help' => 'Vehicle body configuration sub type. Extended Cab, Crew Cab etc..']]);
 		            echo $this->Form->input('driverdetectionmode',['label'=>'Driver Detection Mode','options' => $driverdetectionmodes,'class'=>'select2', 'empty' => true]);
                echo $this->Form->input('activedriver_id',['label'=>'Active Driver','options' => $drivers,'class'=>'select2', 'empty' => true]);
                echo $this->Form->input('purpose_id', ['options' => $purposes, 'empty' => true,'class'=>'select2']);
                echo $this->Form->input('transporter_id',['class'=>'select2']);
                echo $this->Form->input('drivers._ids',['options' => $drivers,'class'=>'select2']);
 					      echo $this->Form->input('msrp', ['label'=>'MRP','type'=>'text','empty' => true,'templateVars' => ['help' => 'Suggested retail price','icon' => '<div class="input-group-addon"><i class="'.$mptlusercurrencyfaclass.'"></i></div>']]);
         	 		  echo $this->Form->input('purpose_id', ['options' => $purposes, 'empty' => true,'class'=>'select2']);
              	   ?>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="specs">
             <div class="form-horizontal">
               <?php
            	    echo $this->Form->input('vehiclespecification.width', ['label'=>'Width','type'=>'text','empty' => true,'templateVars' => ['help' => 'Measurement of the widest part of the vehicle','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'  </div>']]);
          	      echo $this->Form->input('vehiclespecification.height', ['label'=>'Height','type'=>'text','empty' => true,'templateVars' => ['help' => 'Measurement from the ground to the highest part of the vehicle','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.' </div>']]);
          	      echo $this->Form->input('vehiclespecification.length', ['label'=>'Length','type'=>'text','empty' => true,'templateVars' => ['help' => 'The total length of the vehicle including bumpers','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'  </div>']]);
          	      echo $this->Form->input('vehiclespecification.interiorvolume', ['label'=>'Interior Volume','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume within the vehicle main chamber','icon' => '<div class="input-group-addon">' .$mptluserlengthunitmajor.' <sup>3</sup> </div>']]);
          	      echo $this->Form->input('vehiclespecification.passengervolume', ['label'=>'Passenger Volume','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume for the area solely designated for passengers','icon' => '<div class="input-group-addon">' .$mptluserlengthunitmajor.' <sup>3</sup> </div>']]);
          	      echo $this->Form->input('vehiclespecification.cargovolume', ['label'=>'Cargo Volume','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume of the area designated as cargo space','icon' => '<div class="input-group-addon">' .$mptluserlengthunitmajor.' <sup>3</sup> </div>']]);
          	      echo $this->Form->input('vehiclespecification.groudclearance', ['label'=>'Ground Clearance','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume for the area solely designated for passengers','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'  </div>']]);
          	      echo $this->Form->input('vehiclespecification.bedlength', ['label'=>'Bed Length','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume of the area designated as cargo space','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'  </div>']]);
          	      echo $this->Form->input('vehiclespecification.curbweight', ['label'=>'Curb Weight','type'=>'text','empty' => true,'templateVars' => ['help' => 'The weight of a vehicle with driver and fuel','icon' => '<div class="input-group-addon"> '.$mptluserweightunit.'  </div>']]);
  			          echo $this->Form->input('vehiclespecification.grossweight', ['label'=>'GVWR','type'=>'text','empty' => true,'templateVars' => ['help' => 'Gross Vehicle Weight Rating','icon' => '<div class="input-group-addon">'.$mptluserweightunit.' </div>']]);
  			          echo $this->Form->input('vehiclespecification.towingcapacity', ['label'=>'Towing Capacity','type'=>'text','empty' => true,'templateVars' => ['help' => 'The towing ability of the vehicle as it comes standard','icon' => '<div class="input-group-addon">'.$mptluserweightunit.' </div>']]);
  			          echo $this->Form->input('vehiclespecification.maxpayload', ['label'=>'Max Payload','type'=>'text','empty' => true,'templateVars' => ['help' => 'The maximum allowable weight that the vehicle can hold','icon' => '<div class="input-group-addon"> '.$mptluserweightunit.' </div>']]);
  			          echo $this->Form->input('vehiclespecification.epacity',['label'=>'EPA City']);
                  echo $this->Form->input('vehiclespecification.epahighway',['label'=>'EPA Highway']);
                  echo $this->Form->input('vehiclespecification.epacombined',['label'=>'EPA Combined']);
          	 ?>
            </div>
          </div>
          <!-- Tab Pane-->
          <div class="tab-pane" id="engine">
             <div class="form-horizontal">
               <?php
                echo $this->Form->input('vehicleengine.enginesummary',['label'=>'Engine Summary',  'templateVars' => ['help' => 'Basic Engine Detail']]);
                echo $this->Form->input('vehicleengine.brand',['label'=>'Brand',   'templateVars' => ['help' => 'Brand specific Engine name']]);
                echo $this->Form->input('vehicleengine.aspiration',['label'=>'Aspiration','class'=>'select2',   'templateVars' => ['help' => 'Method for drawing air into the engine']]);
                echo $this->Form->input('vehicleengine.blocktype',['label'=>'Block Type','class'=>'select2',   'templateVars' => ['help' => 'Engine Block (Cylinder Block) Type']]);
                echo $this->Form->input('vehicleengine.bore', ['label'=>'Bore','type'=>'text','empty' => true,'templateVars' => ['help' => 'Diameter of holes in the engine block used for cylinders','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'</div>']]);
                echo $this->Form->input('vehicleengine.camtype',['label'=>'Cam Type','class'=>'select2',   'templateVars' => ['help' => 'A cam refers to a "cam shaft". Examples include DOHC, SOHC etc..']]);
                echo $this->Form->input('vehicleengine.compression',['label'=>'Compression',   'templateVars' => ['help' => 'Compression ratio of the combustion chamber']]);
                echo $this->Form->input('vehicleengine.cylinders',['label'=>'Cylinders',  'templateVars' => ['help' => 'Number of cylinders present in the engine']]);
                echo $this->Form->input('vehicleengine.displacement',['label'=>'Dispalcement',  'templateVars' => ['help' => 'Total Volume dispalced during one firing cycle of the engine']]);
                echo $this->Form->input('vehicleengine.fuel_induction',['label'=>'Fuel Induction','class'=>'select2',   'templateVars' => ['help' => 'Method of drawing fuel into the engine']]);
                echo $this->Form->input('vehicleengine.fuel_quality',['label'=>'Fuel Quality',   'templateVars' => ['help' => 'Recommended Octane Rating']]);
                echo $this->Form->input('vehicleengine.max_hp',['label'=>'Max HP',   'templateVars' => ['help' => 'Maximum power achieved by engine. Expressed in units of Horse Power']]);
                echo $this->Form->input('vehicleengine.max_torque',['label'=>'Max Torque',   'templateVars' => ['help' => 'Maximum torque delivered by engine']]);
                echo $this->Form->input('vehicleengine.redline_rpm',['label'=>'Redline RPM',   'templateVars' => ['help' => 'Maximum speed at which engine can operate without risking damage']]);
                echo $this->Form->input('vehicleengine.stroke',['label'=>'Stroke',   'templateVars' => ['help' => 'Distance travelled by the piston during a combustion cycle']]);
                echo $this->Form->input('vehicleengine.valves',['label'=>'Valves',   'templateVars' => ['help' => 'Total number of valves in the engine']]);
                echo $this->Form->input('vehicleengine.transmission_summary',['label'=>'Transmission Summary',   'templateVars' => ['help' => 'Basic Transmission Summary']]);
                echo $this->Form->input('vehicleengine.trasmission_brand',['label'=>'Transmission Brand',  'templateVars' => ['help' => 'Brand specific engine name. E.g. Aisin AW, Honda, Allison etc..']]);
                echo $this->Form->input('vehicleengine.transmission_type',['label'=>'Transmission Type','class'=>'select2' , 'templateVars' => ['help' => 'Automatic, manumatic, semi-automatic etc..']]);
                echo $this->Form->input('vehicleengine.traasmission_gears',['label'=>'Transmission Gears' , 'templateVars' => ['help' => 'Number of gears or speeds available']]);
              ?>
            </div>
           </div>
          <!-- Tab Pane-->
           <div class="tab-pane" id="wheel">
             <div class="form-horizontal">
               <?php
               echo $this->Form->input('vehiclewheelstyre.drivetype',['label'=>'Drive Type','class'=>'select2', 'templateVars' => ['help' => 'Refers to how many or which wheels are powered by the engine.']]);
               echo $this->Form->input('vehiclewheelstyre.breaksystem',['label'=>'Brake System','class'=>'select2',  'templateVars' => ['help' => 'Description of brake type']]);
               echo $this->Form->input('vehiclewheelstyre.fronttrackwidth',['label'=>'Front Track Width', 'templateVars' => ['help' => 'The distance between the front tires']]);
               echo $this->Form->input('vehiclewheelstyre.reartrackwidth',['label'=>'Rear Track Width', 'templateVars' => ['help' => 'The distance between the rear tires']]);
               echo $this->Form->input('vehiclewheelstyre.wheelbase', ['label'=>'Wheel Base','type'=>'text','empty' => true,'templateVars' => ['help' => 'The length from the center of the front wheel to the center of the rear wheel','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.' </div>']]);
               echo $this->Form->input('vehiclewheelstyre.frontwheeldia',['label'=>'Front Wheel Diameter', 'templateVars' => ['help' => 'The front wheel diameter (Displayed as  "length x width").']]);
               echo $this->Form->input('vehiclewheelstyre.rearwheeldia',['label'=>'Rear Wheel Diameter', 'templateVars' => ['help' => 'The distance between the rear tires']]);
               echo $this->Form->input('vehiclewheelstyre.rearaxil',['label'=>'Rear Axle']);
               echo $this->Form->input('vehiclewheelstyre.fronttyretype',['label'=>'Front Tyre Type', 'templateVars' => ['help' => 'The front tire information']]);
               echo $this->Form->input('vehiclewheelstyre.fronttyrepsi',['label'=>'Front Tyre PSI', 'templateVars' => ['help' => 'Recommended front tire pressure']]);
               echo $this->Form->input('vehiclewheelstyre.reartyretype',['label'=>'Rear Tyre Type', 'templateVars' => ['help' => 'The rear tire information if it is different than the front']]);
               echo $this->Form->input('vehiclewheelstyre.reartyrepsi',['label'=>'Rear Tyre PSI', 'templateVars' => ['help' => 'Recommended rear tire pressure']]);
             ?>
            </div>
           </div>
          <!-- Tab Pane-->
          <div class="tab-pane" id="fluids">
            <div class="form-horizontal">
              <?php
             	echo $this->Form->input('vehiclefluid.fueltype',['label'=>'Fuel Type','class'=>'select2']);
              echo $this->Form->input('vehiclefluid.fuelquality',['label'=>'Fuel Quality', 'templateVars' => ['help' => 'Recommended Octane rating']]);
  			      echo $this->Form->input('vehiclefluid.fueltank1_capacity', ['label'=>'Fuel Tank1 Capacity','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume of fuel (gas) the vehicles primary fuel tank can hold','icon' => '<div class="input-group-addon">' .$mptluservolumeunit.' </div>']]);
              echo $this->Form->input('vehiclefluid.fueltank2_capacity', ['label'=>'Fuel Tank2 Capacity','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume of fuel (gas) the vehicles secondary fuel tank can hold','icon' => '<div class="input-group-addon">' .$mptluservolumeunit.' </div>']]);
  			      echo $this->Form->input('vehiclefluid.oil_capacity', ['label'=>'Oil Capacity','type'=>'text','empty' => true,'templateVars' => ['help' => 'Capacity of oil tank','icon' => '<div class="input-group-addon">' .$mptluservolumeunit.' </div>']]);
          	  ?>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class=" tab-pane" id="purchase">
            <div class="form-horizontal">
              <?php
              echo $this->Form->input('vehiclepurchase.purchasedate', ['type'=>'text','empty' => true,'class'=>'datemask', 'templateVars' => ['help' => 'DD-MM-YY (Ex: 24-07-16)']]);
              echo $this->Form->input('vehiclepurchase.price',['label'=>'Purchase Price']);
              echo $this->Form->input('vehiclepurchase.currency_id',['options' => $currencies,'empty' => true,'label'=>'Currency','class'=>'select2']);
              echo $this->Form->input('vehiclepurchase.purchasepodometer',['label'=>'Odometer','templateVars' => ['help' => 'Odometer at the time of purchase']]);
              echo $this->Form->input('vehiclepurchase.comments',['label'=>'Comments','type'=>'textarea']);
              echo $this->Form->input('vehiclepurchase.warrantyexpdate', ['label'=>'Warranty Expiration Date','type'=>'text','empty' => true,'class'=>'datemask', 'templateVars' => ['help' => 'DD-MM-YY (Ex: 23-07-17)']]);
              echo $this->Form->input('vehiclepurchase.warrentyexpmeter',['label'=>'Max Meter Value','templateVars' => ['help' => 'Maximum odometer allowed by warranty coverage']]);
              ?>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="lease">
            <div class="form-horizontal">
              <?php
             	echo $this->Form->input('vehiclelease.maonthypayment', ['label'=>'Monthly Payment','type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon"><i class="'.$mptlusercurrencyfaclass.'"></i></div>']]);
              echo $this->Form->input('vehiclelease.startdate', ['label'=>'Start Date', 'type'=>'text','empty' => true,'label'=>'Start Date','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('vehiclelease.enddate', ['label'=>'End Date','type'=>'text','empty' => true,'label'=>'End Date','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('vehiclelease.amountfinanced', ['label'=>'Amount Financed','type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon"><i class="'.$mptlusercurrencyfaclass.'"></i></div>']]);
              echo $this->Form->input('vehiclelease.interestrate', ['label'=>'Interest Rate','type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon"><i>%</i></div>']]);
              echo $this->Form->input('vehiclelease.residualvalue', ['label'=>'Residual Value','type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon"><i class="'.$mptlusercurrencyfaclass.'"></i></div>']]);
              echo $this->Form->input('vehiclelease.accountnumber', ['label'=>'Account Number']);
              echo $this->Form->input('vehiclelease.ifsccode', ['label'=>'IFSC Code']);
              echo $this->Form->input('vehiclelease.swiftcode', ['label'=>'Swift Code']);
              echo $this->Form->input('vehiclelease.notes', ['type'=>'textarea']);
  			      ?>
            </div>
          </div>
          <!-- /.tab-pane -->
           <div class="tab-pane" id="docs">
           	<a href="#" class="open-Popup pull-right" data-toggle="modal" data-remote="false" data-target="#editpicpopover" style="font-size:20px;">&nbsp;<i class="fa fa-camera"></i></a>
            <div class="form-horizontal">
            	<?php echo $this->Form->input('attachment', array('type' => 'hidden')); ?>
            	<?php if($vehicle['attachment']!=''){$picturename=$vehicle['attachment'];}
                       else{$picturename='defaultuser.png';}
                            				 
								if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename)){
									echo $this->Html->image('/img/uploadedpics/'.$picturename, array('class' => 'emp-profilepic img-responsive', 'id'=>'profilepic', 'alt' => 'Attachment'));
								}else{
									echo $this->Html->image('/img/uploadedpics/defaultuser.png', array('class' => 'emp-profilepic img-responsive', 'id'=>'profilepic', 'alt' => 'Attachment'));
								}
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
                <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->
<?php

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  '/js/moment.min'
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
	//dropzone
	Dropzone.autoDiscover = false;
	var myDropzone = $("div#myDropZone").dropzone({
         url : "/Uploads/upload",
         maxFiles: 1,
         addRemoveLinks: true,
         dictRemoveFileConfirmation : 'Are you sure you want to remove the particular file ?' ,
         init: function() {
     		this.on("complete", function (file) {
      			if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
					//alert(file);
				}
    		});
    		this.on("removedfile", function (file) {
          		$("#attachment").val("");
      		});
    		this.on("queuecomplete", function (file) {
          // alert("All files have uploaded ");
      		});

      		this.on("success", function (file) {
          		$("#attachment").val(file['name']);console.log(file['name']); //alert("Success ");
      		});

      		this.on("error", function (file) {
          		// alert("Error in uploading ");
      		});

      		this.on("maxfilesexceeded", function(file){
        		alert("You can not upload any more files.");this.removeFile(file);
    		});
    	},

    });

  $(function () {

    //Initialize Select2 Elements
  $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });
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


<div class="modal fade" id="editpicpopover" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          	  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Attachment</h4>
      </div>
              <div class="modal-body" >
            <div class="form-horizontal">
            	
            	
            	
            	
			    <!-- upload component -->
            	<div class="form-group" style="margin:20px;"><div id="myDropZone" class="dropzone"><div class="dz-message text-center"><i class="fa fa-cloud-upload text-light-blue fa-5x"></i>
            		<br/><span>Drag and Drop the picture Here to upload.</span>
            		<br/><span class="upload-btn bg-info">or select the picture to Upload</span></div></div>
            	</div>
            	
            	
            	
            </div>
			  </div>
			  
			  

          </div>
      </div>
</div>