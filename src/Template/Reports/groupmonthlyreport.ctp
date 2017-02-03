

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Group Monthly Report
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
	<li><a href="#"></i>Reports</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    	 <div class="box box-primary">
     
      <div class="modal-body" style="padding-bottom:0">
	          
<div class="row">
	
	
	<div class="col-md-3">
			<div class="col-sm-12" id="gpname">
				<?php 
				echo $this->Form->input('Groupname', [ 'options' => $groupsdatanames,'class'=>'select2','id'=>'gname','label'=>['text'=>'Group Name','class'=>'mandatory']]);
				?>
			</div>		
	</div>
	
	
	<div class="col-md-3">
		<div class="col-sm-12" id="monthname">
				<?php 
				echo $this->Form->input('monthname', [ 'options' => array('This Month','Last Month'),'class'=>'select2','id'=>'month','label'=>['class'=>'mandatory']]);
				?>
			</div>	
		
	</div>
	
</div>



            
<div class="modal-footer">
      	<input type="button" value="Generate Report" class="mptl-settings-save btn btn-success" id="generatereport"/>
      	
</div></div></div>
      
      
 <div class="box box-primary">   
 	<div class="box-body">  
	           <table id="traveldetailstbl" class="table table-hover  table-bordered ">
        <thead>
        
            <tr>
         		<th class="th1"></th>
           	    <th class="th2"></th>        
                <th class="th3"></th>
                <th class="th4"></th>
                <th class="th5"></th>
              
                <th data-orderable="false">Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
          </div>
          </div>
      
  </section>
<!-- /.content -->
<?php $this->start('scriptBotton'); ?>
<script>

	
	
	var table= $('#traveldetailstbl').DataTable({
          "paging": true,
          //disable 0th column checkbox default sort order
          // "order": [[ 1, 'asc' ]],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollX":true,
          colReorder: false,
          stateSave:false,
          responsive: true,
          "deferLoading": 0, // here
        //server side processing
          "processing": true,
          "serverSide": true,
          "ajax": {url:""}, 
   });

$(function () {
	//datepicker
    	$('.datemask').datepicker({
    		format:"dd/mm/yyyy",
      		autoclose: true,clearBtn: true
    	});
	
	
				
	
	$('#generatereport').click(function(){
		
    	//get input value
		//var reporttypeelm = document.getElementById("reporttype");
		//var reporttype = reporttypeelm.options[reporttypeelm.selectedIndex].value;
		var groupnameelm = document.getElementById("gname");
		var groupname = groupnameelm.options[groupnameelm.selectedIndex].value;
		var monthnameelm = document.getElementById("month");
		var monthname = monthnameelm.options[monthnameelm.selectedIndex].value;
		//var assetnameelm = document.getElementById("asset-name");
		//var assetname = assetnameelm.options[assetnameelm.selectedIndex].value;
		//var startdate = document.getElementById('startdate').value;
		//var enddate = document.getElementById('enddate').value;
		//var starttimeelm = document.getElementById("starttime");
		//var starttime = starttimeelm.options[starttimeelm.selectedIndex].value;
		//var endtimeelm = document.getElementById("endtime");
		//var endtime = endtimeelm.options[endtimeelm.selectedIndex].value;
		//var speedlimit = document.getElementById('speedlimit').value;
    	// table.ajax.url( '/Tracking/ajax_data' ).load();
    	// table.ajax.reload( null, false );table.ajax.data({starttime: starttime});
    	
    	// if(isset(groupname)){//travel details report 
    		$(".dataTables_scrollHead .th1").text("Vehicle");$(".dataTables_scrollHead .th2").text("Distance");$(".dataTables_scrollHead .th3").text("Max Speed");
    		$(".dataTables_scrollHead .th4").text("No Of Journeys");
    		$(".dataTables_scrollHead .th5").text("Running Time");
    		table.ajax.url('/Journeys/groupMonthlyReportAjaxData?gpname='+groupname+'&monthname='+monthname).load();
    		
   		// }
		// else{//clear table body content
   			// $('#traveldetailstbl tbody').empty();
   		// }
   		
	});
});

</script>
<?php $this->end(); ?>
