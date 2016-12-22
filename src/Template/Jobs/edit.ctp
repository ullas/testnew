
<?php echo $this->element('templateelement'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Job <small>Please fill the details to edit a Job</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/jobs/"> Jobs</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($job) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
         <?php
            echo $this->Form->input('jobdate',['type'=>'text','empty' => true,'label'=>'Job Date','required' => 'required','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('trackingobject_id', ['label'=>'Tracking Object','options' => $trackingobjects, 'empty' => true,'class'=>'select2','required' => 'required']);
            echo $this->Form->input('assigned_by',[ 'label'=>'Assigned By','options' => $addresses, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('title',['type'=>'text','required' => 'required']);
            echo $this->Form->input('description',['type'=>'text']);
            echo $this->Form->input('jobtime',['class' => 'timepicker','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('comments',['label'=>'Assigned By','type'=>'text']);
            echo $this->Form->input('timepolicy_id', ['label'=>'Time Policy','options' => $timepolicies, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('template_id',['label'=>'Template','options' => $templates, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('endcustomername',['label'=>'End Customer Name','type'=>'text']);
            echo $this->Form->input('endcustomermailid',['label'=>'End Customer Mail ID','type'=>'text']);
            echo $this->Form->input('endcustomerphone',['label'=>'End Customer Phone','type'=>'text']);
            echo $this->Form->input('location_id', ['label'=>'Location','options' => $locations, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('status',['class'=>'select2','options' => array('Pending', 'Completed')]);
            echo $this->Form->input('distance',['type'=>'text']);
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
  'AdminLTE./plugins/datepicker/datepicker3',
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
     