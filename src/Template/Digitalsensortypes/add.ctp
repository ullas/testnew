<?php echo $this->element('templateelement'); ?>

<div class="box" style="border-top:0px;">
    <div class="box-header with-border">
        <h3 class="box-title">New Digital sensor types </h3>
    </div>
        <!-- form start -->
        <?= $this->Form->create($digitalsensortype,['id'=>'masterdataform']) ?>
          <div class="box-body">
          	<div class="form-horizontal">
          <?php
            echo $this->Form->input('name',['required'=>'required']);
            echo $this->Form->input('description');
			echo $this->Form->input('icon');
			echo $this->Form->input('oamessage');
			echo $this->Form->input('odmessage');
			echo $this->Form->input('otmessage');


		?>
		</div>
		</div>
		<div class="box-footer">
			<div class="pull-right">
        <button type="submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
	  </div>
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
  <h1>
    New Contractors
  </h1>

</section> -->

<!-- Main content -->
<!-- <section class="content">
 <?= $this->Form->create($contractor,['id'=>'masterdataform']) ?>
  <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">

        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
            echo $this->Form->input('name',['required'=>'required']);
            echo $this->Form->input('description');
         ?>
   </div>

          </div>


        </div>
      </div>
    </div>
  </div>
  <div class="row">
   <div class="form-group">
                <div class="pull-right">
                	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  	<button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
 <?= $this->Form->end() ?>
</section> -->
<!-- /.content -->
