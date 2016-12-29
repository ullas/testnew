<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Fuel Entry <small>Please fill the details to edit a Fuel Entry</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>

    <li><a href="/Fuelentries/"> Fuel Entries</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($fuelentry)?>
  <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">

        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">

        <?php
            echo $this->Form->input('vehicle_id',[ 'options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
            echo $this->Form->input('date', ['label'=> 'Date ','empty' => true,'class'=>'datemask','type'=>'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'required' => 'required']);
            echo $this->Form->input('odo',['label'=> 'Odometer ','empty' => true,'type'=>'text','templateVars' => ['help' => 'Odometer reading at time of fuel up'],'required' => 'required']);
            echo $this->Form->input('priceperusnit',['label'=> 'Price Per Unit','empty' => true,'type'=>'text','templateVars' => ['help' => 'Optional - Price per litre, price per gallon etc. (e.g. 56.4)']]);
            echo $this->Form->input('fueltype',['label'=>'Fuel Type','templateVars' => ['help' => 'Optional (e.g. Petrol)']]);
            echo $this->Form->input('vendor_id',['options' => $vendors, 'empty' => true,'templateVars' => ['help' => 'Select an existing vendor'],'class'=>'select2']);
            echo $this->Form->input('ref',['label'=> 'Reference','empty' => true,'type'=>'text','templateVars' => ['help' => 'Optional (e.g. Bill Number, Invoice Number etc.)']]);
            echo $this->Form->input('quantity', ['type'=>'text','empty' => true,'templateVars' => ['icon' => '<div class="input-group-addon">' .$mptluservolumeunit.' </div>']]);
			
			// echo $this->Form->input('partialfill');
           // echo $this->Form->input('markaspersonal',['label'=>'Mark As Personal']);
        ?>
        <div class="form-group">
          <label for="partialfill" class="col-sm-3 control-label" style="padding-top:0" >Partial Fill</label>
				  <div class="col-sm-1">
				    <?php echo $this->Form->checkbox('partialfill', array('label' => false));?>

				  </div>
				  <div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  </div>
				</div>
         <div class="form-group">
          <label for="markaspersonal" class="col-sm-3 control-label" style="padding-top:0" >Mark as Personal</label>
				  <div class="col-sm-1">
				    <?php echo $this->Form->checkbox('markaspersonal', array('label' => false));?>
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
                <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->
