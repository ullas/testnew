            <div class="btn-group pull-right">
                  <button type="button" class="btn btn-default">Filters</button>
                  <button id="datatabfilter" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul id="datatabfilterul" class="dropdown-menu" role="menu" style="min-width:220px;padding:10px">
                  <?php if(count($basic)>0) : ?>
                    <div class="form-group">
                       <?php  $count=0 ;foreach($basic as $item ):   ?>
                       <input type="checkbox" class="mptl-filter-base flat flat-blue" <?php echo $count==0 ?  "checked": "" ?>
                        <?php
                          if($item=='All'){
                           echo "disabled";
                          }
                        ?>
                        id="mptl_filter_add_<?php echo $count+1   ?>">
                       <span style="padding-right:10px;"><?php echo $item ; $count++?></span></br>
                       <?php  endforeach ?>
                   </div>
                  <?php endif; ?>
                    <?php if(count($additional)>0) : ?>
                      <?php  foreach($additional as $item ):  ?>
                        <div>
         							      <div style="padding-bottom:5px"><?php echo $item['title']; ?></div>
                             <div class="input-group date" style="padding-bottom:5px">
                               <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="mptl-daterange form-control pull-right" id="<?php echo $item['name']; ?>">
                            </div>
         							 </div>
                      <?php  endforeach; ?>
                    <?php endif;?>
                    <li></li>
                  </ul>

                </div>
                <span id="filterstatus" class="label label-success" style="margin:10px;display:none;" disabled>Filter Active</span>
