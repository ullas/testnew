<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Edit Symbol </h1>

</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($symbol,['id'=>'masterdataform']) ?>
  <div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">

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
