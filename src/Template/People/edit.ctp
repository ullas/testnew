
<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}<div class="col-sm-offset-3 col-sm-6" style="margin-top:4px">{{help}}</div></div>',
     'label' => '<label class="col-sm-3 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
    
     'select' => '<div class="col-sm-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];

 
$this->Form->templates($myTemplates);

?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit People <small>Please fill the details to edit People</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> Tracking Items</a></li>
    <li><a href="/people/"><i class="fa fa-dashboard"></i> People</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($person) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
                
           <?php
            echo $this->Form->input('Trackingobject.name',['required' => 'required']);
            echo $this->Form->input('age');
            echo $this->Form->input('designation');
            echo $this->Form->input('address');
            echo $this->Form->input('addressline1',['label'=>'Address Line1']);
            echo $this->Form->input('city');
            echo $this->Form->input('country');
            //echo $this->Form->input('email');
            echo $this->Form->input('phone');
            echo $this->Form->input('department_id', ['options' => $departments, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true,'class'=>'select2']);
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
    
    'AdminLTE./plugins/select2/select2.min',
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
    
