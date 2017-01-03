 <div class="nav-tabs-custom">
 	
 	<?php if(count($basic)>0) : ?>
	        <ul class="nav nav-tabs">
	        <li  class="active" id="fltrlst"><a href="#filterdiv" data-toggle="tab">Filter</a></li>
	          	
	            <?php if(count($additional)>0) : ?>
	            	<li id="additionalfltrlst"><a href="#addfilterdiv" data-toggle="tab" id="addfilterlink">Additional Filters</a></li>
	            <?php endif ; ?>
              <span id="filterstatus" class="label label-success pull-right" style="margin-right:10px;margin-top:10px" disabled>Filter Active</span>
	        </ul>
	         <div class=" tab-content" style="min-height:85px">
             <div class="active tab-pane" id="filterdiv">
							 <div class="box-body">
							      	       <div class="form-group">
							      	       	
							      	       	  <?php  $count=0 ;foreach($basic as $item ):   ?>
							                  <input type="checkbox" class="mptl-filter-base flat flat-blue" <?php echo $count==0 ?  "checked": "" ?>
							                   <?php 
							                     if($item=='All'){
							                     	echo "disabled";
							                     }
							                   ?>
							                   id="mptl_filter_add_<?php echo $count+1   ?>">
							                  <span style="padding-right:10px"><?php echo $item ; $count++?></span>
							                  
							                  <?php  endforeach ?>
							                  
							              </div>
							      </div>
				</div> <!-- tab pane -->
				<?php if(count($additional)>0) : ?>
				<div class="tab-pane" id="addfilterdiv">
							
					     <?php  foreach($additional as $item ):  ?>
					    
					     <div class="col-md-4" style="display:inline-block">
							                  <?php echo $item['title']; ?>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="mptl-daterange form-control pull-right" id="<?php echo $item['name']; ?>">
                                 </div>
							</div>
							               
							 <?php  endforeach ?>          
				</div>
				<?php endif ; ?>
			   </div>
			   
			   
	<?php else: ?>
		<ul class="nav nav-tabs">	          	
	            <?php if(count($additional)>0) : ?>
	            	<li class="active" id="additionalfltrlst"><a href="#addfilterdiv" data-toggle="tab" id="addfilterlink">Filter</a></li>
	            <?php endif ; ?>
              <span id="filterstatus" class="label label-success pull-right" style="margin-right:10px;margin-top:10px" disabled>Filter Active</span>
	        </ul>
	         <div class=" tab-content" style="min-height:85px">
             
				<?php if(count($additional)>0) : ?>
				<div class="active tab-pane" id="addfilterdiv">
							
					     <?php  foreach($additional as $item ):  ?>
					    
					     <div class="col-md-4" style="display:inline-block">
							                  <?php echo $item['title']; ?>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input class="mptl-daterange form-control pull-right" id="<?php echo $item['name']; ?>">
                                 </div>
							</div>
							               
							 <?php  endforeach ?>          
				</div>
				<?php endif ; ?>
			   </div>
	<?php endif ; ?>
	
</div>