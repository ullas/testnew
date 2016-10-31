<?php

  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}<div class="col-sm-offset-3 col-sm-6" style="margin-top:4px">{{help}}</div></div>',
     'label' => '<label class="col-sm-3 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
    'checkbox' => '<div class="col-sm-6"><input type="checkbox" name="{{name}}"{{attrs}}/></div>',
     'select' => '<div class="col-sm-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];

 
$this->Form->templates($myTemplates);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Address<small>Please fill the details to create a new Address</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Servicesentries/">Addresses</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($address) ?>
    <div class="box box-primary">
  		<div class="box-body">
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('name',['required' => 'required']);
            echo $this->Form->input('designation');
            echo $this->Form->input('email',['required' => 'required']);
           
            echo $this->Form->input('mobile',['required' => 'required']);
            echo $this->Form->input('apartment');
            echo $this->Form->input('streetname',['label'=>'Street Name']);
            echo $this->Form->input('landmark',['label'=>'Land Mark']);
            echo $this->Form->input('areaname',['label'=>'Area Name']);
            echo $this->Form->input('countryshortcode',['label'=>'Country Short Code']);
            echo $this->Form->input('stateshortcode',['label'=>'State Short Code']);
            echo $this->Form->input('city');
            echo $this->Form->input('pincode',['label'=>'Pin Code']);
            //echo $this->Form->checkbox('iscurrentAddress',['label'=>'Is Current Address']);
            ?>
			 <div class="form-group">
                  	 
                   	  <label for="iscurrentAddress" class="col-sm-3 control-label" style="padding-top:0" >Mark as Void</label>
				  <div class="col-sm-6">
				    <input name="iscurrentAddress" value="1" id="iscurrentAddress" class="flat flat-blue" type="checkbox">
                   	
				  </div>
				  
				</div>
			
		<?php	
            echo $this->Form->input('distributionlists.ids', ['label'=>'Distribution List','options' => $distributionlists,'class'=>'select2']);
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
 </div></div>
</section>
<!-- /.content -->
<?php
$this->Html->css([

  'AdminLTE./plugins/select2/select2.min',
   'AdminLTE./plugins/iCheck/all'
  ],
  ['block' => 'css']);

$this->Html->script([
 'AdminLTE./plugins/select2/select2.full.min',

 'AdminLTE./plugins/iCheck/icheck.min'
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
   
   $(".select2").select2({ width: '100%' });
   $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

  });
</script>
<?php $this->end(); ?>
  
