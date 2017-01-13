

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
      	<div class="form-horizontal">
          
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<!-- <label class="col-sm-3 control-label" for="name">Report</label> -->
			<div class="col-sm-9"><div class="input-group">
				<?php 
				echo $this->Form->input('reporttype', [ 'options' => $reporttypes,'class'=>'mptl-schitem1 select2','label'=>'Report']);
            
				?>
				<!-- <input type="text" name="name" maxlength="50" id="name" class="form-control"> -->
			</div></div>
		</div>
		
	</div>
	
	
	<div class="col-md-4">
		<div class="form-group">
			<!-- <label class="col-sm-3 control-label" for="name">Report</label> -->
			<div class="col-sm-9"><div class="input-group">
				<?php 
				echo $this->Form->input('Group Name', [ 'options' => $groupsdatanames,'class'=>'mptl-schitem1 select2','label'=>'Group Name']);
				?>
				<!-- <input type="text" name="name" maxlength="50" id="name" class="form-control"> -->
			</div></div><div class="col-sm-offset-3 col-sm-6" style="margin-top:4px"></div>
		</div>
		
	</div>
	
	
	<div class="col-md-4">
		<div class="form-group">
			<!-- <label class="col-sm-3 control-label" for="name">Report</label> -->
			<div class="col-sm-9"><div class="input-group">
				<?php 
				echo $this->Form->input('Asset Name', [ 'options' => $groupsdatanames,'class'=>'mptl-schitem1 select2','label'=>'Asset Name'])
				?>
				<!-- <input type="text" name="name" maxlength="50" id="name" class="form-control"> -->
			</div></div><div class="col-sm-offset-3 col-sm-6" style="margin-top:4px"></div>
		</div>
		
	</div>
	
	
	
</div>

<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<!-- <label class="col-sm-3 control-label" for="name">Report</label> -->
			<div class="col-sm-6"><div class="input-group">
				<?php 
				echo $this->Form->input('startdate', [ 'type'=>'text','empty' => true,'class'=>'datemask','label'=>'Start Date','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
				?>
				<!-- <input type="text" name="name" maxlength="50" id="name" class="form-control"> -->
			</div></div><div class="col-sm-offset-3 col-sm-6" style="margin-top:4px"></div>
		</div>
		
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<!-- <label class="col-sm-3 control-label" for="name">Report</label> -->
			<div class="col-sm-6"><div class="input-group">
				<?php 
				echo $this->Form->input('starttime', [ 'options' => $times,'class'=>'mptl-schitem2 select2','label'=>'Start Time']);
				?>
				<!-- <input type="text" name="name" maxlength="50" id="name" class="form-control"> -->
			</div></div><div class="col-sm-offset-3 col-sm-6" style="margin-top:4px"></div>
		</div>
		
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<!-- <label class="col-sm-3 control-label" for="name">Report</label> -->
			<div class="col-sm-6"><div class="input-group">
				<?php 
				echo $this->Form->input('enddate', [ 'type'=>'text','empty' => true,'class'=>'datemask','label'=>'End Date','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
				?>
				<!-- <input type="text" name="name" maxlength="50" id="name" class="form-control"> -->
			</div></div><div class="col-sm-offset-3 col-sm-6" style="margin-top:4px"></div>
		</div>
		
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<!-- <label class="col-sm-3 control-label" for="name">Report</label> -->
			<div class="col-sm-6"><div class="input-group">
				<?php 
				echo $this->Form->input('endtime', [ 'options' => $times,'class'=>'mptl-schitem1 select2','label'=>'End Time']);
				?>
				<!-- <input type="text" name="name" maxlength="50" id="name" class="form-control"> -->
			</div></div><div class="col-sm-offset-3 col-sm-6" style="margin-top:4px"></div>
		</div>
		
	</div>
	
	
	
</div>

</div>
              <!-- <?php
               				
             
              		echo "<td>".$this->Form->input('reporttype', [ 'options' => $reporttypes,'class'=>'mptl-schitem1 select2','label'=>'Report'])."</td>";
				 	echo "<td>".$this->Form->input('startdate', [ 'type'=>'text','empty' => true,'class'=>'datemask','label'=>'Start Date','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']])."</td>";
					echo "<td>".$this->Form->input('starttime', [ 'options' => $times,'class'=>'mptl-schitem2 select2','label'=>'Start Time'])."</td>";
			 		echo "<td>".$this->Form->input('enddate', [ 'type'=>'text','empty' => true,'class'=>'datemask','label'=>'End Date','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']])."</td>";
					echo "<td>".$this->Form->input('endtime', [ 'options' => $times,'class'=>'mptl-schitem1 select2','label'=>'End Time'])."</td>";
					echo "<td>".$this->Form->input('Group Name', [ 'options' => $groupsdatanames,'class'=>'mptl-schitem1 select2','label'=>'Group Name'])."</td>";
					echo "<td>".$this->Form->input('Asset Name', [ 'options' => $groupsdatanames,'class'=>'mptl-schitem1 select2','label'=>'Asset Name'])."</td>";
							
              ?> -->
<div class="modal-footer">
      	<input type="submit" value="Generate Report" class="scheduleCheck mptl-settings-save btn btn-success"/>
      	
</div></div></div>
      
      
 <div class="box box-primary">   
 	<div class="box-body">  
	           <table id="mptlindextbl" class="table table-hover  table-bordered ">
        <thead>
            <tr>
            	<th data-orderable="false"><input type="checkbox" name="select_all" value="1" id="select-all" ></th>
           	
               <?php
               if(isset($colheads))
			   {
			   
	               	 for($i=1;$i<count($colheads);$i++)
	               	 {
	                 echo "<th>". $colheads[$i]["title"] ."</th>";
	                 }
				
			   }
			   else
			   {
                    // for($i=1;$i<count($configs);$i++)
                    // {
                    // echo "<th>". $configs[$i]['title'] ."</th>";
                    // }
				  
			   }
			   ?>  
                
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
$('#timetable a.move').click(function() {
    var row = $(this).closest('tr');
    if ($(this).hasClass('up'))
        row.prev().before(row);
    else
        row.next().after(row);
});

jQuery("#scheduleCheck").submit(function(){
			if (validateschedule()) {
				return true;
			}else{
				return false;
			}
		
});
	function validateschedule() {
		var errCount=0;
    	$("#timetable tr").each(function() {
    		if($(this).attr('id')!="trheader"){
  				$this = $(this);
  				  				
  				var csdt=$this.find('.mptl-schitem4 option:selected').val();
  				var csdd=$this.find('.mptl-schitem3 option:selected').val();
  				
  				var nsad=$this.next().find('.mptl-schitem1 option:selected').val();
  				var nsat=$this.next().find('.mptl-schitem2 option:selected').val();
  				//alert(nsad+"----"+nsat);
  				
  				if(nsat){
					if (checkSheduleDate(nsat, csdt, nsad, csdd)) {
						// $this.css('background-color', 'red');
						errCount++;
						$this.find('td.err').html('<span class="text-red">*</span>');
						$this.next().find('td.err').html('<span class="text-red">*</span>');
					}else{
						// $this.css('background-color', '');
						$this.find('td.err').html('');
						$this.next().find('td.err').html('');
					}
				}
  			}
		});
		
	
	$('.mptl-schitem2').each(function() {
		
		var lineErr2=0;
		var p=jQuery(this).attr("id");//alert(p);
		var id=p.substring(3);
		var sat= jQuery(this).val();
		var sdt=  jQuery("#sdt"+id).val();
		var dys= jQuery("#dys"+id).val();
		var dye= jQuery("#dye"+id).val();
		var strTime= jQuery("#start_time").val();
		//alert(strTime);
		var endTime= jQuery("#end_time").val();
		var nodays=jQuery("#nodays").val();
		if(!nodays)nodays=1;
		 if(!compareTime(sat+":00",strTime,dys,1)){errCount++;	lineErr2++;  }
		 if(!compareTime(endTime,sat+":00",nodays,dys)){errCount++;	lineErr2++; }
		 if(!compareTime(sdt+":00",strTime,dye,1)){errCount++;	lineErr2++; }
		 if(!compareTime(endTime,sdt+":00",nodays,dye)){errCount++;	lineErr2++;}
		if(!checkSheduleDate(sat,sdt,dys,dye)){	errCount++;	lineErr2++;}
		
		if(lineErr2>0){
			$this.find('td.err').html('<span class="text-red">*</span>');
		}else{
			$this.find('td.err').html('');
		}
    	
	});

	return errCount >0 ? false :true;
}
function compareTime(strTime,endTime,dys,dye)
{
	
     var sTime=strTime.split(":");
	 var s3=((dys*1440)+(sTime[0]*60)+(sTime[1]*1))*1;
	 var eTime=endTime.split(":");
	 var s4=((dye*1440)+(eTime[0]*60)+(eTime[1]*1))*1;
	 return s3>s4 ?true:false
}
function checkSheduleDate(sat,sdt,dys,dye)
{
	var asat=sat.split(":");
	var asdt=sdt.split(":");
	var day1=(1440*dys)+(asat[0]*60)+(asat[1]*1);
	var day2=(1440*dye)+(asdt[0]*60)+(asdt[1]*1);//alert(day1+"---"+day2);
	return day2>day1 ? true: false;
	
}
</script>
<?php $this->end(); ?>
