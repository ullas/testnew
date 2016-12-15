<?php echo $this->element('templateelement'); ?>

<div class="box" style="border-top:0px;">
    <div class="box-header with-border">
        <h3 class="box-title">New Ownership </h3>
    </div>
        <!-- form start -->
        <?= $this->Form->create($ownership,['id'=>'masterdataform']) ?>
          <div class="box-body">
          	<div class="form-horizontal">
          <?php
            echo $this->Form->input('name',['required'=>'required']);
            echo $this->Form->input('description');

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
