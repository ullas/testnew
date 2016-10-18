<style>
.fmactions{
  padding-top:5px;
  min-height:65px;
}
.fmactions > button{
    margin-right: 10px;
  }
.fmactions > button > .label{
    top: -22px;
    right:-22px;
    font-size:10px;
    font-weight:bold;
  }
  .fmactions > button:hover {
    animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
    transform: translate3d(0, 0, 0);
    backface-visibility: hidden;
    perspective: 1000px;
}
  @keyframes shake {
    10%, 90% {
      transform: translate3d(-1px, 0, 0);
    }
    20%, 80% {
      transform: translate3d(2px, 0, 0);
    }
    30%, 50%, 70% {
      transform: translate3d(-4px, 0, 0);
    }
    40%, 60% {
      transform: translate3d(4px, 0, 0);
    }
  }
</style>
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
          <div class="fmactions">
      	       <button type="button" class="mptl mptl-assign btn btn-primary btn-sm" data-toggle="modal" data-target="#assign">
				  Assign
          <span class="label label-success">0</span>
			  </button>
              <button type="button" class="mptl mptl-assign btn btn-primary btn-sm" data-toggle="modal" data-target="#assign">
				 Unassign
         <span class="label label-warning">0</span>
			  </button>
			  <button type="button" class="mptl mptl-assign btn btn-primary btn-sm" data-toggle="modal" data-target="#assign">
				  Close
          <span class="label label-danger">0</span>
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
            	<th data-orderable="false"><input type="checkbox" name="select_all" value="1" id="select-all" ></th>
            	
                <?php
                  for($i=1;$i<count($configs);$i++){
                  		
                  	echo "<th>". $configs[$i]['title'] ."</th>";
                  }
                ?>
                <th data-orderable="false">Actions</th>
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
 <?php echo $this->element('settings',[$configs,$usersettings]) ?>
<?php
$this->Html->css([ 'AdminLTE./plugins/datatables/dataTables.bootstrap', 
'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/iCheck/all'

 ], ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
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
    $('input[id="issueddate"],input[id="startdate"],input[id="completiondate"').daterangepicker({locale : {
      format : 'DD/MM/YY'
    }});
      
    var table= $('#mptlindextbl').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollX":true,
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
     	'targets': [<?php echo $usersettings['0']['value'] ;?>],
     	"visible": false,
     }
     ]
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
   $(".mptl-settings-save").click(function(){
       var hiddencols="";
       $('.mptl_settings_chk').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var col=id.split("_")[3];
		    if(sThisVal){
	    	
		    	table.column(col).visible(true);
		    	
		    }else{
		    	hiddencols.length>0? hiddencols+="," :hiddencols;
		    	hiddencols+=col;
		    	table.column(col).visible(false);
		    }
	   });
	   
	   $.post("/<?php echo $this->request->params['controller'] ?>/updateSettings",
   		 {
       		 columns: hiddencols,
       		 
   		 },
	    function(data, status){
	        $('#settings').modal('hide');
	    });
  
   });

  
  
  
  });
  
  
  
</script>
<?php $this->end(); ?>
