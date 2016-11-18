<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li class="active">Distributioncenteres</li>
    
  </ol>
</section>
                
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-md-4">
      <?php 
      $title="Manage $pluralHumanName";
      echo $this->element('actions',[$actions,'title'=>$title]);
	  
	   ?>
     </div>
      <div class="col-md-8">
      	<?php echo  $this->element('filters',$additional) ?>
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
  'AdminLTE./plugins/iCheck/all',
   'AdminLTE./plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min',
 ], ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
  'AdminLTE./plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min',
  'AdminLTE./plugins/daterangepicker/moment.min',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/iCheck/iCheck.min',
], ['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  var table; var order; 
  $(function () {
      
    $('#settings').on('shown.bs.modal', function() {
       setOrder();
    })  
      
    //Flat blue color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    //daterangepicker for advanced filtering
    $('.mptl-daterange').daterangepicker(
    	{locale : {
      format : 'DD/MM/YY'
    }}).val('');
    
      
     table= $('#mptlindextbl').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollX":true,
          colReorder: true,
          stateSave:true,
          responsive: true,
          "fnServerParams": function ( aoData ) {
            
           
         
            aoData.basic=$("#basicfilter").val()?$("#basicfilter").val():"-1";
          },
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
     },
     
     ]
    });
     
     $('<a href="/<?php echo $this->request->params['controller'] ?>/add/" class="btn btn-sm btn-success" style="margin-left:5px;" title="Add New Work Order"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
    $('<a href="#" class="btn btn-sm btn-success" style="margin-left:5px;" title="Export to PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
    $('<a href="#" class="btn btn-sm btn-success" style="margin-left:5px;" title="Export to CSV"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
    $('<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#settings" style="margin-left:5px;" title="Table Settings"><i class="fa fa-gear" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
     
       $('.dataTables_filter input').unbind().on('keyup', function() {
	 
	var searchTerm = this.value.toLowerCase();
   
   table.draw();
   $.fn.dataTable.ext.search.pop();
})
 order= new $.fn.dataTable.ColReorder( table );
 
 
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
      setTurben();
        
       
       
   });
   // Handle click on " Settings Select all" control
   $('#mptl_settings_chk_all').on('click', function(){
      // Check/uncheck checkboxes for all rows in the table
      if( $(this).is(':checked') ){
         $('.mptl_settings_chk').prop('checked', true);
      }else{
      	$('.mptl_settings_chk').prop('checked', false);
      }
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
	   
	   
	   window.location.reload(); 
	   $.post("/<?php echo $this->request->params['controller'] ?>/updateSettings",
   		 {
       		 columns: hiddencols,
       		 visorder:  table.colReorder.order().toString() 
   		 },
	    function(data, status){
	        $('#settings').modal('hide');
	    });
	  
	     $('#settings').modal('hide');
  
   });

    $('.mptl-daterange').change(function(){
    	 table.ajax.reload();
    });
  
        //jQuery UI sortable for the settings modal
    $(".column-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    });
    
     $(".mptl-daterange").change(function(){
          updateFilterActiveFlag();
     });
     
     setTurben();
  });
function setTurben()
{
	var c=$(".mptl-lst-chkbox:checked").length;
      $(".mptl-itemsel").html(c);
      if(c==0){
      	   $( ".mptl-itemsel" ).fadeTo( "slow" , 0, function() {
		   
		  });
      }else{
      	  $( ".mptl-itemsel" ).fadeTo( "slow" , 1, function() {
		   
		  });
      }
}  
  
function updateFilterActiveFlag()
{
	    var flagActive=false;
	    
	    $('.mptl-daterange').each(function () {
		    var l= $(this).val().length;
		    if(l>3){
		    	flagActive=true;
		    }
	   });
	 	$('.mptl-filter-base').each(function (){
    		
    		if(this.checked){
    			flagActive=true;
    		}
    	});
    	
    	
    	  flagActive  ? $("#filterstatus").show() : 	$("#filterstatus").hide();
    	
    	
    
}

$('.mptl-filter-base').on('ifChecked', function(event){ 
	
	setBasicFilter();

});
$('.mptl-filter-base').on('ifUnchecked', function(event){ 
	
	setBasicFilter();

});
  
 function setBasicFilter()
  {
  	  var filter="";
  	
       $('.mptl-filter-base').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var col=id.split("_")[3];
		    if(sThisVal){
	    	
		    	filter.length>0? filter+="," :filter;
		    	filter+=col;
		    	
		    }
	   });
  	  $("#basicfilter").val(filter);
  	 
  	  updateFilterActiveFlag();
  	  table.ajax.reload();
  }
  
  
  function setOrder()
  {
  	
  }
  
  
  
</script>
<?php $this->end(); ?>