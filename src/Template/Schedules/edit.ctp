
<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   Edit Schedule  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Schedules"> Schedules</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($schedule) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
         <?php
        echo $this->Form->input('validfrom', ['type'=>'text','empty' => true,'label'=>'Valid From','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
          echo $this->Form->input('validtill', ['type'=>'text','empty' => true,'label'=>'Valid Till','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
         
                   //	echo $this->Form->input('validfrom', ['empty' => true,'type'=>'text', 'class'=>'datemask','required'=>'required']);
                   	//echo $this->Form->input('validtill', ['empty' => true,'type'=>'text', 'class'=>'datemask','required'=>'required']);
                  	echo $this->Form->input('startloc_id',['class'=>'select2']);
					echo $this->Form->input('endloc_id',['class'=>'select2']);
					echo $this->Form->input('route_id', ['options' => $routes, 'empty' => true,'class'=>'select2']);
					echo $this->Form->input('start_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            		echo $this->Form->input('end_time',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
           
					//echo $this->Form->input('start_time',['empty' => true,'type'=>'text', 'class'=>'timepicker']);
					//echo $this->Form->input('end_time',['empty' => true,'type'=>'text', 'class'=>'timepicker']);
					echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true,'class'=>'select2']);
					echo $this->Form->input('default_driver_id', ['options' => $drivers,'class'=>'select2']);
					echo $this->Form->input('default_veh_id', ['label'=>'Default Vehicle','options' => $defaultVehs,'class'=>'select2']);
					echo $this->Form->input('name');
					echo $this->Form->input('nodays',['label'=>'No of Days']);
					echo $this->Form->input('brktime_bfr_nxt_trip',['label'=>'Break time before next trip']);
					echo $this->Form->input('default_paxgrpid', ['label'=>'Passenger Group','options' => $passengergroups,'class'=>'select2']);
					echo $this->Form->input('locations._ids', ['options' => $locations,'class'=>'select2']);
					echo $this->Form->input('drivers._ids', ['options' => $drivers,'class'=>'select2']);
		?>
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
<!-- /.content -->
