<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Vehicle Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tracking Items</a></li>
    <li> <a href="/vehicles/">Vehicles</a></li>
    <li class="active">View </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <?php echo $this->Html->image('user4-128x128.jpg', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'Vehicle picture')); ?>

          <h3 class="profile-username text-center">GJ-05-6543</h3>

          <p class="text-muted text-center">Innova</p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Site</b> <a class="pull-right">Surat</a>
            </li>
            <li class="list-group-item">
              <b>Owner</b> <a class="pull-right">GJ Constructions</a>
            </li>
            <li class="list-group-item">
              <b>Driver </b> <a class="pull-right">Mukesh Bhai</a>
            </li>
          </ul>

          <a href="#" class="btn btn-primary btn-block"><b>Show On Map</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tracking Details</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <strong><i class="fa fa-clock-o margin-r-5"></i> Last Seen</strong>

          <p class="text-muted">2 Days ago</p>

         
          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

          <p class="text-muted">Malibu, California</p>

          <hr>

          <strong><i class="fa fa-info-circle margin-r-5"></i> Status</strong>

          <p class="label label-danger">Parked</p>

        

          <hr>

          <strong><i class="fa fa-bell-o margin-r-5"></i> Last Event</strong>

          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
          <li ><a href="#activity" data-toggle="tab">Specifications</a></li>
          <li><a href="#engine" data-toggle="tab">Engine Details</a></li>
          <li><a href="#wheel" data-toggle="tab">Wheel&Tyre</a></li>
          <li><a href="#fuel" data-toggle="tab">Fluids</a></li>
          <li><a href="#fuel" data-toggle="tab">Purchase</a></li>
          <li><a href="#fuel" data-toggle="tab">Loan/Lease</a></li>
          <li><a href="#timeline" data-toggle="tab">Attachments</a></li>
          
          <li><a href="#timeline" data-toggle="tab">Service History</a></li>
          <li><a href="#timeline" data-toggle="tab">Run History</a></li>
          <li><a href="#fuel" data-toggle="tab">Icidents</a></li>
          <li><a href="#timeline" data-toggle="tab">Inspections</a></li>
          <li><a href="#timeline" data-toggle="tab">Issues</a></li>
          <li><a href="#timeline" data-toggle="tab">Workoders</a></li>
          <li><a href="#timeline" data-toggle="tab">Parts Usage</a></li>
          <li><a href="#timeline" data-toggle="tab">Reminders</a></li>
          <li><a href="#timeline" data-toggle="tab">Comments</a></li>
          <li><a href="#timeline" data-toggle="tab">Assigment History</a></li>
           <li><a href="#timeline" data-toggle="tab">Odometer History</a></li>
           <li><a href="#timeline" data-toggle="tab">Status Changes</a></li>
           <li><a href="#limits" data-toggle="tab">Settings</a></li>
           
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <form class="form-horizontal">
              
              
              
              
            </form>

           

            
          </div>
          <!-- /.tab-pane -->
        </div>
           <!-- /.tab-content -->
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
             <form class="form-horizontal">
              <div class="form-group">
                <label for="inputWidth" class="col-sm-3 control-label">Width</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputWidth" placeholder="Width">
                </div>
              </div>
              <div class="form-group">
                <label for="inputHeight" class="col-sm-3 control-label">Height</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputHeight" placeholder="Height">
                </div>
              </div>
              <div class="form-group">
                <label for="inputLength" class="col-sm-3 control-label">Length</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputLength" placeholder="Length">
                </div>
              </div>
              <div class="form-group">
                <label for="inputinteriorvolume" class="col-sm-3 control-label">Interior Volume</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputinteriorvolume" placeholder="Interior Volume"></input>
                </div>
              </div>
              <div class="form-group">
                <label for="inputpassengervolume" class="col-sm-3 control-label">Passenger Volume</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputpassengervolume" placeholder="Passenger Volume">
                </div>
              </div>
             <div class="form-group">
                <label for="inputcargovolume" class="col-sm-3 control-label">Cargo Volume</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputcargovolume" placeholder="Cargo Volume">
                </div>
              </div>
              <div class="form-group">
                <label for="inputgroudclearance" class="col-sm-3 control-label">Ground Clearance</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputgroudclearance" placeholder="Ground Clearance">
                </div>
              </div>
               <div class="form-group">
                <label for="inputbedlength" class="col-sm-3 control-label">Bed Length</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputbedlength" placeholder="Bed Length">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputcurbweight" class="col-sm-3 control-label">Curb Weight</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputcurbweight" placeholder="Crub Weight">
                </div>
              </div>

              <div class="form-group">
                <label for="inputgrossweight" class="col-sm-3 control-label">Gross Weight</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputgrossweight" placeholder="Gross Weight">
                </div>
              </div>
              <div class="form-group">
                <label for="inputtowingcapacity" class="col-sm-3 control-label">Towing Capacity</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputtowingcapacity" placeholder="Towing Capacity">
                </div>
              </div>
              <div class="form-group">
                <label for="inputepacity" class="col-sm-3 control-label">EPA(City)</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputepacity" placeholder="EPA(City)">
                </div>
              </div>
              <div class="form-group">
                <label for="inputepahighway" class="col-sm-3 control-label">EPA(Highway)</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputepahighway" placeholder="EPA(Highway)">
                </div>
              </div>
              <div class="form-group">
                <label for="inputepacombined" class="col-sm-3 control-label">EPA(Compined)</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputepacombined" placeholder="EPA(Compined)">
                </div>
              </div>
              <div class="form-group">
                <label for="inputmaxpayload" class="col-sm-3 control-label">Maximum Payload</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputmaxpayload" placeholder="Maximum Payload">
                </div>
              </div>

              
              <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-danger">Save</button>
                </div>
              </div>
            </form>

           

            
          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="engine">
             <form class="form-horizontal">
              <div class="form-group">
                <label for="inputWidth" class="col-sm-3 control-label">Engine Summary</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputWidth" placeholder="Engine Summary">
                </div>
              </div>
              <div class="form-group">
                <label for="inputHeight" class="col-sm-3 control-label">Brand</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputHeight" placeholder="Brand">
                </div>
              </div>
              <div class="form-group">
                <label for="inputLength" class="col-sm-3 control-label">Aspiration</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputLength" placeholder="Aspiration">
                </div>
              </div>
              <div class="form-group">
                <label for="inputinteriorvolume" class="col-sm-3 control-label">Block Type</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputinteriorvolume" placeholder="Block Type"></input>
                </div>
              </div>
              <div class="form-group">
                <label for="inputpassengervolume" class="col-sm-3 control-label">Bore</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputpassengervolume" placeholder="Bore">
                </div>
              </div>
             <div class="form-group">
                <label for="inputcargovolume" class="col-sm-3 control-label">Cam Type</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputcargovolume" placeholder="Cam Type">
                </div>
              </div>
              <div class="form-group">
                <label for="inputgroudclearance" class="col-sm-3 control-label">Compression</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputgroudclearance" placeholder="Compression">
                </div>
              </div>
               <div class="form-group">
                <label for="inputbedlength" class="col-sm-3 control-label">Cylinders</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputbedlength" placeholder="Cylinders">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputcurbweight" class="col-sm-3 control-label">Displacement</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputcurbweight" placeholder="Displacement">
                </div>
              </div>

              <div class="form-group">
                <label for="inputgrossweight" class="col-sm-3 control-label">Fuel Induction</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputgrossweight" placeholder="Fuel Inductiont">
                </div>
              </div>
              <div class="form-group">
                <label for="inputtowingcapacity" class="col-sm-3 control-label">Fuel Quality</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputtowingcapacity" placeholder="Fuel Quality">
                </div>
              </div>
              <div class="form-group">
                <label for="inputepacity" class="col-sm-3 control-label">Max HP</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputepacity" placeholder="Max HP">
                </div>
              </div>
              <div class="form-group">
                <label for="inputepahighway" class="col-sm-3 control-label">Max Torque</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputepahighway" placeholder="Max Torque">
                </div>
              </div>
              <div class="form-group">
                <label for="inputepacombined" class="col-sm-3 control-label">Redline Rpm</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputepacombined" placeholder="Redline Rpm">
                </div>
              </div>
              <div class="form-group">
                <label for="inputmaxpayload" class="col-sm-3 control-label">Stroke</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputmaxpayload" placeholder="Stroke">
                </div>
              </div>
              <div class="form-group">
                <label for="inputmaxpayload" class="col-sm-3 control-label">Valves</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputmaxpayload" placeholder="Valves">
                </div>
              </div>
              <div class="form-group">
                <label for="inputmaxpayload" class="col-sm-3 control-label">Transmission Summary</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputmaxpayload" placeholder="Transmission Summary">
                </div>
              </div>
              <div class="form-group">
                <label for="inputmaxpayload" class="col-sm-3 control-label">Trasmission Brand</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputmaxpayload" placeholder="Trasmission Brand">
                </div>
              </div>
              <div class="form-group">
                <label for="inputmaxpayload" class="col-sm-3 control-label">Transmission Type</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputmaxpayload" placeholder="Transmission Type">
                </div>
              </div>
               <div class="form-group">
                <label for="inputmaxpayload" class="col-sm-3 control-label">Traasmission Gears</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputmaxpayload" placeholder="Traasmission Gears">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-danger">Save</button>
                </div>
              </div>
            </form>

           

            
          </div>
          <!-- Tab Pane-->
          
           <div class="tab-pane" id="wheel">
             <form class="form-horizontal">
              <div class="form-group">
                <label for="inputWidth" class="col-sm-3 control-label">Drive Type</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputWidth" placeholder="Drive Type">
                </div>
              </div>
              <div class="form-group">
                <label for="inputHeight" class="col-sm-3 control-label">Break System</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputHeight" placeholder="Break System">
                </div>
              </div>
              <div class="form-group">
                <label for="inputLength" class="col-sm-3 control-label">Front Track Width</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputLength" placeholder="Front Track Width">
                </div>
              </div>
              <div class="form-group">
                <label for="inputinteriorvolume" class="col-sm-3 control-label">Rear Track Width</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputinteriorvolume" placeholder="Rear Track Width"></input>
                </div>
              </div>
              <div class="form-group">
                <label for="inputpassengervolume" class="col-sm-3 control-label">Wheel Base</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputpassengervolume" placeholder="Bore">
                </div>
              </div>
             <div class="form-group">
                <label for="inputfrontwheeldia" class="col-sm-3 control-label">Front Wheel Diameter</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputcargovolume" placeholder="Front Wheel Diameter">
                </div>
              </div>
              <div class="form-group">
                <label for="inputgroudclearance" class="col-sm-3 control-label">Rear Wheel Diameter</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputgroudclearance" placeholder="Rear Wheel Diameter">
                </div>
              </div>
               <div class="form-group">
                <label for="inputbedlength" class="col-sm-3 control-label">Rear Axil</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputbedlength" placeholder="Rear Axil">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputcurbweight" class="col-sm-3 control-label">Front Tyre Type</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputcurbweight" placeholder="Front Tyre Type">
                </div>
              </div>

              <div class="form-group">
                <label for="inputgrossweight" class="col-sm-3 control-label">Front Tyre PSI</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputgrossweight" placeholder="Front Tyre PSI">
                </div>
              </div>
              <div class="form-group">
                <label for="inputtowingcapacity" class="col-sm-3 control-label">Rear Tyre Type</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputtowingcapacity" placeholder="Rear Tyre Type">
                </div>
              </div>
              <div class="form-group">
                <label for="inputepacity" class="col-sm-3 control-label">Rear Tyre PSI</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputepacity" placeholder="Rear Tyre PSI">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-danger">Save</button>
                </div>
              </div>
            </form>

           

            
          </div>
          <!-- Tab Pane-->
          
          
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-red">
                      10 Feb. 2014
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                  <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-user bg-aqua"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                  </h3>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-comments bg-yellow"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-green">
                      3 Jan. 2014
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-camera bg-purple"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                  <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                  <div class="timeline-body">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="limits">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputspeedlimit" class="col-sm-3 control-label">Speed Limit</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputspeedlimit" placeholder="Speed Limit">
                </div>
              </div>
              <div class="form-group">
                <label for="inputbatteryvoltage" class="col-sm-3 control-label">Battery Voltage</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputbatteryvoltage" placeholder="Battery Voltage">
                </div>
              </div>
              <div class="form-group">
                <label for="inputaccelarationlimit" class="col-sm-3 control-label">Accelaration Limit</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputaccelarationlimit" placeholder="Accelaration Limit">
                </div>
              </div>
              <div class="form-group">
                <label for="inputbreakinglimit" class="col-sm-3 control-label">Breaking Limit</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputbreakinglimit" placeholder="Breaking Limit"></input>
                </div>
              </div>
              <div class="form-group">
                <label for="inputcrashlimit" class="col-sm-3 control-label">Crash Limit</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputcrashlimit" placeholder="Crash Limit">
                </div>
              </div>
              <div class="form-group">
                <label for="inputshutlimit" class="col-sm-3 control-label">Shunt Limit</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputshutlimit" placeholder="Shunt Limit">
                </div>
              </div>
              <div class="form-group">
                <label for="inputcontiniousruntime" class="col-sm-3 control-label">Continious Runtime</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputcontiniousruntime" placeholder="Continious Runtime">
                </div>
              </div>
              <div class="form-group">
                <label for="inputodometeroffset" class="col-sm-3 control-label">Odometer Offset</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputodometeroffset" placeholder="Odometer Offset">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-danger">Save</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="fuel">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputfueltype" class="col-sm-3 control-label">Fuel Type</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputfueltype" placeholder="Fuel Type">
                </div>
              </div>
              <div class="form-group">
                <label for="inputfuelquality" class="col-sm-3 control-label">Fuel Quality</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputfuelquality" placeholder="Fuel Quality">
                </div>
              </div>
              <div class="form-group">
                <label for="inputfueltank1capacity" class="col-sm-3 control-label">Fuel Tank1 Capacity</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputfueltank1capacity" placeholder="Fuel Tank1 Capacity">
                </div>
              </div>
              <div class="form-group">
                <label for="inputfueltank2capacity" class="col-sm-3 control-label">Fuel Tank2 Capacity </label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputfueltank2capacity" placeholder="Fuel Tank2 Capacity"></input>
                </div>
              </div>
              <div class="form-group">
                <label for="inputoilcapacity" class="col-sm-3 control-label">Oil Capacity</label>

                <div class="col-sm-9">
                  <input type="number" class="form-control" id="inputoilcapacity" placeholder="Oil Capacity">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-danger">Save</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
