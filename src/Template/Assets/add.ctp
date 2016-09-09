<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}</div>',
     'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-10"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
     'select' => '<div class="col-sm-10"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
      'selectMultiple' => '<div class="col-sm-10"><select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-10"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];
$this->Form->templates($myTemplates);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Asset
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tracking Object</a></li>
    <li><a href="/assets/"> Asset</a></li>
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
            echo $this->Form->input('Trackingobject.name');
           
            echo $this->Form->input('assettype_id', ['options' => $assettypes, 'empty' => true,'class'=>'select2' ]);
            echo $this->Form->input('location');
            echo $this->Form->input('isstationary');
            echo $this->Form->input('symbol_id', ['options' => $symbols, 'empty' => true,'class'=>'select2' ]);
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