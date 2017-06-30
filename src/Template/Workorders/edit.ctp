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
								              	
								              	<!-- Disabled for editing -->
								              	<!-- <div class="col-sm-4 ">
								              
											   	<input  name='typeselect"' class='form-control typeselect' id='typeselect'/>
											   	
											   	</div>
								              	<div class="col-sm-4 ">
								              	<input type="button" class="btn btn-flat btn-primary" id="btnAddLaborControl" value="Add Labor Expenses" /></div>
								              	
								              	<div class="col-sm-4 ">
								              	<input type="button" class="btn btn-flat btn-primary" id="btnAddPartControl" value="Add Parts Expenses" /></div>
								              	 -->
								              	 
								              	
								              	
								              	
								              	
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
								          <div class="col-sm-3 text-center"><!-- <a class="delete btn btn-danger btn-flat" id="delete1"><i class="fa fa-trash"></i></a> --></div>
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
								echo $this->Form->input('labour');
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
// alert("workorderid"+<?php echo $workorderid ?>);

var currentworkorderid = <?php echo $workorderid ?>

	var servicetaskdata=[];
	var servicetaskarr=<?php echo $servicetaskarr ?>;
	$.each(servicetaskarr, function(key, value) {
    	servicetaskdata.push({'id':key, "text":value});
    	// console.log ("servicetaskdata--"+ JSON.stringify(servicetaskdata));
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
	
	var workorderlaborlineitemsdata=[];
	var workorderlaborlineitemsarr=	<?php echo $workorderlaborlineitemsarr ?>;
	console.log ("workorderlaborlineitemsdata--"+JSON.stringify(workorderlaborlineitemsarr) );
	$.each(workorderlaborlineitemsarr, function(key, value) {
    	// workorderlaborlineitemsdata.push({'id':key, "text":value});
    	// console.log ("workorderlaborlineitemsdata--"+ JSON.stringify(workorderlaborlineitemsdata));
	
	});
	
	var workorderpartslineitemsdata=[];
	var workorderpartslineitemsarr=	<?php echo $workorderpartslineitemsarr ?>;
	console.log ("workorderpartslineitemsdata--"+JSON.stringify(workorderpartslineitemsarr) );
	
	// workorderlineitemsstarr
	var workorderlineitemsstdata=[];
	var workorderlineitemsstarr=	<?php echo $workorderlineitemsstarr ?>;
	// console.log ("workorderlineitemsstdata--"+JSON.stringify(workorderlineitemsstarr) );
	
	// workorderlineitemsarr
	var workorderlineitemsdata=[];
	var workorderlineitemsarr=	<?php echo $workorderlineitemsarr ?>;
	console.log ("workorderlineitemsdataaaa--"+JSON.stringify(workorderlineitemsarr) );
	
	// workorderlineitemsptarr
	var workorderlineitemsptdata=[];
	var workorderlineitemsptarr=	<?php echo $workorderlineitemsptarr ?>;
	// console.log ("workorderlineitemsdataaaa--"+JSON.stringify(workorderlineitemsptarr) );
	
	// workorderlineitemslbrarr
	var workorderlineitemslbrdata=[];
	var workorderlineitemslbrarr=	<?php echo $workorderlineitemslbrarr ?>;
	
	window.onload = function () { 
		
        $('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		
		 $('.typeselect').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: [{'id':1, "text":"Service Task"},{'id':2, "text":"Issue"}]
		});
		$('.testissue').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: issuedata
		});
		$('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		$('.contact').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: contactdata
		});
		$('.part').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: partdata
		});
		// $('.type').select2({
    		// width: '100%',allowClear: true,placeholder: "Select",data: [{'id':1, "text":"Part"},{'id':2, "text":"Labour"}]
		// });
    }
    
  $(function () {
  	
  	// alert("currentworkorderlineitemsstarr"+ JSON.stringify(workorderlineitemsptarr));
  	// alert("currentworkorderlineitemsstarr"+ workorderlineitemsstarr[0]["id"]);
		alert("currentworkorderlineitemsstarr"+ workorderlineitemslbrarr[0]["id"]);
		
		$('.maindiv').on('change keyup', 'input.laborhrs ', function() {
		    	var numItems = $('.laborhrs').length;
		    	var laborcount=0;
		    	// alert ('numItems--'+ numItems);
		    	for(count = 1; count <= numItems; count++){
					var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
					if(tempval!="" && tempval!=null){
						laborcount+=parseInt(tempval);
					}
				}
				//set text
				$('#labour').val(laborcount);
			});
		
		$('.maindiv').on('change keyup', 'input.laborrate ', function() {
		    	var numItems = $('.laborhrs').length;
		    	var laborcount=0;
		    	// alert ('numItems--'+ numItems);
		    	for(count = 1; count <= numItems; count++){
					var tempval=$('#laborqty'+count).val()*$('#laborrate'+count).val();
					if(tempval!="" && tempval!=null){
						laborcount+=parseInt(tempval);
					}
				}
				//set text
				$('#labour').val(laborcount);
			});


			$('.maindiv').on('change keyup', 'input.partqty', function() {
		    	var numItems = $('.partqty').length;
		    	var partcount=0;
		    	for(count = 1; count <= numItems; count++){
					var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
					if(tempval!="" && tempval!=null){
						partcount+=parseInt(tempval);
					}
				}
				//set text
				$('#parts').val(partcount);
			});
			
			$('.maindiv').on('change keyup', 'input.inputrate', function() {
		    	var numItems = $('.partqty').length;
		    	var partcount=0;
		    	for(count = 1; count <= numItems; count++){
					var tempval=$('#partqty'+count).val()*$('#partrate'+count).val();
					if(tempval!="" && tempval!=null){
						partcount+=parseInt(tempval);
					}
				}
				//set text
				$('#parts').val(partcount);
			});
			
			// $('.maindiv').on('change keyup', 'input.inputrate', function() {
		    	// var numItems = $('.inputrate').length;
		    	// var partcount=0;
		    	// // alert ('numItems--'+$('.inputpart').length);
				// for(count = 1; count <= numItems; count++){
					// var tempval=$('#qty'+count).val()*$('#rate'+count).val();
					// if(tempval!="" && tempval!=null){
						// partcount+=parseInt(tempval);
					// }
				// }
				// //set text
				// $('#parts').val(partcount);
			// });
		
		numItems = workorderlaborlineitemsarr.length;
		// console.log ("numItems--"+numItems);
		for (count = 1; count <= numItems; count++)
		{
			labourvalue = workorderlaborlineitemsarr[count-1]["labour"];
			hrsvalue = workorderlaborlineitemsarr[count-1]["hours"];
			servicetaskidvalue = workorderlaborlineitemsarr[count-1]["servicetask_id"];
			contactvalue = workorderlaborlineitemsarr[count-1]["address_id"];
			issueidvalue = workorderlaborlineitemsarr[count-1]["issue_id"];
			console.log("servicetaskidvalue--"+servicetaskidvalue);
			if(servicetaskidvalue ==  null)  //for isues
			{
			
				$(".maindiv").append("<div class='classname' 	id='contentDiv"+count+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+count+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+count+"'/><label>Issue:</label><input  name='issue"+count+"' value="+issueidvalue+" class='form-control testissue' id='wotype1"+count+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+count+"' value="+contactvalue+" class='form-control contact' id='contactpart1"+count+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' value= "+labourvalue+"	class='form-control laborrate' id='laborrate"+count+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' value="+hrsvalue+" id='laborqty"+count+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div></div><hr/></div>");
	
			}
			else
			{
				$(".maindiv").append("<div class='classname' 	id='contentDiv"+count+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof1"+count+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+count+"'/><label>ServiceTask:</label><input  name='servicetask"+count+"' value="+servicetaskidvalue+" class='form-control test' id='wotype1"+count+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+count+"' value="+contactvalue+" class='form-control contact' id='contactpart1"+count+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' value= "+labourvalue+"	class='form-control laborrate' id='laborrate"+count+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' value="+hrsvalue+" id='laborqty"+count+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div></div><hr/></div>");
	
			}
			
		}
		
		numItems2 = workorderpartslineitemsarr.length;
		for (count2 = 1; count2 <= numItems2; count2++,count++)
		{
			unitcostvalue = workorderpartslineitemsarr[count2-1]["unitcost"];
			qtyvalue = workorderpartslineitemsarr[count2-1]["quantity"];
			servicetaskidvalue = workorderpartslineitemsarr[count2-1]["servicetask_id"];
			partidvalue = workorderpartslineitemsarr[count2-1]["part_id"];
			issueidvalue = workorderpartslineitemsarr[count2-1]["issue_id"];
			console.log("servicetaskidvalue--"+servicetaskidvalue);
			if(servicetaskidvalue ==  null)  //for isues
			{
				$(".maindiv").append("<div class='classname' 	id='contentDiv"+count2+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+count2+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+count2+"'/><label>Issues:</label><input  name='issueidvalue"+count+"' value="+issueidvalue+" class='form-control testissue' id='wotype2"+count2+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+count2+"' value="+partidvalue+" class='form-control part' id='contactpart2"+count2+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' value= "+unitcostvalue+"	class='form-control inputrate' id='partrate"+count2+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' value="+qtyvalue+" id='partqty"+count2+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div></div><hr/></div>");
	
				
			}
			else
			{
				$(".maindiv").append("<div class='classname' 	id='contentDiv"+count2+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof2"+count2+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+count2+"'/><label>ServiceTask:</label><input  name='servicetaskidvalue"+count+"' value="+servicetaskidvalue+"  class='form-control test' id='wotype2"+count2+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+count2+"' value="+partidvalue+" class='form-control part' id='contactpart2"+count2+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' value= "+unitcostvalue+"	class='form-control inputrate' id='partrate"+count2+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' value="+qtyvalue+" id='partqty"+count2+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div></div><hr/></div>");
	
				
			}
			
		}
			
		
				// $('.maindiv').on('change keyup', 'input.laborrate', function() {
		    	// var numItems = $('.laborrate').length;
		    	// var laborcount=0;
		    	// for(count = 1; count <= numItems; count++){
					// var tempval=$('#qty'+count).val()*$('#rate'+count).val();
					// if(tempval!="" && tempval!=null){
						// laborcount+=parseInt(tempval);
					// }
				// }
				// //set text
				// $('#labors').val(laborcount);
			// });
			
			
	




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
		// <input id="test" class="form-control test" name="test"/></div>
		// <input type="button" class="btn btn-flat btn-primary" id="btnAddPartControl" value="Add Part" />
		
		// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div class='col-sm-3'><label>Service Task:</label><input  name='servicetask"+numItems+"' class='form-control test' id='servicetask"+numItems+"'/></div> <div class='col-sm-3'><input type="button" class="btn btn-flat btn-primary" id='btnAddLaborControl1' value="Add Labor" /></div>  </div><hr/></div>");
							              	
		// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div class='col-sm-3'><label>Service Task:</label><input  name='servicetask"+numItems+"' class='form-control test' id='servicetask"+numItems+"'/></div> <div class='col-sm-3'><input type="button" class="btn btn-flat btn-primary" id='btnAddLaborControl"+numItems+"' value="Add Labor" /></div> <div class='col-sm-3'><input type="button" class="btn btn-flat btn-primary" id='btnAddPartControl"+numItems+"' value="Add Part" /></div>  </div><hr/></div>");
	
	
		$('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		
	});
	$("#btnAddLaborControl").click(function (event) {
		
		
		
		event.preventDefault();
		var numItems = $('.laborhrs').length+1;
		// var numItems = $('.classname').length;
		if(document.getElementById("typeselect").value == 1)// for Service Task
		{
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><label>ServiceTask:</label><input  name='servicetask"+numItems+"' class='form-control test' id='wotype1"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div></div><hr/></div>");
	
		}
		else if(document.getElementById("typeselect").value == 2)// for Issues
		{
			
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><label>Issue:</label><input  name='issue"+numItems+"' class='form-control testissue' id='wotype1"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div></div><hr/></div>");
	
		}
		
		
		// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><label>ServiceTask:</label><input  name='servicetask"+numItems+"' class='form-control test' id='servicetask"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control test' id='contact"+numItems+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' 	class='form-control' id='hrrate"+numItems+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' id='hrs' class='form-control inputpart' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div></div><hr/></div>");
	
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
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><label>ServiceTask:</label><input  name='servicetask"+numItems+"' class='form-control test' id='wotype2"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' 	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div></div><hr/></div>");
	
		}
		else if(document.getElementById("typeselect").value == 2)// for Issues
		{
			
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><label>Issue:</label><input  name='issue"+numItems+"' class='form-control testissue' id='wotype2"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' 	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div></div><hr/></div>");
	
		}
		// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><label>ServiceTask:</label><input  name='servicetask"+numItems+"' class='form-control test' id='servicetask"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control test' id='part"+numItems+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' 	class='form-control' id='unitcost"+numItems+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' id='quantity' class='form-control inputpart' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control inputpart' name='tax'/></div></div><hr/></div>");
	
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
		          		




	//delete btn onclick
	$('.maindiv').on('click', 'a.delete', function() {
		$(this).parent().closest('div .classname').remove();
	});

	// var postdata = [];
	//save btn onclick
	$("#btnSave").click(function () {
		
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
		var labor = document.getElementById("labour").value;
		var parts = document.getElementById("parts").value;
		var discount = document.getElementById("dicount").value;
		var tax = document.getElementById("tax").value;
		
    	if (issuedate != "" && workorderstatus!=null) {

    		$.get('/Workorders/editajax_data?issuedate='+issuedate+'&workorderstatus='+workorderstatus
    		+'&vehicleid='+vehicleid+'&startdate='+startdate+'&lables='+lables
    		+'&odometer='+odometer+'&voidvalue='+voidvalue+'&vendorid='+vendorid
    		+'&completiondate='+completiondate+'&issuedbyid='+issuedbyid+'&assignedbyid='+assignedbyid
    		+'&assigntoid='+assigntoid+'&invoicenumber='+invoicenumber+'&phonenumber='+phonenumber
    		+'&description='+description+'&labor='+labor+'&parts='+parts
    		+'&discount='+discount+'&tax='+tax+'&currentworkorderid='+currentworkorderid
    		, function(d) {
   		 		if(d!="error"){
					var postdata = [];
					console.log(d);
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
					currentworkorderlineitemid = workorderlineitemsstarr
					for(count = 1; count <= numItems; count++){ 
						// postdata.push($('#part'+count).val() + "^" + $('#type'+count).val()+ "^" + d);
						postdata.push($(' #typeof1'+count ).val() + "^" +$('#ident1'+count ).val() + "^" +  $('#wotype1'+count ).val() + "^" + $('#contactpart1'+count ).val() + "^" + $('#laborrate'+count).val() + "^" + $('#laborqty'+count).val()+ "^" + d +"^" +workorderlineitemslbrarr[0]["id"]+"^" +workorderlaborlineitemsarr[count-1]["id"]);
						// postdata.push(($('#rate'+count).val() * $('#qty'+count).val()) + "^" +  d);
					}
					// $.get('/Workorders/addLaborParts?content='+postdata, function(d) {
    					// alert(d);
    				// });
    				
    				//for part
    				var numItems = $('.partqty').length;
					console.log('new numItemseee--'+numItems);
					for(count = 1; count <= numItems; count++){ 
						// postdata.push($('#part'+count).val() + "^" + $('#type'+count).val()+ "^" + d);
						postdata.push($(' #typeof2'+count ).val() + "^" + $('#ident2'+count ).val() + "^" +  $('#wotype2'+count ).val() + "^" + $('#contactpart2'+count ).val() + "^" + $('#partrate'+count).val() + "^" + $('#partqty'+count).val()+ "^" + d +"^" +workorderlineitemsptarr[0]["id"]+"^" +workorderpartslineitemsarr[count-1]["id"]);
						// postdata.push(($('#rate'+count).val() * $('#qty'+count).val()) + "^" +  d);
					}
					// postdata = "["+ postdata +"]";
					console.log('pdataaa---'+postdata);
					$.get('/Workorders/editLaborParts?content='+postdata, function(d) {
						if(d!="error"){
    					console.log('new ddd22--'+d);}
    				});
    				
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