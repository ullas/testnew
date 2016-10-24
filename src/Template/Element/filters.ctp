 <div class="nav-tabs-custom">
	        <ul class="nav nav-tabs">
	          <li  class="active"><a href="#details" data-toggle="tab">Filter</a></li>
	            <li><a href="#specs" data-toggle="tab">Additional Filters</a></li>
              <span id="filterstatus" class="label label-success pull-right" style="margin-right:10px;margin-top:10px" disabled>Filter Active</span>
	        </ul>
	         <div class=" tab-content" style="min-height:85px">
             <div class="active tab-pane" id="details">
							 <div class="box-body">
							      	       <div class="form-group">
							      	       	
							      	       	  <?php  $count=0 ;foreach($basic as $item ):   ?>
							                  <input type="checkbox" class="mptl-filter-base flat flat-blue" <?php echo $count==0 ?  "checked": "" ?> id="mptl_filter_add_1">
							                  <span style="padding-right:10px"><?php echo $item ; $count++?></span>
							                  
							                  <?php  endforeach ?>
							                  
							              </div>
							      </div>
				</div> <!-- tab pane -->
				<div class="tab-pane" id="specs">
							
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
			   </div>
			</div>