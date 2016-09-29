<style>
.irs-with-grid{
  height:52px
}
.pb-box{
  margin-bottom:1px;
  margin-top:-2px
}
.nopadding{
  padding:0
}
.btn-app{
  min-height:50px;
  height:50px;
  min-width:55px;
  padding:17px 5px;
  margin:0 0 5px 10px
}
.btn-app .fa{
  font-size:12px
}
#geo-marker{
    width: 10px; height: 10px;
    border: 1px solid #088;
    border-radius: 5px;
    background-color: #0b968f;
    opacity: 0.8;
    top:-100px;
}
</style>
    <!-- Main content -->
    <section >
        <div class="row">
        <div class="col-md-12">
          <div class="box pb-box">
              <div class="row " style="margin-top:5px">
               <div class="col-md-2 datepick" style="padding-left:25px">
                	    <input type="text" class="form-control" style="margin-top:5px">
                </div>
                <div class="col-md-4">
                  <input id="range_2" type="text" name="range_2"  data-type="double" data-step="0.5"  data-from="0" data-to="24" data-hasgrid="true">
                </div>

                 <div class="col-md-6">

		            <div class="box-body nopadding">

		              <a class="btn btn-app mptl-play">
		                <i class="fa fa-play"></i> Play
		              </a>
                  <!-- <a class="btn btn-app">
		                <i class="fa fa-pause"></i> Play
		              </a> -->
                  <a class="btn btn-app">
		                <i class="fa fa-repeat"></i> Repeat
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
              <div id="geo-marker"></div>
            </div>
    </section>
    <!-- /.content -->

<?php $this->Html->css([
    'AdminLTE./plugins/ionslider/ion.rangeSlider',
    'AdminLTE./plugins/ionslider/ion.rangeSlider.skinNice',
    'AdminLTE./plugins/bootstrap-slider/slider',
    'AdminLTE./plugins/bootstrap-datepicker/bootstrap-datepicker.min'
],
['block' => 'css']); ?>

<?php $this->Html->script([
    'AdminLTE./plugins/ionslider/ion.rangeSlider.min',
    'AdminLTE./plugins/bootstrap-slider/bootstrap-slider',
     'AdminLTE./plugins/bootstrap-datepicker/bootstrap-datepicker.min'
],
['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  function resizeMap()
{
}
var data=[
25.1929088,51.4572608,
25.1974816,51.4658432,
25.20128,51.4749568,
25.2050992,51.4840672,
25.208912,51.4932096,
25.2153776,51.5002368,
25.2225344,	51.5063072,
25.2292768,	51.5131232,
25.2353072,	51.5206272,
25.237384,	51.5305152,
25.2385184,	51.5404736,
25.2385184,	51.5404736,
25.2395216,	51.5499424,
25.241528,	51.5598016,
25.245648,	51.5684448,
25.2539152,	51.5640992,
25.2615904,	51.5587584,
25.2675872,	51.5512736,
25.2682224,	51.5506592,
25.27652,	51.552544,
25.2764976,	51.5525376,
25.2767712,	51.5524928,
25.2767712,	51.5524928,
25.2767872,	51.5524928,
25.2767872,	51.5525024,
25.2767856,	51.5525184,
25.2769696,	51.5525056,
25.2770112,	51.5525024,
25.2770048,	51.5525088,
25.2769984,	51.5525216,
25.2770848,	51.5525504,
25.2770736,	51.5525472,
25.2770848,	51.5525408,
25.2770848,	51.5525408,
25.2770848,	51.5525408,
25.2771104,	51.5528032,
25.2770976,	51.5528448,
25.27708,	51.5528448,
25.2770736,	51.5528256,
25.2770864,	51.5528256,
25.2770992,	51.5527968,
25.2772624,	51.5529568,
25.277256,	51.5530272,
25.2777952,	51.5531648,
25.2776816,	51.5538496,
25.2776816,	51.5538496,
25.2776864,	51.5538592,
25.2776848,	51.553856,
25.2776832,	51.5538336,
25.2776928,	51.5538048,
25.2776832,	51.5538048,
25.2776912,	51.5537792,
25.2777008,	51.5538208,
25.2776816,	51.5538176,
25.277712,	51.5537984,
25.2777104,	51.5538144,
25.2776832,	51.5538432,
25.2777152,	51.553856,
25.2776864,	51.5538336,
25.277696,	51.5538304,
25.2777152,	51.5538016,
25.2777296,	51.5538336,
25.27792,	51.5553344,
25.2780928,	51.5552128,
25.2780112,	51.5550496,
25.2778592,	51.5535424,
25.278128,	51.5524224,
25.2872144,	51.5513536,
25.292576,	51.546224,
25.2971744,	51.5496896,
25.2990336,	51.5535776,
25.3053488,	51.5510144,
25.3079936,	51.5582208,
25.3074832,	51.5585632,
25.3073984,	51.5584288,
25.3071216,	51.5577472,
25.307136,	51.5577664,
25.3071392,	51.5577472,
25.3071568,	51.5577664,
25.3071712,	51.5577312,
25.307192,	51.5577344,
25.3071552,	51.557744,
25.3072288,	51.5577856,
25.3071456,	51.557696,
25.3071424,	51.5576896,
25.3071568,	51.5577568,
25.3071536,	51.5577536,
25.307152,	51.5577568,
25.30716,	51.5577888,
25.30716,	51.5577888,
25.30716,	51.5577888,
25.3071744,	51.5577856,
25.3071856,	51.5577568,
25.3071664,	51.5577408,
25.3071232,	51.5576928,
25.3071424,	51.5575104,
25.3075296,	51.5570752,
25.3052032,	51.5508512,
25.2989248,	51.5531776,
25.298856,	51.5525728,
25.2993776,	51.5519136,
25.2993776,	51.5519136];
//a simulated path
var path = [
    
];
for(var i=0;i<data.length/2;i+=2){
  		   var p=ol.proj.transform([data[i+1],data[i]], 'EPSG:4326', 'EPSG:3857');
  		   path.push(p);
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
 var
	sourceFeatures = new ol.source.Vector(),
    layerFeatures = new ol.layer.Vector({
        source: sourceFeatures
    })
;
var lineString = new ol.geom.LineString([]);
var layerRoute =  new ol.layer.Vector({
    source: new ol.source.Vector({
        features: [
            new ol.Feature({ geometry: lineString })
        ]
    }),
    style: [
        new ol.style.Style({
            stroke: new ol.style.Stroke({
                width: 3, color: 'rgba(0, 0, 0, 1)',
                lineDash: [.1, 5]
            }),
            zIndex: 2
        })
    ],
    updateWhileAnimating: true
});
var map = new ol.Map({
    target: 'map',
    view: new ol.View({
        center: ol.proj.transform([51.4572608,25.1929088], 'EPSG:4326', 'EPSG:3857'),
        zoom: 16,
        minZoom: 2,
        maxZoom: 20
    }),
    layers: [
      new ol.layer.Tile({ 
          source: new ol.source.OSM(),
          opacity: 0.6
      }),
      layerRoute, layerFeatures
    ]
});
var markerEl = document.getElementById('geo-marker');
var marker = new ol.Overlay({
    positioning: 'center-center',
    offset: [0, 0],
    element: markerEl,
    stopEvent: false
});
map.addOverlay(marker);
var 
	fill = new ol.style.Fill({color:'rgba(255,255,255,1)'}),
    stroke = new ol.style.Stroke({color:'rgba(0,0,0,1)'}),
    style1 = [
        new ol.style.Style({
            image: new ol.style.Icon(({
                scale: .7, opacity: 1,
                rotateWithView: false, anchor: [0.5, 1],
                anchorXUnits: 'fraction', anchorYUnits: 'fraction',
                src: '//cdn.rawgit.com/jonataswalker/map-utils/' + 						'master/images/marker.png'
            })),
            zIndex: 5
        }),
        new ol.style.Style({
            image: new ol.style.Circle({
                radius: 6, fill: fill, stroke: stroke
            }),
            zIndex: 4
        })
    ]
;
var
	feature_start = new ol.Feature({
        geometry: new ol.geom.Point(path[0])
    }),
    feature_end = new ol.Feature({
        geometry: new ol.geom.Point(path[path.length - 1])
    })
;
feature_start.setStyle(style1);
feature_end.setStyle(style1);
sourceFeatures.addFeatures([feature_start, feature_end]);
lineString.setCoordinates(path);
var timer;
map.getView().fit(lineString.getExtent(), map.getSize());
//fire the animation
//map.once('postcompose', function(event) {
   
    
//});
var exppath=[];
var counter=0;
var distance=1000;
function callAnimate()
{
	counter=0;
	exppath=extrapolate();
	if(timer){
    	clearInterval(timer);
    }
    timer = setInterval(animation, 10);
}

function extrapolate()
{
	var i,
        len = path.length,
        chunkedLatLngs = [];

    for (i=1;i<len;i++) {
      var cur = path[i-1],
          next = path[i],
          dist = Math.sqrt((next[0]-cur[0])*(next[0]-cur[0]) + (next[1]-cur[1])*(next[1]-cur[1])),
          factor = distance / dist,
          dy = factor * (next[1] - cur[1]),
          dx = factor * (next[0] - cur[0]);

      if (dist > distance) {
        while (dist > distance) {
          cur = [cur[0] + dx, cur[1] + dy];
          dist = Math.sqrt((next[0]-cur[0])*(next[0]-cur[0])+ (next[1]-cur[1])*(next[1]-cur[1]));
          chunkedLatLngs.push(cur);
        }
      } else {
        chunkedLatLngs.push(cur);
      }
    }
    chunkedLatLngs.push(path[len-1]);

return chunkedLatLngs;
	
}

var animation = function(){
   
    
    marker.setPosition(exppath[counter]);
    counter++;
   
    //console.log("Called" +delx + ":"+dely);
};
  $(".mptl-play").click( function(){
  	 currentPos=0;
  	 start=0;
  	 callAnimate();
  });
  
    
</script>
<?php $this->end(); ?>