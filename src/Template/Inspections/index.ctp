<section class="content-header">
  <h1>
    Inspections
    <small>Manage you vehicle inspections</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li class="active">Inspections</li>
    
  </ol>
</section>
                
<!-- Main content -->
<section class="content">
  <div class="row">
        <div class="col-md-4">
  <div class="box box-primary" style="min-height:134px">
  	  <div class="box-header">
      	 <h3 class="box-title">Manage Inspections</h3>
      </div>
      <div class="box-body" >
      	      
			  <button type="button" class="mptl mptl-assign btn btn-primary btn-sm" data-toggle="modal" data-target="#assign">
			  	<span class="badge bg-aqua">0</span>
				  Delete
			  </button>
			  
      </div>
     </div>
     </div>
      <div class="col-md-8">
      	 <div class="nav-tabs-custom">
	        <ul class="nav nav-tabs">
	          <li  class="active"><a href="#details" data-toggle="tab">Filter</a></li>	
	            <li><a href="#specs" data-toggle="tab">Additional Filters</a></li>
	        </ul>
	         <div class=" tab-content">
             <div class="active tab-pane" id="details">
                
						
							 <div class="box-body">
							      	       <div class="form-group">
							                
							                <label>
							                  <input type="checkbox" class="minimal" checked>
							                  Open
							                </label>
							                <label>
							                  <input type="checkbox" class="minimal">
							                  Overdue
							                </label>
							                <label>
							                  <input type="checkbox" class="minimal" disabled>
							                  Resolved
							                </label>
							                <label>
							                  <input type="checkbox" class="minimal" disabled>
							                  Closed
							                </label>
							                
							              </div>
							              
							      </div>  	  
							     
						    
				   
				</div> <!-- tab pane -->
				<div class="tab-pane" id="specs">
                 
						
							  <div class="box-body">
							      	       <div class="form-group">
							      	       	<label>
							                  Date of Inspection
							                  <input type="date" class="minimal">
							                  
							                </label>
							                
							                
							              </div>
							              
							      	       	
							                
							                
							              
							              
							      </div>
						
				 
				</div>
				
			   </div>
			</div>
     </div> <!-- COL-7-->
     
     
  </div> <!--Row -->
	
  <div class="row">
        <div class="col-md-12">
  <div class="box box-primary">
      <div class="box-body">
    <table id="mptlindextbl" class="table table-hover  table-bordered ">
        <thead>
            <tr>
            	<th><input type="checkbox" name="select_all" value="1" id="select-all"></th>
                <th>Name</th>
                <th>Vehicle</th>
                <th>Date</th>
                <th>Decription</th>             
                <th>Status</th>
                <th>Form</th>
                <th>Actions</th>
               
            </tr>
        </thead>
        <tbody></tbody>
    </table></div></div>
    </div></div>
   
 

</section>
<div class="modal fade" id="assign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="modalSettings">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalSettings">Settings</h4><small>Select the colums to display</small>
      </div>
      <div class="modal-body">
      	<div class="box box-primary">
        <table class="mptl-tbl-settings table table-hover" >
        	<thead>
        		<tr>
        			<th style="width:20px"><input type="checkbox" id="mptl_settings_chk_all" ></th>
        		    <th>Column Name</th>
        		</tr>
        		
        	</thead>
        	<tbody>
        		<tr style="text-align:left">
        	    	<td style="width:20px"><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_1" checked=""></td>
        			<td>Name</td>
        		</tr>
        		<tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_2"></td>
        			<td>Vehicle</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_3"></td>
        			<td>Service Date</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_4"></td>
        			<td>Odometer</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_5"></td>
        			<td>Reference</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_6"></td>
        			<td>Labour</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_7"></td>
        			<td>Parts</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Tax</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_6"></td>
        			<td>Vendor</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_7"></td>
        			<td>Void</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Comments</td>
        		</tr>
        		
        	</tbody>
        	   
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<?php
$this->Html->css([ 'AdminLTE./plugins/datatables/dataTables.bootstrap',  ], ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
], ['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
      
      // $.fn.dataTable.ext.errMode=throw;
      
   var table= $('#mptlindextbl').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        //server side processing
          "processing": true,
          "serverSide": true,
          "ajax": "/<?php echo $this->request->params['controller'] ?>/ajaxData",
          'columnDefs': [{
        'targets': 0,      
        'className': 'dt-body-center',
        'render': function (data, type, full, meta){console.log(data);
            return '<input type="checkbox" class="mptl-lst-chkbox" name="chk' + data + '" value="' + $('<div/>').text(data).html() + '">';
        }
     },{
     	'targets': [4],
     	"visible": false,
     	
     },
     {
     	'targets': [0],
     	"searchable": false,
     	'orderable': false,
     }]
  
    });
     $('<a href="/<?php echo $this->request->params['controller'] ?>/add/" class="btn btn-sm btn-success" style="margin-left:5px;"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
     $('<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#settings" style="margin-left:5px;"><i class="fa fa-gear" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
  
      
     $('.dataTables_filter input').unbind().on('keyup', function() {
	var searchTerm = this.value.toLowerCase();
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
       //search only the following columns
	   if (~data[1].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[2].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[4].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[5].toLowerCase().indexOf(searchTerm)) return true;
	   
	  
       return false;
   })
   table.draw(); 
   $.fn.dataTable.ext.search.pop();
})
  
  // Handle click on "Select all" control
   $('#select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#mptlindextbl tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
     
       var c=$(".mptl-lst-chkbox:checked").length;
       $(".mptl span").html(c);
   });  
   
   
   // Handle click on " Settings Select all" control
   $('#mptl_settings_chk_all').on('click', function(){
      
      // Check/uncheck checkboxes for all rows in the table
      $('.mptl_settings_chk').prop('checked', true);
   });

   // Handle click on checkbox to set state of "Settings Select all" control
   $('mptl-tbl-settings tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#mptl_settings_chk_all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
     
      
   });  
   
   
  
 /*  $(".mptl-close").click(function(){
  	
  	alert("Do you want to close the issue?");
  });
  
  $(".mptl-assign").click(function(){
  	
        $(".assign-modal").show();
  
  });  
  $(".mptl-unassign").click(function(){
  	
  	alert("Do you want to Un Assign?");
  });  */

  
  
  
  });
  
  
  
</script>
<?php $this->end(); ?>
