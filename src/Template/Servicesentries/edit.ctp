<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Service Entry <small>Please fill the details to edit a  Service Entry</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
	<li><a href="#"><i class="fa fa-bus"></i>Fleet Management</a></li>
    <li><a href="/Servicesentries/"> Service Entries</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($servicesentry) ?>
   <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">

        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('name',['label'=>'Name','templateVars' => ['help' => 'A short name for the service entry'],'required' => 'required']);
            echo $this->Form->input('dateofservice', ['type'=>'text','empty' => true,'label'=>'Date Of Service','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','required' => 'required']);
            echo $this->Form->input('odo',['label'=>'Odometer','templateVars' => ['help' => 'Odometer reading at the time of service'],'required' => 'required']);
            echo $this->Form->input('refer',['label'=>'Reference','templateVars' => ['help' => 'Optional (e.g. Bill Number, Invoice Number etc.)']]);
            echo $this->Form->input('labour',['templateVars' => ['help' => 'Charges for labour']]);
            echo $this->Form->input('parts',['templateVars' => ['help' => 'Charges for parts']]);
            echo $this->Form->input('tax',['templateVars' => ['help' => 'Total tax on charges']]);
            echo $this->Form->input('vendor_id', ['options' => $vendors, 'empty' => true,'templateVars' => ['help' => 'Select an existing vendor'],'class'=>'select2']);
            echo $this->Form->input('comments');
        ?>
           <div class="form-group">
                  	<label for="markasvoid" class="col-sm-3 control-label" style="padding-top:0" >Mark as Void</label>
				  	<div class="col-sm-1">
				  		 <?php echo $this->Form->checkbox('markasvoid', array('label' => false));?>
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



   $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });


  });
</script>
<?php $this->end(); ?>
