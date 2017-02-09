

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Adhoc Reports
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
			<div class="col-sm-12">
				<?php 
					echo $this->Form->input('reporttype', [ 'options' => $reporttypes,'class'=>'select2','label'=>['text'=>'Report','class'=>'mandatory']]);
				?>
			</div>		
	</div>
	
	
	<div class="col-md-3">
			<div class="col-sm-12" id="gpname">
				<?php 
				echo $this->Form->input('groupname',[ 'empty'=>true, 'options' => $groupsdatanames,'class'=>'select2','label'=>['text'=>'Group Name']]);
				?>
			</div>		
	</div>
	
	
	<div class="col-md-3">
			<div class="col-sm-12" id="astname">
				<?php 
				// echo $this->Form->input('Asset Name', [ 'options' => $trackingobjects ,'class'=>'select2','label'=>['text'=>'Asset Name','class'=>'mandatory']])
				echo $this->Form->input('Asset Name', ['options' => "",'label'=>['text'=>'Asset Name']]);
				// echo $this->Form->select('rooms', [    'multiple' => true,      'default' => [1, 3]]);
				?>
			</div>		
	</div>
	
	<div class="col-md-3"><div class="col-sm-12">
		<div class="form-group">
			<label for="startdate">Start Date</label>
			<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<input type="text" name="startdate" empty="1" required="required" class="datemask form-control" id="startdate">
				<!-- <?php 
				echo $this->Form->input('startdate', [ 'type'=>'text','empty' => true,'class'=>'datemask','label'=>'Start Date','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
				?> -->
			</div></div>
		</div>
		
	</div>
	
</div>

<div class="row">
	
	
	<div class="col-md-3">
			<div class="col-sm-12">
				<?php 
				echo $this->Form->input('starttime', [ 'options' => $times,'class'=>'select2','label'=>['text'=>'Start Time','class'=>'mandatory']]);
				?>
			</div>		
	</div>
	
	<div class="col-md-3"><div class="col-sm-12">
		<div class="form-group">
			<label for="enddate">End Date</label>
			<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<input type="text" name="enddate" empty="1" required="required" class="datemask form-control" id="enddate">
				<!-- <?php 
				echo $this->Form->input('enddate', [ 'type'=>'text','empty' => true,'class'=>'datemask','label'=>'End Date']);
				?> -->
			</div>
		</div></div>
		
	</div>
	
	<div class="col-md-3">
			<div class="col-sm-12">
				<?php 
					echo $this->Form->input('endtime', [ 'options' => $times,'class'=>'select2','label'=>['text'=>'End Time','class'=>'mandatory']]);
				?>
			</div>		
	</div>
	
	<div class="col-md-3">
			<div class="col-sm-12" id="spthr" style="display: none;">
				<?php 
					echo $this->Form->input('speedlimit', ['label'=>['text'=>'Speed Limit','class'=>'mandatory']]);
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
	//datepicker
    	$('.datemask').datepicker({
    		format:"dd/mm/yyyy",
      		autoclose: true,clearBtn: true
    	});
		
		var groupnameelm = document.getElementById("groupname");
		var groupname = groupnameelm.options[groupnameelm.selectedIndex].value;
	
	
	
	
	$('#groupname').change(function(){ 
		$('#asset-name').empty();
		// alert(document.getElementById("groupname").value);// when dropdown value gets changed function executes
    $.ajax({
         type : "POST",
                url  : '/Reports/check_ajax2?groupname='+document.getElementById("groupname").value,
                success : function(array1){
                	 	var array = JSON.parse(array1);
        				for (var key in array) 
        					{
								if (array.hasOwnProperty(key)) 
									{
									$("<option value='" + array[key].id+ "'>" + array[key].name + "</option>").appendTo('#asset-name');
									}
							}  // assign the output to asset names
                    }
            })
            });
	
	
	
	$("#spthr").hide(); 
	$('#reporttype').change(function() {
    	if(this.value==2){//top speed report
    		$("#spthr").show(); 
    	}else{
    		$("#spthr").hide(); 
    	}
    	if(this.value==76 || this.value==77 ){//top speed report
    		$("#gpname").hide(); $("#astname").hide();
    	}else{
    		$("#gpname").show();  $("#astname").show();
    	}
	});
	
	$('#generatereport').click(function(){
    	//get input value
		var reporttypeelm = document.getElementById("reporttype");
		var reporttype = reporttypeelm.options[reporttypeelm.selectedIndex].value;
		// var groupnameelm = document.getElementById("group-name");
		// var groupname = groupnameelm.options[groupnameelm.selectedIndex].value;
		var assetnameelm = document.getElementById("asset-name");
		var assetname = assetnameelm.options[assetnameelm.selectedIndex].value;
		var startdate = document.getElementById('startdate').value;
		var enddate = document.getElementById('enddate').value;
		var starttimeelm = document.getElementById("starttime");
		var starttime = starttimeelm.options[starttimeelm.selectedIndex].value;
		var endtimeelm = document.getElementById("endtime");
		var endtime = endtimeelm.options[endtimeelm.selectedIndex].value;
		var speedlimit = document.getElementById('speedlimit').value;
		if(speedlimit==""){speedlimit=-1;}
    	// table.ajax.url( '/Tracking/ajax_data' ).load();
    	// table.ajax.reload( null, false );table.ajax.data({starttime: starttime});
    	
    	if(reporttype==0){//travel details report 
    		$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Speed");$(".dataTables_scrollHead .th4").text("Location");$(".dataTables_scrollHead .th5").text("Status");
    		table.ajax.url('/Tracking/ajax_data?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
		else if(reporttype==1){//fencing report
			$(".spdlmt").type = "text";
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Speed");$(".dataTables_scrollHead .th4").text("Location");$(".dataTables_scrollHead .th5").text("Alert Message");
    		table.ajax.url('/Alerts/fencingAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		if(reporttype==2){//top speed report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Start Date & Time");$(".dataTables_scrollHead .th3").text("End Date & Time");$(".dataTables_scrollHead .th4").text("Max Speed");$(".dataTables_scrollHead .th5").text("Distance");
    		table.ajax.url('/Journeys/topSpeedAjaxData?speedlimit='+speedlimit+'&reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==3){//overspeed report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Speed");$(".dataTables_scrollHead .th4").text("Location");$(".dataTables_scrollHead .th5").text("Alert Message");
    		table.ajax.url('/Alerts/overSpeedAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==4){//Distance travelled report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date");$(".dataTables_scrollHead .th3").text("Distance");$(".dataTables_scrollHead .th4").text("Running time");$(".dataTables_scrollHead .th5").text("Business time");
    		table.ajax.url('/Dailysummary/distanceTravelledAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==5){//Stoppage report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Location");$(".dataTables_scrollHead .th4").text("Speed");$(".dataTables_scrollHead .th5").text("Alert Message");
    		table.ajax.url('/Alerts/stoppageAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==6){//Idle time report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Location");$(".dataTables_scrollHead .th4").text("Idle Time");$(".dataTables_scrollHead .th5").text("Distance");
    		table.ajax.url('/Journeys/idleTimeAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==7){//Travel Summary report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Distance");$(".dataTables_scrollHead .th4").text("Max Speed");$(".dataTables_scrollHead .th5").text("Average Speed");
    		table.ajax.url('/Journeys/travelSummaryAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==8){//Alerts Summary report
   			$(".dataTables_scrollHead .th1").text("Alert Type");$(".dataTables_scrollHead .th2").text("Total Count");$(".dataTables_scrollHead .th3").text("Location");$(".dataTables_scrollHead .th4").text("Speed");$(".dataTables_scrollHead .th5").text("Alert Message");
    		table.ajax.url('/Alerts/alertSummaryAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==9){//During Behavior report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Speed");$(".dataTables_scrollHead .th4").text("Location");$(".dataTables_scrollHead .th5").text("Status");
    		table.ajax.url('/Tracking/duringbehaviorAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==10){//Journey Summary report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Distance");$(".dataTables_scrollHead .th4").text("Max Speed");$(".dataTables_scrollHead .th5").text("Average Speed");
    		table.ajax.url('/Journeys/journeySummaryAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==11){//Activity Summary report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Idle Time");$(".dataTables_scrollHead .th4").text("Running Time");$(".dataTables_scrollHead .th5").text("Stoppage Time");
    		table.ajax.url('/Dailysummary/activitySummaryAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==12){//Route Violations report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Location");$(".dataTables_scrollHead .th4").text("Speed");$(".dataTables_scrollHead .th5").text("Alert Message");
    		table.ajax.url('/Alerts/routeViolationsAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==13){//Zone Visit report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Zone");$(".dataTables_scrollHead .th3").text("Date&Time");$(".dataTables_scrollHead .th4").text("Location");$(".dataTables_scrollHead .th5").text("Speed");
    		table.ajax.url('/Alerts/zoneVisitAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==14){//Mileage report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date & Time");$(".dataTables_scrollHead .th3").text("Idle Time");$(".dataTables_scrollHead .th4").text("Milage");$(".dataTables_scrollHead .th5").text("Distance");
    		table.ajax.url('/Dailysummary/mileageAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		
   		//todo
   		else if(reporttype==15){//Usage Details
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Date");$(".dataTables_scrollHead .th3").text("Distance");$(".dataTables_scrollHead .th4").text("Idle Time");$(".dataTables_scrollHead .th5").text("Business time");
    		table.ajax.url('/Dailysummary/usageDetailsAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		
   		//todo
   		else if(reporttype==16){//Debug
   			$(".dataTables_scrollHead .th1").text("Date & Time");$(".dataTables_scrollHead .th2").text("Speed");$(".dataTables_scrollHead .th3").text("Digital");$(".dataTables_scrollHead .th4").text("Analog");$(".dataTables_scrollHead .th5").text("Location");
    		table.ajax.url('/Tracking/debugAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		
   		
   		
   		else if(reporttype==17){//Driver Error Summary report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Vehicle");$(".dataTables_scrollHead .th3").text("Date & Time");$(".dataTables_scrollHead .th4").text("Speed");$(".dataTables_scrollHead .th5").text("Location");
    		table.ajax.url('/Alerts/driverErrorAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		
   		//todo
   		else if(reporttype==18){//Zone visit count report
   			$(".dataTables_scrollHead .th1").text("Location");$(".dataTables_scrollHead .th2").text("Date");$(".dataTables_scrollHead .th3").text("Vehicle");$(".dataTables_scrollHead .th4").text("Count");
    		table.ajax.url('/Alerts/zoneVisitCountAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		
   		else if(reporttype==19){//Trip Start report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Vehicle");$(".dataTables_scrollHead .th3").text("Date & Time");$(".dataTables_scrollHead .th4").text("Speed");$(".dataTables_scrollHead .th5").text("Location");
    		table.ajax.url('/Alerts/tripStartAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==20){//Trip Endreport
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Vehicle");$(".dataTables_scrollHead .th3").text("Date & Time");$(".dataTables_scrollHead .th4").text("Speed");$(".dataTables_scrollHead .th5").text("Location");
    		table.ajax.url('/Alerts/tripEndAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		
   		else if(reporttype==21){//Loading&Unloading
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Vehicle");$(".dataTables_scrollHead .th3").text("Date & Time");$(".dataTables_scrollHead .th4").text("Location");$(".dataTables_scrollHead .th5").text("Activity");
    		table.ajax.url('/Alerts/loadingUnLoadingAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==22){//Nonoperative vehicles
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Vehicle");$(".dataTables_scrollHead .th3").text("Date & Time");$(".dataTables_scrollHead .th4").text("Speed");$(".dataTables_scrollHead .th5").text("Location");
    		table.ajax.url('/Alerts/tripEndAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		
   		
   		else if(reporttype==24){//Running Time Summary report
   			$(".dataTables_scrollHead .th1").text("Date");$(".dataTables_scrollHead .th2").text("Vehicle");$(".dataTables_scrollHead .th3").text("Duration");
   			// $(".dataTables_scrollHead .th4").text("Running Time");$(".dataTables_scrollHead .th5").text("Distance");
    		table.ajax.url('/Dailysummary/runningTimeSummaryAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		else if(reporttype==25){//Overspeed Summary report
   			$(".dataTables_scrollHead .th1").text("Id");$(".dataTables_scrollHead .th2").text("Vehicle");$(".dataTables_scrollHead .th3").text("Date & Time");$(".dataTables_scrollHead .th4").text("Speed");$(".dataTables_scrollHead .th5").text("Location");
    		table.ajax.url('/Alerts/overSpeedSummaryAjaxData?reporttype='+reporttype+'&assetname='+assetname+'&starttime='+starttime+'&endtime='+endtime+'&startdate='+startdate+'&enddate='+enddate).load();
   		}
   		
   		else{//clear table body content
   			$('#traveldetailstbl tbody').empty();
   		}
   		
	});
});

</script>
<?php $this->end(); ?>
