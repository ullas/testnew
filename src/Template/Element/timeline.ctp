 <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <?php foreach($timelines as $timeline) : ?>
              <li class="time-label">
                    <span class="bg-red">
                     <?php echo $timeline['timelinelabel'] ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="<?php echo  $timeline['timelineitem']['icon'] ?> <?php echo  $timeline['timelineitem']['background'] ?>"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $timeline['timelineitem']['headertime']?></span>

                  <h3 class="timeline-header"><a href="#"><?php echo $timeline['timelineitem']['headertitle']?></a> <?php echo $timeline['timelineitem']['headermessage']?></h3>

                  <div class="timeline-body">
                    <?php echo $timeline['timelineitem']['body']?>
                  </div>
                  <div class="timeline-footer">
                  	
                    <a class="btn btn-primary btn-xs"><?php echo $timeline['timelineitem']['footer'] ?></a>
                   
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              
              
              <!-- END timeline item -->
              <?php endforeach ; ?>
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>