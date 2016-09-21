<style>
	.mptl-infoband{
		width:10px;
		height:120px;
	}
	.odo-widget{
		padding-bottom: 1px;
		height:32px;
	}
	.odo-widget .odo-val, .odo-widget .odo-fraction {
    width: 16px;
    height: 16px;
		padding-bottom: 20px;
    display: inline-block;
    background-color: #222D32;
		border: 1px solid #222D32;
    text-align: center;
    color: #fff;
    cursor: default;
}
.odo-widget .odo-fraction {
		border: 1px solid #222D32;
    color: #222D32;
    background-color: #fff;
}

.odo-widget .odo-unit{
		position: absolute;
		padding-top:2px
}

.odo-widget .odo-unit .odo-unit-convert{
		display: block;
}

.trackbox{
	border-radius: 0px;
	border-top: 0px;
	margin-bottom:0px;
}
.trackbox {
    position: relative;
    background: #ffffff;
    border-top: 1px solid #d2d6de;
    margin-bottom: 5px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}

.lowpad{
	padding:5px;
}

/*
 * Component: Info Box small
 * -------------------
 */
.info-box-sm {
  display: block;
  min-height: 40px;
  background: #fff;
  width: 100%;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  border-radius: 2px;
  margin-bottom: 5px;
}
.info-box-sm .progress {
  background: rgba(0, 0, 0, 0.2);
  margin: 5px -10px 5px -10px;
  height: 2px;
}
.info-box-sm .progress,
.info-box-sm .progress .progress-bar {
  border-radius: 0;
}
.info-box-sm .progress .progress-bar {
  background: #fff;
}
.info-box-sm-icon {
  border-top-left-radius: 2px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 2px;
  display: block;
  float: left;
  height: 45px;
  width: 45px;
  text-align: center;
  font-size: 45px;
  line-height: 45px;
  background: rgba(0, 0, 0, 0.2);
}
.info-box-sm-icon > img {
  max-width: 100%;
}
.info-box-sm-content {
  padding: 5px 10px;
  margin-left: 40px;
}
.info-box-sm-number {
  display: block;
  font-weight: bold;
  font-size: 12px;
}

.info-box-sm-text {
  display: block;
  font-size: 12px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.info-box-sm-text {
  text-transform: uppercase;
}
.info-box-sm-more {
  display: block;
}
.progress-description {
  margin: 0;
}

.products-list .product-info {
    margin-left: 30px;
}

/*
 * Component: Alert small
 * -------------------
 */
 .alert-small{
	 padding: 5px;
	 margin-bottom: 2px;
	 border-radius: 3px;
 }

</style>


    <!-- Main content -->
    <section>
			<!-- Map content -->
			<div class="mptl-map">
				<div id="map" style="height:100%; width: 100%;"></div>
			</div>
		</section>
		<section class="content">
			<!-- /.row -->
			<div class="row">
					<div class="trackbox">
							<!-- /.Details Box-->
						<div class="box-body">
								<!-- /.details box body-->
							<div class="row">
								<div class="col-md-12 infoSortable list-inline" style="min-width:190px">
  							<div class="col-md-3 ui-sortable">
									<div class="box box-success">
										<div class="box-header lowpad" style="cursor:move;">
											<h3 class="box-title">Vehicle</h3>
											<div class="box-tools pull-right">
                			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                			<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              				</div>
										</div>
										<div class="box-body lowpad">
											<ul class="todo-list">
												<li class="text-blue" style="font-weight:bold">
													Samantha Hyundai
												</li>
													<li><i class="icon fa fa-map text-light-blue"></i>
														<span>Sunny Meads Lane, Bakery Jn, Thiruvananthapuram, Kerala</span>
													</li>
													<li><span><i class="fa fa-circle text-green"></i>
														<span>Online</span></span>
														<span><i class="fa fa-compass text-green"></i>
															<span>GPS: 75%</span></span>
															<span><i class="fa fa-signal text-green"></i>
																<span>GSM: 65%</span></span>
													</li>
												<li>
													<ul class="list-inline odo-widget">
													<i class="icon fa fa-dashboard text-light-blue"></i>
													<li class="odo-val">0</li>
													<li class="odo-val">1</li>
													<li class="odo-val">3</li>
													<li class="odo-val">2</li>
													<li class="odo-val">6</li>
													<li class="odo-val">9</li>
													<li class="odo-fraction">5</li>
													<li class="odo-unit">
														km
														<a href="#" class="odo-unit-convert">mi</a>
													</li>
												</ul></li>
												<li>
													<div>
														<div class="info-box-sm">
            <span class="info-box-sm-icon bg-aqua"><i class="ion ion-ios-clock-outline"></i></span>

            <div class="info-box-sm-content">
              <span class="info-box-sm-text">Last Updated</span>
              <span class="info-box-sm-number"><small>20-01-2016,</small>05:34:00 AM</span>
            </div>
            <!-- /.info-box-content -->
          </div>
													</div>
												</li>
											</ul>
											</div>
												</div>
								</div>
  						<div class="col-md-3 ui-sortable">
								<div class="box box-warning">
									<div class="box-header lowpad" style="cursor:move;">
										<h3 class="box-title">Driver</h3>
										<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
										</div>
									</div>
									<div class="box-body lowpad">
										<div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Chan Chong</h3>
              <h5 class="widget-user-desc">Driver ID</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="/admin_l_t_e/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">210 km</h5>
                    <span class="description-text">TOTAL DISTANCE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">8 HRS</h5>
                    <span class="description-text">TOTAL RUNTIME</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">88</h5>
                    <span class="description-text">DRIVER SCORE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
								</div>
								</div>
							</div>
  					<div class="col-md-3 ui-sortable">
							<div class="box box-danger">
								<div class="box-header lowpad" style="cursor:move;">
										<h3 class="box-title">Sensors</h3>
										<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
										</div>
									</div>
									<div class="box-body lowpad">
										<ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <i class="fa fa-tint fa-lg text-blue"></i>
                  </div>
                  <div class="product-info">
                    Fuel Level
                      <span class="label label-warning pull-right">45 L</span>
                        <span class="product-description">
                          Latest fuel level
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <i class="fa fa-arrow-right fa-lg text-green"></i>
                  </div>
                  <div class="product-info">
                    Inputs
										<span class="pull-right">
										 <small class="label label-success">0</small>
											<small class="label label-danger">4</small>
										</span>
                        <span class="product-description">
                          Digital and analogue Input.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <i class="fa fa-arrow-left fa-lg text-yellow"></i>
                  </div>
                  <div class="product-info">
                    Outputs
										<span class="pull-right">
										 <small class="label label-success">3</small>
											<small class="label label-danger">1</small>
										</span>
                        <span class="product-description">
                          Active outputs.
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <i class="fa fa-flash fa-lg text-teal"></i>
                  </div>
                  <div class="product-info">
                    Sensors
										<span class="pull-right">
										 <small class="label label-primary">1</small>
										</span>
                        <span class="product-description">
                          <span>Temperature Sensor <small class="label label-default">5&deg;C</small></span>
													<span class="pull-right">

													</span>
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
										</div>
									</div>
						</div>
						<div class="col-md-3 ui-sortable">
							<div class="box box-primary">
								<div class="box-header lowpad" style="cursor:move;">
										<h3 class="box-title">Events</h3>
										<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
										</div>
									</div>
									<div class="box-body lowpad">
										<div class="alert-small alert-danger">
                <i class="icon fa fa-battery-empty"></i>
                Vehicle battery needs to be replaced. Maintenance pending.
              </div>
              <div class="alert-small alert-info">
								<i class="icon fa fa-hand-grab-o "></i>
                The parcel is ready for pickup at Point blank, Jawahar Nagar.
              </div>

              <div class="alert-small alert-warning">
                <i class="icon fa fa-warning"></i>
                Warning alert preview.
              </div>

              <div class="alert-small alert-success">
                <i class="icon fa fa-check"></i>
                Successfully delivered parcel at Nila, Technopark.
              </div>
							<div class="alert-small alert-danger">
								<i class="icon fa fa-bell"></i>
								Heavy acceleration NH 60 Bypass, Venpalavattom, Thiruvananthapuram.
							</div>
										</div></div>
						</div>
					</div>
								</div>
					</div>
						<!-- /.details-->
				</div>
					</div>
			<!-- /.row -->
			</section>

		<!-- /.content class content-->


<?php $this->start('scriptBotton'); ?>
   <script>
     var duration = 3000;
    var map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM({
              wrapX: false
            })
          })
        ],
        interactions: ol.interaction.defaults({mouseWheelZoom:false}),
        controls: ol.control.defaults({
          attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
            collapsible: false
          })
        }),
        target: 'map',
        view: new ol.View({
          center: [0, 0],
          zoom: 1
        })
      });

      var source = new ol.source.Vector({
        wrapX: false
      });
      iconSVG = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.032 47.032" style="enable-background:new 0 0 47.032 47.032;" xml:space="preserve" width="24px" height="24px"><g><path d="M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336   h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805z" fill="#00AA00"/></g></svg>';


	  imageElement = new Image();
	  imageElement.src = 'data:image/svg+xml,' + escape( iconSVG );

	  iconStyle = new ol.style.Style({
		    "image": new ol.style.Icon({
		        "img": imageElement,
		        "imgSize":[64, 64],
		        "anchor": [0.5, 0.5],
		        "rotation": 90,
		        "offset": [-20, -20]
		    })
		});


      var vector = new ol.layer.Vector({
        source: source,
        style :iconStyle
      });
      map.addLayer(vector);




      function flash(feature) {
        var start = new Date().getTime();
        var listenerKey;

        function animate(event) {
          var vectorContext = event.vectorContext;
          var frameState = event.frameState;
          var flashGeom = feature.getGeometry().clone();
          var elapsed = frameState.time - start;
          var elapsedRatio = elapsed / duration;
          // radius will be 5 at start and 30 at end.
          var radius = ol.easing.easeOut(elapsedRatio) * 25 + 5;
          var opacity = ol.easing.easeOut(1 - elapsedRatio);

          var style = new ol.style.Style({
            image: new ol.style.Circle({
              radius: radius,
              snapToPixel: false,
              stroke: new ol.style.Stroke({
                color: 'rgba(255, 244, 0, ' + opacity + ')',
                width: 0.25 + opacity
              })
            })
          });

          vectorContext.setStyle(style);
          vectorContext.drawGeometry(flashGeom);
          if (elapsed > duration) {
            ol.Observable.unByKey(listenerKey);
            return;
          }
          // tell OL3 to continue postcompose animation
          map.render();
        }
        listenerKey = map.on('postcompose', animate);
      }

      source.on('addfeature', function(e) {
        flash(e.feature);
      });


	var iconFeature = new ol.Feature({
	  geometry: new ol.geom.Point(ol.proj.transform([-72.0704, 46.678], 'EPSG:4326',
	  'EPSG:3857')),
	  name: 'Null Island',
	  population: 4000,
	  rainfall: 500
	});

	var iconFeature1 = new ol.Feature({
	  geometry: new ol.geom.Point(ol.proj.transform([-73.1234, 45.678], 'EPSG:4326',
	  'EPSG:3857')),
	  name: 'Null Island Two',
	  population: 4001,
	  rainfall: 501
	});

	source.addFeature(iconFeature);
	source.addFeature(iconFeature1);
      </script>

			<script>
			$(function() {

			    $('.infoSortable').sortable({
			        items: '.ui-sortable'
			    });

			});
</script>

<?php $this->end(); ?>
