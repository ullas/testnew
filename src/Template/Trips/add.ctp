<?php echo $this->element('templateelement'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Trip <small>Please fill the details to create a new Trip</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/trips/"> Trips</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($trip) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
           <?php
            echo $this->Form->input('name',['required' => 'required']);
            echo $this->Form->input('start_date', ['type'=>'text','empty' => true,'class'=>'datemask','required' => 'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date', ['type'=>'text','empty' => true,'class'=>'datemask','required' => 'required','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
            echo $this->Form->input('start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('route_id', ['options' => $routes, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('startpoint_id', ['label'=>'Start Point','type'=>'text','options' => $startpoints, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('endpoint_id', ['label'=>'End Point','type'=>'text','options' => $endpoints, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('schedule_id', ['options' => $schedules,'empty' => true, 'class'=>'select2']);
            ?>
              <div class="form-group">
                  	 
                   	  <label for="autogen" class="col-sm-3 control-label" style="padding-top:0" >Auto Gen</label>
				  <div class="col-sm-1">
				    <?php echo $this->Form->checkbox('autogen', array('label' => false));?>
                   	
				  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
				</div>
            <?php
            //echo $this->Form->input('autogen');
            echo $this->Form->input('tripstatus_id', ['label'=>'Trip Status','options' => $tripstatuses, 'empty' => true, 'class'=>'select2']);
            echo $this->Form->input('last_location',['label'=>'Last Location']);
			?>
			<div class="form-group">
                  	 
                   	  <label for="canceled" class="col-sm-3 control-label" style="padding-top:0" >Cancelled</label>
				  <div class="col-sm-1">
				    <?php echo $this->Form->checkbox('canceled', array('label' => false));?>
                   	
				  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
				</div>
				<div class="form-group">
                  	 
                   	  <label for="active" class="col-sm-3 control-label" style="padding-top:0" >Active</label>
				  <div class="col-sm-1">
				    <?php echo $this->Form->checkbox('active', array('label' => false));?>
                   	
				  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
				</div>
				<div class="form-group">
                  	 
                   	  <label for="fromschedule" class="col-sm-3 control-label" style="padding-top:0" >From Schedule</label>
				  <div class="col-sm-1">
				    <?php echo $this->Form->checkbox('fromschedule', array('label' => false));?>
                   	
				  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
				</div>
			<?php
            //echo $this->Form->input('canceled',['label'=>'Cancelled']);
            //echo $this->Form->input('active');
            //echo $this->Form->input('fromschedule',['label'=>'From Schedule']);
            echo $this->Form->input('trackingcode',['label'=>'Tracking Code']);
            
			echo $this->Form->input('adt', ['label'=>'ADT','class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
			
            // echo $this->Form->input('adt', array( 'type' => 'time' ));
           // echo $this->Form->input('aat',['label'=>'AAT','empty' => true]);
           // echo $this->Form->input('edt',['label'=>'EDT','empty' => true]);
           //  echo $this->Form->input('eat',['label'=>'EAT','empty' => true]);
			?>

			 <!-- <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Time picker:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                </div>
              </div> -->
			
		
		   <?php	
            echo $this->Form->input('vehiclecategory_id', ['label'=>'Vehicle Category','options' => $vehiclecategories, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('platform');
			echo $this->Form->input('triptype_id', ['label'=>'Trip Type','options' => $triptypes, 'empty' => true,'class'=>'select2']);
        	//echo $this->Form->input('softwaretriggered',['label'=>'Software Triggered']);
			//echo $this->Form->input('hwtriggered',['label'=>'Hardware Triggered']);
            ?>
        	<div class="form-group">
                  	 
                   	  <label for="softwaretriggered" class="col-sm-3 control-label" style="padding-top:0" >SoftwareTriggered</label>
				  <div class="col-sm-1">
				    <?php echo $this->Form->checkbox('softwaretriggered', array('label' => false));?>
                   	
				  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
			</div>
			<div class="form-group">
                  	 
                   	  <label for="hwtriggered" class="col-sm-3 control-label" style="padding-top:0" >Hardware Triggered</label>
				  <div class="col-sm-1">
				    <?php echo $this->Form->checkbox('hwtriggered', array('label' => false));?>
                   	
				  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
				</div>
  </div>
  
          </div>
          <!-- /.tab-pane -->
         
          
        </div>
         
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>

<?php $this->start('scriptBotton'); ?>
<script>
$(document).ready(function(){

	//Timepicker
    $(".timepicker").timepicker({
      showInputs: false,autoclose: true,
    });
    //Timepicker
				  	
});
</script>
<?php $this->end(); ?>

