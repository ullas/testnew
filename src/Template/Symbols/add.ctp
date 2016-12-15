<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Add Symbol </h1>

</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($symbol,['id'=>'masterdataform']) ?>
  <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li  class="active"><a href="#details" data-toggle="tab">Details</a></li>
          <li><a href="#docs" data-toggle="tab">Attachments</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('name',['required'=>'required']);
           // echo $this->Form->input('symbol');
            echo $this->Form->input('description');

        ?>
    </div>

          </div>
          <!-- /.tab-pane -->
         <div class="tab-pane" id="docs">
             <div class="form-horizontal">

            	<?php echo $this->Form->input('attachment', array('type' => 'hidden')); ?>

			    <!-- upload component -->
            	<div class="form-group" style="margin:20px;"><div id="myDropZone" class="dropzone"><div class="dz-message text-center"><i class="fa fa-cloud-upload text-light-blue fa-5x"></i>
            		<br/><span>Drag and drop Files Here to upload.</span>
            		<br/><span class="upload-btn bg-info">or select files to Upload</span></div></div>
            	</div>

            </div>
           </div>
          <!-- Tab Pane-->

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
                <div class="pull-right" style="margin-right:10px">
                  <button type="submit" class="btn btn-success">Save</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->
<?php $this->start('scriptBotton'); ?>
<script>
	//dropzone
	Dropzone.autoDiscover = false;
	var myDropzone = $("div#myDropZone").dropzone({
         url : "/Uploads/upload",
         maxFiles: 1,
         addRemoveLinks: true,
         dictRemoveFileConfirmation : 'Are you sure you want to remove the particular file ?' ,
         init: function() {
     		this.on("complete", function (file) {
      			if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
					//alert(file);
				}
    		});
    		this.on("removedfile", function (file) {
          		$("#attachment").val("");
      		});
    		this.on("queuecomplete", function (file) {
          // alert("All files have uploaded ");
      		});

      		this.on("success", function (file) {
          		$("#attachment").val(file['name']);console.log(file['name']); //alert("Success ");
      		});

      		this.on("error", function (file) {
          		// alert("Error in uploading ");
      		});

      		this.on("maxfilesexceeded", function(file){
        		alert("You can not upload any more files.");this.removeFile(file);
    		});
    	},

    });

</script>
<?php $this->end(); ?>
