<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Device <small>Please fill the details to create a new Device</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Hardware</a></li>
    <li><a href="/devices/"> Devices</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($device) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
             echo $this->Form->input('code',['required' =>'required']);
            echo $this->Form->input('install_date', ['empty' => true,'type'=>'text','class'=>'datemask' , 'required' =>'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('installed_by',['required' =>'required']);
            echo $this->Form->input('certified_by',['required' =>'required']);
            echo $this->Form->input('comments');
            echo $this->Form->input('provider_id', ['options' => $providers, 'empty' => true,'class'=>'select2','required' =>'required']);
            echo $this->Form->input('distance_type');
		?>	
		<div class="form-group">
                  	<label for="odometersupport" class="col-sm-3 control-label" style="padding-top:0" >Odometer Support</label>
				  	<div class="col-sm-6">
				    	<input name="odometersupport" value="1" id="odometersupport" class="" type="checkbox">
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
		<?php	
            
            echo $this->Form->input('initodometer',['label'=>'Initial Odometer']);
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
    //Initialize Select2 Elements
    $(".select2").select2();
     $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });

  });
</script>
<?php $this->end(); ?>

