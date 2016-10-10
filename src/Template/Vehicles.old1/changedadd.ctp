<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}</div>',
     'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-10"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
     'select' => '<div class="col-sm-10"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-10"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];
$this->Form->templates($myTemplates);

?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Vehicle
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tracking Items</a></li>
    <li> <a href="/vehicles/">Vehicles</a></li>
    <li class="active">Add </li>
  </ol>
</section>

<!-- Main content -->

<section class="content" >
    <?= $this->Form->create($vehicle) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#details" data-toggle="tab">Details</a></li>	
          <li ><a href="#specs" data-toggle="tab">Specifications</a></li>
          <li><a href="#engine" data-toggle="tab">Engine Details</a></li>
          <li><a href="#wheel" data-toggle="tab">Wheel&Tyre</a></li>
          <li><a href="#fuel" data-toggle="tab">Fluids</a></li>
          <li><a href="#purchase" data-toggle="tab">Purchase</a></li>
          <li><a href="#photo" data-toggle="tab">Photos</a></li>
          <li><a href="#docs" data-toggle="tab">Documents</a></li>
           
           <li><a href="#limits" data-toggle="tab">Settings</a></li>
           
        </ul>
         <!------------------------ Tab 1 starts here ------------------------------->
         <div class="tab-content">
          <div class="tab-pane active" id="details">
             <div class="form-horizontal">
             	<!------------------------ Tab content starts here ------------------------------->
             	   
             	   
             	   <?php 
             	     echo $this->Form->input('Trackingobject.name');
             	    echo $this->Form->input('code');
             	    echo $this->Form->input('plateno');
		           
		            echo $this->Form->input('vehicletype_id', ['options' => $vehicletypes, 'empty' => true]);
		            echo $this->Form->input('year');
		            echo $this->Form->input('make');
		            echo $this->Form->input('model');
		            echo $this->Form->input('trim');
		            echo $this->Form->input('registationloc');
		            echo $this->Form->input('status');
		            echo $this->Form->input('driver_id', ['options' => $drivers, 'empty' => true]);
		            echo $this->Form->input('ownership_id', ['options' => $ownerships, 'empty' => true]);
		            echo $this->Form->input('symbol_id', ['options' => $symbols, 'empty' => true]);
		            echo $this->Form->input('driverdetectionmode');
		            echo $this->Form->input('activedriver');
		            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true]);
		            echo $this->Form->input('department_id', ['options' => $departments, 'empty' => true]);
		            echo $this->Form->input('odometer');
		            echo $this->Form->input('description');
		            echo $this->Form->input('regstate');
		            echo $this->Form->input('color');
		            echo $this->Form->input('bodytype');
		            echo $this->Form->input('bodysubtype');
		            echo $this->Form->input('msrp');
		            echo $this->Form->input('purpose_id', ['options' => $purposes, 'empty' => true]);
             	   ?>
             	
             	
             	<!------------------------ Tab content ends here ------------------------------->
             </div>
           </div>
         </div>
        <!------------------------ Tab 1 ends here ------------------------------->
        
         <!------------------------ Tab 2 starts here ------------------------------->
         <div class="tab-content">
          <div class="tab-pane" id="specs">
             <div class="form-horizontal">
             	<!------------------------ Tab content starts here ------------------------------->
             	
             	<!------------------------ Tab content ends here ------------------------------->
             </div>
           </div>
         </div>
        <!------------------------ Tab 2 ends here ------------------------------->
         <!------------------------ Tab 3 starts here ------------------------------->
         <div class="tab-content">
          <div class="tab-pane" id="engine">
             <div class="form-horizontal">
             	<!------------------------ Tab content starts here ------------------------------->
             	 <?php  echo $this->Form->input('vehicleengine.enginesummary'); ?>
             	<!------------------------ Tab content ends here ------------------------------->
             </div>
           </div>
         </div>
        <!------------------------ Tab 3 ends here ------------------------------->
         <!------------------------ Tab 4 starts here ------------------------------->
         <div class="tab-content">
          <div class="tab-pane" id="wheel">
             <div class="form-horizontal">
             	<!------------------------ Tab content starts here ------------------------------->
             	
             	<!------------------------ Tab content ends here ------------------------------->
             </div>
           </div>
         </div>
        <!------------------------ Tab 4 ends here ------------------------------->
         <!------------------------ Tab 5 starts here ------------------------------->
         <div class="tab-content">
          <div class="tab-pane" id="fuel">
             <div class="form-horizontal">
             	<!------------------------ Tab content starts here ------------------------------->
             	
             	<!------------------------ Tab content ends here ------------------------------->
             </div>
           </div>
         </div>
        <!------------------------ Tab 5 ends here ------------------------------->
         <!------------------------ Tab 6 starts here ------------------------------->
         <div class="tab-content">
          <div class="tab-pane" id="purchase">
             <div class="form-horizontal">
             	<!------------------------ Tab content starts here ------------------------------->
             	
             	<!------------------------ Tab content ends here ------------------------------->
             </div>
           </div>
         </div>
        <!------------------------ Tab 6 ends here ------------------------------->
        
         <!------------------------ Tab 7 starts here ------------------------------->
         <div class="tab-content">
          <div class="tab-pane" id="photo">
             <div class="form-horizontal">
             	<!------------------------ Tab content starts here ------------------------------->
             	
             	<!------------------------ Tab content ends here ------------------------------->
             </div>
           </div>
         </div>
        <!------------------------ Tab 7 ends here ------------------------------->
        
         <!------------------------ Tab 8 starts here ------------------------------->
         <div class="tab-content">
          <div class="tab-pane" id="docs">
             <div class="form-horizontal">
             	<!------------------------ Tab content starts here ------------------------------->
             	
             	<!------------------------ Tab content ends here ------------------------------->
             </div>
           </div>
         </div>
        <!------------------------ Tab 8 ends here ------------------------------->
        
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-danger">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
    <?= $this->Form->end() ?>
</section>
<!-- /.content -->
