var req;
var lastResponse;
var tracking_timer;
var poll_active=0;
var webroot="/";
var duration = 3000;
var map;
var source;
var vector;
var stime=0;
var vlist;

function resizeMap()
{
	
	map.removeLayer(vector);
	
    setTimeout( function() { map.updateSize();map.addLayer(vector);}, 2000);
	
}

function selectTableItem(name,act){
 
 if(act){
	 $('#vlist td').filter(function(){
	    return $(this).text() === name;
	 }).parent().addClass("selected");
 }else{
 	
 	$('#vlist td').filter(function(){
	    return $(this).text() === name;
	 }).parent().removeClass("selected");
 }
  
}
function unSelectAllTableItem(){
 
 
 	$('#vlist td').parent().removeClass("selected");
 
  
}

function initMap(p,q)
{
	  
	  var h=$(".sidebar").height();
      $("#map").css("height",h +"px");
	 duration = 3000;
     map = new ol.Map({
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
          center: getPointFromLongLat(p,q),
          zoom: 4
        })
      });

       source = new ol.source.Vector({
        wrapX: false
      });
    
      
      

      iconSVG = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.032 47.032" style="enable-background:new 0 0 47.032 47.032;" xml:space="preserve" width="24px" height="24px"><g><path d="M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336   h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805z" fill="#005500"/></g></svg>';


	  imageElement = new Image();
	  imageElement.src = 'data:image/svg+xml,' + escape( iconSVG );

	  iconStyle = new ol.style.Style({
		    "image": new ol.style.Icon({
		        "img": imageElement,
		        "imgSize":[64, 64],
		        "anchor": [0.5, 0.5],
                "offset": [-20, -20]
		    })
		});
		
		iconSVG_sel = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.032 47.032" style="enable-background:new 0 0 47.032 47.032;" xml:space="preserve" width="24px" height="24px"><g><path d="M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336   h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805z" fill="#ff5500"/></g></svg>';


	  imageElement_sel = new Image();
	  imageElement_sel.src = 'data:image/svg+xml,' + escape( iconSVG_sel );

	  iconStyle_sel = new ol.style.Style({
		    "image": new ol.style.Icon({
		        "img": imageElement_sel,
		        "imgSize":[64, 64],
		        "anchor": [0.5, 0.5],
		        "offset": [-20, -20]
		    })
		});


       vector = new ol.layer.Vector({
        source: source,
        style :iconStyle
      });
      map.addLayer(vector); 


   /*   var select = new ol.interaction.Select({
        condition: ol.events.condition.pointerMove,
        style :iconStyle_sel
      });*/
     
     var select = new ol.interaction.Select({
        condition: ol.events.condition.click,
        style :iconStyle_sel
      });
      
      map.addInteraction(select);
      $(".mptl-trackdata").hide();
      select.on('select', function(e) {
        
             for(var i=0;i<e.selected.length;i++)
             {
             	 var feature = e.selected[i];
             	 var props=feature.getProperties();
             	 $("#vname").text(props['name']);
             	 $("#loc").text(props['location']);
             	 $("#loc").text(props['location']);
             	 $(".mptl-trackdata").show();
             	 $("html, body").animate({ scrollTop: $(document).height() }, 1000);
             	 selectTableItem(props['name'],true);
              }
              for(var i=0;i<e.deselected.length;i++)
              {
             	  var feature = e.deselected[i];
             	  var props=feature.getProperties();            	   
             	    selectTableItem(props['name'],false);
              }
             
             
      });
     
      

      source.on('addfeature', function(e) {
        flash(e.feature);
      });
        vlist=$('#vlist').DataTable({
	    // scrollY: 300,
         paging: true,
	     searching:true,
	     pagingType:'simple',
	     dom: '<"top">rt<"bottom"p><"clear">'
        });
        $('#vlist tbody').on( 'click', 'tr', function () {
           $(this).toggleClass('selected');
          if($(this).hasClass('selected')) {
           var id=$(this).children().first().html();
           var f =source.getFeatureById(id);
           var col = select.getFeatures();
			col.push(f);
		   }else{
		   	var id=$(this).children().first().html();
            var f =source.getFeatureById(id);
            var col = select.getFeatures();
            col.remove(f);
		   	
		   }
			
        } );
         
      
      
}
function getTextWidth ( _text, _fontStyle ) {

    var canvas = undefined,
        context = undefined,
        metrics = undefined;

    canvas = document.createElement( "canvas" )

    context = canvas.getContext( "2d" );

    context.font = _fontStyle;
    metrics = context.measureText( _text );

    return metrics.width;
}


function flash(feature) {
        var start = new Date().getTime();
        var listenerKey;
        var sta=feature.get('status');
        var c='rgba(255, 244, 0, ';
        if(sta==1){
        	c='rgba(255, 0, 0, ';
        }else if(sta==2){
        	c='rgba(0, 255, 0, ';
        }

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
                color: c + opacity + ')',
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


function trimString(data){
	 	if(!data){return data;}
		return data.replace(/^\s+|\s+$/g, "");
}
function checkForTracking(){
	
	if (tracking_timer != null) {
		clearTimeout(tracking_timer);
		tracking_timer = null;
	}
	poll_active++;
	
	
	
	var url = webroot + "tracking/livepoll/"+stime ;

	window.status = "Checking for update.... ";
	jQuery.get(url, {}, function(responseText){
		//responseText = getCleanResponse(responseText);
		poll_active--;
		inter = 3000;
		tracking_timer = setTimeout("checkForTracking()", inter);
		
		addTrackingPosition(responseText);
		
		window.status = "Done.";
	});
	
}
function getPointFromLongLat (long, lat) {
    return ol.proj.transform([long, lat], 'EPSG:4326', 'EPSG:3857')
}

function addTrackingPosition(responseText){
        console.log(responseText);
       var rt = jQuery.parseJSON(responseText);
       var obj=rt.data;
       stime=rt.stime;
     for(var i=0;i<obj.length;i++){
     	
     	var mobj=obj[i];
     	var id=mobj.id;
     	var f=source.getFeatureById(mobj['trackingobjects'].name);
     	
     	 if(!f){
	       
	     	 	var gm1=new ol.geom.Point(ol.proj.transform([mobj.longitude, mobj.latitude], 'EPSG:4326',
			  'EPSG:3857'));
			   var iconFeature = new ol.Feature({
			  	geometry:gm1 ,
			  	name: mobj['trackingobjects'].name,	
			  	location: mobj.location,	    
			  	status: 3
			});
			iconFeature.setId(mobj['trackingobjects'].name);
			source.addFeature(iconFeature);
			iconFeature.on('change', function(e) {
	           flash(e.target);
	           //console.log("Change");
	        });
	        vlist.row.add([mobj['trackingobjects'].name,mobj.location]).draw( false);
     	 }else{
     	 	//console.log("Updating...."+id);
     	 	var coord =getPointFromLongLat(mobj.longitude,mobj.latitude);
     	 	var geom = f.getGeometry();
     	 	//console.log(coord);
     	 	geom.setCoordinates(coord);
     	 }
     	
     }
       
  

	
}
function print(obj)
{
	var seen = [];

	var json = JSON.stringify(obj, function(key, val) {
	   if (typeof val == "object") {
	        if (seen.indexOf(val) >= 0)
	            return
	        seen.push(val)
	    }
	    return val
	});
	console.log(json);
}
