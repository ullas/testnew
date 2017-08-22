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
	            echo $this->Form->input('workorderstatus_id',['options' => $workorderstatuses,'label'=>'Work Order Status ','class'=>'select2','required' => 'required']);
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
								              	<input id="test" class="form-control test" name="test"/></div> -->
								              <!-- <div class="col-sm-4 "><label>Type:</label>
								              	<input id="test" class="form-control type" name="type"/></div> -->
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
								        <h4 class="box-title">Totals</h4> 
								  </div>
								
								  <div class="box-body">
								  	<div class="form-horizontal">
										<div class="form-group">
											 <div class="col-sm-3">
											 <label >Labor</label>
											 </div>
											 <div class="col-sm-3">
											 <label id='labors' text="0.00" class='labors' ></label>
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
								// echo $this->Form->input('labors',['readonly' => 'readonly']);
            					// echo $this->Form->input('parts',['readonly' => 'readonly']);
								echo $this->Form->input('dicount',['label'=>'Discount']);
            					// echo $this->Form->input('tax',['label'=>'']);
			
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
									 	 <label id="total" text="0.00" ></label>
										  <!-- <?php
										       
										        // echo $this->Form->control('total');
										        // echo $this->Form->label('total', ['label' => "0.00"]);
										        // echo $this->Form->input('total',['label'=>'0.00']);
										 ?> -->
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
		
		var resissues=[];
		
		
		var resissues_length = <?php echo count($resissues); ?>;
		
		console.log(resissues_length);
		if (resissues_length>0)
			{
				<?php
				for ($i=0; $i < count($resissues) && $resissues[$i] ; $i++) { 
				?>
				
					resissues[<?php echo $i ?>] = <?php echo $resissues[$i];?>;
				
				<?php
				}
				?>
		
				resolveIssues(resissues);
			}
        $('.test').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
		});
		
		 $('.typeselect').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: [{'id':1, "text":"Service Task"},{'id':2, "text":"Issue"}]
		});
		
		// $('#labors').val(0);
		// $('#parts').val(0);
		$('#dicount').val(0);
		$('#totaltax').val(0);
		$('.totaltaxtype').select2({
    		width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]
			});
		$('.totaltaxtype').val(1).trigger('change');
		document.getElementById('total').innerHTML  = "0.00";
		document.getElementById('labors').innerHTML  = "0.00";
		document.getElementById('parts').innerHTML  = "0.00";
		
		function resolveIssues(resissues)
    	{
	    		
	    		//Show issues to be resolved
					for (var i=0;i<resissues.length;i++)
						{
							//labour
						 	var numItems = $('.laborhrs').length+1;
							$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control testissue' id='wotype1"+numItems+"'/></div>	</div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div>   <div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+numItems+"' class='labortaxtype' name='taxtype'/></span><input type='text' id='labortax"+numItems+"' class='form-control labortax' name='tax'/></div></div></div></div><hr/></div>");
							
							$('.labortaxtype').select2({
							width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]
							});
							$('#labortaxtype'+numItems).val(1).trigger('change');
							$('.testissue').select2({
					    	width: '100%',allowClear: true,placeholder: "Select",data: issuedata
							});
							$('#wotype1'+numItems).val(resissues[i]).trigger('change');
							
							//parts
							var numItems = $('.partqty').length+1;
							$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control testissue' id='wotype2"+numItems+"'/></div></div></div><div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-2'><label>Unit Cost:</label><input type='text' 	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-2'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='parttaxtype"+numItems+"' class='parttaxtype' name='taxtype'/></span><input type='text' id='parttax"+numItems+"' class='form-control parttax' name='tax'/></div></div></div></div><hr/></div>");
							
							$('.parttaxtype').select2({
							width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]
							});
							$('#parttaxtype'+numItems).val(1).trigger('change');
							$('.testissue').select2({
					    	width: '100%',allowClear: true,placeholder: "Select",data: issuedata
							});
							$('#wotype2'+numItems).val(resissues[i]).trigger('change');
							
						}
						 	
			
			$('.test').select2({
	    		width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
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
			
		}
		
		
	}
    
  $(function () 
  	{
  		var resissues=[];
		var resissues_length = <?php echo count($resissues); ?>;
		console.log(resissues_length);
		if (resissues_length>0)
			{
				<?php
				for ($i=0; $i < count($resissues) && $resissues[$i] ; $i++) { 
				?>
				
					resissues[<?php echo $i ?>] = <?php echo $resissues[$i];?>;
				
				<?php
				}
				?>
		
			}
 
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
					    		if($('#dicount').val() == ""){$('#dicount').val(0);}
								if($('#totaltax').val() == ""){$('#totaltax').val(0);}
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
					
					document.getElementById('labors').innerHTML =laborcount;
					var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
								
								if($('#dicount').val() == ""){$('#dicount').val(0);}
								if($('#totaltax').val() == ""){$('#totaltax').val(0);}
								
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
					laborcount = laborcount.toFixed(2);
					document.getElementById('labors').innerHTML = laborcount;	
					var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
								
								if($('#dicount').val() == ""){$('#dicount').val(0);}
								if($('#totaltax').val() == ""){$('#totaltax').val(0);}
									
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
					partcount = partcount.toFixed(2);
					document.getElementById('parts').innerHTML = partcount;
					var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
								
								if($('#dicount').val() == ""){$('#dicount').val(0);}
								if($('#totaltax').val() == ""){$('#totaltax').val(0);}
								
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
					partcount = partcount.toFixed(2);
					document.getElementById('parts').innerHTML = partcount;	
					var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
				    				
				    				if($('#dicount').val() == ""){$('#dicount').val(0);}
									if($('#totaltax').val() == ""){$('#totaltax').val(0);}
				    				
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
					laborcount = laborcount.toFixed(2);
					document.getElementById('labors').innerHTML = laborcount;
					var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
				    				
				    				if($('#dicount').val() == ""){$('#dicount').val(0);}
									if($('#totaltax').val() == ""){$('#totaltax').val(0);}
				    				
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
					partcount = partcount.toFixed(2);
					document.getElementById('parts').innerHTML = partcount;
					var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
						    		
						    		if($('#dicount').val() == ""){$('#dicount').val(0);}
									if($('#totaltax').val() == ""){$('#totaltax').val(0);}
						    			
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
					laborcount = laborcount.toFixed(2);
					document.getElementById('labors').innerHTML = laborcount;
					var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
						    		
						    		if($('#dicount').val() == ""){$('#dicount').val(0);}
									if($('#totaltax').val() == ""){$('#totaltax').val(0);}
						    			
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
					partcount = partcount.toFixed(2);
					document.getElementById('parts').innerHTML = partcount;
					var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
					if(document.getElementById('labors').innerHTML != "" || document.getElementById('parts').innerHTML != "" )
						{
							if($('#dicount').val() != "")
								{
									if($('#totaltax').val() == ""){$('#totaltax').val(0);}
									var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
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
					if(document.getElementById('labors').innerHTML != "" || document.getElementById('parts').innerHTML != "" )
						{
							if($('#totaltax').val() != "")
								{
									if($('#dicount').val() == ""){$('#dicount').val(0);}
									
									var totalsum= parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
									
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
					if(document.getElementById('labors').innerHTML != "" || document.getElementById('parts').innerHTML != "" )
						{
							if($('#totaltax').val() != "")
								{ 
									if($('#dicount').val() == ""){$('#dicount').val(0);}
									var totalsum = parseFloat(document.getElementById('labors').innerHTML) + parseFloat(document.getElementById('parts').innerHTML) - parseFloat($('#dicount').val());
									
									var taxamount;
									if($('#totaltaxtype').val() == 1)
										{
											totalsum = totalsum + totalsum* parseFloat($('#totaltax').val())/100;
											document.getElementById('total').innerHTML  = totalsum;
										}
									if($('#totaltaxtype').val() == 2)
										{
											totalsum = totalsum +  parseFloat($('#totaltax').val());
											document.getElementById('total').innerHTML  = totalsum;
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
			
			$('.maindiv').on('click', 'a.compdelete', function() 
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
			
			
			
					
			//calculate total labor cost on keyup of Hours
			$('.maindiv').on('change keyup', 'input.laborhrs', function() {
				laborHrsCalculate();
			});
			
			//calculate total labor cost on keyup of HoursRate
			$('.maindiv').on('change keyup', 'input.laborrate', function() {
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
				
						
	    //Initialize Select2 Elements
	    // $(".select2").select2();
	    $('.datemask').datepicker({
	            format:"dd/mm/yy",
	             autoclose: true
	    });
   

	$("#btnAddLaborControl").click(function (event) 
		{
			event.preventDefault();
			var numItems = $('.laborhrs').length+1;
			if(document.getElementById("typeselect").value == 1)// for Service Task
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof1"+numItems+"'/>	<input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/>	<div class='form-group'><label>ServiceTask:</label>	<div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='servicetask"+numItems+"' class='form-control test' id='wotype1"+numItems+"'/></div></div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div><div class='col-sm-2'>	<div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+numItems+"' class='labortaxtype' name='taxtype'/></span><input type='text' id='labortax"+numItems+"' class='form-control labortax' name='tax'/></div></div></div></div><hr/></div>");
			
				}
			else if(document.getElementById("typeselect").value == 2)// for Issues
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof1"+numItems+"'/><input type='hidden' value='labor'   class='form-control' id='ident1"+numItems+"'/><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control testissue' id='wotype1"+numItems+"'/></div>	</div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div>   <div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+numItems+"' class='labortaxtype' name='taxtype'/></span><input type='text' id='labortax"+numItems+"' class='form-control labortax' name='tax'/></div></div></div></div><hr/></div>");
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
			event.preventDefault();
			var numItems = $('.partqty').length+1;
			if(document.getElementById("typeselect").value == 1)// for Service Task
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-3'><input type='hidden' value='servicetask'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><div class='form-group'><label>ServiceTask:</label>	<div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'>	<i class='fa fa-trash'>	</i></a></div>	<input  name='servicetask"+numItems+"' class='form-control test' id='wotype2"+numItems+"'/>	</div></div></div><div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-2'><label>Unit Cost:</label><input type='text'	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-2'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='parttaxtype"+numItems+"' class='parttaxtype' name='taxtype'/></span><input type='text' id='parttax"+numItems+"' class='form-control parttax' name='tax'/></div></div></div></div><hr/></div>");

				}
			else if(document.getElementById("typeselect").value == 2)// for Issues
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><input type='hidden' value='issue'   class='form-control' id='typeof2"+numItems+"'/><input type='hidden' value='part'   class='form-control' id='ident2"+numItems+"'/><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control testissue' id='wotype2"+numItems+"'/></div></div></div><div 	class='col-sm-3'><label>Part:</label><input  name='part"+numItems+"' class='form-control part' id='contactpart2"+numItems+"'/></div><div class='col-sm-2'><label>Unit Cost:</label><input type='text' 	class='form-control inputrate' id='partrate"+numItems+"'/></div><div class='col-sm-2'><label>Quantity:</label><input type='text' id='partqty"+numItems+"' class='form-control partqty' name='quantity'/></div><div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='parttaxtype"+numItems+"' class='parttaxtype' name='taxtype'/></span><input type='text' id='parttax"+numItems+"' class='form-control parttax' name='tax'/></div></div></div></div><hr/></div>");
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
		          		


	//save btn onclick
	$("#btnSave").click(function () {
		alert("resissues--"+resissues);
		var labourpresent = true;
		var partspresent = true;
		var numItems = $('.laborhrs').length;
		for(count = 1; count <= numItems; count++)// prevent an item with null data to be saved
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
		for(count = 1; count <= numItems; count++)// prevent an item with null data to be saved
			{ 
				if( $('#wotype2'+count ).val()==""  ||  $('#contactpart2'+count ).val()=="") 
				 {
				 	if($("#partrate"+count).parent().closest('div .classname').is(":visible"))
					 	{
							partspresent = false; 		
					 	}
				 	
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
		var labor = document.getElementById("labors").innerHTML; 
		var parts = document.getElementById("parts").innerHTML;
		var discount = document.getElementById("dicount").value;
		var tax = document.getElementById("totaltax").value;
		var taxtype = document.getElementById("totaltaxtype").value;
		if (issuedate != "" && workorderstatus!=null) 
    		{
				if( labourpresent == true && partspresent== true)
					{
							$.get('/Workorders/createajax_data?issuedate='+issuedate+'&workorderstatus='+workorderstatus
				    		+'&vehicleid='+vehicleid+'&startdate='+startdate+'&lables='+lables
				    		+'&odometer='+odometer+'&voidvalue='+voidvalue+'&vendorid='+vendorid
				    		+'&completiondate='+completiondate+'&issuedbyid='+issuedbyid+'&assignedbyid='+assignedbyid
				    		+'&assigntoid='+assigntoid+'&invoicenumber='+invoicenumber+'&phonenumber='+phonenumber
				    		+'&description='+description+'&labor='+labor+'&parts='+parts
				    		+'&discount='+discount+'&tax='+tax+'&taxtype='+taxtype
				    		, function(d) {
				   		 		if(d!="error")
					   		 		{console.log("inside save2");
										var postdata = [];
										//for labor
					    				var numItems = $('.laborhrs').length;
										for(count = 1; count <= numItems; count++)
											{ 
												if($("#laborrate"+count).parent().closest('div .classname').is(":visible"))
													{
														// postdata.push($(' #typeof1'+count ).val() + "^" +$('#ident1'+count ).val() + "^" +  $('#wotype1'+count ).val() + "^" + $('#contactpart1'+count ).val() + "^" + $('#laborrate'+count).val() + "^" + $('#laborqty'+count).val()+ "^" + d );
														postdata.push($(' #typeof1'+count ).val() + "^" +$('#ident1'+count ).val() + "^" +  $('#wotype1'+count ).val() + "^" + $('#contactpart1'+count ).val() + "^" + $('#laborrate'+count).val() + "^" + $('#laborqty'+count).val()+ "^" + d+ "^" + $('#labortax'+count).val()+ "^"+ $('#labortaxtype'+count).val());
													}
											}
										
										//for part
					    				var numItems = $('.partqty').length;
										for(count = 1; count <= numItems; count++)
											{
												if($("#partqty"+count).parent().closest('div .classname').is(":visible"))
													{
														// postdata.push($(' #typeof2'+count ).val() + "^" + $('#ident2'+count ).val() + "^" +  $('#wotype2'+count ).val() + "^" + $('#contactpart2'+count ).val() + "^" + $('#partrate'+count).val() + "^" + $('#partqty'+count).val()+ "^" + d);	
														postdata.push($(' #typeof2'+count ).val() + "^" + $('#ident2'+count ).val() + "^" +  $('#wotype2'+count ).val() + "^" + $('#contactpart2'+count ).val() + "^" + $('#partrate'+count).val() + "^" + $('#partqty'+count).val()+ "^" + d+ "^"+ $('#parttax'+count).val()+ "^"+ $('#parttaxtype'+count).val());	
													} 
												
											}
										if($('.laborhrs').length>0 || $('.partqty').length>0)
											{
												console.log("postdatta--"+postdata);
												$.get('/Workorders/addLaborParts?content='+postdata, function(d) 
													{
													});
											}
										window.location.href = '/Workorders';
					   		 		}else
					   		 		{
					   		 			// console.log("inside error");
					   		 		}
					   		 		
					   		 		//for setting the resolved issues' status as Resolved (issuestatus=status3)
					   		 		 $.ajax({
								        	 type : "POST",
								             url  : '/Issues/assignToWorkorder?content='+resissues+'&wid='+d,
								             success : function(array1)
								             	{
								             	  window.location.reload();
								             	}
								            })
						             
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
    	
    
    	
	});
   
  });</script>
<?php $this->end(); ?>      	 