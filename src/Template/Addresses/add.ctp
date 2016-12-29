<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Address<small>Please fill the details to create a new Address</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Addresses/">Addresses</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($address) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('name',['required' => 'required']);
            echo $this->Form->input('designation');
            echo $this->Form->input('email');
           
            echo $this->Form->input('mobile');
            echo $this->Form->input('apartment');
            echo $this->Form->input('streetname',['label'=>'Street Name']);
            echo $this->Form->input('landmark',['label'=>'Land Mark']);
            echo $this->Form->input('areaname',['label'=>'Area Name']);
            echo $this->Form->input('countryshortcode',['label'=>'Country Short Code']);
            echo $this->Form->input('stateshortcode',['label'=>'State Short Code']);
            echo $this->Form->input('city');
            echo $this->Form->input('pincode',['label'=>'Pin Code']);
             ?>
        
             <div class="form-group">
                  	<label for="iscurrentaddress" class="col-sm-3 control-label" style="padding-top:0" >Is Current Address ?</label>
				  	<div class="col-sm-6">
				    	<input name="iscurrentaddress" value="1" id="iscurrentaddress" class="" type="checkbox">
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
			<?php
            echo $this->Form->input('distributionlists._ids', ['label'=>'Distribution List','options' => $distributionlists,'class'=>'select2']);
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
  
