<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Renewal Reminders<small>Please fill the details to edit a Renewal Reminders</small>
   </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Renewalreminders/"> RenewalReminders</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($renewalreminder) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('renewalstype_id',['label'=>'Renewal Type','required' => 'required','class'=>'select2']);
            echo $this->Form->input('duedate',['label'=>'Due Date','required' => 'required']);
            echo $this->Form->input('timethreashold',['label'=>'Time Threshold','required' => 'required']);
		?>
		<div class="form-group">
                  	<label for="notificationrequired" class="col-sm-3 control-label" style="padding-top:0" >Notification Required</label>
				  	<div class="col-sm-1">
				    	<?php echo $this->Form->checkbox('notificationrequired', array('label' => false));?>
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
		<?php	
			
            echo $this->Form->input('distributionlist_id', ['label'=>'Distribution List','options' => $distributionlists, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('group_id', ['label'=>'Group','options' => $groups, 'empty' => true,'class'=>'select2']);
           
        ?>
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