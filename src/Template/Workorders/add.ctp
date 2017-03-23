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
		   
		   
				    
		   	
			
		   
		   <?php
		   
		   	echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required','templateVars' => ['buttontag' => '<a href="/Vehicles/add/" id="addfltr" class="btn btn-sm btn-success" title="Add New Vehicle"><i class="fa fa-plus" aria-hidden="true"></i></a>']]);
		    // echo $this->Form->input('vehicle_id', ['options' => $vehicles,array('div' => false), 'empty' => true,'class'=>'select2','required' => 'required']);
           	echo $this->Form->input('startdate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Start Date ','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'required' => 'required']);
            echo $this->Form->input('lables',['label'=>'Labels']);
            echo $this->Form->input('odometer');
             ?>
		        
         <div class="form-group">
                  	<label for="void" class="col-sm-3 control-label" style="padding-top:0" >Mark as Void</label>
				  	<div class="col-sm-6">
				    	<input name="void" value="1" id="void" class="" type="checkbox">
				    	<!-- <input type="text" name="labour" class="form-control" id="part1"> -->
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
            
		 <?php	
            echo $this->Form->input('vendor_id', ['options' => $vendors, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('completiondate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Completion Date','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('dicount',['label'=>'Discount']);
            echo $this->Form->input('tax');
			?>
			
			 
			
			<?php
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
    
    <hr/>
	<style>
		a.delete{
			margin-top:20px;
		}
	</style>	 <br/><br/><br/>
	
	<div class="col-md-2"></div>
	
				        <div class="col-md-6">
								<div class="box">
								
								  <div class="box-header">
								       <h4 class="box-title">Labor & Parts</h4>
								  </div>
								
								  <div class="box-body maindiv">
								      <div class="classname" id="contentDiv1">
								          <div class="clearfix">
								              <div class="col-sm-3 "><label>Part:</label>
								              	<input id="test" class="form-control type" name="type"/></div>
								              <div class="col-sm-3"><label>Type:</label>
								              	<input type="text" class="form-control" id="type1"/></div>
								              	<div class="col-sm-3"><label>Select:</label>
								              	<input id="test" class="form-control test" name="test"/></div>
								              	<!-- <?php
		   											echo $this->Form->input('servicetask_id1', ['label'=>'Service Task','options' => $servicetasks, 'empty' => true,'class'=>'select2','required' => 'required']);
											   	?> -->
								          <div class="col-sm-3 text-center"><!-- <a class="delete btn btn-danger btn-flat" id="delete1"><i class="fa fa-trash"></i></a> --></div>
 										</div>
 										<hr/>
								      </div>
								  </div>
								
								  <div class="box-footer">
								      <input type="button" class="btn btn-flat btn-primary" id="btnAddControl" value="Add Control" />
								      
								  </div>
							</div>
						</div>
						
						
						<div class="col-md-3">
							<div class="box">
								
								  <div class="box-header">
								        <h4 class="box-title">Labor & Parts</h4> 
								  </div>
								
								  <div class="box-body"><div class="form-horizontal">
							<?php
								echo $this->Form->input('labour');
            					echo $this->Form->input('parts');
							?></div>
							</div></div>
						</div>
						
  </div>
  <!-- /.row -->
  <div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                	<input type="button" class="btn btn-flat btn-success" id="btnSave" value="Ajax Save"/>
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

	var servicetaskdata=[];
	var servicetaskarr=<?php echo $servicetaskarr ?>;
	$.each(servicetaskarr, function(key, value) {
    	servicetaskdata.push({'id':key, "text":value});
	});

	window.onload = function () { 
        $('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		
		$('.type').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: [{'id':1, "text":"Part"},{'id':2, "text":"Labour"}]
		});
    }
    
  $(function () {


	$('.maindiv').on('change', 'input.inputpart', function() {
    	var numItems = $('.inputpart').length;
    	var partcount=0;
		for(count = 1; count <= numItems; count++){
			var tempval=$('#part'+count).val();
			if(tempval!="" && tempval!=null){
				partcount+=parseInt(tempval);
			}
		}
		//set text
		$('#parts').val(partcount);
	});
	




    //Initialize Select2 Elements
    // $(".select2").select2();
    $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });
   
	//add control button onclick
	// var band_count = 0;
	$("#btnAddControl").click(function (event) {
		
		
		event.preventDefault();
		var numItems = $('.classname').length+1;
		$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div 	class='col-sm-3'><label>Part:</label><input type='text' name='labour"+numItems+"' class='form-control inputpart' id='part"+numItems+"'/></div><div class='col-sm-3'><label>Type:</label><input type='text' 	class='form-control' id='type"+numItems+"'/></div><div class='col-sm-3'><label>Select:</label><input id='test' class='form-control test' name='test'/></div></div><hr/></div>");
		// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div 	class='col-sm-3'><label>Part:</label><input type='text' name='labour"+numItems+"' class='form-control' id='part"+numItems+"'/></div><div class='col-sm-3'><label>Type:</label><input type='text' 	class='form-control' id='type"+numItems+"'/></div><div class='col-sm-3 text-center'></div></div><hr/></div>");
		// $('<div>' + $('#servicetasks_selector option:selected').text() + '</div>').appendTo(".maindiv");	
	
	
		// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div 	class='col-sm-3'>" $('#bands_selector')"</div></div><hr/></div>");
        // $('<input type="hidden" name="data[Band][Band]['+band_count.toString()+']" value="'+$("#bands_selector option:selected").val()+'">').appendTo('#event_form');
        // band_count++;
        
        
		$('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		
	});
		          		

	//delete btn onclick
	$('.maindiv').on('click', 'a.delete', function() {
		$(this).parent().closest('div .classname').remove();
	});

	var postdata = [];
	//save btn onclick
	$("#btnSave").click(function () {
		
		//get input value
		var issuedate = document.getElementById("issuedate").value;
		var workorderstatus = document.getElementById("workorderstatus-id").value;

    	if (issuedate != "" && workorderstatus!=null) {

    		$.get('/Workorders/createajax_data?issuedate='+issuedate+'&workorderstatus='+workorderstatus, function(d) {
   		 		if(d!="error"){
   		 			
   		 			//labor & parts
					var numItems = $('.classname').length;
					for(count = 1; count <= numItems; count++){
						postdata.push($('#part'+count).val() + "^" + $('#type'+count).val()+ "^" + d);
					}
					$.get('/Workorders/addLaborParts?content='+postdata, function(d) {
    					// alert(d);
    				});
   		 		}
    		});
    	}else{
    		alert("Please enter the mandatory fields.");
    		return false;
    	}
    	
		
	});
   
  });
</script>
<?php $this->end(); ?>      	 