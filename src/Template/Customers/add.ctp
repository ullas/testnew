<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Customer<small>Please fill the details to create a new Customer</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Customers/">Customers</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($customer) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('name');
            echo $this->Form->input('srv_exp_date', ['type'=>'text','empty' => true,'label'=>'Service Expiry Date','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('contact_first_name');
            echo $this->Form->input('tech_cont_first_name',['label'=>'Technical Contact First Name']);
            echo $this->Form->input('alert_email');
            echo $this->Form->input('srv_str_date', ['type'=>'text','empty' => true,'label'=>'Service Start Date','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('no_of_lic',['label'=>'No Of Licences']);
            echo $this->Form->input('contact_phone');
            echo $this->Form->input('tech_cont_phone',['label'=>'Technical Contact Phone']);
            echo $this->Form->input('address');
            echo $this->Form->input('contact_last_name');
            echo $this->Form->input('tech_cont_last_name',['label'=>'Technical Contact Last Name']);
            echo $this->Form->input('contact_email');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('country');
            echo $this->Form->input('zip');
            echo $this->Form->input('designation');
            echo $this->Form->input('fax');
            echo $this->Form->input('timezone');
            echo $this->Form->input('language');
			?>
			
			<div class="form-group">
                  	<label for="smsenabled" class="col-sm-3 control-label" style="padding-top:0" >SMS Enabled</label>
				  	<div class="col-sm-6">
				    	<input name="smsenabled" value="1" id="smsenabled" class="" type="checkbox">
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
			
			<?php
			
            
            echo $this->Form->input('initlat',['label'=>'Initial Latitude']);
            echo $this->Form->input('initlong',['label'=>'Initial Longitude']);
            echo $this->Form->input('updategroup',['label'=>'Update Group']);
            echo $this->Form->input('weekly_off1');
            echo $this->Form->input('weekly_off2');
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
  

