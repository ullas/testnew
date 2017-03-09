<?php echo $this->element('templateelement'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Work Order <small>Please fill the details to create a new Work Order</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li><a href="/Workorders/"> Work Orders</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($workorder)?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
               <?php
            echo $this->Form->input('issuedate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Issue Date ','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'required' => 'required']);
            echo $this->Form->input('workorderstatus_id',['empty' => true,'label'=>'Work Order Status ','class'=>'select2','required' => 'required']);
           ?>
		   
		   
				    <a href="/Vehicles/add/" id="addfltr" class="btn btn-sm btn-success" style="float: right"  title="Add New"><i class="fa fa-plus" aria-hidden="true"></i></a>
		   	
			
		   
		   <?php
		    echo $this->Form->input('vehicle_id', ['options' => $vehicles,array('div' => false), 'empty' => true,'class'=>'select2','required' => 'required']);
           
		    echo $this->Form->input('startdate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Start Date ','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'required' => 'required']);
            echo $this->Form->input('lables',['label'=>'Labels']);
            echo $this->Form->input('odometer');
             ?>
         
         <div class="form-group">
                  	<label for="void" class="col-sm-3 control-label" style="padding-top:0" >Mark as Void</label>
				  	<div class="col-sm-6">
				    	<input name="void" value="1" id="void" class="" type="checkbox">
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
            
		 <?php	
             echo $this->Form->input('vendor_id', ['options' => $vendors, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('completiondate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Completion Date','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('labour');
            echo $this->Form->input('parts');
            echo $this->Form->input('dicount',['label'=>'Discount']);
            echo $this->Form->input('tax');
            echo $this->Form->input('issuedby_id',['options' => $issuedbies,'empty' => true,'label'=>'Issued By','class'=>'select2']);
            echo $this->Form->input('assignedby_id',['options' => $assignedbies,'empty' => true,'label'=>'Assigned By','class'=>'select2']);
            echo $this->Form->input('assignto_id',['options' => $assigntos,'empty' => true,'label'=>'Assigned To','class'=>'select2']);
            echo $this->Form->input('invoicenumber',['label'=>'Invoice Number']);
            echo $this->Form->input('phonenumber',['label'=>'Phone Number']);
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
    $(".select2").select2();
    $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });
  });
</script>
<?php $this->end(); ?>      	 