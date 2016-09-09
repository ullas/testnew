<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}</div>',
     'label' => '<label class="col-sm-2 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-10"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
     'select' => '<div class="col-sm-10"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',   
     'textarea' => '<div class="col-sm-10"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
       'error' => '<div class="col-sm-2"></div><div class="col-sm-10 error-message">{{content}}</div>',
];
$this->Form->templates($myTemplates);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Vendor
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/vendors/"><i class="fa fa-dashboard"></i> Vendors</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($vendor) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
                <?php
            echo $this->Form->input('name');
            echo $this->Form->input('phone');
            echo $this->Form->input('website');
            echo $this->Form->input('address');
            echo $this->Form->input('addressline2',['title'=>'Address Line 2']);
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('zippostal');
            echo $this->Form->input('country');
            echo $this->Form->input('contactname');
            echo $this->Form->input('email');
            echo $this->Form->input('contactphone',['title'=>'Phone']);
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
                  <button type="submit" class="btn btn-danger">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->


    
