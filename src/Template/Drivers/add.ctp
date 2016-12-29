
<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Driver<small>Please fill the details to create a new Driver</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li><a href="/drivers/"> Drivers</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($driver) ?>
   <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li  class="active"><a href="#details" data-toggle="tab">Details</a></li>
          <li><a href="#docs" data-toggle="tab">Attachments</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
       <?php
            echo $this->Form->input('name',['required' => 'required']);
            echo $this->Form->input('dob', ['type'=>'text','empty' => true,'label'=>'Date Of Birth','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('sex',['class'=>'select2','options' => array('Male', 'Female'), 'empty' => true]);
            echo $this->Form->input('nationality');
            echo $this->Form->input('idcardno',['label'=>'ID Card No','required' => 'required']);
            echo $this->Form->input('licenceno',['label'=>'Licence No','required' => 'required']);
            echo $this->Form->input('licenceexpdate', ['type'=>'text','empty' => true,'label'=>'Licence Expiry Date','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('address_id', ['options' => $addresses, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('maritalstatus',['label'=>'Marital Status','class'=>'select2','options' => array('Single', 'Married'), 'empty' => true]);
            echo $this->Form->input('bloodgroup',['label'=>'Blood Group']);
            echo $this->Form->input('nextofkin',['label'=>'Next Of Kin']);
            echo $this->Form->input('comments');
           // echo $this->Form->input('photo');
            echo $this->Form->input('ibutton_id',['label'=>'iButton ID','options' => $ibuttons,'class'=>'select2', 'empty' => true,'templateVars' => ['help'=>'Unique digital identifier id. Also known as Dallas Key.']]);
            echo $this->Form->input('drivingpassportno',['label'=>'Driving Passport No','templateVars' => ['help'=>'The Petroleum Driver Passport (PDP) number.'] ]);
            echo $this->Form->input('drivingpassportexp', ['type'=>'text','empty' => true,'label'=>'Driving Passport Expiry Date','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
            echo $this->Form->input('drivinglicenseclass',['label'=>'Driving Licence Class']);
            echo $this->Form->input('contractor_id', ['options' => $contractors, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('reporingtime',['label'=>'Reporting Time','class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('offday1',['label'=>'Off day 1']);
            echo $this->Form->input('offday2',['label'=>'Off day 2']);
            echo $this->Form->input('supervisor_id', ['options' => $supervisors, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('drivergroups.ids', ['label'=>'Driver Group','options' => $drivergroups,'class'=>'select2', 'empty' => true,]);
        	
        ?>
        </div></div>

        <div class="tab-pane" id="docs">
             <div class="form-horizontal">

            	<?php echo $this->Form->input('attachment', array('type' => 'hidden')); ?>

			    <!-- upload component -->
            	<div class="form-group" style="margin:20px;"><div id="myDropZone" class="dropzone"><div class="dz-message text-center"><i class="fa fa-cloud-upload text-light-blue fa-5x"></i>
            		<br/><span>Drag and drop Files Here to upload.</span>
            		<br/><span class="upload-btn bg-info">or select files to Upload</span></div></div>
            	</div>

            </div>
           </div>
          <!-- Tab Pane-->
          </div></div></div></div>
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
$this->Html->css([
  'AdminLTE./plugins/datepicker/datepicker3',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min'

  ],
  ['block' => 'css']);
$this->Html->script([
 'AdminLTE./plugins/select2/select2.full.min',
 'AdminLTE./plugins/datepicker/bootstrap-datepicker',
 'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
 'AdminLTE./plugins/iCheck/icheck.min'
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

   $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });

$('.timepicker').timepicker({
	showInputs:false
});
  });
</script>
<?php $this->end(); ?>
