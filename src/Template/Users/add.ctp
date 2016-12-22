<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New User <small>Please fill the details to create a new User</small>
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
	<li><a href="/Users/"> Users</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($user) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
         <ul class="nav nav-tabs">
          <li  class="active"><a href="#details" data-toggle="tab">Details</a></li>
            <li><a href="#addphoto" data-toggle="tab">Add Photo</a></li>
        </ul>
        <div class="tab-content" style="padding-top:45px">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        
        <?php
            echo $this->Form->input('username');
			echo $this->Form->input('password');
            echo $this->Form->input('role');
        ?>
 <div class="form-group">
                  	<label for="markasvoid" class="col-sm-3 control-label" style="padding-top:0" >Mark as Void</label>
				  	<div class="col-sm-6">
				    	<input name="markasvoid" value="1" id="markasvoid" class="" type="checkbox">
                   	</div>
				  	<div class="col-sm-offset-3 col-sm-6" style="margin-top:18px" >
				  	</div>
			</div>
	</div>
  
          </div>
          <!-- /.tab-pane -->
         
         	<div class="tab-pane" id="addphoto">
	             <div class="form-horizontal">
	             	 	<?php echo $this->Form->input('attachment', array('type' => 'hidden')); ?>
            			<div class="form-group" style="margin:20px;"><div id="myDropZone" class="dropzone"><div class="dz-message text-center"><i class="fa fa-cloud-upload text-light-blue fa-5x"></i>
            			<br/><span>Drag and drop Files Here to upload.</span>
            			<br/><span class="upload-btn bg-info">or select files to Upload</span></div></div>
            	</div>
	             </div>
            </div>
            
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

      
