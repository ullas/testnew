<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Inspection <small>Please fill the details to create a new Inspection</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li><a href="/Inspections"> Inspections</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($inspection) ?>
   <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">

        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
       <?php
                echo $this->Form->input('name',['templateVars' => ['help' => 'A short name for the inspection'],'required' => 'required']);
                echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
                echo $this->Form->input('descriptions');
				echo $this->Form->input('inspectionform_id', ['label'=>'Inspection Form','options' => $inspectionforms, 'empty' => true,'class'=>'select2','required' => 'required','templateVars' => ['help' => 'Select an inspection form from the list','buttontag' => '<a href="/Inspectionforms/add/" id="addfltr" class="btn btn-sm btn-success" title="Add New Vehicle"><i class="fa fa-plus" aria-hidden="true"></i></a>']]);
                // echo $this->Form->input('inspectionform_id', ['label'=>'Inspection Form','options' => $inspectionforms, 'empty' => true,'class'=>'select2', 'templateVars' => ['help' => 'Select an inspection form from the list'],]);
                echo $this->Form->input('date', ['empty' => true,'type'=>'text','required' => 'required', 'class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
                echo $this->Form->input('inspectionstatus_id', ['label'=>'Inspection Status','options' => $inspectionstatuses, 'empty' => true,'class'=>'select2']);
        ?>
    </div>

          <div class="contentdiv"></div>
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


	$(document.body).on("change","#inspectionform-id",function(){
		
		$(".contentdiv").html("");
		
		var numItems=0;
 		$.ajax({
        	type: "POST",
        	url: '/Inspections/getInspectionformContents',
        	data: 'inspectionformid='+this.value,
        	success : function(ttdata) {
        		var contentarr=JSON.parse(ttdata);var html="";
				$.each(contentarr, function(key, value) {
					if(value["inspectionitemtype_id"]==1){
						html+="<div class='classname' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-3'><div class='form-group'><label>Name:</label><div class='input-group'><input disabled name='issue"+numItems+"' value='" + value['name'] + "' class='form-control insitemname ' id='insitemname"+numItems+"'/></div>	</div></div> <div 	class='col-sm-3'><div class='checkbox'><label></label><input type='checkbox' >Pass/Fail</div></div>   </div><hr/></div>";				
					}else if(value["inspectionitemtype_id"]==2){
						html+="<div class='classname' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-3'><div class='form-group'><label>Name:</label><div class='input-group'><input disabled name='issue"+numItems+"' value='" + value['name'] + "' class='form-control insitemname ' id='insitemname"+numItems+"'/></div>	</div></div> <div 	class='col-sm-3'><div class='checkbox'><label></label><input type='checkbox' >Pass/Fail</div></div>   </div><hr/></div>";				
					}else if(value["inspectionitemtype_id"]==3){
						html+="<div class='classname' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-3'><div class='form-group'><label>Name:</label><div class='input-group'><input disabled name='issue"+numItems+"' value='" + value['name'] + "' class='form-control insitemname ' id='insitemname"+numItems+"'/></div>	</div></div> <div 	class='col-sm-3'><div class='form-group'><label></label><div class='input-group'><input name='issue"+numItems+"' value='" + value['name'] + "' class='form-control insitemname ' id='insitemname"+numItems+"'/></div>	</div></div>   </div><hr/></div>";				
					}
    			});
    			$(".contentdiv").append(html);
				return true;
        	},error: function(data) {
        	    alert("Couldn't load the particular inspection forms contents.Please try again later.");
				return false;
        	}    
        });
	});
	
  });
</script>
<?php $this->end(); ?>
