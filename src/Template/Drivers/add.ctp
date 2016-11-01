<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}<div class="col-sm-offset-3 col-sm-6" style="margin-top:4px">{{help}}</div></div>',
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
    New Driver<small>Please fill the details to create a new Driver</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Servicesentries/"> Drivers</a></li>
    <li class="active">Add</li>
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
            echo $this->Form->input('dob', ['type'=>'text','empty' => true,'label'=>'Date Of Birth','class'=>'datemask','templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-09)']]);
            echo $this->Form->input('sex');
            echo $this->Form->input('nationality');
            echo $this->Form->input('idcardno',['label'=>'ID Card No','required' => 'required']);
            echo $this->Form->input('licenceno',['label'=>'Licence No','required' => 'required']);
            echo $this->Form->input('licenceexpdate', ['type'=>'text','empty' => true,'label'=>'Licence Expiry Date','class'=>'datemask','templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-09)']]);
            echo $this->Form->input('address_id', ['options' => $addresses, 'empty' => true]);
            echo $this->Form->input('nextofkin',['label'=>'Next Of Kin']);
            echo $this->Form->input('comments');
            echo $this->Form->input('photo');
            echo $this->Form->input('ibutton_id');
            echo $this->Form->input('drivingpassportno',['label'=>'Driving Passport No']);
            echo $this->Form->input('drivingpassportexp', ['type'=>'text','empty' => true,'label'=>'Driving Passport Expiry Date','class'=>'datemask','templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-09)']]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('vehicle_id');
            echo $this->Form->input('drivinglicenseclass',['label'=>'Driving Licence Class']);
            echo $this->Form->input('contractor_id', ['options' => $contractors, 'empty' => true]);
            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true]);
            echo $this->Form->input('reporingtime', ['label'=>'Reporting Time','empty' => true]);
            echo $this->Form->input('offday1');
            echo $this->Form->input('offday2');
            echo $this->Form->input('supervisor_id', ['options' => $supervisors, 'empty' => true]);
            echo $this->Form->input('drivergroups.ids', ['label'=>'Driver Group','options' => $drivergroups]);
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
  'AdminLTE./plugins/datepicker/datepicker3',
  'AdminLTE./plugins/select2/select2.min'
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
   
