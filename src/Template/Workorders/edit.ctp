<?php echo $this->element('templateelement'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Work Order <small>Please fill the details to edit  Work Order</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li><a href="/Workorders/"> Work Orders</a></li>
    <li class="active">Edit </li>
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
		.w100{ width:100%; }
	</style>	 <br/><br/><br/>
	
	
	
				        <div class="col-md-9">
								<div class="box">
								
								  <div class="box-header">
								       <h4 class="box-title">Labor & Parts</h4>
								  </div>
								
								  <div class="box-body maindiv">
								      <div class="classnameheader" id="contentDiv1">
								          <div class="clearfix">
								          	<!-- <div class="col-sm-4"><label>Service Task:</label>
								              	<input id="test" class="form-control test" name="test"/></div>
								              <div class="col-sm-4 "><label>Type:</label>
								              	<input id="test" class="form-control type" name="type"/></div> -->
								              	
								              	<!-- Disabled for editing -->
								              	<div class="col-sm-4 ">
								              
											   	<input  name='typeselect"' class='form-control typeselect' id='typeselect'/>
											   	
											   	</div>
								              	<div class="col-sm-4 ">
								              	<input type="button" class="btn btn-flat btn-primary w100" id="btnAddLaborControl" value="Add Labor Expenses" /></div>
								              	
								              	<div class="col-sm-4 ">
								              	<input type="button" class="btn btn-flat btn-primary w100" id="btnAddPartControl" value="Add Parts Expenses" /></div>
								              	
								              	 
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
								        <h4 class="box-title">Totals</h4> 
								  </div>
								
								  <div class="box-body"><div class="form-horizontal">
								  	
								  		<div class="form-group">
											 <div class="col-sm-3">
											 <label >Labor</label>
											 </div>
											 <div class="col-sm-3">
											 <label id='labour' text="0.00" class='labors' ></label>
								        	 </div>
										</div>
										
										<div class="form-group">
											 <div class="col-sm-3">
											 <label >Parts</label>
											 </div>
											 <div class="col-sm-3">
											 <label id='parts' text="0.00" class='parts' ></label>
								        	 </div>
										</div>
								  	
							<?php
								// echo $this->Form->input('labour',['label'=>'Labor','readonly' => 'readonly']);
            					// echo $this->Form->input('parts',['readonly' => 'readonly']);
								echo $this->Form->input('dicount',['label'=>'Discount']);
            					// echo $this->Form->input('tax');
			
							?>
							
							
							<div class='form-group'>
							<label class="col-sm-3 control-label" >Tax:</label>
							<div class="col-sm-6"><div class='input-group'>
							<span class='input-group-addon no-padding'>
							<input  id='totaltaxtype' class='totaltaxtype' name='taxtype'/>
							</span>
							<input type='text' id='totaltax' class='form-control totaltax' name='tax'/>
							</div></div>
							</div>
							
							
							</div>
							
							<div class="form-group">
								<div class="box-header">
									<div class="col-md-3">
									        <h4 class="box-title">Total:</h4> 
									</div>
									    
									 <div  class="col-md-3">
									 	 <label  id="total" text="0.00" ></label>
									 </div>
								</div>
							</div>
							
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
// alert("workorderid"+
// <?php echo $totaltax ?>
// );

var currentworkorderid = <?php echo $workorderid ?>

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
	
	var workorderlaborlineitemsdata=[];
	var workorderlaborlineitemsarr=	<?php echo $workorderlaborlineitemsarr ?>;
	console.log ("workorderlaborlineitemsdata--"+JSON.stringify(workorderlaborlineitemsarr) );
	$.each(workorderlaborlineitemsarr, function(key, value) {
    	// workorderlaborlineitemsdata.push({'id':key, "text":value});
    	
	
	});
	
	var workorderpartslineitemsdata=[];
	var workorderpartslineitemsarr=	<?php echo $workorderpartslineitemsarr ?>;
	
	var workorderlineitemsstdata=[];
	var workorderlineitemsstarr=	<?php echo $workorderlineitemsstarr ?>;
	
	var workorderlineitemsdata=[];
	var workorderlineitemsarr=	<?php echo $workorderlineitemsarr ?>;
	
	var workorderlineitemsptdata=[];
	var workorderlineitemsptarr=	<?php echo $workorderlineitemsptarr ?>;
	
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
		$('.contact').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: contactdata
		});
		$('.part').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: partdata
		});
		$('.labortaxtype').select2({
			width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]	});
		$('.parttaxtype').select2({
    		width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}] });
		$('.totaltaxtype').select2({
    		width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]
			});
		// $('.totaltaxtype').val(1).trigger('change');
		document.getElementById('total').innerHTML  = "0.00";
		// document.getElementById('labour').innerHTML  = "0.00";
		// document.getElementById('parts').innerHTML  = "0.00";
		
		var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
			
    }
    
  $(function () {
  	
  	//from add
  	function laborHrsCalculate()
				{
					var numItems = $('.laborhrs').length;
			    	var laborcount=0;
			    	for(count = 1; count <= numItems; count++)
			    	{
			    		var taxType = document.getElementById('labortaxtype'+count).value;
			    		if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
							{
								var labqty = $('#laborqty'+count).val();
			    				var labrate = $('#laborrate'+count).val();
			    				var labtax;
			    				if($('#labortax'+count).val()!= "")
			    				{labtax = parseFloat($('#labortax'+count).val());}
			    				else
			    				{labtax = 0;}
			    				
			    				if($('#laborqty'+count).val()!= "")
			    				{labqty = parseFloat($('#laborqty'+count).val());}
			    				else
			    				{labqty = 0;}
			    				
			    				if($('#laborrate'+count).val()!= "")
			    				{labrate = parseFloat($('#laborrate'+count).val());}
			    				else
			    				{labrate = 0;}
			    				
					    		var tempval;
					    		if($('#laborqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)) 
				    			{ 
				    				if($('#laborrate'+count).val() == "" )  
					    			{
					    				if(taxType == 1)// check if tax percentage
						    				{
						    					tempval=	labqty * labrate + (labqty * labrate * labtax/100);	
						    				}
						    			if(taxType == 2)// check if tax fixed
						    				{
						    					if($('#laborqty'+count).val() == 0 || $('#laborrate'+count).val() == 0 )
						    					{tempval= 0;}
						    					else
						    					{tempval=	labqty * labrate + 	labtax;}
						    				}	
					    				if(tempval!="" && tempval!=null)
										{
											laborcount+=parseFloat(tempval);
										}
									}
				    			else if($('#laborrate'+count).val() != "" )  
					    			{
					    				if($('#laborrate'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/))
					    				{
					    					if(taxType == 1)// check if tax percentage
						    				{
						    					tempval=	labqty * labrate + (labqty * labrate * labtax/100);	
						    				}
						    			if(taxType == 2)// check if tax fixed
						    				{
						    					if($('#laborqty'+count).val() == 0 || $('#laborrate'+count).val() == 0 )
						    					{tempval= 0;}
						    					else
						    					{tempval=	labqty * labrate + 	labtax;}	
						    				}
					    					if(tempval!="" && tempval!=null)
											{
												laborcount+=parseFloat(tempval);
											}
					    				}
					    			}
				    			}
							}
			    	}
					//set text
					laborcount = laborcount.toFixed(2);
					document.getElementById('labour').innerHTML  = laborcount;
					var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
				}
				
			function laborRateCalculate()
				{
					var numItems = $('.laborhrs').length;
			    	var laborcount=0;
			    	for(count = 1; count <= numItems; count++)
				    	{
				    		var taxType = document.getElementById('labortaxtype'+count).value;
				    		if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
							{
								var labqty = $('#laborqty'+count).val();
			    				var labrate = $('#laborrate'+count).val();
			    				var labtax;
			    				if($('#labortax'+count).val()!= "")
			    				{labtax = parseFloat($('#labortax'+count).val());}
			    				else
			    				{labtax = 0;}
			    				if($('#laborqty'+count).val()!= "")
			    				{labqty = parseFloat($('#laborqty'+count).val());}
			    				else
			    				{labqty = 0;}
			    				
			    				if($('#laborrate'+count).val()!= "")
			    				{labrate = parseFloat($('#laborrate'+count).val());}
			    				else
			    				{labrate = 0;}
								var tempval;
					    		if($('#laborrate'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/))  //if hourly rate is number
				    			{ 
					    			if($('#laborqty'+count).val() == "") //if hours is empty
					    			{ 
					    				if(taxType == 1)// check if tax percentage
						    				{
						    					tempval=	labqty * labrate + (labqty * labrate * labtax/100);	
						    				}
						    			if(taxType == 2)// check if tax fixed
						    				{
						    					if($('#laborqty'+count).val() == 0 || $('#laborrate'+count).val() == 0 )
						    					{tempval= 0;}
						    					else
						    					{tempval=	labqty * labrate + 	labtax;}	
						    				}	
					    				
					    				if(tempval!="" && tempval!=null)
										{
											laborcount+=parseFloat(tempval);
										}
					    			}
					    			else if($('#laborqty'+count).val() != "") 
					    			{
					    				if($('#laborqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/) )
					    				{
					    					if(taxType == 1)// check if tax percentage
						    				{
						    					tempval=	labqty * labrate + (labqty * labrate * labtax/100);	
						    				}
						    			if(taxType == 2)// check if tax fixed
						    				{
						    					if($('#laborqty'+count).val() == 0 || $('#laborrate'+count).val() == 0 )
						    					{tempval= 0;}
						    					else
						    					{tempval=	labqty * labrate + 	labtax;}	
						    				}
					    				if(tempval!="" && tempval!=null)
											{
												laborcount+=parseFloat(tempval);
											}
					    				}
					    			}
					    		}
							}
				    	}
					//set text
					document.getElementById('labour').innerHTML  = laborcount;
					var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}	
				}
			function partQtyCalculate()
				{
					var numItems = $('.partqty').length;
			    	var partcount=0;
			    	for(count = 1; count <= numItems; count++)
				    	{
				    		var taxType = document.getElementById('parttaxtype'+count).value;
				    		if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
							{
								var partqty = $('#partqty'+count).val();
			    				var partrate = $('#partrate'+count).val();
			    				var parttax;
			    				if($('#parttax'+count).val()!= "")
			    				{parttax = parseFloat($('#parttax'+count).val());}
			    				else
			    				{parttax = 0;}
			    				if($('#partqty'+count).val()!= "")
			    				{partqty = parseFloat($('#partqty'+count).val());}
			    				else
			    				{lpartqty = 0;}
			    				
			    				if($('#partrate'+count).val()!= "")
			    				{partrate = parseFloat($('#partrate'+count).val());}
			    				else
			    				{partrate = 0;}
								var tempval;
								
								if($('#partqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/))
				    			{
					    			if($('#partrate'+count).val() =="")
					    			{
					    				if(taxType == 1)// check if tax percentage
						    				{
						    					tempval=	partqty * partrate + (partqty * partrate * parttax/100);	
						    				}
						    			if(taxType == 2)// check if tax fixed
						    				{
						    					if($('#partqty'+count).val() == 0 || $('#partrate'+count).val() == 0 )
						    					{tempval= 0;}
						    					else
						    					{tempval=	partqty * partrate + 	parttax;}	
						    				}	
					    				
					    				if(tempval!="" && tempval!=null)
										{
											partcount+=parseFloat(tempval);
											
										}
					    			}
					    			else if($('#partrate'+count).val() !="")
					    			{
					    				if($('#partqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/) )
					    				{
					    					if(taxType == 1)// check if tax percentage
						    				{
						    					tempval=	partqty * partrate + (partqty * partrate * parttax/100);	
						    				}
						    			if(taxType == 2)// check if tax fixed
						    				{
						    					if($('#partqty'+count).val() == 0 || $('#partrate'+count).val() == 0 )
						    					{tempval= 0;}
						    					else
						    					{tempval=	partqty * partrate + 	parttax;}	
						    				}
					    				if(tempval!="" && tempval!=null)
											{
												partcount+=parseFloat(tempval);
											}
					    				}
					    			}
								}
							}
				    	}
					//set text
					document.getElementById('parts').innerHTML = partcount;
					var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
				}
			function partRateCalculate()
				{
					var numItems = $('.inputrate').length;
			    	var partcount=0;
			    	for(count = 1; count <= numItems; count++)
				    	{
				    		var taxType = document.getElementById('parttaxtype'+count).value;
				    		if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
							{
								var partqty = $('#partqty'+count).val();
			    				var partrate = $('#partrate'+count).val();
			    				var parttax;
			    				if($('#parttax'+count).val()!= "")
			    				{parttax = parseFloat($('#parttax'+count).val());}
			    				else
			    				{parttax = 0;}
			    				if($('#partqty'+count).val()!= "")
			    				{partqty = parseFloat($('#partqty'+count).val());}
			    				else
			    				{partqty = 0;}
			    				
			    				if($('#partrate'+count).val()!= "")
			    				{partrate = parseFloat($('#partrate'+count).val());}
			    				else
			    				{partrate = 0;}
								var tempval;
								if($('#partrate'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/))
					    			{
						    			if($('#partqty'+count).val() == "")
						    			{
						    				if(taxType == 1)// check if tax percentage
							    				{
							    					tempval=	partqty * partrate + (partqty * partrate * parttax/100);	
							    				}
							    			if(taxType == 2)// check if tax fixed
							    				{
							    					if($('#partqty'+count).val() == 0 || $('#partrate'+count).val() == 0 )
							    					{tempval= 0;}
							    					else
							    					{tempval=	partqty * partrate + 	parttax;}	
							    				}	
						    				if(tempval!="" && tempval!=null)
											{
												partcount+=parseFloat(tempval);
												
											}
						    			}
						    			else if($('#partqty'+count).val() != "")
						    			{
						    				if($('#partqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/) )
						    				{
						    					if(taxType == 1)// check if tax percentage
							    				{
							    					tempval=	partqty * partrate + (partqty * partrate * parttax/100);	
							    				}
							    			if(taxType == 2)// check if tax fixed
							    				{
							    					if($('#partqty'+count).val() == 0 || $('#partrate'+count).val() == 0 )
							    					{tempval= 0;}
							    					else
							    					{tempval=	partqty * partrate + 	parttax;}	
							    				}
						    					if(tempval!="" && tempval!=null)
												{
													partcount+=parseFloat(tempval);
												}
						    				}
						    			}
									}
							}
				    	}
					//set text
					document.getElementById('parts').innerHTML = partcount;
					var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}	
				}
				
			function laborTaxCalculate()
				{
					var numItems = $('.laborhrs').length;
			    	var laborcount=0;
			    	
			    	for(count = 1; count <= numItems; count++)
				    	{
				    		var taxType = document.getElementById('labortaxtype'+count).value;
				    		if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
								{
									var labqty = $('#laborqty'+count).val();
				    				var labrate = $('#laborrate'+count).val();
				    				var labtax = parseFloat($('#labortax'+count).val());
				    				var tempval;
				    				
									if($('#labortax'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
										&& $('#laborrate'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
										&& $('#laborqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/))
										{ 
						    				if($('#laborrate'+count).val() != "" && $('#laborqty'+count).val() != "" )  
								    			{
								    				if(taxType == 1)// check if tax percentage
									    				{
									    					tempval=	labqty * labrate + (labqty * labrate * labtax/100);	
									    				}
									    			if(taxType == 2)// check if tax fixed
									    				{
									    					if($('#laborqty'+count).val() == 0 || $('#laborrate'+count).val() == 0 )
									    					{tempval= 0;}
									    					else
									    					{tempval=	labqty * labrate + 	labtax;}	
									    				}
								    				if(tempval!="" && tempval!=null)
														{
															laborcount+=parseFloat(tempval);
														}
								    			}
						    			}
					    		}
				    	}
					//set text
					document.getElementById('labour').innerHTML  = laborcount;
					var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}	
				}
				
			function partTaxCalculate()
				{
					var numItems = $('.inputrate').length;
			    	var partcount=0;
			    	for(count = 1; count <= numItems; count++)
				    	{
				    		var taxType = document.getElementById('parttaxtype'+count).value;
				    		if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
								{
									var partqty = $('#partqty'+count).val();
				    				var partrate = $('#partrate'+count).val();
				    				var parttax = parseFloat($('#parttax'+count).val());
				    				var tempval;
									if($('#parttax'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									&& $('#partrate'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									&& $('#partqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									)
						    			{
							    			if($('#partqty'+count).val() != "" && $('#partrate'+count).val() != "")
								    			{
								    				
								    				if(taxType == 1)// check if tax percentage
									    				{
									    					tempval=	partqty * partrate + (partqty * partrate * parttax/100);	
									    				}
									    			if(taxType == 2)// check if tax fixed
									    				{
									    					if($('#partqty'+count).val() == 0 || $('#partrate'+count).val() == 0 )
									    					{tempval= 0;}
									    					else
									    					{tempval=	partqty * partrate + 	parttax;}	
									    				}
								    				if(tempval!="" && tempval!=null)
														{
															partcount+=parseFloat(tempval);
														}
								    			}
							    		}
								}
				    	}
					//set text
					document.getElementById('parts').innerHTML = partcount;
					var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
				}
				
			function laborTaxTypeCalculate()
				{
					var numItems = $('.laborhrs').length;
			    	var laborcount=0;
			    	for(count = 1; count <= numItems; count++)
				    	{
				    		var taxType = document.getElementById('labortaxtype'+count).value;
				    		if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
								{
									var labqty = $('#laborqty'+count).val();
				    				var labrate = $('#laborrate'+count).val();
				    				var labtax;
				    				if($('#labortax'+count).val()!= "")
				    				{labtax = parseFloat($('#labortax'+count).val());}
				    				else
				    				{labtax = 0;}
				    				if($('#laborqty'+count).val()!= "")
				    				{labqty = parseFloat($('#laborqty'+count).val());}
				    				else
				    				{labqty = 0;}
				    				
				    				if($('#laborrate'+count).val()!= "")
				    				{labrate = parseFloat($('#laborrate'+count).val());}
				    				else
				    				{labrate = 0;}
									var tempval;
						    			
									if($('#labortax'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									&& $('#laborrate'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									&& $('#laborqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									)
						    			{ 
							    						    			
							    			if($('#laborqty'+count).val() != ""	&& $('#laborrate'+count).val() != "" && $('#labortax'+count).val() != "") 
								    			{
								    				if(taxType == 1)// check if tax percentage
									    				{
									    					tempval=	labqty * labrate + (labqty * labrate * labtax/100);	
									    				}
									    			if(taxType == 2)// check if tax fixed
									    				{
									    					if($('#laborqty'+count).val() == 0 || $('#laborrate'+count).val() == 0 )
									    					{tempval= 0;}
									    					else
									    					{tempval=	labqty * labrate + 	labtax;}	
									    				}
								    				if(tempval!="" && tempval!=null)
														{
															laborcount+=parseFloat(tempval);
														}
								    			}
							    		}
								}
				    	}
					//set text
					document.getElementById('labour').innerHTML  = laborcount;
					var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
				}
			
			function partTaxTypeCalculate()
				{
					var numItems = $('.inputrate').length;
			    	var partcount=0;
			    	for(count = 1; count <= numItems; count++)
				    	{
				    		var taxType = document.getElementById('parttaxtype'+count).value;
				    		if($("#partrate"+count).parent().closest('div .classname').is(":visible"))
								{
									var partqty = $('#partqty'+count).val();
				    				var partrate = $('#partrate'+count).val();
				    				var parttax;
				    				if($('#parttax'+count).val()!= "")
				    				{parttax = parseFloat($('#parttax'+count).val());}
				    				else
				    				{labtax = 0;}
				    				if($('#partqty'+count).val()!= "")
				    				{partqty = parseFloat($('#partqty'+count).val());}
				    				else
				    				{labqty = 0;}
				    				
				    				if($('#partrate'+count).val()!= "")
				    				{partrate = parseFloat($('#partrate'+count).val());}
				    				else
				    				{partrate = 0;}
									var tempval;
						    			
									if($('#parttax'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									&& $('#partrate'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									&& $('#partqty'+count).val().match(/^[+-]?((\.\d+)|(\d+(\.\d+)?))$/)
									)
						    			{ 
							    			if($('#partqty'+count).val() != "" && $('#partrate'+count).val() != "" && $('#parttax'+count).val() != "") 
								    			{
								    				if(taxType == 1)// check if tax percentage
									    				{
									    					tempval=	partqty * partrate + (partqty * partrate * parttax/100);	
									    								    				}
									    			if(taxType == 2)// check if tax fixed
									    				{
									    					if($('#partqty'+count).val() == 0 || $('#partrate'+count).val() == 0 )
									    					{tempval= 0;}
									    					else
									    					{tempval=	partqty * partrate + 	parttax;}	
									    				}
								    				if(tempval!="" && tempval!=null)
														{
															partcount+=parseFloat(tempval);
														}
								    			}
							    		}
								}
				    	}
					//set text
					document.getElementById('parts').innerHTML = partcount;
					var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
					if($('#totaltaxtype').val() == 1)
						{
							totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
					if($('#totaltaxtype').val() == 2)
						{
							totalsum = totalsum +  parseFloat($('#totaltax').val());
							document.getElementById('total').innerHTML  = totalsum.toFixed(2);
						}
				}
				function discountCalculate()
				{
					if($('#dicount').val() == ""){$('#dicount').val(0);}
					//set text
					if(document.getElementById('labour').innerHTML  != "" || document.getElementById('parts').innerHTML != "" )
						{
							if($('#dicount').val() != "")
								{
									if($('#totaltax').val() == ""){$('#totaltax').val(0);}
									var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
									if($('#totaltaxtype').val() == 1)
										{
											totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
											document.getElementById('total').innerHTML  = totalsum.toFixed(2);
										}
									if($('#totaltaxtype').val() == 2)
										{
											totalsum = totalsum +  parseFloat($('#totaltax').val());
											document.getElementById('total').innerHTML  = totalsum.toFixed(2);
										}
								}
								
						}
				}
			
			function taxCalculate()
				{
					if($('#totaltax').val() == ""){$('#totaltax').val(0);}
					//set text
					if(document.getElementById('labour').innerHTML  != "" || document.getElementById('parts').innerHTML != "" )
						{
							if($('#totaltax').val() != "")
								{
									if($('#dicount').val() == ""){$('#dicount').val(0);}
									
									var totalsum= parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
									
									if($('#totaltaxtype').val() == 1)
										{
											totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
											document.getElementById('total').innerHTML  = totalsum.toFixed(2);
										}
									if($('#totaltaxtype').val() == 2)
										{
											totalsum = totalsum +  parseFloat($('#totaltax').val());
											document.getElementById('total').innerHTML  = totalsum.toFixed(2);
										}
								}	
						}
				}
			
			
			function taxTypeCalculate()
				{
					// if($('#totaltaxtype').val() == ""){$('#totaltaxtype').val(0);}
					//set text
					if(document.getElementById('labour').innerHTML  != "" || document.getElementById('parts').innerHTML != "" )
						{
							if($('#totaltax').val() != "")
								{ 
									
									
									if($('#dicount').val() == ""){$('#dicount').val(0);}
									var totalsum = parseFloat(document.getElementById('labour').innerHTML ) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
									
									var taxamount;
									if($('#totaltaxtype').val() == 1)
										{
											totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
											document.getElementById('total').innerHTML  = totalsum.toFixed(2);
										}
									if($('#totaltaxtype').val() == 2)
										{
											totalsum = totalsum +  parseFloat($('#totaltax').val());
											document.getElementById('total').innerHTML  = totalsum.toFixed(2);
										}
									
									var totalsum = taxamount;
									// document.getElementById('total').innerHTML  = parseFloat(totalsum);
								}	
						}
				}
			
			function calculateAll()
				{
					laborHrsCalculate();
					laborRateCalculate();
					partQtyCalculate();
					partRateCalculate();
					laborTaxCalculate();
					partTaxCalculate();
					laborTaxTypeCalculate();
					partTaxTypeCalculate();
					discountCalculate();
					taxCalculate();
					taxTypeCalculate();
				}
  	//end from add
  	
  	
  	
	  	//Add Delete Button 
	  	$('.maindiv').on('click', 'a.compdelete', function() 
					{
						var selectedctrl=$(this);
						var value = $(this).attr('value');
						var id = $(this).attr('id');
						var result = confirm("Are you sure you want to delete the particular Item ?");
		        		if(result)
		        				{
		        					$(this).parent().closest('div .classname').hide();
		        					if(value!="newid")
					        					{
					        						var lptype = id.split(",");
					        						if(lptype[0] == "L")
						        						{
						        							$.ajax({
											        			type: "POST",
											        			url: '/Workorders/deleteLabourLineItems',
											        			data: 'lineitemid='+lptype[1]+','+lptype[2],
											        			success : function(data) 
												        			{
												        				if(data=="success")
													        				{
													        					return true;
													    					}
												    					else
												    						{
												    							return false;
												    						}
												        			},
											        			error: function(data) 
												        			{
												        				return false;
												        			}
											      
											        		});
						        						}
						        					
						        					if(lptype[0] == "P")
						        						{
						        							$.ajax({
											        			type: "POST",
											        			url: '/Workorders/deletePartsLineItems',
											        			data: 'lineitemid='+lptype[1]+','+lptype[2],
											        			success : function(data) 
												        			{
												        				if(data=="success")
													        				{
													        					return true;
													    					}
												    					else
												    						{
												    							return false;
												    						}
												        			},
											        			error: function(data) 
												        			{
												        				return false;
												        			}
											      
											        		});
						        						}
					        						
					        						// $(this).parent().closest('div .classname').hide();
					        					}
			        				else
			        					{
			        						// new items added
			        						// $(this).parent().closest('div .classname').hide();	
			        					}
									
									calculateAll();
									
									//update Workorders table after deletion
									$.ajax({
							        			type: "POST",
							        			url: '/Workorders/updateWorkordersAfterItemsDeletion',
							        			data: 'items='+currentworkorderid+','+document.getElementById('labour').innerHTML +','+document.getElementById('parts').innerHTML,
							        			success : function(data) 
								        			{
								        				if(data=="success")
									        				{
									        					return true;
									    					}
								    					else
								    						{
								    							return true;
								    						}
								        			},
							        			error: function(data) 
								        			{
								        				return false;
								        			}
							      
							        		});
									window.location.reload();
									return true;
		           		   		} 
		           		  else 
		           		   		{
		           		   			return false;
		           				}
	
	     			});
  	
 
  	

		
			//calculate total labor cost on keyup of Hours
			$('.maindiv').on('change keyup', 'input.laborhrs', function() 
				{
					laborHrsCalculate();
				});
			
			//calculate total labor cost on keyup of HoursRate
			$('.maindiv').on('change keyup', 'input.laborrate', function() 
				{
					laborRateCalculate();
				});


 			//calculate total parts cost on keyup of Quantity	
			$('.maindiv').on('change keyup', 'input.partqty', function() 
				{
					partQtyCalculate();
				});
			
			//calculate total parts cost on keyup of UnitCost
			$('.maindiv').on('change keyup', 'input.inputrate', function() 
				{
					partRateCalculate();
				});
				
			//calculate total labor cost on keyup of Tax
			$('.maindiv').on('change keyup', 'input.labortax', function() 
			{
				laborTaxCalculate();
			});

			//calculate total parts cost on keyup of Tax
			$('.maindiv').on('change keyup', 'input.parttax', function() 
			{
		    	partTaxCalculate();
			});
			
			$('.maindiv').on('change', 'input.labortaxtype', function() 
			{
				laborTaxTypeCalculate();
			});
			
			$('.maindiv').on('change', 'input.parttaxtype', function() 
			{
				partTaxTypeCalculate();
			});	
			
			$("#totaltaxtype").change(function()
			{ 
				taxTypeCalculate();
			});
			
			
			$("#totaltax").keyup(function(){
			   taxCalculate();
			});
			
			$("#dicount").keyup(function(){
			    discountCalculate();
			});
		
		$('#totaltax').val(<?php echo $totaltax; ?>); 
		$('#totaltaxtype').val(<?php echo $totaltaxtype; ?>).trigger('change');
		document.getElementById('labour').innerHTML = <?php echo $labor; ?>; 
		document.getElementById('parts').innerHTML = <?php echo $parts; ?>; 
		//Show saved laborlineitems
		numItems = workorderlaborlineitemsarr.length;
		$('.labortaxtype').select2({
			width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]	});
		for (count = 1; count <= numItems; count++)
			{
				labourvalue = workorderlaborlineitemsarr[count-1]["labour"];
				hrsvalue = workorderlaborlineitemsarr[count-1]["hours"];
				servicetaskidvalue = workorderlaborlineitemsarr[count-1]["servicetask_id"];
				contactvalue = workorderlaborlineitemsarr[count-1]["address_id"];
				issueidvalue = workorderlaborlineitemsarr[count-1]["issue_id"];
				workorderlaborlineitemid = workorderlaborlineitemsarr[count-1]["id"];
				console.log("workorderlaborlineitemid--"+workorderlaborlineitemid);
				workorderlineitemid = workorderlaborlineitemsarr[count-1]["workorderlineitem_id"];
				taxvalue = workorderlaborlineitemsarr[count-1]["tax"];
				taxtypevalue = workorderlaborlineitemsarr[count-1]["taxtype"];
				
				console.log("servicetaskidvalue--"+servicetaskidvalue);
				console.log("issueidvalue--"+issueidvalue);
				if(labourvalue == null){labourvalue = 0;}
				if(hrsvalue == null){hrsvalue = 0;}
				if(taxvalue == null){taxvalue = 0;}
				
				
				
				if(servicetaskidvalue ==  null)  //for issues
					{
						$(".maindiv").append("<div class='classname' 	id='contentDiv"+count+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+count+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+count+"'/><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn'><a id='L,"+workorderlaborlineitemid+","+workorderlineitemid+"' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+count+"' value="+issueidvalue+" class='form-control testissue' id='wotype1"+count+"'/></div>	</div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+count+"' value="+contactvalue+" class='form-control contact' id='contactpart1"+count+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text' value= "+labourvalue+" 	class='form-control laborrate' id='laborrate"+count+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text' value="+hrsvalue+" id='laborqty"+count+"' class='form-control laborhrs' name='hrs'/></div>   <div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+count+"' value="+taxtypevalue+" class='labortaxtype' name='taxtype'/></span><input type='text' value="+taxvalue+"  id='labortax"+count+"' class='form-control labortax' name='tax'/></div></div></div></div><hr/></div>");
				    	
					
						// $(".maindiv").append("<div class='classname' 	id='contentDiv"+count+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+count+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+count+"'/><label>Issue:</label><input  name='issue"+count+"' value="+issueidvalue+" class='form-control testissue' id='wotype1"+count+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+count+"' value="+contactvalue+" class='form-control contact' id='contactpart1"+count+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' value= "+labourvalue+"	class='form-control laborrate' id='laborrate"+count+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' value="+hrsvalue+" id='laborqty"+count+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div>  <div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='L,"+workorderlaborlineitemid+","+workorderlineitemid+"'><i class='fa fa-trash'></i></a></div>   </div><hr/></div>");
					}
				else
					{
					  $(".maindiv").append("<div class='classname' 	id='contentDiv"+count+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof1"+count+"'/>	<input type='hidden' value='labor'   class='form-control' id='ident1"+count+"'/>	<div class='form-group'><label>ServiceTask:</label>	<div class='input-group'><div class='input-group-btn'><a id='L,"+workorderlaborlineitemid+","+workorderlineitemid+"' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='servicetask"+count+"' value="+servicetaskidvalue+"  class='form-control test' id='wotype1"+count+"'/></div></div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+count+"' value="+contactvalue+" class='form-control contact' id='contactpart1"+count+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text'  value= "+labourvalue+"	class='form-control laborrate' id='laborrate"+count+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text' value="+hrsvalue+" id='laborqty"+count+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-2'>	<div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+count+"' value="+taxtypevalue+" class='labortaxtype' name='taxtype'/></span><input type='text' value="+taxvalue+" id='labortax"+count+"' class='form-control labortax' name='tax'/></div></div></div></div><hr/></div>");
						
					
						// $(".maindiv").append("<div class='classname' 	id='contentDiv"+count+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof1"+count+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+count+"'/><label>ServiceTask:</label><input  name='servicetask"+count+"' value="+servicetaskidvalue+" class='form-control test' id='wotype1"+count+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+count+"' value="+contactvalue+" class='form-control contact' id='contactpart1"+count+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' value= "+labourvalue+"	class='form-control laborrate' id='laborrate"+count+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' value="+hrsvalue+" id='laborqty"+count+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='L,"+workorderlaborlineitemid+","+workorderlineitemid+"'><i class='fa fa-trash'></i></a></div>   </div><hr/></div>");
					}
					
			}
			// $('.labortaxtype').select2({
			// width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]	});
			// $('#labortaxtype'+numItems).val(2).trigger('change');
				
		//Show saved partslineitems
		numItems2 = workorderpartslineitemsarr.length;
		for (count2 = 1; count2 <= numItems2; count2++)
			{
				unitcostvalue = workorderpartslineitemsarr[count2-1]["unitcost"];
				qtyvalue = workorderpartslineitemsarr[count2-1]["quantity"];
				servicetaskidvalue = workorderpartslineitemsarr[count2-1]["servicetask_id"];
				partidvalue = workorderpartslineitemsarr[count2-1]["part_id"];
				issueidvalue = workorderpartslineitemsarr[count2-1]["issue_id"];
				if(workorderpartslineitemsarr[count2-1]["id"])
				{workorderpartslineitemid = workorderpartslineitemsarr[count2-1]["id"];}else{workorderpartslineitemid = 0;}
				console.log("workorderpartslineitemsarr--"+JSON.stringify(workorderpartslineitemsarr));
				workorderlineitemid = workorderpartslineitemsarr[count2-1]["workorderlineitems"];
				taxvalue = workorderpartslineitemsarr[count2-1]["tax"];
				taxtypevalue = workorderpartslineitemsarr[count2-1]["taxtype"];
				if(unitcostvalue == null){unitcostvalue = 0;}
				if(qtyvalue == null){qtyvalue = 0;}
				if(taxvalue == null){taxvalue = 0;}
				
				
				if(servicetaskidvalue ==  null)  //for isues
					{
						// $(".maindiv").append("<div class='classname' 	id='contentDiv"+count2+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+count2+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+count2+"'/><label>Issues:</label><input  name='issueidvalue"+count+"' value="+issueidvalue+" class='form-control testissue' id='wotype2"+count2+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+count2+"' value="+partidvalue+" class='form-control part' id='contactpart2"+count2+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' value= "+unitcostvalue+"	class='form-control inputrate' id='partrate"+count2+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' value="+qtyvalue+" id='partqty"+count2+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='P,"+workorderpartslineitemid+","+workorderlineitemid+"'><i class='fa fa-trash'></i></a></div>   </div><hr/></div>");
						$(".maindiv").append("<div class='classname' 	id='contentDiv"+count2+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+count2+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+count2+"'/><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn'><a id='P,"+workorderpartslineitemid+","+workorderlineitemid+"' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+count2+"' value="+issueidvalue+"   class='form-control testissue' id='wotype2"+count2+"'/></div></div></div><div 	class='col-sm-3'><label>Part:</label><input  name='part"+count2+"' value="+partidvalue+"  class='form-control part' id='contactpart2"+count2+"'/></div><div class='col-sm-2'><label>Unit Cost:</label><input type='text' value= "+unitcostvalue+" class='form-control inputrate' id='partrate"+count2+"'/></div><div class='col-sm-2'><label>Quantity:</label><input type='text' value="+qtyvalue+" id='partqty"+count2+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='parttaxtype"+count2+"' value="+taxtypevalue+" class='parttaxtype' name='taxtype'/></span><input type='text' value="+taxvalue+" id='parttax"+count2+"' class='form-control parttax' name='tax'/></div></div></div></div><hr/></div>");
				
					}
				else
					{
						// $(".maindiv").append("<div class='classname' 	id='contentDiv"+count2+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof2"+count2+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+count2+"'/><label>ServiceTask:</label><input  name='servicetaskidvalue"+count+"' value="+servicetaskidvalue+"  class='form-control test' id='wotype2"+count2+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+count2+"' value="+partidvalue+" class='form-control part' id='contactpart2"+count2+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' value= "+unitcostvalue+"	class='form-control inputrate' id='partrate"+count2+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' value="+qtyvalue+" id='partqty"+count2+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='P,"+workorderpartslineitemid+","+workorderlineitemid+"'><i class='fa fa-trash'></i></a></div>   </div><hr/></div>");
						$(".maindiv").append("<div class='classname' 	id='contentDiv"+count2+"'><div class='clearfix'><div class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof2"+count2+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+count2+"'/><div class='form-group'><label>ServiceTask:</label>	<div class='input-group'><div class='input-group-btn'><a id='P,"+workorderpartslineitemid+","+workorderlineitemid+"' class='compdelete btn btn-danger btn-flat'>	<i class='fa fa-trash'>	</i></a></div>	<input  name='servicetask"+count2+"' value="+servicetaskidvalue+"  class='form-control test' id='wotype2"+count2+"'/>	</div></div></div><div 	class='col-sm-3'><label>Part:</label><input  name='part"+count2+"' value="+partidvalue+" class='form-control part' id='contactpart2"+count2+"'/></div><div class='col-sm-2'><label>Unit Cost:</label><input type='text' value= "+unitcostvalue+"  class='form-control inputrate' id='partrate"+count2+"'/></div><div class='col-sm-2'><label>Quantity:</label><input type='text' value="+qtyvalue+"   id='partqty"+count2+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='parttaxtype"+count2+"' value="+taxtypevalue+"   class='parttaxtype' name='taxtype'/></span><input type='text'  value="+taxvalue+"  id='parttax"+count2+"' class='form-control parttax' name='tax'/></div></div></div></div><hr/></div>");					
					}
			}
			// $('.parttaxtype').select2({
    		// width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]
			// });
			// $('#parttaxtype'+numItems2).val(2).trigger('change');
			
	$('.datemask').datepicker({
            format:"dd/mm/yy",
             autoclose: true
   });
   
	//add control button onclick
	$("#btnAddControl").click(function (event) 
		{
			event.preventDefault();
			var numItems = $('.classname').length+1;
			$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'>	<div 	class='col-sm-3'><label>Part:</label><input type='text' name='labour"+numItems+"' class='form-control inputpart' id='part"+numItems+"'/></div><div class='col-sm-3'><label>Type:</label><input type='text' 	class='form-control' id='type"+numItems+"'/></div><div class='col-sm-3'><label>Select:</label><input id='test' class='form-control test' name='test'/></div></div><hr/></div>");
			$('.test').select2({ 		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata		});
		});
	
	$("#btnAddLaborControl").click(function (event) 
		{
			event.preventDefault();
			var numItems = $('.laborhrs').length+1;
			if(document.getElementById("typeselect").value == 1)// for Service Task
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='newclass' 	id='newineditlabor"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof1"+numItems+"'/>	<input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/>	<div class='form-group'><label>ServiceTask:</label>	<div class='input-group'><div class='input-group-btn' ><a id='L,0,"+workorderlineitemid+"' value='newid' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='servicetask"+numItems+"'   class='form-control test' id='wotype1"+numItems+"'/></div></div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"'  class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text'  	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text'  id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-2'>	<div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+numItems+"'  class='labortaxtype' name='taxtype'/></span><input type='text'  id='labortax"+numItems+"' class='form-control labortax' name='tax'/></div></div></div></div><hr/></div></div>");
					// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='newclass' 	id='newineditlabor"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><label>ServiceTask:</label><input  name='servicetask"+numItems+"' class='form-control test' id='wotype1"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='newid'><i class='fa fa-trash'></i></a></div>   </div><hr/></div></div>");
			
				}
			else if(document.getElementById("typeselect").value == 2)// for Issues
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='newclass' 	id='newineditlabor"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn' ><a id='L,0,"+workorderlineitemid+"' value='newid' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"'  class='form-control testissue' id='wotype1"+numItems+"'/></div>	</div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"'  class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text'  	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text'  id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div>   <div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+numItems+"'  class='labortaxtype' name='taxtype'/></span><input type='text'   id='labortax"+numItems+"' class='form-control labortax' name='tax'/></div></div></div></div><hr/></div></div>");	
					// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='newclass' 	id='newineditlabor"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><label>Issue:</label><input  name='issue"+numItems+"' class='form-control testissue' id='wotype1"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-3'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-3'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='labortax' class='form-control inputpart' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='newid'><i class='fa fa-trash'></i></a></div>   </div><hr/></div></div>");
			
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
			$('.labortaxtype').select2({
    		width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]
			});
		
		$('#labortaxtype'+numItems).val(1).trigger('change');
			
		});
	
	$("#btnAddPartControl").click(function (event) 
		{
			alert("inside addParts");
			event.preventDefault();
			var numItems = $('.partqty').length+1;
			if(document.getElementById("typeselect").value == 1)// for Service Task
				{ alert("workorderpartslineitemid--");
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='newclass' 	id='newineditpart"+numItems+"'><div class='clearfix'><div class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><div class='form-group'><label>ServiceTask:</label>	<div class='input-group'><div class='input-group-btn' ><a id='P,0,"+workorderlineitemid+"' value='newid' class='compdelete btn btn-danger btn-flat'>	<i class='fa fa-trash'>	</i></a></div>	<input  name='servicetask"+numItems+"'   class='form-control test' id='wotype2"+numItems+"'/>	</div></div></div><div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"'  class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-2'><label>Unit Cost:</label><input type='text'  	 class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-2'><label>Quantity:</label><input type='text'   id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='parttaxtype"+numItems+"'    class='parttaxtype' name='taxtype'/></span><input type='text'    id='parttax"+numItems+"' class='form-control parttax' name='tax'/></div></div></div></div><hr/></div></div>");
					// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='newclass' 	id='newineditpart"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><label>ServiceTask:</label><input  name='servicetask"+numItems+"' class='form-control test' id='wotype2"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' 	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='newid'><i class='fa fa-trash'></i></a></div>   </div><hr/></div></div>");
			
				}
			else if(document.getElementById("typeselect").value == 2)// for Issues
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='newclass' 	id='newineditpart"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn' ><a id='P,0,"+workorderlineitemid+"' value='newid' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"'    class='form-control testissue' id='wotype2"+numItems+"'/></div></div></div><div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"'  class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-2'><label>Unit Cost:</label><input type='text'  class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-2'><label>Quantity:</label><input type='text'  id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='parttaxtype"+numItems+"'  class='parttaxtype' name='taxtype'/></span><input type='text'  id='parttax"+numItems+"' class='form-control parttax' name='tax'/></div></div></div></div><hr/></div></div>");
					// $(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='newclass' 	id='newineditpart"+numItems+"'><div class='clearfix'> <div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><label>Issue:</label><input  name='issue"+numItems+"' class='form-control testissue' id='wotype2"+numItems+"'/></div>	<div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-3'><label>Unit Cost:</label><input type='text' 	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-3'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-3'><label>Tax:</label><input type='text' id='parttax' class='form-control parttax' name='tax'/></div><div class='col-sm-3 text-center'><a class='delete btn btn-danger btn-flat' id='newid'><i class='fa fa-trash'></i></a></div>   </div><hr/></div></div>");
			
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
			$('.parttaxtype').select2({
    		width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]
			});
			
			$('#parttaxtype'+numItems).val(1).trigger('change');
			
		});
		          		
		

	function editAction()
		{
			//validation for labour and parts items
			var labourpresent = true;
			var partspresent = true;
			// var numItems = $('.laborhrs').length;
			var numLaborItems=0;
			var numPartItems=0;
			var totalLaborItems = $('.laborhrs').length;
			var totalPartItems = $('.partqty').length;
			for(count = 1; count <= totalLaborItems; count++)
				{
					 if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
					 	{
					 		numLaborItems++;
					 	}		
				}	
			for(count = 1; count <= totalPartItems; count++)
				{
					 if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
					 	{
					 		numPartItems++;
					 	}		
				}
				// alert("numLaborItems--"+numLaborItems);
				// alert("numPartItems--"+numPartItems);
				
			for(count = 1; count <= numLaborItems; count++)// prevent an item with null data to be saved
				{ 
					 if( $('#wotype1'+count ).val()==""  ||  $('#contactpart1'+count ).val()=="") 
					 {
					 	if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
					 	{
					 		labourpresent = false;
						}
					 }
				}
			
			var numItems = $('.partqty').length;
			for(count = 1; count <= numPartItems; count++)// prevent an item with null data to be saved
				{ 
					if( $('#wotype2'+count ).val()==""  ||  $('#contactpart2'+count ).val()=="") 
					 {
					 	partspresent = false;
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
			var labor = document.getElementById('labour').innerHTML ;
			var parts = document.getElementById("parts").innerHTML;
			var discount = document.getElementById("dicount").value;
			var tax = document.getElementById("totaltax").value;
			var taxtype = document.getElementById("totaltaxtype").value;
			
	    	if (issuedate != "" && workorderstatus!=null) 
	    		{
	    			if( labourpresent == true && partspresent== true)
						{
							$.get('/Workorders/editajax_data?issuedate='+issuedate+'&workorderstatus='+workorderstatus
				    		+'&vehicleid='+vehicleid+'&startdate='+startdate+'&lables='+lables
				    		+'&odometer='+odometer+'&voidvalue='+voidvalue+'&vendorid='+vendorid
				    		+'&completiondate='+completiondate+'&issuedbyid='+issuedbyid+'&assignedbyid='+assignedbyid
				    		+'&assigntoid='+assigntoid+'&invoicenumber='+invoicenumber+'&phonenumber='+phonenumber
				    		+'&description='+description+'&labor='+labor+'&parts='+parts
				    		+'&discount='+discount+'&tax='+tax+'&taxtype='+taxtype+'&currentworkorderid='+currentworkorderid
				    		, function(d) 
				    			{
					   		 		if(d!="error")
						   		 		{
						   		 			//if workorder status is Closed(4), it is added as a service entry. 
						   		 		 	if (workorderstatus == 4)
						   		 		 		{
						   		 		 			 $.ajax({
												        	 	type : "POST",
												                url  : '/Workorders/saveAsServiceentry?content='+d,
												                success : function(array1){
												                	
												            			// window.location.reload();
												            			}
												            })
						   		 		 		}
					   		 		 		
											var postdata = [];
											var postdatasave = [];
											var numItems2 = $('.partqty').length;
											var numItems3 = $('.laborhrs').length;
											
											//for labor
						    				var numItems = $('.laborhrs').length;
						    				var flg = false;
											currentworkorderlineitemid = workorderlineitemsstarr
											for(count = 1; count <= numLaborItems; count++)
												{ 
													if($(' #newineditlabor'+count ).length) //For Saving new records
														{	
															flg = true;
															postdatasave.push($(' #typeof1'+count ).val() + "^" +$('#ident1'+count ).val() + "^" +  $('#wotype1'+count ).val() + "^" + $('#contactpart1'+count ).val() + "^" + $('#laborrate'+count).val() + "^" + $('#laborqty'+count).val()+ "^" + d + "^" + $('#labortax'+count).val()+  "^" + $('#labortaxtype'+count).val() );
														}
													else //For Editing existing records
														{	
															postdata.push($(' #typeof1'+count ).val() + "^" +$('#ident1'+count ).val() + "^" +  $('#wotype1'+count ).val() + "^" + $('#contactpart1'+count ).val() + "^" + $('#laborrate'+count).val() + "^" + $('#laborqty'+count).val()+ "^" + d +"^" +workorderlineitemslbrarr[count-1]["id"]+"^" +workorderlaborlineitemsarr[count-1]["id"]+ "^" + $('#labortax'+count).val()+  "^" + $('#labortaxtype'+count).val());	
														}
												}
											
											
						    				//for parts
						    				var numItems = $('.partqty').length;
											var flg2 = false;
											for(count = 1; count <= numPartItems; count++) //For Saving new records
												{
													if($(' #newineditpart'+count ).length) //For Saving new records check if new items are added
														{
															flg2 = true
															postdatasave.push($(' #typeof2'+count ).val() + "^" + $('#ident2'+count ).val() + "^" +  $('#wotype2'+count ).val() + "^" + $('#contactpart2'+count ).val() + "^" + $('#partrate'+count).val() + "^" + $('#partqty'+count).val()+ "^" + d + "^" + $('#parttax'+count).val()+  "^" + $('#parttaxtype'+count).val() );	
														} 
													else //For Editing existing records
														{
															postdata.push($(' #typeof2'+count ).val() + "^" + $('#ident2'+count ).val() + "^" +  $('#wotype2'+count ).val() + "^" + $('#contactpart2'+count ).val() + "^" + $('#partrate'+count).val() + "^" + $('#partqty'+count).val()+ "^" + d +"^" +workorderlineitemsptarr[count-1]["id"]+"^" +workorderpartslineitemsarr[count-1]["id"]+ "^" + $('#parttax'+count).val()+  "^" + $('#parttaxtype'+count).val() );
														}	
												}
											console.log("postdatasave FOR EDIT==="+postdatasave);
											
											$.get('/Workorders/editLaborParts?content='+postdata, function(d) 
												{
													if(d!="error")
														{window.location.href = '/Workorders';
														}
							    				});
							    			if(flg || flg2)	
								    			{
								    				$.get('/Workorders/addLaborParts?content='+postdatasave, function(d) 
										    				{
										    					if(d!="error")
																		{
																			// window.location.reload();
												    					}
											    				});
								    			}
							    			window.location.href = '/Workorders';
						    			}
				    		});
						}
				else
					{
						alert("Please select Labour and Parts details");
					}
		    	}
	    	else
		    	{
		    		alert("Please enter the mandatory fields.");
		    		return false;
		    	}
		}

	//Edit btn onclick
	$("#btnSave").click(function () 
		{
			editAction();
	    });
    

   
  });
  
</script>
<?php $this->end(); ?>      	 