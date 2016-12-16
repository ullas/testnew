<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Time Policy <small>Please fill the details to edit Time Policy</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/Timepolicies/"> Time Policies</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($timepolicy) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
            <?php
            echo $this->Form->input('name');
			 ?>
			<div class="form-group">
                  <label for="sunday" class="col-sm-3 control-label" style="padding-top:0" >Sunday</label>
				  <div class="col-sm-1">
				  <?php echo $this->Form->checkbox('sunday', array('label' => false));?>
                  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			
			<div class="form-group">
                  <label for="monday" class="col-sm-3 control-label" style="padding-top:0" >Monday</label>
				  <div class="col-sm-1">
				  <?php echo $this->Form->checkbox('monday', array('label' => false));?>
                  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			
			<div class="form-group">
                  <label for="tuesday" class="col-sm-3 control-label" style="padding-top:0" >Tuesday</label>
				  <div class="col-sm-1">
				  <?php echo $this->Form->checkbox('tuesday', array('label' => false));?>
                  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			
			<div class="form-group">
                  <label for="wednesday" class="col-sm-3 control-label" style="padding-top:0" >Wednesday</label>
				  <div class="col-sm-1">
				  <?php echo $this->Form->checkbox('wednesday', array('label' => false));?>
                  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			
			<div class="form-group">
                  <label for="thursday" class="col-sm-3 control-label" style="padding-top:0" >Thursday</label>
				  <div class="col-sm-1">
				  <?php echo $this->Form->checkbox('thursday', array('label' => false));?>
                  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			
			<div class="form-group">
                  <label for="friday" class="col-sm-3 control-label" style="padding-top:0" >Friday</label>
				  <div class="col-sm-1">
				  <?php echo $this->Form->checkbox('friday', array('label' => false));?>
                  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			
			<div class="form-group">
                  <label for="saturday" class="col-sm-3 control-label" style="padding-top:0" >Saturday</label>
				  <div class="col-sm-1">
				  <?php echo $this->Form->checkbox('saturday', array('label' => false));?>
                  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			
            <?php
            echo $this->Form->input('sun_start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('sun_end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('mon_start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('mon_end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('tue_start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('tue_end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('wed_start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('wed_end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('thu_start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('thu_end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('fri_start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('fri_end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('sat_start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('sat_end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            ?>
			<div class="form-group">
                  <label for="ev" class="col-sm-3 control-label" style="padding-top:0" >EV</label>
				  <div class="col-sm-1">
				  <?php echo $this->Form->checkbox('ev', array('label' => false));?>
                  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			
            <?php
            echo $this->Form->input('description');
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

		//datepicker

    	$('.mptldp').datepicker({

    		format:"dd/mm/yy",

      		autoclose: true,
      		clearBtn: true

    	});
    
     $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });

  });
</script>
<?php $this->end(); ?>

