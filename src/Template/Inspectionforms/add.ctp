<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New InspectionForm <small>Please fill the details to create a new InspectionForm</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li><a href="/Inspections"> Inspections</a></li>
    <li><a href="/Inspectionforms"> Inspection Forms</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($inspectionform) ?>
   <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">

        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
			<?php           
			echo $this->Form->input('name');
            echo $this->Form->input('data');
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
     <div class="col-md-12">
		<div class="box">
		  <div class="box-header">
		       <h4 class="box-title">Add Inspection Items</h4>
		  </div>
		
		  <div class="box-body maindiv">
		      <div class="classnameheader" id="contentDiv1">
		          <div class="clearfix">
		          		<div class="col-sm-3 ">
		              	<input  name='itemselect"' class='form-control itemselect' id='itemselect'/>
					   	</div>
		              	<div class="col-sm-3 ">
		              	<input type="button" class="btn btn-flat btn-primary w100" id="btnAddInspectionItem" value="Add" />
		              	</div>
			        </div>
					<hr/>
		      </div>
	  	   </div>
		</div>
	</div>
  </div>
  
  
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

	window.onload = function () { 
		
		
		 $('.itemselect').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: [{'id':1, "text":"Pass/Fail Item"},{'id':2, "text":"Meter Entry"},{'id':2, "text":"Text"}]
		});
		
		
		}

  $(function () {
  	
  		$("#btnAddInspectionItem").click(function (event) 
		{
			event.preventDefault();
			var numItems = $('.laborhrs').length+1;
			if(document.getElementById("itemselect").value == 1)// for Pass/Fail Item
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div class="col-sm-3"><div class="form-group"><label>Name:</label><div class="input-group"><div class="input-group-btn"><a id="delete1" class="compdelete btn btn-danger btn-flat"><i class="fa fa-trash"></i></a></div><input name="issue2" class="form-control testissue" id="wotype12"></div></div></div><div class="col-sm-3"><label>Desc:</label><input name="issue2" class="form-control testissue" id="wotype12"></div></div></div>");
				}
			else if(document.getElementById("itemselect").value == 2)// for Meter Entry
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control testissue' id='wotype1"+numItems+"'/></div>	</div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div>   <div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+numItems+"' class='labortaxtype' name='taxtype'/></span><input type='text' id='labortax"+numItems+"' class='form-control labortax' name='tax'/></div></div></div><div class='col-sm-2 pull-right' ><label >SubTotal</label><label class='subtotallabor pull-right' id='subtotallaborIS"+numItems+"' >0.00</label></div></div><hr/></div>");
				}
			else if(document.getElementById("itemselect").value == 3)// for Text Entry
				{
					$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'><div class='clearfix'><div 	class='col-sm-3'><div class='form-group'><label>Issue:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control testissue' id='wotype1"+numItems+"'/></div>	</div></div><div 	class='col-sm-3'><label>Contact:</label><input  name='contact"+numItems+"' class='form-control contact' id='contactpart1"+numItems+"'/></div><div class='col-sm-2'><label>Hourly Rate:</label><input type='text' 	class='form-control laborrate' id='laborrate"+numItems+"'/></div><div class='col-sm-2'><label>Hours:</label><input type='text' id='laborqty"+numItems+"' class='form-control laborhrs' name='hrs'/></div>   <div class='col-sm-2'> <div class='form-group'><label>Tax:</label><div class='input-group'><span class='input-group-addon no-padding'><input  id='labortaxtype"+numItems+"' class='labortaxtype' name='taxtype'/></span><input type='text' id='labortax"+numItems+"' class='form-control labortax' name='tax'/></div></div></div><div class='col-sm-2 pull-right' ><label >SubTotal</label><label class='subtotallabor pull-right' id='subtotallaborIS"+numItems+"' >0.00</label></div></div><hr/></div>");
				}
			// $('.testissue').select2({
	    		// width: '100%',allowClear: true,placeholder: "Select",data: issuedata
			// });
			// $('.test').select2({
	    		// width: '100%',allowClear: true,placeholder: "Select",data: servicetaskdata
			// });
			// $('.contact').select2({
	    		// width: '100%',allowClear: true,placeholder: "Select",data: contactdata
			// });
			// $('.labortaxtype').select2({
    		// width: '100%',data: [{'id':1, "text":"%"},{'id':2, "text":"$"}]
			// });
		
		// $('#labortaxtype'+numItems).val(1).trigger('change');
		// if(document.getElementById('subtotallaborST'+numItems))
		// {document.getElementById('subtotallaborST'+numItems).innerHTML = "0.00";}
		// if(document.getElementById('subtotallaborIS'+numItems))
		// {document.getElementById('subtotallaborIS'+numItems).innerHTML = "0.00";}
	});
  	
  	
    //Initialize Select2 Elements
   $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });

  });
</script>
<?php $this->end(); ?>
