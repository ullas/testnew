    <div class="fmactions pull-left" style="display:none">
            <!--<?php echo $title ?>-->
          	<?php foreach($actions as $action ): ?>
            <div class="fmaction">
      	       <button id="<?php echo $action['name']  ?>" type="button" class="mptl mptl-assign btn btn-primary btn-sm" />
				 <?php echo  $action['title']; ?>
          </button>
          <span class=" mptl-itemsel mptl-itemsel-assign label <?php echo $action['class']  ?>" style="opacity:0">0</span>
           </div>
           <?php endforeach; ?>
      </div>
