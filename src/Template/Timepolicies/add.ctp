<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New Time Policy <small>Please fill the details to create a new Time Policy</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
	<li><a href="/Timepolicies/"> Time Policies</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($timepolicy) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('sunday');
            echo $this->Form->input('monday');
            echo $this->Form->input('tuesday');
            echo $this->Form->input('wednesday');
            echo $this->Form->input('thursday');
            echo $this->Form->input('friday');
            echo $this->Form->input('saturday');
            echo $this->Form->input('sun_start_time', ['empty' => true]);
            echo $this->Form->input('sun_end_time', ['empty' => true]);
            echo $this->Form->input('mon_start_time', ['empty' => true]);
            echo $this->Form->input('mon_end_time', ['empty' => true]);
            echo $this->Form->input('tue_start_time', ['empty' => true]);
            echo $this->Form->input('tue_end_time', ['empty' => true]);
            echo $this->Form->input('wed_start_time', ['empty' => true]);
            echo $this->Form->input('wed_end_time', ['empty' => true]);
            echo $this->Form->input('thu_start_time', ['empty' => true]);
            echo $this->Form->input('thu_end_time', ['empty' => true]);
            echo $this->Form->input('fri_start_time', ['empty' => true]);
            echo $this->Form->input('fri_end_time', ['empty' => true]);
            echo $this->Form->input('sat_start_time', ['empty' => true]);
            echo $this->Form->input('sat_end_time', ['empty' => true]);
            echo $this->Form->input('ev');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('system');
            echo $this->Form->input('enabled');
            echo $this->Form->input('description');
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
   
   $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });
  

  });
</script>
<?php $this->end(); ?>
       
