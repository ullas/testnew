<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   New Issue <small>Please fill the details to create a new Issue</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li><a href="/Issues"> Issues</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($issue) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
                   echo $this->Form->input('reportedon', ['label'=>'Reported On','empty' => true,'type'=>'text', 'class'=>'datemask','required' => 'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
                   
                	
                  echo $this->Form->input('summary',['required' => 'required']);

                    
                	
                  echo $this->Form->input('description');

                    
                	
                  echo $this->Form->input('odometer');

                    
                	
                  echo $this->Form->input('reportedby_id',[ 'empty' => true,'label'=>'Reported By','class'=>'select2']);

                    
                	
                  echo $this->Form->input('tags');

                    
                   echo $this->Form->input('duedate', ['label'=>'Due Date','empty' => true,'type'=>'text', 'class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
                   
                	
                  echo $this->Form->input('overdueodometer',['label'=>'Over Due Odometer']);

           ?>
           <div class="form-group">
                  	<label for="markasvoid" class="col-sm-3 control-label" style="padding-top:0" >Mark as Void</label>
				  	<div class="col-sm-6">
				    	<input name="markasvoid" value="1" id="markasvoid" class="" type="checkbox">
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>         
           <?php    	
            echo $this->Form->input('workorder_id', ['label'=>'Work Order','options' => $workorders, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('serviceentry_id', ['label'=>'Service Entry','options' => $servicesentries, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('addresses._ids', [ 'empty' => true,'options' => $addresses,'class'=>'select2','label'=>'Assigned To']);
	
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
   $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });

  });
</script>
<?php $this->end(); ?>
       