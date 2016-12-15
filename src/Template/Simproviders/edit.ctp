<?php echo $this->element('templateelement'); ?>

<div class="box" style="border-top:0px;">
    <div class="box-header with-border">
        <h3 class="box-title">Edit SIM Provider </h3>
    </div>
        <!-- form start -->
        <?= $this->Form->create($simprovider,['id'=>'masterdataform']) ?>
          <div class="box-body">
          	<div class="form-horizontal">
        <?php

                  echo $this->Form->input('name',['label'=>'Name','required' => 'required']);



                  echo $this->Form->input('billdateofmonth',['label'=>'Bill Day Of Month']);



                  echo $this->Form->input('duedateofmonth',['label'=>'Due Day Of Month']);



                  echo $this->Form->input('lastdatefineofmonth',['label'=>'Last Date With Fine']);

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
