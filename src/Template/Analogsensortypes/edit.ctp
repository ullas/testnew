<?php echo $this->element('templateelement'); ?>

<div class="box" style="border-top:0px;">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Analogsensortype </h3>
    </div>
        <!-- form start -->
        <?= $this->Form->create($analogsensortype,['id'=>'masterdataform']) ?>
          <div class="box-body">
          	<div class="form-horizontal">
          <?php
            echo $this->Form->input('name',['required'=>'required']);
            echo $this->Form->input('description');
			echo $this->Form->input('icon');
			echo $this->Form->input('unit');
			echo $this->Form->input('atmessage');
			echo $this->Form->input('btmessage');
			echo $this->Form->input('irmessage');
			echo $this->Form->input('ormessage');
            
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