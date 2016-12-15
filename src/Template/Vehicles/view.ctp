<?php echo $this->element('templateelement'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Vehicle Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tracking Items</a></li>
    <li> <a href="/vehicles/">Vehicles</a></li>
    <li class="active">View </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<?= $this->Form->create($vehicle) ?>
  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <?php echo $this->Html->image('user4-128x128.jpg', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'Vehicle picture')); ?>

          <h3 class="profile-username text-center">GJ-05-6543</h3>

          <p class="text-muted text-center">Innova</p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Site</b> <a class="pull-right">Surat</a>
            </li>
            <li class="list-group-item">
              <b>Owner</b> <a class="pull-right">GJ Constructions</a>
            </li>
            <li class="list-group-item">
              <b>Driver </b> <a class="pull-right">Mukesh Bhai</a>
            </li>
          </ul>

          <a href="#" class="btn btn-primary btn-block"><b>Show On Map</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tracking Details</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <strong><i class="fa fa-clock-o margin-r-5"></i> Last Seen</strong>

          <p class="text-muted">2 Days ago</p>

         
          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

          <p class="text-muted">Malibu, California</p>

          <hr>

          <strong><i class="fa fa-info-circle margin-r-5"></i> Status</strong>

          <p class="label label-danger">Parked</p>

        

          <hr>

          <strong><i class="fa fa-bell-o margin-r-5"></i> Last Event</strong>

          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
          <li ><a href="#activity" data-toggle="tab">Specifications</a></li>
          <li><a href="#engine" data-toggle="tab">Engine Details</a></li>
          <li><a href="#wheel" data-toggle="tab">Wheel&Tyre</a></li>
          <li><a href="#fuel" data-toggle="tab">Fluids</a></li>
          <li><a href="#timeline" data-toggle="tab">Purchase</a></li>
          <li><a href="#limits" data-toggle="tab">Loan/Lease</a></li>
          <li><a href="#attachments" data-toggle="tab">Attachments</a></li>
           
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="details">
          	<div class="form-horizontal">
          			<?php 
                    echo $this->Form->input('name',['disabled' =>true,'label'=>'Name','templateVars' => ['help' => 'A nickname to distinguish this vehicle'],'required' => 'required']);
             	    echo $this->Form->input('code',['disabled' =>true,'value'=> h($vehicle->code),  'templateVars' => ['help' => 'Vehicle Identification Number or Serial Number']]);
             	    echo $this->Form->input('plateno',['disabled' =>true,'value'=> h($vehicle->plateno),'label'=>'License Plate']);
		            echo $this->Form->input('vehicletype_id', ['disabled' =>true,'value'=> h($vehicle->vehicletype_id),'options' => $vehicletypes, 
		                             'templateVars' => ['help' => 'Select your vehicle category'],
		                             'empty' => true,'class'=>'select2','label'=>'Type' ,'required' => 'required']);
		            echo $this->Form->input('year',['disabled' =>true,'templateVars' => ['help' => 'e.g 2008,1973']]);
		            echo $this->Form->input('make',['disabled' =>true,'templateVars' => ['help' => 'e.g Maruthi,Ford etc.']]);
		            echo $this->Form->input('model',['disabled' =>true,'templateVars' => ['help' => 'Cressida,Sunny,i10 etc.']]);
		            echo $this->Form->input('trim',['disabled' =>true,'templateVars' => ['help' => 'C class,XE,Sports etc.']]);
		            echo $this->Form->input('registationloc',['disabled' =>true,'label'=>'Registration Location']);
		            echo $this->Form->input('vehiclestatus_id',['disabled' =>true,'label'=>'Status','options'=>$vehiclestatuses, 'class' =>'select2', 'empty' => false,'templateVars' => ['help' => 'Current status of this vehicle'],'required' => 'required']);
		            echo $this->Form->input('ownership_id', ['disabled' =>true,'label'=>'Ownership','options' => $ownerships, 'empty' => false,'class'=>'select2','required' => 'required']);
		            echo $this->Form->input('symbol_id', ['disabled' =>true,'options' => $symbols, 'empty' => true,'class'=>'select2']);
		            echo $this->Form->input('station_id', ['disabled' =>true,'options' => $stations, 'empty' => true,'class'=>'select2']);
		            echo $this->Form->input('department_id', ['disabled' =>true,'options' => $departments, 'empty' => true,'class'=>'select2']);
		            echo $this->Form->input('odometer',['disabled' =>true]);
		            echo $this->Form->input('description',['disabled' =>true]);
		            echo $this->Form->input('regstate',['disabled' =>true,'label'=>'Registration State']);
		            echo $this->Form->input('color',['disabled' =>true]);
		            echo $this->Form->input('bodytype',['disabled' =>true,'label'=>'Body Type','templateVars' => ['help' => 'Body type (XUV, Sedan, etc...)']]);
		            echo $this->Form->input('bodysubtype',['disabled' =>true,'label'=>'Body Subtype','templateVars' => ['help' => 'Extended Cab, Crew Cab, etc...']]);
		            echo $this->Form->input('driverdetectionmode',['label'=>'Driver Detection Mode','disabled' =>true,'options' => $driverdetectionmodes,'class'=>'select2', 'empty' => true]);
                    echo $this->Form->input('activedriver_id',['label'=>'Active Driver','disabled' =>true,'options' => $drivers,'class'=>'select2', 'empty' => true]);
           			echo $this->Form->input('purpose_id', ['disabled' =>true,'options' => $purposes, 'empty' => true,'class'=>'select2']);
           			echo $this->Form->input('transporter_id',['disabled' =>true,'class'=>'select2']);
                    echo $this->Form->input('drivers._ids', ['disabled' =>true,'options' => $drivers,'class'=>'select2']);
					echo $this->Form->input('msrp', ['disabled' =>true,'label'=>'MSRP','type'=>'text','empty' => true,'templateVars' => ['help' => 'Manufacturer suggested retail price','icon' => '<div class="input-group-addon"><i class="'.$mptlusercurrencyfaclass.'"></i></div>']]);
        	 		echo $this->Form->input('purpose_id', ['disabled' =>true,'options' => $purposes, 'empty' => true,'class'=>'select2']);
             	    ?>
          	</div>
          </div>
          
       
          <div class="tab-pane" id="activity">
             <div class="form-horizontal">
            
       
		 <?php
          	
          	
          	 echo $this->Form->input('vehiclespecification.width', ['disabled' =>true,'label'=>'Width','type'=>'text','empty' => true,'templateVars' => ['help' => 'Measurement of the widest part of the vehicle','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'  </div>']]);
        	 echo $this->Form->input('vehiclespecification.height', ['disabled' =>true,'label'=>'Height','type'=>'text','empty' => true,'templateVars' => ['help' => 'Measurement from the ground to the highest part of the vehicle','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.' </div>']]);
        	 echo $this->Form->input('vehiclespecification.length', ['disabled' =>true,'label'=>'Length','type'=>'text','empty' => true,'templateVars' => ['help' => 'The total length of the vehicle including bumpers','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'  </div>']]);
        	 echo $this->Form->input('vehiclespecification.interiorvolume', ['disabled' =>true,'label'=>'Interior Volume','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume within the vehicle main chamber','icon' => '<div class="input-group-addon">' .$mptluserlengthunitmajor.' <sup>3</sup> </div>']]);
        	 echo $this->Form->input('vehiclespecification.passengervolume', ['disabled' =>true,'label'=>'Passenger Volume','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume for the area solely designated for passengers','icon' => '<div class="input-group-addon">' .$mptluserlengthunitmajor.' <sup>3</sup> </div>']]);
        	 echo $this->Form->input('vehiclespecification.cargovolume', ['disabled' =>true,'label'=>'Cargo Volume','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume of the area designated as cargo space','icon' => '<div class="input-group-addon">' .$mptluserlengthunitmajor.' <sup>3</sup> </div>']]);
        	 echo $this->Form->input('vehiclespecification.groudclearance', ['disabled' =>true,'label'=>'Ground Clearance','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume for the area solely designated for passengers','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'  </div>']]);
        	 echo $this->Form->input('vehiclespecification.bedlength', ['disabled' =>true,'label'=>'Bed Length','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume of the area designated as cargo space','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'  </div>']]);
        	
			 echo $this->Form->input('vehiclespecification.curbweight', ['disabled' =>true,'label'=>'Curb Weight','type'=>'text','empty' => true,'templateVars' => ['help' => 'The weight of a vehicle with driver and fuel','icon' => '<div class="input-group-addon"> '.$mptluserweightunit.'  </div>']]);
			 echo $this->Form->input('vehiclespecification.grossweight', ['disabled' =>true,'label'=>'GVWR','type'=>'text','empty' => true,'templateVars' => ['help' => 'Gross Vehicle Weight Rating','icon' => '<div class="input-group-addon">'.$mptluserweightunit.' </div>']]);
			 echo $this->Form->input('vehiclespecification.towingcapacity', ['disabled' =>true,'label'=>'Towing Capacity','type'=>'text','empty' => true,'templateVars' => ['help' => 'The towing ability of the vehicle as it comes standard','icon' => '<div class="input-group-addon">'.$mptluserweightunit.' </div>']]);
			 echo $this->Form->input('vehiclespecification.maxpayload', ['disabled' =>true,'label'=>'Max Payload','type'=>'text','empty' => true,'templateVars' => ['help' => 'The maximum allowable weight that the vehicle can hold','icon' => '<div class="input-group-addon"> '.$mptluserweightunit.' </div>']]);
			
          	
             echo $this->Form->input('vehiclespecification.epacity',['disabled' =>true,'label'=>'EPA City']);
             echo $this->Form->input('vehiclespecification.epahighway',['disabled' =>true,'label'=>'EPA Highway']);
             echo $this->Form->input('vehiclespecification.epacombined',['disabled' =>true,'label'=>'EPA Combined']);          
           
        ?>
            <!--	end specs -->
            	
            
            
             
            </div>
		</div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="engine">
             <div class="form-horizontal">
              <?php
	            echo $this->Form->input('vehicleengine.enginesummary',['disabled' =>true,'label'=>'Engine Summary',  'templateVars' => ['help' => 'Basic Engine Summary']]);
	            echo $this->Form->input('vehicleengine.brand',['disabled' =>true,'label'=>'Brand',   'templateVars' => ['help' => 'Brand specific Engine name']]);
	            echo $this->Form->input('vehicleengine.aspiration',['disabled' =>true,'label'=>'Aspiration','class'=>'select2',   'templateVars' => ['help' => 'Method for drawing air into the engine']]);
	            echo $this->Form->input('vehicleengine.blocktype',['disabled' =>true,'label'=>'Block Type','class'=>'select2',   'templateVars' => ['help' => 'Engine Block Type (F,H,R,I,W)']]);
	            echo $this->Form->input('vehicleengine.bore', ['disabled' =>true,'label'=>'Bore','type'=>'text','empty' => true,'templateVars' => ['help' => 'Diameter of holes in the engine block used for cylinders','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.'</div>']]);
	        	echo $this->Form->input('vehicleengine.camtype',['disabled' =>true,'label'=>'Cam Type','class'=>'select2',   'templateVars' => ['help' => 'Type of Cam Examples include DOHC, SOHC etc..']]);
	            echo $this->Form->input('vehicleengine.compression',['disabled' =>true,'label'=>'Compression',   'templateVars' => ['help' => 'Compression ratio']]);
	            echo $this->Form->input('vehicleengine.cylinders',['disabled' =>true,'label'=>'Cylinders',  'templateVars' => ['help' => 'Number of cylinders present in the engine']]);
	            echo $this->Form->input('vehicleengine.displacement',['disabled' =>true,'label'=>'Dispalcement',  'templateVars' => ['help' => 'Total Volume dispalced during one firing cycle of the engine']]);
				echo $this->Form->input('vehicleengine.fuel_induction',['disabled' =>true,'label'=>'Fuel Induction','class'=>'select2',   'templateVars' => ['help' => 'Method of drawing fuel into the engine']]);
	            echo $this->Form->input('vehicleengine.fuel_quality',['disabled' =>true,'label'=>'Fuel Quality',   'templateVars' => ['help' => 'Recommended Octane Rating']]);
	            echo $this->Form->input('vehicleengine.max_hp',['disabled' =>true,'label'=>'Max HP',   'templateVars' => ['help' => 'Maximum power achieved by engine. Expressed in units of Horse Power']]);
	            echo $this->Form->input('vehicleengine.max_torque',['disabled' =>true,'label'=>'Max Torque',   'templateVars' => ['help' => 'Maximum torque delivered by engine']]);
	            echo $this->Form->input('vehicleengine.redline_rpm',['disabled' =>true,'label'=>'Redline RPM',   'templateVars' => ['help' => 'Maximum speed at which engine can operate without risking damage']]);
	            echo $this->Form->input('vehicleengine.stroke',['disabled' =>true,'label'=>'Stroke',   'templateVars' => ['help' => 'Distance travelled by the piston during a combustion cycle']]);
	            echo $this->Form->input('vehicleengine.valves',['disabled' =>true,'label'=>'Valves',   'templateVars' => ['help' => 'Total number of valves in the engine']]);
	            echo $this->Form->input('vehicleengine.transmission_summary',['disabled' =>true,'label'=>'Transmission Summary',   'templateVars' => ['help' => 'Basic Transmission Summary']]);
	            echo $this->Form->input('vehicleengine.trasmission_brand',['disabled' =>true,'label'=>'Transmission Brand',  'templateVars' => ['help' => 'Brand specific engine name. For example: Allison']]);
	            echo $this->Form->input('vehicleengine.transmission_type',['disabled' =>true,'label'=>'Transmission Type','class'=>'select2' , 'templateVars' => ['help' => 'A nickname to distinguish this vehicle']]);
	            echo $this->Form->input('vehicleengine.traasmission_gears',['disabled' =>true,'label'=>'Transmission Gears' , 'templateVars' => ['help' => 'Number of gears or speeds available']]);
        		?>
            </div>

           

            
          </div>
          <!-- Tab Pane-->
          
           <div class="tab-pane" id="wheel">
             <div class="form-horizontal">
               <?php
            	echo $this->Form->input('vehiclewheelstyre.drivetype',['disabled' =>true,'label'=>'Drive Type','class'=>'select2', 'templateVars' => ['help' => 'Refers to how many or which wheels are powered by the engine.']]);
	            echo $this->Form->input('vehiclewheelstyre.breaksystem',['disabled' =>true,'label'=>'Brake System','class'=>'select2',  'templateVars' => ['help' => 'Description of brake type']]);
	            echo $this->Form->input('vehiclewheelstyre.fronttrackwidth',['disabled' =>true,'label'=>'Front Track Width', 'templateVars' => ['help' => 'The distance between the front tires']]);
	            echo $this->Form->input('vehiclewheelstyre.reartrackwidth',['disabled' =>true,'label'=>'Rear Track Width', 'templateVars' => ['help' => 'The distance between the rear tires']]);
				echo $this->Form->input('vehiclewheelstyre.wheelbase', ['disabled' =>true,'label'=>'Wheel Base','type'=>'text','empty' => true,'templateVars' => ['help' => 'The length from the center of the front wheel to the center of the rear wheel','icon' => '<div class="input-group-addon">'.$mptluserlengthunitmini.' </div>']]);
	        	echo $this->Form->input('vehiclewheelstyre.frontwheeldia',['disabled' =>true,'label'=>'Front Wheel Diameter', 'templateVars' => ['help' => 'The front wheel diameter(Displayed as  "length x width").']]);
	            echo $this->Form->input('vehiclewheelstyre.rearwheeldia',['disabled' =>true,'label'=>'Rear Wheel Diameter', 'templateVars' => ['help' => 'The distance between the rear tires']]);
	            echo $this->Form->input('vehiclewheelstyre.rearaxil',['disabled' =>true,'label'=>'Rear Axle']);
	            echo $this->Form->input('vehiclewheelstyre.fronttyretype',['disabled' =>true,'label'=>'Front Tyre Type', 'templateVars' => ['help' => 'The front tire information']]);
	            echo $this->Form->input('vehiclewheelstyre.fronttyrepsi',['disabled' =>true,'label'=>'Front Tyre PSI']);
	            echo $this->Form->input('vehiclewheelstyre.reartyretype',['disabled' =>true,'label'=>'Rear Tyre Type', 'templateVars' => ['help' => 'The rear tire information if it is different than the front']]);
	            echo $this->Form->input('vehiclewheelstyre.reartyrepsi',['disabled' =>true,'label'=>'Rear Tyre PSI']);
        		?>
            </div>

           

            
          </div>
          <!-- Tab Pane-->
          
          
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <?php $arr = array(array('timelabel' => '10 Feb. 2014','content' => array(
                						array('icontent' => 'fa fa-envelope bg-blue','header' => 'Support Team','headercontent' => 'sent you an email','time' => '12:05','bodycontent' => 'Etsy doostang zoodles'),
                						array('icontent' => 'fa fa-trash bg-blue','header' => 'Support Team','headercontent' => 'sent you an email','time' => '12:05','bodycontent' => 'Etsy doostang zoodles'))),
                							  
                							  array('timelabel' => '13 Feb. 2014','content' => array(
                					    array('icontent' => 'fa fa-comments bg-blue','header' => 'Support Team','headercontent' => 'sent you an email','time' => '12:05','bodycontent' => 'Etsy doostang zoodles'))) );
                							  
                	echo $this->element('vehicleelement', array('par' =>$arr) ); ?>
            </ul>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="limits">
            <div class="form-horizontal">
              <?php	
           	echo $this->Form->input('vehiclelease.maonthypayment', ['disabled' =>true,'label'=>'Monthly Payment','type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon"><i class="'.$mptlusercurrencyfaclass.'"></i></div>']]);
            echo $this->Form->input('vehiclelease.startdate', ['disabled' =>true,'type'=>'text','empty' => true,'label'=>'Start Date','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('vehiclelease.enddate', ['disabled' =>true,'type'=>'text','empty' => true,'label'=>'End Date','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('vehiclelease.amountfinanced', ['label'=>'Amount Financed','disabled' =>true,'type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon"><i class="'.$mptlusercurrencyfaclass.'"></i></div>']]);
            echo $this->Form->input('vehiclelease.interestrate', ['disabled' =>true,'label'=>'Interest Rate','type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon"><i>%</i></div>']]);
            echo $this->Form->input('vehiclelease.residualvalue', ['disabled' =>true,'label'=>'Residual Value','type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon"><i class="'.$mptlusercurrencyfaclass.'"></i></div>']]);
            echo $this->Form->input('vehiclelease.accountnumber', ['disabled' =>true,'label'=>'Account Number']);
            echo $this->Form->input('vehiclelease.ifsccode', ['disabled' =>true,'label'=>'IFSC Code']);
            echo $this->Form->input('vehiclelease.swiftcode', ['disabled' =>true,'label'=>'Swift Code']);
            echo $this->Form->input('vehiclelease.notes', ['disabled' =>true,'type'=>'textarea']);
			?>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="fuel">
            <div class="form-horizontal">
             <?php
           	echo $this->Form->input('vehiclefluid.fueltype',['disabled' =>true,'label'=>'Fuel Type','class'=>'select2']);
            echo $this->Form->input('vehiclefluid.fuelquality',['disabled' =>true,'label'=>'Fuel Quality', 'templateVars' => ['help' => 'Recommended Octane rating']]);
			echo $this->Form->input('vehiclefluid.fueltank1_capacity', ['disabled' =>true,'label'=>'Fuel Tank1 Capacity','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume of gas the vehicles primary gas tank can hold','icon' => '<div class="input-group-addon">' .$mptluservolumeunit.' </div>']]);
            echo $this->Form->input('vehiclefluid.fueltank2_capacity', ['disabled' =>true,'label'=>'Fuel Tank2 Capacity','type'=>'text','empty' => true,'templateVars' => ['help' => 'The volume of gas the vehicles secondary gas tank can hold','icon' => '<div class="input-group-addon">' .$mptluservolumeunit.' </div>']]);
			echo $this->Form->input('vehiclefluid.oil_capacity', ['disabled' =>true,'label'=>'Oil Capacity','type'=>'text','empty' => true,'templateVars' => ['help' => 'Capacity of oil reservoir','icon' => '<div class="input-group-addon">' .$mptluservolumeunit.' </div>']]);
        	?>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="attachments">
          	
          </div>
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
<?= $this->Form->end() ?>
</section>
<!-- /.content -->
