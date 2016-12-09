<?php echo $this->element('templateelement'); ?>

<div class="box" style="border-top:0px;">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Currency </h3>
    </div>
        <!-- form start -->
        <?= $this->Form->create($currency,['id'=>'masterdataform']) ?>
          <div class="box-body">
          	<div class="form-horizontal">
        <?php
            echo $this->Form->input('name',['label'=>'Name','required'=>'required']);
            echo $this->Form->input('abbrev',['label'=>'Abbreviation']);
            echo $this->Form->input('symbol');
            echo $this->Form->input('description');
        ?>
    </div>
		</div>
		<div class="box-footer">
			<div class="pull-right">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            	<button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
	  </div>