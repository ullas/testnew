<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Asset <small>Please fill the details to create a new Asset</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  	<li><a href="#"><i class="fa fa-puzzle-piece"></i> Administration</a></li>
    <li><a href="#"><i class="fa fa-puzzle-piece"></i> Tracking Items</a></li>
    <li><a href="/assets/"><i class="fa fa-cube"></i> Assets</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($asset) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
  
        <?php
            echo $this->Form->input('name',['required' => 'required']);
           
            echo $this->Form->input('assettype_id', ['label'=>'Asset Type','options' => $assettypes, 'empty' => true,'class'=>'select2' ,'required' => 'required' ]);
            echo $this->Form->input('location');
		 ?>
		  <div class="form-group">
                  	<label for="isstationary" class="col-sm-3 control-label" style="padding-top:0" >Is Stationary</label>
				  	<div class="col-sm-6">
				    	<input name="isstationary" value="1" id="isstationary" class="" type="checkbox">
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
		 <?php	
            
            echo $this->Form->input('symbol_id', ['options' => $symbols, 'empty' => true,'class'=>'select2' ,'required' => 'required' ]);
            echo $this->Form->input('department_id', ['options' => $departments, 'empty' => true,'class'=>'select2' ]);
            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true,'class'=>'select2' ]);
            echo $this->Form->input('purpose_id', ['options' => $purposes, 'empty' => true,'class'=>'select2']);
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

<?php
$this->Html->css([
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

  });
</script>
<?php $this->end(); ?>