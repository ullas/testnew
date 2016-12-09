<div class="box box-primary">
  	  <div class="box-header">
      	 <h3 class="box-title"><?php echo $title ?></h3>
      </div>
      <div class="box-body" >
          <div class="fmactions">
          	<?php foreach($actions as $action ): ?>
            <div class="fmaction">
      	       <button id="<?php echo $action['name']  ?>" type="button" class="mptl mptl-assign btn btn-primary btn-sm" />
				 <?php echo  $action['title']; ?>

          </button>
          <span class=" mptl-itemsel mptl-itemsel-assign label <?php echo $action['class']  ?>" style="opacity:0">0</span>
           </div>
           <?php endforeach; ?>

      </div>
      </div>
     </div>
