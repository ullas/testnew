
     <section class="content-header" style="margin-bottom: 20px">
     	
      <h1>
        Play Back
        <small>Histoty is a collections on mistakes and misfortues....</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>


    <!-- Main content -->
    <section >
           <div class="row">
        <div class="col-sm-12">
          <div class="box box-primary" style="margin-bottom:0px">
           
           
           
              <div class="row " style="margin-top:8px">
                
               <div class="col-sm-2 datepick" style="padding-left:20px">
                	    <input type="text" class="form-control" style="margin-top:15px">
                </div>
                <div class="col-sm-4">
                  <input id="range_2" type="text" name="range_2"  data-type="double" data-step="0.5"  data-from="0" data-to="24" data-hasgrid="true">
                </div>
                
                 <div class="col-sm-6">
                 	
		            <div class="box-body" style="padding-bottom:0px">
		             
		              <a class="btn btn-app">
		                <i class="fa fa-play"></i> Play
		              </a>
		              
		              <a class="btn btn-app">
		                <i class="fa fa-backward"></i> Rewind
		              </a>
		              <a class="btn btn-app">
		                <i class="fa fa-forward"></i> Forward
		              </a>
		              
		            </div>
		           
                </div>
              </div>
             
             
          
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     
            <div class="mptl-map">
              <div id="map" style="height: 100%; width: 100%;"></div>
            </div>
           
      
    </section>
    <!-- /.content -->
    
<?php $this->Html->css([
    'AdminLTE./plugins/ionslider/ion.rangeSlider',
    'AdminLTE./plugins/ionslider/ion.rangeSlider.skinNice',
    'AdminLTE./plugins/bootstrap-slider/slider',
    'AdminLTE./plugins/bootstrap-slider/slider',
    'AdminLTE./plugins/bootstrap-datepicker/bootstrap-datepicker.min'
], 
['block' => 'css']); ?>

<?php $this->Html->script([
    'AdminLTE./plugins/ionslider/ion.rangeSlider.min',
    'AdminLTE./plugins/bootstrap-slider/bootstrap-slider',
     'AdminLTE./plugins/bootstrap-datepicker/bootstrap-datepicker.min',
     '/js/ol/ext/shadowstyle',
     '/js/ol/ext/featureanimation/featureanimation',
     '/js/ol/ext/featureanimation/pathanimation'
], 
['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  function resizeMap()
{
	
	
	
}
  $(function () {
   
    $('.datepick input').datepicker({
    });
    
  var slider=  $("#range_2").ionRangeSlider({
    min: 0,
    max: 24,
   
    grid: true,
    grid_num: 1,
    postfix: 'hr'
    
   });

    var updateSliderScale;
$(window).resize(function(){
    clearTimeout(updateSliderScale);
    updateSliderScale = setTimeout(function(){
        $(slider).ionRangeSlider('update');
    }, 100);
});

    
    
  });
  var map= new ol.Map({
    layers: [
      new ol.layer.Tile({source: new ol.source.OSM()})
    ],
    view: new ol.View({
      center: [0, 0],
      zoom: 3
    }),
     interactions: ol.interaction.defaults({mouseWheelZoom:false}),
    target: 'map'
  });
  
  
  var play = function(event) {
        var vectorContext = event.vectorContext;
        var frameState = event.frameState;
        vectorContext.setStyle(style);

        var features = source.getFeatures();
        for (var i = 1; i < features.length; i++) {
          var feature1 = features[i-1];
          var feature2 = features[i-1];
            // only draw the lines for which the animation has not finished yet
            var coords1 = feature1.getGeometry().getCoordinates();
            var coords2 = feature2.getGeometry().getCoordinates();

            
            var currentLine = new ol.geom.LineString([coords1,coords2]);

            // directly draw the line with the vector context
            vectorContext.drawGeometry(currentLine);
          
        }
        // tell OL3 to continue the animation
        map.render();
      };
  
     source = new ol.source.Vector({
        wrapX: false,
        attributions: 'Flight data by ' +
              '<a href="http://openflights.org/data.html">OpenFlights</a>,',
        loader: function() {
          var url = '/playback/livepoll';
          fetch(url).then(function(response) {
            return response.json();
          }).then(function(json) {
            var flightsData = json.flights;
            for (var i = 0; i < flightsData.length; i++) {
              var flight = flightsData[i];
              var from = flight[0];
              var to = flight[1];

              
                // add the feature with a delay so that the animation
                // for all features does not start at the same time
                addLater(feature, i * 50);
              }
            }
            map.on('postcompose', play);
          });
        }
      });

      var vectorLayer = new ol.layer.Vector({
        source: source,
        style:
        }
      });
      map.addLayer(vectorLayer);
  
</script>
<?php $this->end(); ?>    
    
    
 
