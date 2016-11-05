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
    Edit Work Order <small>Please fill the details to edit a Work Order</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Workorders/"> Work Orders</a></li>
    <li class="active">Edit</li>
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
            echo $this->Form->input('workorderstatus_id',['label'=>'Work Order Status ','class'=>'select2','required' => 'required']);
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
            echo $this->Form->input('startdate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Start Date ','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'required' => 'required']);
            echo $this->Form->input('lables');
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
            echo $this->Form->input('issuedby_id',['label'=>'Issued By','class'=>'select2']);
            echo $this->Form->input('assignedby_id',['label'=>'Assigned By','class'=>'select2']);
            echo $this->Form->input('assignto_id',['label'=>'Assigned To','class'=>'select2']);
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
    //Initialize Select2 Elements
    $(".select2").select2();
    $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });
  });
</script>
<?php $this->end(); ?>      	 