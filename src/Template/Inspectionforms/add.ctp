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

	window.onload = function () { 
		
		
		 $('.itemselect').select2({
    		width: '100%',allowClear: true,placeholder: "Select",data: [{'id':1, "text":"Pass/Fail Item"},{'id':2, "text":"Meter Entry"},{'id':3, "text":"Text"}]
		});
		
		
		}

  $(function () {
  	
  			//Delete Inspection items
  		$('.maindiv').on('click', 'a.compdelete', function() 
				{
	        		if (confirm("Are you sure you want to delete the particular Item ?")) 
	        				{
								$(this).parent().closest('div.classname').hide();
								
								return true;
	           		   		} 
	           		 else 
	           		   		{
	             				return false;
	           				}
	
	 			});
  	// var numItems = 1;
  		$("#btnAddInspectionItem").click(function (event) 
			{
				event.preventDefault();
			var	numItems = $('.insitemname').length+1;
				
				if(document.getElementById("itemselect").value == 1)// for Pass/Fail Item
					{
						$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'>Pass/Fail Item<div class='clearfix'><div 	class='col-sm-3'><div class='form-group'><label>Name:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control insitemname ' id='insitemname"+numItems+"'/></div>	</div></div><div 	class='col-sm-3'><label>Description:</label><input type='text' name='contact"+numItems+"' class='form-control desc' id='desc"+numItems+"'/></div> <div 	class='col-sm-3'><div class='checkbox'><label></label><input type='checkbox' >Required</div></div>   </div><hr/></div>");
					}
				else if(document.getElementById("itemselect").value == 2)// for Meter Entry
					{
						$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'>Meter Entry<div class='clearfix'><div 	class='col-sm-3'><div class='form-group'><label>Name:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control insitemname ' id='insitemname"+numItems+"'/></div>	</div></div><div 	class='col-sm-3'><label>Description:</label><input type='text' name='contact"+numItems+"' class='form-control desc' id='desc"+numItems+"'/></div>   </div><hr/></div>");
					}
				else if(document.getElementById("itemselect").value == 3)// for Text Entry
					{
						$(".maindiv").append("<div class='classname' 	id='contentDiv"+numItems+"'>Text Entry<div class='clearfix'><div 	class='col-sm-3'><div class='form-group'><label>Name:</label><div class='input-group'><div class='input-group-btn'><a id='delete1' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input  name='issue"+numItems+"' class='form-control insitemname ' id='insitemname"+numItems+"'/></div>	</div></div><div 	class='col-sm-3'><label>Description:</label><input type='text' name='contact"+numItems+"' class='form-control desc' id='desc"+numItems+"'/></div>   </div><hr/></div>");
					}
					
				
			});
  		
  			//save btn onclick
		$("#btnSave").click(function () 
			{
				var name = document.getElementById("name").value;
				var data = document.getElementById("data").value;
				
				$.get('/Inspectionforms/createajax_data?name='+name+'&data='+data
				    		
				    		, function(d) 
				    			{
				    				if(d!="error")
					   		 		{
					   		 			
					   		 		}
				    				else
					   		 		{
					   		 			// console.log("inside error");
				   		 			}       			
				    			}
				    			
				   )  
				    	
				  var noofitems = $('.insitemname').length;  		
				  alert("noofitems"+noofitems);
				  var postdata = [];
				//for labor
				
				for(count = 1; count <= noofitems; count++)
					{ 
						if($("#insitemname"+count).parent().closest('div .classname').is(":visible"))
							{
								postdata.push($(' #insitemname'+count ).val() + "^" +$('#desc'+count ).val()+ "^" +$('#itemselect' ).val()+ "^" +$('#desc'+count ).val() );
							}
					}		
			  if($('.insitemname').length>0 )
							{
								console.log("postdatta--"+postdata);
								$.get('/Inspectionitems/addInspectionItems?content='+postdata, function(d) 
									{
									});
							}
			
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
