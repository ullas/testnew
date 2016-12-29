<?php echo $this->element('templateelement'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Group <small>Please fill the details to create a new Group</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Administration</a></li>
    <li><a href="#">Groups</a></li>
    <li><a href="/groups/"> Groups</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($group) ?>
    <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">

        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('trackingobjects._ids', ['options' => $trackingobjects,'class'=>'select2']);
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
    
    'AdminLTE./plugins/datepicker/datepicker3'
  ],
  ['block' => 'css']);

$this->Html->script([
 	'AdminLTE./plugins/select2/select2.full.min',
  	'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  	'/js/dropzone/dropzone',
	'AdminLTE./plugins/iCheck/icheck.min'
 
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements

		//datepicker

    	$('.mptldp').datepicker({

    		format:"dd/mm/yy",

      		autoclose: true,
      		clearBtn: true

    	});
    
     $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });

  });
</script>
<?php $this->end(); ?>