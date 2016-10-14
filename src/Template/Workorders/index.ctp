<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li class="active">Work Orders</li>

  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
        <div class="col-md-4">
  <div class="box box-primary">
  	  <div class="box-header">
      	 <h3 class="box-title">Manage Work Orders</h3>
      </div>
      <div class="box-body" >
          <div style="padding-top:5px;min-height:65px">
      	       <button type="button" class="mptl mptl-assign btn btn-primary btn-sm" data-toggle="modal" data-target="#assign">
              	 <span class="badge bg-aqua">0</span>
				  Assign
			  </button>
              <button type="button" class="mptl mptl-assign btn btn-primary btn-sm" data-toggle="modal" data-target="#assign">
              	<span class="badge bg-aqua">0</span>
				 Unassign
			  </button>
			  <button type="button" class="mptl mptl-assign btn btn-primary btn-sm" data-toggle="modal" data-target="#assign">
			  	<span class="badge bg-aqua">0</span>
				  Close
			  </button>
      </div>
      </div>
     </div>
     </div>
      <div class="col-md-8">
      	 <div class="nav-tabs-custom">
	        <ul class="nav nav-tabs">
	          <li  class="active"><a href="#details" data-toggle="tab">Filter</a></li>
	            <li><a href="#specs" data-toggle="tab">Additional Filters</a></li>
              <span id="filterstatus" class="label label-success pull-right" style="margin-right:10px;margin-top:10px" disabled>Filter Active</span>
	        </ul>
	         <div class=" tab-content" style="min-height:85px">
             <div class="active tab-pane" id="details">
							 <div class="box-body">
							      	       <div class="form-group">
							                  <input type="checkbox" class="flat-blue" checked>
							                  <span style="padding-right:10px">Open</span>
							                  <input type="checkbox" class="flat-blue">
                                <span style="padding-right:10px">Overdue</span>
							                  <input type="checkbox" class="flat-blue" disabled>
                                <span style="padding-right:10px">Resolved</span>
							                  <input type="checkbox" class="flat-blue" disabled>
                                <span style="padding-right:10px">Closed</span>
							              </div>
							      </div>
				</div> <!-- tab pane -->
				<div class="tab-pane" id="specs">
							  <div>
                  		 <div>
							      	       	<div class="col-md-4" style="display:inline-block">
							                  Issued Date
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="form-control pull-right" id="issueddate" type="date">
                                    </div>
							                </div>
							                <div class="col-md-4" style="display:inline-block">
							                 Start Date
                               <div class="input-group date">
                                   <div class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                     </div>
                                     <input class="form-control pull-right" id="startdate" type="date">
                                   </div>
							                </div>
							                 <div class="col-md-4" style="display:inline-block">
							                 Completion Date
                               <div class="input-group date">
                                   <div class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                     </div>
                                     <input class="form-control pull-right" id="completiondate" type="date">
                                   </div>
							                </div>
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
                <th>Vehicle</th>
                <th>PO</th>
                <th>Invoice Number</th>
                <th>Start Date</th>
                <th>Odometer</th>
                <th>Issued By</th>
                <th>Assigned By</th>
                <th>Assign To</th>
                <th>Labour</th>
               <th>Parts</th>
                <th>Discount</th>
                <th>Tax</th>
                <th>Issued Date</th>
                <th>Completion Date</th>
                <th>Vendor</th>
                <th>Void</th>
                <th>Status</th>
                <th>Description</th>
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
        			<td>Vehicle</td>
        		</tr>
        		<tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_2"></td>
        			<td>PO</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_3"></td>
        			<td>Invoice Number</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_4"></td>
        			<td>Start Date</td>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_5"></td>
        			<td>Odometer</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_6"></td>
        			<td>Issued By</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_7"></td>
        			<td>Assigned By</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Labour</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Parts</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_6"></td>
        			<td>Discount</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_7"></td>
        			<td>Tax</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Issued Date</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Completion Date</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_7"></td>
        			<td>Vendor</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Void</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Status</td>
        		</tr>
        		</tr><tr>
        	    	<td><input type="checkbox" class="mptl_settings_chk" id="mptl_settings_chk_8"></td>
        			<td>Description</td>
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

<?php $this->start('css'); ?>
  <style>


  </style>
<?php $this->end(); ?>
<?php
$this->Html->css([
  'AdminLTE./plugins/datatables/dataTables.bootstrap',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/iCheck/all',
], ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/daterangepicker/moment.min',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/iCheck/iCheck.min',
], ['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {

    //Flat blue color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    //daterangepicker for advanced filtering
    $('input[id="issueddate"],input[id="startdate"],input[id="completiondate"').daterangepicker({});

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
     	'targets': [4,5,7,9,10,11,12,13,14,15,16,17,18],
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
	   if (~data[3].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[5].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[7].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[8].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[9].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[10].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[11].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[12].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[14].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[15].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[17].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[18].toLowerCase().indexOf(searchTerm)) return true;
	   if (~data[19].toLowerCase().indexOf(searchTerm)) return true;
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
