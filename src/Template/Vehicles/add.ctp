<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}<div class="col-sm-offset-3 col-sm-6 style="margin-top:18px">{{help}}</div></div>',
     'label' => '<label class="col-sm-3 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
     'select' => '<div class="col-sm-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
     'selectMultiple' => '<div class="col-sm-6"><select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
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
    <li><a href="#">Administration</a></li>
    <li><a href="#">Tracking Items</a></li>
    <li> <a href="/vehicles/">Vehicles</a></li>
    <li class="active">Add </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($vehicle) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li  class="active"><a href="#details" data-toggle="tab">Details</a></li>	
            <li><a href="#specs" data-toggle="tab">Specifications</a></li>
           <li><a href="#engine" data-toggle="tab">Engine Details</a></li>
        
         
          <li><a href="#wheel" data-toggle="tab">Wheel&Tyre</a></li>
          <li><a href="#fluids" data-toggle="tab">Fluids</a></li>
          <li ><a href="#purchase" data-toggle="tab">Purchase</a></li> 
          <li ><a href="#lease" data-toggle="tab">Lease</a></li>        
          <li><a href="#docs" data-toggle="tab">Attachments</a></li>
          
          
           
        </ul>
        <div class=" tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
             	
                <?php 
                 
             	    echo $this->Form->input('name',['label'=>'Name*','templateVars' => ['help' => 'A nickname to distinguish this vehicle']]);
             	    echo $this->Form->input('code',['templateVars' => ['help' => 'Vehicle Identification Number or Serial Number']]);
             	    echo $this->Form->input('plateno',['label'=>'License Plate']);
		           
		            echo $this->Form->input('vehicletype_id', ['options' => $vehicletypes, 
		                             'templateVars' => ['help' => 'Select your vehicle category'],
		                             'empty' => true,'class'=>'select2','label'=>'Type*']);
		            echo $this->Form->input('year',['templateVars' => ['help' => 'e.g 2008,1973']]);
		            echo $this->Form->input('make',['templateVars' => ['help' => 'e.g Maruthi,Ford etc.']]);
		            echo $this->Form->input('model',['templateVars' => ['help' => 'Cressida,Sunny,i10 etc.']]);
		            echo $this->Form->input('trim',['templateVars' => ['help' => 'C class,XE,Sports etc.']]);
		            echo $this->Form->input('registationloc',['label'=>'Registration Location']);
		            echo $this->Form->input('vehiclestatus_id',['label'=>'Status*','options'=>$vehiclestatuses, 'class' =>'select2', 'empty' => false,'templateVars' => ['help' => 'Current status of this vehicle']]);
		            //echo $this->Form->input('vehiclestatus_id', ['options' => $vehiclestatuses, 'empty' => true]);
          
		            
		            echo $this->Form->input('ownership_id', ['label'=>'Ownership*','options' => $ownerships, 'empty' => false,'class'=>'select2']);
		            echo $this->Form->input('symbol_id', ['options' => $symbols, 'empty' => true,'class'=>'select2']);
		            
		            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true,'class'=>'select2']);
		            echo $this->Form->input('department_id', ['options' => $departments, 'empty' => true,'class'=>'select2']);
		            echo $this->Form->input('odometer');
		            echo $this->Form->input('description');
		            echo $this->Form->input('regstate',['label'=>'Registration State']);
		            echo $this->Form->input('color');
		            echo $this->Form->input('bodytype',['label'=>'Body Type','templateVars' => ['help' => 'Body type (XUV, Sedan, etc...)']]);
		            echo $this->Form->input('bodysubtype',['label'=>'Body Subtype','templateVars' => ['help' => 'Extended Cab, Crew Cab, etc...']]);
		             echo $this->Form->input('driverdetectionmode',['class'=>'select2']);
                    echo $this->Form->input('activedriver',['class'=>'select2']);
           
                    echo $this->Form->input('purpose_id', ['options' => $purposes, 'empty' => true,'class'=>'select2']);
           
                    echo $this->Form->input('transporter_id',['class'=>'select2']);
                    echo $this->Form->input('drivers._ids', ['options' => $drivers,'class'=>'select2']);
					?>
					<div class="form-group">
		                <label class="col-sm-3 control-label">MSRP</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="<?=$mptlusercurrencyfaclass ?>"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="msrp" name="msrp">
		                  
		                </div>
		                <div class="col-sm-12" style="padding-left:0px">Manufacturer suggested retail price</div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>
		            <?php
		            
		            echo $this->Form->input('purpose_id', ['options' => $purposes, 'empty' => true,'class'=>'select2']);
             	   ?>
             	 
            </div>
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="specs">
             <div class="form-horizontal">
             	
             		<div class="form-group">
		                <label class="col-sm-3 control-label">Width</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-width" name="vehiclespecification[width]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmini?>
		                  </div>
		                  
		                </div>Measurement of the widest part of the vehicle
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>
		            
		    
             		<div class="form-group">
		                <label class="col-sm-3 control-label">Height</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-height" name="vehiclespecification[height]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmini?>
		                  </div>
		                  
		                </div>Measurement from the ground to the highest part of the vehicle
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>   
		            
		      
            	
             		<div class="form-group">
		                <label class="col-sm-3 control-label">Length</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-length" name="vehiclespecification[length]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmini?>
		                  </div>
		                  
		                </div>The total length of the vehicle including bumpers
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div> 
		            
		  
             	
             		<div class="form-group">
		                <label class="col-sm-3 control-label">Interior Volume</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-interiorvolume" name="vehiclespecification[interiorvolume]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmajor?>
		                    <sup>3</sup>
		                  </div>
		                  
		                </div>The volume within the vehicle's main chamber
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>    
		            
		  		   
           	
             		<div class="form-group">
		                <label class="col-sm-3 control-label">Passenger Volume</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-passengervolume" name="vehiclespecification[passengervolume]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmajor?>
		                    <sup>3</sup>
		                  </div>
		                  
		                </div>
		                The volume for the area solely designated for passengers 
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div> 
		            
		      
             	
             		<div class="form-group">
		                <label class="col-sm-3 control-label">Cargo Volume</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-cargovolume" name="vehiclespecification[cargovolume]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmajor?>
		                    <sup>3</sup>
		                  </div>
		                  
		                </div>
		                The volume of the area designated as cargo space
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>                           
             	   
           		       
             	
             		<div class="form-group">
		                <label class="col-sm-3 control-label">Ground Clearance</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-groudclearance" name="vehiclespecification[groudclearance]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmini?>
		                  </div>
		                  
		                </div>
		                Measurement of the distance between the ground and the lowest
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>   
		            
		          
		            <div class="form-group">
		                <label class="col-sm-3 control-label">Bed Length</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-bedlength" name="vehiclespecification[bedlength]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmini?>
		                  </div>
		                  
		                </div>
		                The length of the bed, from front to back, of a pickup truck 
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>     
		            
		         
		                <div class="form-group">
		                <label class="col-sm-3 control-label">Curb Weight</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-curbweight" name="vehiclespecification[curbweight]">
		                  <div class="input-group-addon">
		                     <?=$mptluservolumeunit?>
		                  </div>
		                  
		                </div>
		                The weight of a vehicle with driver and fuel
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>  
		            
		            	
		            	
		            	
		            	<div class="form-group">
		                <label class="col-sm-3 control-label">GVWR</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-grossweight" name="vehiclespecification[grossweight]">
		                  <div class="input-group-addon">
		                    <?=$mptluservolumeunit?>
		                  </div>
		                  
		                </div>
		                Gross Vehicle Weight Rating
		                <!-- The combination of the GVWR of a vehicle and the towing capacity -->
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>    
		            
		      
		                 <div class="form-group">
		                <label class="col-sm-3 control-label">Towing Capacity</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-towingcapacity" name="vehiclespecification[towingcapacity]">
		                  <div class="input-group-addon">
		                   <?=$mptluservolumeunit?>
		                  </div>
		                  
		                </div>
		                The towing ability of the vehicle as it comes standard
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>                         
             	
             	       
             	      
             	        <div class="form-group">
		                <label class="col-sm-3 control-label">Max Payload</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclespecification-maxpayload" name="vehiclespecification[maxpayload]">
		                  <div class="input-group-addon">
		                    <?=$mptluservolumeunit?>
		                  </div>
		                  
		                </div>
		                The maximum allowable weight that the vehicle can hold
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>  
		            
		 <?php
          
             echo $this->Form->input('vehiclespecification.epacity',['label'=>'EPA City']);
             echo $this->Form->input('vehiclespecification.epahighway',['label'=>'EPA Highway']);
             echo $this->Form->input('vehiclespecification.epacombined',['label'=>'EPA Combined']);          
           
        ?>
            </div>
     
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="engine">
             <div class="form-horizontal">
              <?php
            echo $this->Form->input('vehicleengine.enginesummary',['label'=>'Engine Summary',  'templateVars' => ['help' => 'Basic Engine Summary']]);
            echo $this->Form->input('vehicleengine.brand',['label'=>'Brand',   'templateVars' => ['help' => 'Brand specific Engine name']]);
            echo $this->Form->input('vehicleengine.aspiration',['label'=>'Aspiration','class'=>'select2',   'templateVars' => ['help' => 'Method for drawing air into the engine']]);
            echo $this->Form->input('vehicleengine.blocktype',['label'=>'Block Type','class'=>'select2',   'templateVars' => ['help' => 'Engine Block Type (F,H,R,I,W)']]);
             ?>
              <div class="form-group">
		                <label class="col-sm-3 control-label">Bore</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehicleengine-bore" name="vehicleengine[bore]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmini?>
		                  </div>
		                  
		                </div> Diameter of holes in the engine block used for cylinders
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>  
             
             <?php
            
            echo $this->Form->input('vehicleengine.camtype',['label'=>'Cam Type','class'=>'select2',   'templateVars' => ['help' => 'Type of Cam Examples include DOHC, SOHC etc..']]);
            echo $this->Form->input('vehicleengine.compression',['label'=>'Compression',   'templateVars' => ['help' => 'Compression ratio']]);
            echo $this->Form->input('vehicleengine.cylinders',['label'=>'Cylinders',  'templateVars' => ['help' => 'Number of cylinders present in the engine']]);
            echo $this->Form->input('vehicleengine.displacement',['label'=>'Dispalcement',  'templateVars' => ['help' => 'Total Volume dispalced during one firing cycle of the engine']]);
			echo $this->Form->input('vehicleengine.fuel_induction',['label'=>'Fuel Induction','class'=>'select2',   'templateVars' => ['help' => 'Method of drawing fuel into the engine']]);
            echo $this->Form->input('vehicleengine.fuel_quality',['label'=>'Fuel Quality',   'templateVars' => ['help' => 'Recommended Octane Rating']]);
            echo $this->Form->input('vehicleengine.max_hp',['label'=>'Max HP',   'templateVars' => ['help' => 'Maximum power achieved by engine. Expressed in units of Horse Power']]);
            echo $this->Form->input('vehicleengine.max_torque',['label'=>'Max Torque',   'templateVars' => ['help' => 'Maximum torque delivered by engine']]);
            echo $this->Form->input('vehicleengine.redline_rpm',['label'=>'Redline RPM',   'templateVars' => ['help' => 'Maximum speed at which engine can operate without risking damage']]);
            echo $this->Form->input('vehicleengine.stroke',['label'=>'Stroke',   'templateVars' => ['help' => 'Distance travelled by the piston during a combustion cycle']]);
            echo $this->Form->input('vehicleengine.valves',['label'=>'Valves',   'templateVars' => ['help' => 'Total number of valves in the engine']]);
            echo $this->Form->input('vehicleengine.transmission_summary',['label'=>'Transmission Summary',   'templateVars' => ['help' => 'Basic Transmission Summary']]);
            echo $this->Form->input('vehicleengine.trasmission_brand',['label'=>'Transmission Brand',  'templateVars' => ['help' => 'Brand specific engine name. For example: Allison']]);
            echo $this->Form->input('vehicleengine.transmission_type',['label'=>'Transmission Type','class'=>'select2' , 'templateVars' => ['help' => 'A nickname to distinguish this vehicle']]);
            echo $this->Form->input('vehicleengine.traasmission_gears',['label'=>'Transmission Gears' , 'templateVars' => ['help' => 'Number of gears or speeds available']]);
        ?>
            </div>
           </div>
          <!-- Tab Pane-->
          
          
          
           <div class="tab-pane" id="wheel">
             <div class="form-horizontal">
               <?php
            
            echo $this->Form->input('vehiclewheelstyre.drivetype',['label'=>'Drive Type','class'=>'select2', 'templateVars' => ['help' => 'Refers to how many or which wheels are powered by the engine.']]);
            echo $this->Form->input('vehiclewheelstyre.breaksystem',['label'=>'Brake System','class'=>'select2',  'templateVars' => ['help' => 'Description of brake type']]);
            echo $this->Form->input('vehiclewheelstyre.fronttrackwidth',['label'=>'Front Track Width', 'templateVars' => ['help' => 'The distance between the front tires']]);
            echo $this->Form->input('vehiclewheelstyre.reartrackwidth',['label'=>'Rear Track Width', 'templateVars' => ['help' => 'The distance between the rear tires']]);
			?>
			
			<div class="form-group">
		                <label class="col-sm-3 control-label">Wheel Base</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclewheelstyre-wheelbase" name="vehiclewheelstyre[wheelbase]">
		                  <div class="input-group-addon">
		                    <?=$mptluserlengthunitmini?>
		                  </div>
		                  
		                </div>
		                The length from the center of the front wheel to the center of the rear wheel
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>  
            
			<?php
            echo $this->Form->input('vehiclewheelstyre.frontwheeldia',['label'=>'Front Wheel Diameter', 'templateVars' => ['help' => 'The front wheel diameter(Displayed as  "length x width").']]);
            echo $this->Form->input('vehiclewheelstyre.rearwheeldia',['label'=>'Rear Wheel Diameter', 'templateVars' => ['help' => 'The distance between the rear tires']]);
            echo $this->Form->input('vehiclewheelstyre.rearaxil',['label'=>'Rear Axle']);
            echo $this->Form->input('vehiclewheelstyre.fronttyretype',['label'=>'Front Tyre Type', 'templateVars' => ['help' => 'The front tire information']]);
            echo $this->Form->input('vehiclewheelstyre.fronttyrepsi',['label'=>'Front Tyre PSI']);
            echo $this->Form->input('vehiclewheelstyre.reartyretype',['label'=>'Rear Tyre Type', 'templateVars' => ['help' => 'The rear tire information if it is different than the front']]);
            echo $this->Form->input('vehiclewheelstyre.reartyrepsi',['label'=>'Rear Tyre PSI']);
        ?>
            </div>
           </div>
          <!-- Tab Pane-->
          
          
          

          <div class="tab-pane" id="fluids">
            <div class="form-horizontal">
               <?php
           
            echo $this->Form->input('vehiclefluid.fueltype',['label'=>'Fuel Type','class'=>'select2']);
            echo $this->Form->input('vehiclefluid.fuelquality',['label'=>'Fuel Quality', 'templateVars' => ['help' => 'Recommended Octane rating']]);
			?>
			
			<div class="form-group">
		                <label class="col-sm-3 control-label">Fuel Tank 1 Capacity</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclefluid-fueltank1-capacity" name="vehiclefluid[fueltank1_capacity]">
		                  <div class="input-group-addon">
		                    <?=$mptluservolumeunit?>
		                  </div>
		                  
		                </div>
		                The volume of gas the vehicle's primary gas tank
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>  
            
            
            <div class="form-group">
		                <label class="col-sm-3 control-label">Fuel Tank 2 Capacity</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <input type="text" class="form-control pull-right" id="vehiclefluid-fueltank2-capacity" name="vehiclefluid[fueltank2_capacity]">
		                  <div class="input-group-addon">
		                    <?=$mptluservolumeunit?>
		                  </div>
		                  
		                </div>
		                The volume of gas the vehicle's second gas tank can hold
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>  
            	
			
          
            <?php
            echo $this->Form->input('vehiclefluid.oil_capacity',['label'=>'Oil Capacity', 'templateVars' => ['help' => 'Capacity of oil reservoir'] ]);
        ?>
            </div>
          </div>
          <!-- /.tab-pane -->  
          
          <div class=" tab-pane" id="purchase">
            <div class="form-horizontal">
                <?php
           echo $this->Form->input('vehiclepurchase.purchasedate', ['type'=>'text','empty' => true,'class'=>'datemask', 'templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-08)']]);
            echo $this->Form->input('vehiclepurchase.price',['label'=>'Purchase Price']);
            echo $this->Form->input('vehiclepurchase.currency_id',['label'=>'Currency','class'=>'select2']);
            
			echo $this->Form->input('vehiclepurchase.purchasepodometer',['label'=>'Odometer','templateVars' => ['help' => 'Odometer at the time of purchase']]);
            echo $this->Form->input('vehiclepurchase.comments',['label'=>'Comments','type'=>'textarea']);
            echo $this->Form->input('vehiclepurchase.warrantyexpdate', ['label'=>'Warranty Expiration Date','type'=>'text','empty' => true,'class'=>'datemask', 'templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-08)']]);
            echo $this->Form->input('vehiclepurchase.warrentyexpmeter',['label'=>'Max Meter Value','templateVars' => ['help' => 'Maximum odometer allowed by warranty coverage']]);
            
           
             ?>
            </div>
          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="lease">
            <div class="form-horizontal">
            	
            	<div class="form-group">
		                <label class="col-sm-3 control-label">Monthly Payment</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-dollar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="vehiclelease-maonthypayment" name="vehiclelease[maonthypayment]">
		                  
		                </div>
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>
            
            
            	
            	
            	
          	
            	
               <?php
            //   echo $this->Form->input('install_date', ['empty' => true,'type'=>'text','class'=>'datemask']);
           echo $this->Form->input('vehiclelease.startdate', ['empty' => true, 'label'=>'Start Date', 'empty' => true,'type'=>'text','class'=>'datemask', 'templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-08)']]);
            echo $this->Form->input('vehiclelease.enddate', ['empty' => true, 'label'=>'End Date', 'empty' => true,'type'=>'text','class'=>'datemask', 'templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-08)']]);
			?>
			
			<div class="form-group">
		                <label class="col-sm-3 control-label">Amount Financed</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-dollar"></i>
		                    <!-- <i class="fa fa-percent" aria-hidden="true"></i> -->
		                  </div>
		                  <input type="text" class="form-control pull-right" id="vehiclelease-amountfinanced" name="vehiclelease[amountfinanced]">
		                  
		                </div>
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>
		            
		            
		    	<div class="form-group">
		                <label class="col-sm-3 control-label">Interest Rate</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i >%</i>
		                    <!-- <i class="fa fa-percent" aria-hidden="true"></i> -->
		                  </div>
		                  <input type="text" class="form-control pull-right" id="vehiclelease-interestrate" name="vehiclelease[interestrate]">
		                  
		                </div>
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>
			
			
			
			<div class="form-group">
		                <label class="col-sm-3 control-label">Residual Value</label>
		                <div class="col-sm-6">
		                <div class="input-group ">
		                  <div class="input-group-addon">
		                    <i class="fa fa-dollar"></i>
		                    <!-- <i class="fa fa-percent" aria-hidden="true"></i> -->
		                  </div>
		                  <input type="text" class="form-control pull-right" id="vehiclelease-residualvalue" name="vehiclelease[residualvalue]">
		                  
		                </div>Estimated vehicle worth when the lease ends
		                <div class="col-sm-12" style="padding-left:0px"></div>
		             </div>
		                
		                <!-- /.input group -->
		            </div>
		            
		            
			
            
           
           <?php
            echo $this->Form->input('vehiclelease.accountnumber', ['label'=>'Account Number']);
            echo $this->Form->input('vehiclelease.ifsccode', ['label'=>'IFSC Code']);
            echo $this->Form->input('vehiclelease.swiftcode', ['label'=>'Swift Code']);
            echo $this->Form->input('vehiclelease.notes', ['type'=>'textarea']);
			
		 
        ?>
            </div>
          </div>
          <!-- /.tab-pane -->
          
           <div class="tab-pane" id="docs">
            <div class="form-horizontal">
              
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
                <div class="col-sm-offset-6 col-sm-12">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->
<?php
$this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/iCheck/all',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  '/js/moment.min.js',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
  'AdminLTE./plugins/iCheck/icheck.min',
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
   $(".select2").select2({ width: '100%' });
   $(".datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
/*
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });*/
  });
</script>
<?php $this->end(); ?>

