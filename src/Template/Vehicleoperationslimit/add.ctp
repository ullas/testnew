<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}<div class="col-sm-offset-3 col-sm-6" style="margin-top:4px">{{help}}</div></div>',
     'label' => '<label class="col-sm-3 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-6"><div class="input-group">{{icon}}<input type="{{type}}" name="{{name}}"{{attrs}}/></div></div>',
    
     'select' => '<div class="col-sm-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];
$this->Form->templates($myTemplates);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Vehicle Operations Limit <small>Please fill the details to create a new Vehicle Operations Limit</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
	<li><a href="/Vehicleoperationslimit/"> Vehicle Operations Limit</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($vehicleoperationslimit) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
        	echo $this->Form->input('vehice_id', ['label'=>'Vehicle','options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
            
            //echo $this->Form->input('vehice_id');
            echo $this->Form->input('speed_limit');
            echo $this->Form->input('battery_voltage');
            echo $this->Form->input('accelarationlimit', ['label'=>'Accelaration Limit']);
            echo $this->Form->input('breakinglimit', ['label'=>'Breaking Limit']);
            echo $this->Form->input('crashlimit', ['label'=>'Crash Limit']);
            echo $this->Form->input('shutlimit', ['label'=>'Shunt Limit']);
            echo $this->Form->input('continiousruntime', ['label'=>'Continious Run Time']);
            echo $this->Form->input('odometer_offset');
            echo $this->Form->input('ibutton_id', ['options' => $iButtons, 'empty' => true,'class'=>'select2']);
        ?>
    </fieldset>
    <div class="form-group">
                  	<label for="markasvoid" class="col-sm-3 control-label" style="padding-top:0" >Mark as Void</label>
				  	<div class="col-sm-6">
				    	<input name="markasvoid" value="1" id="markasvoid" class="" type="checkbox">
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
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
