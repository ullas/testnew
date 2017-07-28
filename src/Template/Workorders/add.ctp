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
            echo $this->Form->input('workorderstatus_id',['options' => $workorderstatuses,'empty' => true,'label'=>'Work Order Status ','class'=>'select2','required' => 'required']);
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
								      <div class="classnameheader" id="contentDiv1">
								          <div class="clearfix">
								          	<!-- <div class="col-sm-4"><label>Service Task:</label>
								              	<input id="test" class="form-control test" name="test"/></div> -->
								              <!-- <div class="col-sm-4 "><label>Type:</label>
								              	<input id="test" class="form-control type" name="type"/></div> -->
								              	<div class="col-sm-4 ">
								              
											   	<input  name='typeselect"' class='form-control typeselect' id='typeselect'/>
											   	
											   	</div>
								              	<div class="col-sm-4 ">
								              	<input type="button" class="btn btn-flat btn-primary" id="btnAddLaborControl" value="Add Labor Expenses" /></div>
								              	
								              	<div class="col-sm-4 ">
								              	<input type="button" class="btn btn-flat btn-primary" id="btnAddPartControl" value="Add Parts Expenses" /></div>
								              	
								              	 
								              	
								              	
								              	
								              	
								              	<!-- <div class="col-sm-3"><label>Contact:</label>
								              	<input type="text" class="form-control" id="type1"/></div>
								              	 <div class="col-sm-3"><label>Hourly Rate:</label>
								              	<input type="text" class="form-control" id="type1"/></div>
								              	
								              	<div class="col-sm-3"><label>Hours:</label>
								              	<input type="text" class="form-control" id="type1"/></div>
								              	<div class="col-sm-3"><label>Tax:</label>
								              	<input type="text" class="form-control" id="type1"/></div>
								              	<div class="col-sm-3"><label>Part:</label>
								              	<input type="text" class="form-control" id="type1"/></div>
								              	<div class="col-sm-3"><label>Unit Cost:</label>
								              	<input type="text" class="form-control" id="type1"/></div>
								              	<div class="col-sm-3"><label>Quantity:</label>
								              	<input type="text" class="form-control" id="type1"/></div>
								              	<div class="col-sm-3"><label>Tax:</label>
								              	<input type="text" class="form-control" id="type1"/></div> -->
								              	<!-- <?php
		   											echo $this->Form->input('servicetask_id1', ['label'=>'Service Task','options' => $servicetasks, 'empty' => true,'class'=>'select2','required' => 'required']);
											   	?> -->
								          <!-- <div class="col-sm-3 text-center"><a class="delete btn btn-danger btn-flat" id="delete1"><i class="fa fa-trash"></i></a></div> -->
 										</div>
 										<hr/>
								      </div>
								  </div>
								
								  <!-- <div class="box-footer">
								      <input type="button" class="btn btn-flat btn-primary" id="btnAddControl" value="Add Control" />
								      
								  </div> -->
							</div>
						</div>
						
						
						<div class="col-md-3">
							<div class="box">
								
								  <div class="box-header">
								        <h4 class="box-title">Labor & Parts</h4> 
								  </div>
								
								  <div class="box-body"><div class="form-horizontal">
							<?php
								echo $this->Form->input('labors');
            					echo $this->Form->input('parts');
								echo $this->Form->input('dicount',['label'=>'Discount']);
            					echo $this->Form->input('tax');
			
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

	var issuedata=[];
	var issuearr=<?php echo $issuearr ?>;
	$.each(issuearr, function(key, value) {
    	issuedata.push({'id':key, "text":value});
	});
	
	var contactdata=[];
	var contactarr=<?php echo $addressesarr ?>;
	$.each(contactarr, function(key, value) {
    	contactdata.push({'id':key, "text":value});
	});
	
	var partdata=[];
	var partarr=<?php echo $partssarr ?>;
	$.each(partarr, function(key, value) {
    	partdata.push({'id':key, "text":value});
	});
	
	window.onload = function () { 
        $('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		
		 $('.typeselect').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: [{'id':1, "text":"Service Task"},{'id':2, "text":"Issue"}]
		});
		
		// $('.type').select2({
    		// width: '100%',allowClear: true,placeholder: "Select",data: [{'id':1, "text":"Part"},{'id':2, "text":"Labour"}]
		// });
    }
    
  $(function () {

				
				
					//delete btn onclick
					// $('.maindiv').on('click', 'a.delete', function() {
						// // alert("clicked---"+ JSON.stringify($(this).parent().closest('div .classname')));
						// $(this).parent().closest('div .classname').hide();
// 						
					// });
				
					$('.maindiv').on('click', 'a.delete', function() 
					{
		        		if (confirm("Are you sure you want to delete the particular Item ?")) 
		        				{
									$(this).parent().closest('div .classname').hide();
									calculateAll();
									return true;
		           		   		} 
		           		   		else 
		           		   		{
		             				return false;
		           				}
	
	     			});
			
			// $('.maindiv .classname').each(function(i){
		    			// alert("ff";)
						         // // do stuff
						// });
			function calculateAll()
			{
				
				var numItems = $('.laborhrs').length;
		    	var laborcount=0;
		    	for(count = 1; count <= numItems; count++){
		    		if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
					{
						if($('#laborqty'+count).val().match(/^\d+$/))
		    			{ 
		    			
			    			if($('#laborrate'+count).val() == "" )  
			    			{
			    				var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
			    				if(tempval!="" && tempval!=null)
								{
									laborcount+=parseInt(tempval);
								}
			    			}
		    			
		    			else if($('#laborrate'+count).val() != "" )  
			    			{
			    				if($('#laborrate'+count).val().match(/^\d+$/))
			    				{
			    					var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
				    				if(tempval!="" && tempval!=null)
									{
										laborcount+=parseInt(tempval);
									}
			    				}
			    			}
		    			
		    			}
					}
		    		
					
				}
				//set text
				$('#labors').val(laborcount);
				
				//second
				var numItems = $('.laborhrs').length;
		    	var laborcount=0;
		    	for(count = 1; count <= numItems; count++){
		    		if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
					{
						if($('#laborrate'+count).val().match(/^\d+$/))
		    			{ 
			    			if($('#laborqty'+count).val() == "") 
			    			{
			    				var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
								if(tempval!="" && tempval!=null)
								{
									laborcount+=parseInt(tempval);
								}
			    			}
			    			
			    			else if($('#laborqty'+count).val() != "") 
			    			{
			    				if($('#laborqty'+count).val().match(/^\d+$/) )
			    				{
			    					var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
									if(tempval!="" && tempval!=null)
									{
										laborcount+=parseInt(tempval);
									}
			    				}
			    			}
			    		
						}
					}
		    		
				}
				//set text
				$('#labors').val(laborcount);
				
				//third
				var numItems = $('.partqty').length;
		    	var partcount=0;
		    	for(count = 1; count <= numItems; count++){
		    		if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
					{
						if($('#partqty'+count).val().match(/^\d+$/))
		    			{
			    			if($('#partrate'+count).val() =="")
			    			{
			    				var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
								if(tempval!="" && tempval!=null)
								{
									partcount+=parseInt(tempval);
								}
			    			}
			    			else if($('#partrate'+count).val() !="")
			    			{
			    				if($('#partrate'+count).val().match(/^\d+$/))
			    				{
			    					var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
									if(tempval!="" && tempval!=null)
									{
										partcount+=parseInt(tempval);
									}
			    				}
			    			}
						
						}
					}
		    		
				}
				//set text
				$('#parts').val(partcount);
				
				//fourth
				var numItems = $('.inputrate').length;
		    	var partcount=0;
		    	for(count = 1; count <= numItems; count++){
		    		if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
					{
						if($('#partrate'+count).val().match(/^\d+$/))
		    			{
			    			if($('#partqty'+count).val() == "")
			    			{
			    				var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
								if(tempval!="" && tempval!=null)
								{
									partcount+=parseInt(tempval);
								}
			    			}
			    			else if($('#partqty'+count).val() != "")
			    			{
			    				if($('#partqty'+count).val().match(/^\d+$/))
			    				{
			    					var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
									if(tempval!="" && tempval!=null)
									{
										partcount+=parseInt(tempval);
									}
			    				}
			    			}
						
						}
					}
		    		
				}
				//set text
				$('#parts').val(partcount);
				
				
				
			}
			
			//calculate total labor cost on keyup of Hours
			$('.maindiv').on('change keyup', 'input.laborhrs', function() {
				//validation for numbers only
				
		    	var numItems = $('.laborhrs').length;
		    	var laborcount=0;
		    	for(count = 1; count <= numItems; count++){
		    		if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
					{
						if($('#laborqty'+count).val().match(/^\d+$/))
		    			{ 
		    			
			    			if($('#laborrate'+count).val() == "" )  
			    			{
			    				var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
			    				if(tempval!="" && tempval!=null)
								{
									laborcount+=parseInt(tempval);
								}
			    			}
		    			
		    			else if($('#laborrate'+count).val() != "" )  
			    			{
			    				if($('#laborrate'+count).val().match(/^\d+$/))
			    				{
			    					var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
				    				if(tempval!="" && tempval!=null)
									{
										laborcount+=parseInt(tempval);
									}
			    				}
			    			}
		    			
		    			}
					}
		    		
					
				}
				//set text
				$('#labors').val(laborcount);
			});
			
			//calculate total labor cost on keyup of HoursRate
			$('.maindiv').on('change keyup', 'input.laborrate', function() {
		    	var numItems = $('.laborhrs').length;
		    	var laborcount=0;
		    	for(count = 1; count <= numItems; count++){
		    		if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
					{
						if($('#laborrate'+count).val().match(/^\d+$/))
		    			{ 
			    			if($('#laborqty'+count).val() == "") 
			    			{
			    				var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
								if(tempval!="" && tempval!=null)
								{
									laborcount+=parseInt(tempval);
								}
			    			}
			    			
			    			else if($('#laborqty'+count).val() != "") 
			    			{
			    				if($('#laborqty'+count).val().match(/^\d+$/) )
			    				{
			    					var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
									if(tempval!="" && tempval!=null)
									{
										laborcount+=parseInt(tempval);
									}
			    				}
			    			}
			    		
						}
					}
		    		
				}
				//set text
				$('#labors').val(laborcount);
			});


 			//calculate total parts cost on keyup of Quantity	
			$('.maindiv').on('change keyup', 'input.partqty', function() {
		    	var numItems = $('.partqty').length;
		    	var partcount=0;
		    	for(count = 1; count <= numItems; count++){
		    		if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
					{
						if($('#partqty'+count).val().match(/^\d+$/))
		    			{
			    			if($('#partrate'+count).val() =="")
			    			{
			    				var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
								if(tempval!="" && tempval!=null)
								{
									partcount+=parseInt(tempval);
								}
			    			}
			    			else if($('#partrate'+count).val() !="")
			    			{
			    				if($('#partrate'+count).val().match(/^\d+$/))
			    				{
			    					var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
									if(tempval!="" && tempval!=null)
									{
										partcount+=parseInt(tempval);
									}
			    				}
			    			}
						
						}
					}
		    		
				}
				//set text
				$('#parts').val(partcount);
			});
			
			//calculate total parts cost on keyup of UnitCost
			$('.maindiv').on('change keyup', 'input.inputrate', function() {
		    	var numItems = $('.inputrate').length;
		    	var partcount=0;
		    	for(count = 1; count <= numItems; count++){
		    		if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
					{
						if($('#partrate'+count).val().match(/^\d+$/))
		    			{
			    			if($('#partqty'+count).val() == "")
			    			{
			    				var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
								if(tempval!="" && tempval!=null)
								{
									partcount+=parseInt(tempval);
								}
			    			}
			    			else if($('#partqty'+count).val() != "")
			    			{
			    				if($('#partqty'+count).val().match(/^\d+$/))
			    				{
			    					var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
									if(tempval!="" && tempval!=null)
									{
										partcount+=parseInt(tempval);
									}
			    				}
			    			}
						
						}
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
						// $("#btnAddControl").click(function (event) {
					// 		
					// 		
							// event.preventDefault();
							// var numItems = $('.classname').length+1;
					// 		
							  // <!-- <div class="col-sm-3 text-center"><a class="delete btn btn-danger btn-flat" id="delete1"><i class="fa fa-trash"></i></a></div> -->
					//  										
							// // $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div 	class='col-sm-3'><label>Part:</label><input type='text' name='labour"+numItems+"' class='form-control inputpart' id='part"+numItems+"'/></div><div class='col-sm-3'><label>Type:</label><input type='text' 	class='form-control' id='type"+numItems+"'/></div><div class='col-sm-3'><label>Select:</label><input id='test' class='form-control test' name='test'/></div></div><hr/></div>");
					// 		
					// 		
					// 		
					// 		
							// // <input id="test" class="form-control test" name="test"/></div>
							// // <input type="button" class="btn btn-flat btn-primary" id="btnAddPartControl" value="Add Part" />
					// 		
							// // $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div class='col-sm-3'><label>Service Task:</label><input  name='servicetask"+numItems+"' class='form-control test' id='servicetask"+numItems+"'/></div> <div class='col-sm-3'><input type="button" class="btn btn-flat btn-primary" id='btnAddLaborControl1' value="Add Labor" /></div>  </div><hr/></div>");
					// 							              	
							// // $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div class='col-sm-3'><label>Service Task:</label><input  name='servicetask"+numItems+"' class='form-control test' id='servicetask"+numItems+"'/></div> <div class='col-sm-3'><input type="button" class="btn btn-flat btn-primary" id='btnAddLaborControl"+numItems+"' value="Add Labor" /></div> <div class='col-sm-3'><input type="button" class="btn btn-flat btn-primary" id='btnAddPartControl"+numItems+"' value="Add Part" /></div>  </div><hr/></div>");
					// 	
					// 	
							// $('.test').select2({
					    		// width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
							// });
					// 		
						// });
	$("#btnAddLaborControl").click(function (event) {
		
		
		
		event.preventDefault();
		var numItems = $('.laborhrs').length+1;
		if(document.getElementById("typeselect").value == 1)// for Service Task
		{
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><label>ServiceTask:</label><input  name='servicetask"+numItems+"' class='form-control test' id='wotype1"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div>    <div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div>   </div><hr/></div>");
	
		}
		else if(document.getElementById("typeselect").value == 2)// for Issues
		{
			
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><label>Issue:</label><input  name='issue"+numItems+"' class='form-control testissue' id='wotype1"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div>   <div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div>   </div><hr/></div>");  
	
		}
		
		
		
		$('.testissue').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: issuedata
		});
		$('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		$('.contact').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: contactdata
		});
		
	});
	$("#btnAddPartControl").click(function (event) {
		
		
		event.preventDefault();
		var numItems = $('.partqty').length+1;
		if(document.getElementById("typeselect").value == 1)// for Service Task
		{
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><label>ServiceTask:</label><input  name='servicetask"+numItems+"' class='form-control test' id='wotype2"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' 	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div>   </div><hr/></div>");
	
		}
		else if(document.getElementById("typeselect").value == 2)// for Issues
		{
			
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><label>Issue:</label><input  name='issue"+numItems+"' class='form-control testissue' id='wotype2"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' 	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='delete1'><i class='fa fa-trash'></i></a></div>   </div><hr/></div>");
	
		}
		
		$('.testissue').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: issuedata
		});
		$('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		$('.part').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: partdata
		});
		
	});
		          		




	

	// var postdata = [];
	//save btn onclick
	$("#btnSave").click(function () {
		
		var numItems = $('.laborhrs').length;
					
					for(count = 1; count <= numItems; count++)
					{ 
						//postdata.push($(' #typeof1'+count ).val() + "^" +$('#ident1'+count ).val() + "^" +  $('#wotype1'+count ).val() + "^" + $('#contactpart1'+count ).val() + "^" + $('#laborrate'+count).val() + "^" + $('#laborqty'+count).val()+ "^" + d );
						 if( $('#wotype1'+count ).val()==""  ||  $('#contactpart1'+count ).val()=="") 
						 {
						 	if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
						 	{
							 	alert("Please select Service Task and Contact Details");
						 	}
						 }
					}
		
		var numItems = $('.partqty').length;
					
					for(count = 1; count <= numItems; count++)
					{ 
						//postdata.push($(' #typeof2'+count ).val() + "^" + $('#ident2'+count ).val() + "^" +  $('#wotype2'+count ).val() + "^" + $('#contactpart2'+count ).val() + "^" + $('#partrate'+count).val() + "^" + $('#partqty'+count).val()+ "^" + d);
						if( $('#wotype2'+count ).val()==""  ||  $('#contactpart2'+count ).val()=="") 
						 {
						 	alert("Please select Service Task and Parts  Details");
						 }
					}
		
		
		//get input value
		var issuedate = document.getElementById("issuedate").value;
		var workorderstatus = document.getElementById("workorderstatus-id").value;
		var vehicleid = document.getElementById("vehicle-id").value;
		var startdate = document.getElementById("startdate").value;
		var lables = document.getElementById("lables").value;
		var odometer = document.getElementById("odometer").value;
		var voidvalue = document.getElementById("void").value;
		var vendorid = document.getElementById("vendor-id").value;
		var completiondate = document.getElementById("completiondate").value;
		var issuedbyid = document.getElementById("issuedby-id").value;
		var assignedbyid = document.getElementById("assignedby-id").value;
		var assigntoid = document.getElementById("assignto-id").value;
		var invoicenumber = document.getElementById("invoicenumber").value;
		var phonenumber = document.getElementById("phonenumber").value;
		var description = document.getElementById("description").value;
		var labor = document.getElementById("labors").value;
		var parts = document.getElementById("parts").value;
		var discount = document.getElementById("dicount").value;
		var tax = document.getElementById("tax").value;
		
    	if (issuedate != "" && workorderstatus!=null) {

    		$.get('/Workorders/createajax_data?issuedate='+issuedate+'&workorderstatus='+workorderstatus
    		+'&vehicleid='+vehicleid+'&startdate='+startdate+'&lables='+lables
    		+'&odometer='+odometer+'&voidvalue='+voidvalue+'&vendorid='+vendorid
    		+'&completiondate='+completiondate+'&issuedbyid='+issuedbyid+'&assignedbyid='+assignedbyid
    		+'&assigntoid='+assigntoid+'&invoicenumber='+invoicenumber+'&phonenumber='+phonenumber
    		+'&description='+description+'&labor='+labor+'&parts='+parts
    		+'&discount='+discount+'&tax='+tax
    		, function(d) {
   		 		if(d!="error"){
					var postdata = [];console.log(d);
					// alert('d--'+d);
   		 			//labor & parts
					// var numItems = $('.classname').length;
					// alert('numItems'+numItems);
					// for(count = 1; count <= numItems; count++){ 
						// // postdata.push($('#part'+count).val() + "^" + $('#type'+count).val()+ "^" + d);
						// postdata.push($('#ident'+count ).val() + "^" +  $('#wotype'+count ).val() + "^" + $('#contactpart'+count ).val() + "^" + $('#rate'+count).val() + "^" + $('#qty'+count).val()+ "^" + d);
						// // postdata.push(($('#rate'+count).val() * $('#qty'+count).val()) + "^" +  d);
					// }
					// $.get('/Workorders/addLaborParts?content='+postdata, function(d) {
    					// // alert(d);
    				// });
    				
    				//for labor
    				var numItems = $('.laborhrs').length;
					
					for(count = 1; count <= numItems; count++){ 
						
						if($("#laborrate"+count).parent().closest('div .classname').is(":visible")){
							postdata.push($(' #typeof1'+count ).val() + "^" +$('#ident1'+count ).val() + "^" +  $('#wotype1'+count ).val() + "^" + $('#contactpart1'+count ).val() + "^" + $('#laborrate'+count).val() + "^" + $('#laborqty'+count).val()+ "^" + d );
						 }
						
						
					}
					// $.get('/Workorders/addLaborParts?content='+postdata, function(d) {
    					// alert(d);
    				// });
    				
    				//for part
    				var numItems = $('.partqty').length;
					
					for(count = 1; count <= numItems; count++){ 
						// postdata.push($('#part'+count).val() + "^" + $('#type'+count).val()+ "^" + d);
						postdata.push($(' #typeof2'+count ).val() + "^" + $('#ident2'+count ).val() + "^" +  $('#wotype2'+count ).val() + "^" + $('#contactpart2'+count ).val() + "^" + $('#partrate'+count).val() + "^" + $('#partqty'+count).val()+ "^" + d);
						// postdata.push(($('#rate'+count).val() * $('#qty'+count).val()) + "^" +  d);
					}
					// postdata = "["+ postdata +"]";
					console.log('pdataaa---'+postdata);
					if($('.laborhrs').length>0 || $('.partqty').length>0)
						{
							$.get('/Workorders/addLaborParts?content='+postdata, function(d) 
								{
								// window.location.reload();
		    					// console.log('new ddd--'+d);
		    					});
						}
					
    				
    				console.log(postdata);
    				// alert(postdata);
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