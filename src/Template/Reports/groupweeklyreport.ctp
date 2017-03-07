

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Group Weekly Report
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
				echo $this->Form->input('Groupname', [ 'options' => $groupsdatanames,'empty'=>true,'class'=>'select2','id'=>'gname','label'=>['text'=>'Group Name','class'=>'mandatory']]);
				?>
			</div>		
	</div>
	
	
</div>



            
<div class="modal-footer">
      	<input type="button" value="Generate Report" class="mptl-settings-save btn btn-success" id="generatereport"/>
      	
</div></div></div>
      
      
 <div id="tablebox"  class="box box-primary">   
 	<div class="box-body">  
	           <table id="traveldetailstbl" class="table table-hover  table-bordered ">
        <thead>
        
            <tr>
         		<th class="th1"></th>
           	    <th class="th2"></th>        
                <th class="th3"></th>
                <th class="th4"></th>
                <th class="th5"></th>
              
                <!-- <th data-orderable="false">Actions</th> -->
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
	$("#tablebox").hide();
	//datepicker
    	$('.datemask').datepicker({
    		format:"dd/mm/yyyy",
      		autoclose: true,clearBtn: true
    	});
	
	
				
	
	$('#generatereport').click(function(){
		$("#tablebox").hide();
		if(document.getElementById("gname").value   )
		{
			$("#tablebox").show();
    	var groupnameelm = document.getElementById("gname");
		var groupname = groupnameelm.options[groupnameelm.selectedIndex].value;
			$(".dataTables_scrollHead .th1").text("Vehicle");$(".dataTables_scrollHead .th2").text("Distance");$(".dataTables_scrollHead .th3").text("Max Speed");
    		$(".dataTables_scrollHead .th4").text("No Of Journeys");
    		$(".dataTables_scrollHead .th5").text("Running Time");
    		table.ajax.url('/Journeys/groupWeeklyReportAjaxData?gpname='+groupname).load();
   		}
   		else
		{
			alert("Please select Group");
			
		}
	});
});

</script>
<?php $this->end(); ?>
