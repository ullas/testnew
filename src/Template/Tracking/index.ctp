<style>
	.mptl-infoband{
		width:10px;
		height:120px;
	}
</style>
    
 
    <!-- Main content -->
    <section >
           
     
            <div class="mptl-map">
              <div id="map" style="height:100%; width: 100%;"></div>
              
            </div>
             <div class="row">
        <div class="col-md-3" style="padding-right:0;">
          <div class="info-box">
            <span class="info-box-icon bg-aqua mptl-infoband"></span>
            <div class="info-box">
            	<span style="padding-left:5px"><b>Vehicle Details</b></span>
            	<ul class="padding:0px">
            		<li>Name</li>
            		<li>Location</li>
            		<li>Odometer</li>
            		<li>Last updated</li>
            	</ul>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3" style="padding-right:0; padding-left:0">
          <div class="info-box">
            <span class="info-box-icon bg-green" style="width: 10px"></span>
             <span style="padding-left:5px"><b>Staus</b></span>
              <ul>
            		<li>Name</li>
            		<li>Location</li>
            		<li>Odometer</li>
            		<li>Last updated</li>
            	</ul>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3" style="padding-right:0; padding-left:0">
          <div class="info-box">
            <span class="info-box-icon bg-yellow" style="width: 10px"></span>
              <span style="padding-left:5px"><b>Odometer</b></span>
           
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3" style="padding-right:0; padding-left:0">
          <div class="info-box">
            <span class="info-box-icon bg-red" style="width: 10px"></span>
            <span style="padding-left:5px"><b>Driver</b></span>

            
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      
       
      
    </section>
    <!-- /.content -->
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
<?php $this->end(); ?>
