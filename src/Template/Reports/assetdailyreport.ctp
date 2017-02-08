

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Asset Daily Report
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
	<li><a href="#"></i>Reports</a></li>
   </ol>
</section>

<!-- Main content --> 
<section class="content">
	<?php 
	// $this->loadModel('Journeys');
        // $assetmonthlydata=$this->Journeys->getMonthlySummary(1,$this->request->query['assetname'])
	// echo assetmonthlydata[0]['maxspeed'];
	?>
    	 <div class="box box-primary">
     
      <div class="modal-body" style="padding-bottom:0">
	          
<div class="row">
	
	
	<div class="col-md-4">
			<div class="col-sm-12" id="gpname">
				<?php 
				echo $this->Form->input('groupname', [ 'options' => $groupsdatanames,'empty' =>true, 'class'=>'select2','label'=>['text'=>'Group Name','class'=>'mandatory']]);
				?>
			</div>		
	</div>
	
	
	<div class="col-md-4">
			<div class="col-sm-12" id="astname">
				<?php 
				// echo $this->Form->input('Asset Name', [ 'options' => $trackingobjects ,'class'=>'select2','label'=>['text'=>'Asset Name','class'=>'mandatory']])
				echo $this->Form->input('Asset Name', ['options' => "",'label'=>['text'=>'Asset Name']]);
				// echo $this->Form->select('rooms', [    'multiple' => true,      'default' => [1, 3]]);
				?>
			</div>		
	</div>
	
	<div class="col-md-4"><div class="col-sm-12">
		<div class="form-group">
			<label for="startdate">Date</label>
			<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<input type="text" name="startdate" empty="1" required="required" class="datemask form-control" id="startdate">
				<!-- <?php 
				echo $this->Form->input('startdate', [ 'type'=>'text','empty' => true,'class'=>'datemask','label'=>'Start Date','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
				?> -->
			</div></div>
		</div>
		
	</div>
	
	

	
</div>



            
<div class="modal-footer">
      	<input type="button" value="Generate Report" class="mptl-settings-save btn btn-success" id="generatereport"/>
      	
</div></div></div>


<div id="summarybox" class="box box-primary"> 
 	<div class="box-body">  
	   
	   <div class="col-md-3">
		<div class="col-sm-12" id="monthname">
				<div class="form-group">
                  	<!-- <label for="markasvoid" class="col-sm-3 control-label" style="padding-top:0" >Total Distance Travelled(KM)</label> -->
                  	<label>Total Distance Travelled(KM):</label>
				  	
				    
				    <label id="totdis">test</label>	

                   	
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
			</div>	
		
	</div>
	
	 <div class="col-md-3">
		<div class="col-sm-12" id="monthname">
				<div class="form-group">
                  	<!-- <label for="markasvoid" class="col-sm-3 control-label" style="padding-top:0" >Total Distance Travelled(KM)</label> -->
                  	<label>Max. Speed Reported(Km/hr):</label>
				  	
				    
				    <label id="maxsp">test</label>	

                   	
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
			</div>	
		
	</div>
	
	
	
	 <div class="col-md-3">
		<div class="col-sm-12" id="monthname">
				<div class="form-group">
                  	<!-- <label for="markasvoid" class="col-sm-3 control-label" style="padding-top:0" >Total Distance Travelled(KM)</label> -->
                  	<label>Total Number of Journeys:</label>
				  	
				    
				    <label id="nojrns">test</label>	

                   	
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
			</div>	
		
	</div>
	
	 <div class="col-md-3">
		<div class="col-sm-12" id="monthname">
				<div class="form-group">
                  	<!-- <label for="markasvoid" class="col-sm-3 control-label" style="padding-top:0" >Total Distance Travelled(KM)</label> -->
                  	<label>Total Runtime:</label>
				  	
				    
				    <label id="totrntime">test</label>	

                   	
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
			</div>	
		
	</div>
	          
          </div>
          </div>
 
      
 <div id="journeydetailstable" class="box box-primary">Journey Details
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
          
          
  <div id="alertdetailstable" class="box box-primary">Alert Details 
 	<div class="box-body">  
	           <table id="traveldetailstbl2" class="table table-hover  table-bordered ">
        <thead>
        
            <tr>
         		<th class="th6"></th>
           	    <th class="th7"></th>        
                <th class="th8"></th>
                <th class="th9"></th>
                <!-- <th class="th5"></th> --> 
              
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
   
   var table2= $('#traveldetailstbl2').DataTable({
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
	
	$("#summarybox").hide();
	$("#journeydetailstable").hide();
	$("#alertdetailstable").hide();
	
	$('#groupname').change(function(){ 
		$('#asset-name').empty();
	$.ajax({
         type : "POST",
                url  : '/Reports/check_ajax2?groupname='+document.getElementById("groupname").value,
                success : function(array1)
                	{
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
				
	
	$('#generatereport').click(function(){
		
		$("#summarybox").hide();
		$("#journeydetailstable").hide();
		$("#alertdetailstable").hide();
		// alert("startdate---"+ document.getElementById("startdate").value);
		// alert("asset-name----"+  document.getElementById("asset-name").value);
		// alert("groupname---"+  document.getElementById("groupname").value);
		
		
		if(document.getElementById("groupname").value != "" && document.getElementById("asset-name").value != "" && document.getElementById("startdate").value != "")
		{
			
			$("#journeydetailstable").show();
			$("#alertdetailstable").show();
		
			var assetnameelm = document.getElementById("asset-name");
			var assetname = assetnameelm.options[assetnameelm.selectedIndex].value;
			var date = document.getElementById('startdate').value;
		
			$.ajax({
			url: '/Reports/check_ajax4?assetname='+assetname+'&date='+date,
			success: function(result){
        		
        		var array = JSON.parse(result);
        		
        		for (var key in array) 
        			{
						if (array.hasOwnProperty(key)) 
							{
								$("#summarybox").show();
							    document.getElementById('totdis').innerHTML = array[key].distance;
							    document.getElementById('maxsp').innerHTML = array[key].maxspeed;
							    document.getElementById('nojrns').innerHTML = array[key].journeyscount;
							    document.getElementById('totrntime').innerHTML = array[key].duration;

							}
					}
    		},
    		error: function() {
          		alert('Error occurs!');
       		}
    	});
    	
		//get input value
		var groupnameelm = document.getElementById("groupname");
		var groupname = groupnameelm.options[groupnameelm.selectedIndex].value;
		
		
			table.ajax.url('/Journeys/assetDailyReportAjaxData?date='+date+'&assetname='+assetname).load();
    		
    		$(".dataTables_scrollHead .th1").text("Start Date");$(".dataTables_scrollHead .th2").text("End Date");$(".dataTables_scrollHead .th3").text("Max Speed");$(".dataTables_scrollHead .th4").text("Idle Time");$(".dataTables_scrollHead .th5").text("Distance");
    		
    		
    		$(".dataTables_scrollHead .th6").text("Date");$(".dataTables_scrollHead .th7").text("Alerty Category");$(".dataTables_scrollHead .th8").text("Location");$(".dataTables_scrollHead .th9").text("Speed");
    		table2.ajax.url('/Alerts/alertDetailsforAssetDailyAjaxData?assetname='+assetname+'&date='+date).load();
    	
		
		
		}
		else
		{
			// alert("Please select all")
			
		}
		
    	
    
    	
		
				
    	});
});

</script>
<?php $this->end(); ?>
