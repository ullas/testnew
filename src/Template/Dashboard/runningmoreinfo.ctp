<?php echo $this->element('templateelement'); ?>
  <div >
    <div class="content">
    	<!--<?= $this->Form->create($alert) ?>-->
      <div class="modal-header" style="padding-bottom:0">
        <h3 class="modal-title" id="modalSettings">Running Vehicles</h3>
      </div>
      <div class="modal-body" style="padding-bottom:0">
      	<div class="box box-primary">
          <!-- <ul class="todo-list" style="margin-bottom:2px">
              <li>
                
               
                <small class="label label-success"><i class="fa fa-check-square"></i>
                  Drag <i class="fa fa-ellipsis-v"></i>&nbsp;<i class="fa fa-ellipsis-v"></i> to re-order the columns.
                </small>
              </li>
            </ul> -->
            <ul class="todo-list column-list">
              
	            
	            <table id="timetable" class="table table-hover  table-bordered ">
	            	<thead>
	            		<tr id="trheader">
	            			
	            			<th> IMEI </th>
	            			<th> Message Time</th>
	            			<th> Status</th>
	            			<th> Odometer</th>
	            			<!-- <th> Day</th>
	            			<th> SAT</th>
	            			<th> Day</th>
	            			<th> ADT</th> -->
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php
                			// echo json_encode($locations);
							
	            			for ($i = 0; $i < count($vehiclescontent); $i++) {
	            				echo "<tr id=".$vehiclescontent[$i]['id'].">";
								echo "<td>".$vehiclescontent[$i]['imei']."</td>";
								echo "<td>".$vehiclescontent[$i]['msgdtime']."</td>";
								echo "<td>".$vehiclescontent[$i]['status']."</td>";
								echo "<td>".$vehiclescontent[$i]['odometer']."</td>";
							//	echo "<td>".$runningvehiclescount[$i]['velocity']."</td>";
								// echo "<td>".$alertscontent[$i]['Trackingobjects']['name']."</td>";
							//	echo "<td>".$alertscontent[$i]['Locations']['name']."</td>";
							//	echo "<td>".$this->Form->input('day_start', ['options' => $days,'class'=>'select2','label'=>false])."</td>";
							//	echo "<td>".$this->Form->input('sat', ['options' => $times,'class'=>'select2','label'=>false])."</td>";
							//	echo "<td>".$this->Form->input('day_end', ['options' => $days,'class'=>'select2','label'=>false])."</td>";
							//	echo "<td>".$this->Form->input('sdt', ['options' => $times,'class'=>'select2','label'=>false])."</td>";
								

								echo "</tr>";
	            			}
	            	            
	          			?>
	            	</tbody>
	            </table>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
      	<!-- <input type="submit" class="scheduleCheck" value="Save" class="mptl-settings-save btn btn-success"/>-->
      	<!-- <button class="mptl-settings-save btn btn-success" onclick="validate()">Save Changes</button> -->
        <!-- <button type="button" class="mptl-settings-save btn btn-success">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
    <?= $this->Form->end() ?>
  </div>
<!-- /.content -->
<?php $this->start('scriptBotton'); ?>
<script>
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
  				  				
  				var csdt=$this.find('#sdt option:selected').val();
  				var csdd=$this.find('#day-end option:selected').val();
  				
  				var nsad=$this.find('#day-start option:selected').val();
  				var nsat=$this.find('#sat option:selected').val();
  				
  				if(nsat){
					if (checkSheduleDate(nsat, csdt, nsad, csdd)) {
						$this.css('background-color', 'red');
						errCount++;
						// jQuery('div[@id^=err]:first', jQuery(this).next()).html("*");
					}else{
						$this.css('background-color', '');
					}
				}
  			}
		});
		
		jQuery("#sat").each(
	  function(){
	  	alert($(this).attr("id"));
		var lineErr2=0;
		var p=jQuery(this).attr("id");
		var id=p.substring(3);
		var sat= jQuery(this).val();
		var sdt= jQuery("#sdt"+id).val();
		var dys= jQuery("#dys"+id).val();
		var dye= jQuery("#dye"+id).val();
		var strTime= jQuery("#start_time").val();
		var endTime= jQuery("#end_time").val();
		var nodays=jQuery("#nodays").val();
		if(!nodays)nodays=1;
		if(!compareTime(sat+":00",strTime,dys,1)){errCount++;	lineErr2++;  }
		if(!compareTime(endTime,sat+":00",nodays,dys)){errCount++;	lineErr2++; }
		if(!compareTime(sdt+":00",strTime,dye,1)){errCount++;	lineErr2++; }
		if(!compareTime(endTime,sdt+":00",nodays,dye)){errCount++;	lineErr2++;}
		if(!checkSheduleDate(sat,sdt,dys,dye)){	errCount++;	lineErr2++;}
		
		    if(lineErr2>0){
				jQuery("#err"+id).html("*");
			}
				
	  }
	);
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
