<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Driver<small>Please fill the details to edit a Driver</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li><a href="/drivers/"> Drivers</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($driver) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
           echo $this->Form->input('name',['required' => 'required']);
            echo $this->Form->input('middlename',['label'=>'Middle Name']);
            echo $this->Form->input('lastname',['label'=>'Last Name']);
            echo $this->Form->input('dob', ['type'=>'text','empty' => true,'label'=>'Date Of Birth','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('sex');
            echo $this->Form->input('nationality');
            echo $this->Form->input('idcardno',['label'=>'ID Card No','required' => 'required']);
            echo $this->Form->input('licenceno',['label'=>'Licence No','required' => 'required']);
            echo $this->Form->input('licenceexpdate', ['type'=>'text','empty' => true,'label'=>'Licence Expiry Date','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('address_id', ['options' => $addresses, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('maritalstatus',['label'=>'Marital Status']);
            echo $this->Form->input('nextofkin',['label'=>'Next Of Kin']);
            echo $this->Form->input('comments');
            echo $this->Form->input('photo');
            echo $this->Form->input('ibutton_id',['class'=>'select2']);
            echo $this->Form->input('drivingpassportno',['label'=>'Driving Passport No']);
            echo $this->Form->input('drivingpassportexp', ['type'=>'text','empty' => true,'label'=>'Driving Passport Expiry Date','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('vehicle_id',['options' => $vehicles, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('drivinglicenseclass',['label'=>'Driving Licence Class']);
            echo $this->Form->input('contractor_id', ['options' => $contractors, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('reporingtime', ['label'=>'Reporting Time','empty' => true]);
            echo $this->Form->input('offday1');
            echo $this->Form->input('offday2');
            echo $this->Form->input('supervisor_id', ['options' => $supervisors, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('drivergroups.ids', ['label'=>'Driver Group','options' => $drivergroups,'class'=>'select2']);
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
   
