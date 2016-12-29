<?php echo $this->element('templateelement'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Driver Group <small>Please fill the details to edit a new Driver Group</small>
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Groups</a></li>
    <li><a href="/drivergroups/"> Driver Groups</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($drivergroup) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('defaultdriver_id', ['label'=>'Default Driver','options' => $defaultdrivers, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('drivers._ids', ['label'=>'Driver','options' => $drivers,'class'=>'select2']);
        ?>
    
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
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
 
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
     $(".datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});

  });
</script>
<?php $this->end(); ?>


