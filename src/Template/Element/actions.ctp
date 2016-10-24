<div class="box box-primary">
  	  <div class="box-header">
      	 <h3 class="box-title"><?php echo $title ?></h3>
      </div>
      <div class="box-body" >
          <div class="fmactions">
          	<?php foreach($actions as $action ): ?>
            <div class="fmaction">
      	       <button type="button" class="mptl mptl-assign btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo $action['name'] ?>">
				 <?php echo  $action['title']; ?>
				 
          </button>
          <span class=" mptl-itemsel mptl-itemsel-assign label <?php echo $action['class']  ?>">0</span>
           </div>
           <?php endforeach; ?>
        
      </div>
      </div>
     </div>