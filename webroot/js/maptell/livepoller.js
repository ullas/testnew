var req;
var lastResponse;
var tracking_timer;
var poll_active=0;
var webroot="/";
var duration = 3000;
var map;
var source;
var clusterLayer;
var stime=0;
var vlist;
var dragBox;
var filterd=[];
var styleCache = {};
var OBJECTLIST={};
var anim ;
var animTab = [];

function resizeMap()
{
	
	map.removeLayer(clusterLayer);
	 stime=0;
	var poll_active=0;
    setTimeout( function() { map.updateSize();map.addLayer(clusterLayer);}, 2000);
    
	
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
     $(".mptl-trackdata").hide();
     $("html, body").animate({ scrollTop: 0 }, 1000);
  
}


function initMap(p,q)
{
	  
	 // var h=$(".sidebar").height();
     // $("#map").css("height",h +"px");
	 duration = 3000;
     map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM({
              wrapX: false
            })
          })
        ],
        interactions: ol.interaction.defaults({mouseWheelZoom:true}),
        controls: ol.control.defaults({
          attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
            collapsible: false
          })
        }),
        target: 'map',
        view: new ol.View({
          center: getPointFromLongLat(p,q),
          zoom: 3
        })
      });

       source = new ol.source.Vector({
        wrapX: false
      });
      
      var clusterSource=new ol.source.Cluster({
			distance: 40,
			source: source
		});
      
      

      iconSVG = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.032 47.032" style="enable-background:new 0 0 47.032 47.032;" xml:space="preserve" width="24px" height="24px"><g><path d="M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336   h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805z" fill="#005500"/></g></svg>';


	  imageElement = new Image();
	  imageElement.src = 'data:image/svg+xml,' + escape( iconSVG );

	  
		
		iconSVG_sel = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.032 47.032" style="enable-background:new 0 0 47.032 47.032;" xml:space="preserve" width="24px" height="24px"><g><path d="M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336   h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805z" fill="#ff5500"/></g></svg>';


	  imageElement_sel = new Image();
	  imageElement_sel.src = 'data:image/svg+xml,' + escape( iconSVG_sel );

	   clusterLayer = new ol.layer.AnimatedCluster(
		{	name: 'Cluster',
			source: clusterSource,
			animationDuration: 700,
			// Cluster style
			style: getFeatureStyle
		});
		map.addLayer(clusterLayer);


        
  
     
       /////// Style for selection
		var img = new ol.style.Circle(
			{	radius: 5,
				stroke: new ol.style.Stroke(
				{	color:"rgba(255,0,0,1)", 
					width:1 
				}),
				fill: new ol.style.Fill(
				{	color:"rgba(0,255,0,1)"
				})
			});
		
		var style1 = new ol.style.Style( 
			{	 image: img,
				// Draw a link beetween points (or not)
				stroke: new ol.style.Stroke(
					{	color:"#fff", 
						width:1 
					}) 
			});
		var style0 = new ol.style.Style( 
			{	 image: img
				
			});
			
		/////////	
		var transparent = [0,0,0,0.01];
	var filltransparent = [0,0,0,0];
	var transparentStyle = 
	[	new ol.style.Style(
			{	image: new ol.style.RegularShape({ radius: 10, radius2: 5, points: 5, fill: new ol.style.Fill({ color: transparent }) }),
				stroke: new ol.style.Stroke({ color: transparent, width: 2 }),
				fill: new ol.style.Fill({ color: filltransparent})
			})
	];
	transparentStyle[0].getImage().getAnchor()[1] += 10;
		anim = new ol.featureAnimation.Bounce(
		{	duration: 800,
			hiddenStyle: transparentStyle
		});
		anim.on('animationend', function(e)
		{	if (!e.user) animTab[e.feature.get('nb')] = clusterLayer.animateFeature (e.feature, anim);
		});
			
	  iconSVG = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.032 47.032" style="enable-background:new 0 0 47.032 47.032;" xml:space="preserve" width="24px" height="24px"><g><path d="M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336   h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805z" fill="#005500"/></g></svg>';
      imageElement = new Image();
	  imageElement.src = 'data:image/svg+xml,' + escape( iconSVG );
	  
	  iconSVG_sel = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.032 47.032" style="enable-background:new 0 0 47.032 47.032;" xml:space="preserve" width="24px" height="24px"><g><path d="M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336   h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805z" fill="#ff5500"/></g></svg>';
      imageElement_sel = new Image();
	  imageElement_sel.src = 'data:image/svg+xml,' + escape( iconSVG_sel );
	  
	  
     
     // Select interaction to spread cluster out and select features
		var selectCluster = new ol.interaction.SelectCluster(
			{	// Point radius: to calculate distance between the features
				pointRadius:60,
				animate: true,
				 //featureStyle: style1,
				 style:getSelectedStyle
	        
			});
	  map.addInteraction(selectCluster);
	  
	  selectCluster.getFeatures().on(['add'], function (e)
		{	var c = e.element.get('features');
			if (c.length==1)
			{	var f = c[0];
			    var props=f.getProperties();
			    
             	 $("#vname").text(props['name']);
             	 $("#loc").text(props['location']);
             	 $("#loc").text(props['location']);
             	 $(".mptl-trackdata").show();
             	 selectTableItem(props['name'],true);
             	// map.render();
             	 // Create animation if doesn't exist
			/*if (!animTab[f.get('nb')])
			{	animTab[f.get('nb')] = clusterLayer.animateFeature (f, anim);
			}
			// Stop animation if playing 
			else if (animTab[f.get('nb')].isPlaying())
			{	animTab[f.get('nb')].stop({user: true});
			}
			else 
			{	animTab[f.get('nb')].start();
			}*/
			
          }	
			
			
		});
	    selectCluster.getFeatures().on(['remove'], function (e)
		{	
			var c = e.element.get('features');
			if (c.length==1){
				
				var feature = c[0];
				var props=feature.getProperties();            	   
            	selectTableItem(props['name'],false);
            	//animTab[feature.get('nb')].stop({user: false});
            	
            	
            }
		});
      
      dragBox = new ol.interaction.DragBox({
        condition: ol.events.condition.platformModifierKeyOnly
      });

      map.addInteraction(dragBox);
      
      
	dragBox.on('boxend', function() {
	
	    var extent = dragBox.getGeometry().getExtent();
        source.forEachFeatureIntersectingExtent(extent, function(f) {
          /* var col = selectCluster.getFeatures();
			col.push(f);
			var props=f.getProperties();
			selectTableItem(props['name'],true);
			$(".mptl-trackdata").show();*/
			// $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });
       
	
	});
      
      
      $(".mptl-trackdata").hide();
     

      source.on('addfeature', function(e) {
        flash(e.feature);
      });
        vlist=$('#vlist').DataTable({
	    // scrollY: 300,
	   /* columns:[
	      { "data": "name" },
          { "data": "location" }
	    ],*/
         paging: true,
	     searching:true,
	     pagingType:'simple',
	     dom: '<"top">rt<"bottom"p><"clear">'
        });
        var selections =[];
        $('#vlist tbody').on( 'click', 'tr', function () {
           $(this).toggleClass('selected');
           if($(this).hasClass("selected")){
           	   var id=$(this).children().first().html();
               var f=source.getFeatureById(id);
               
               map.getView().fit(f.getGeometry().getExtent(),map.getSize());
               
               
			   
			}
        } );
         
        $('input.table_search').on( 'keyup', function () {
            filterGlobal();
           
         } );
      
      
}



function filterGlobal () {
    
    $('#vlist').DataTable().column(0).search(
        $('#table_search').val()
     ).draw();
     source.clear();
     for (var key in OBJECTLIST) {
        var val=key.toUpperCase().search($('#table_search').val().toUpperCase());
        if(val>=0){
        	source.addFeature(OBJECTLIST[key]);
        }
     }
     
     
}
     


//Style for selected
function getSelectedStyle(feature,resolution)
{
	               var f=feature.get('features');
					var props=f[0].getProperties();
	        	   var r=props['heading']?props['heading']*0.01745329251:0;
	        	   var name=props['name']?props['name']:"";
				return new ol.style.Style({
			    "image": new ol.style.Icon({
			        "img": imageElement_sel,
			        'rotation':r,
			        "imgSize":[64, 64],
			        "anchor": [0.5, 0.5],
	                "offset": [-20, -20]
			    }),
			    text: new ol.style.Text(
						{	text: name,
							fill: new ol.style.Fill(
							{	color: '#ff0000'
							    
							 }),
                        stroke: new ol.style.Stroke({
                            color: '#fff',
                            width: 2
                        }),
                        scale:1.3,
					    offsetX:2,
					    offsetY:25,
						
				})
			   
			   });
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
	
	
	
	var url = webroot + "tracking/livepoll/"+stime+"/"+"q="+$('input.table_search').val() ;

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
      //  console.log(responseText);
       var rt = jQuery.parseJSON(responseText);
       var obj=rt.data;
       stime=rt.stime;
     for(var i=0;i<obj.length;i++){
     	
     	var mobj=obj[i];
     	var id=mobj.id;
     	var f=OBJECTLIST[mobj['trackingobjects'].name];
     
     	 if(!f){
	       
	     	 	var gm1=new ol.geom.Point(ol.proj.transform([mobj.longitude, mobj.latitude], 'EPSG:4326',
			  'EPSG:3857'));
			   var iconFeature = new ol.Feature({
			  	geometry:gm1 ,
			  	name: mobj['trackingobjects'].name,	
			  	location: mobj.location,
			  	heading:mobj.heading,	    
			  	status: mobj.status,
			  	
			});
			var name= mobj['trackingobjects'].name;
			iconFeature.setStyle(new ol.style.Style({
			    "image": new ol.style.Icon({
			        "img": imageElement,
			        'rotation':mobj.heading* 0.01745329251,
			        "imgSize":[64, 64],
			        "anchor": [0.5, 0.5],
	                "offset": [-20, -20]
			    }),
			     text: new ol.style.Text(
						{	text: name,
							fill: new ol.style.Fill(
							{	color: '#0000ff'
							    
							 }),
                        stroke: new ol.style.Stroke({
                            color: '#fff',
                            width: 2
                        }),
                        scale:1.3,
					    offsetX:2,
					    offsetY:25,
						
				})
			   }));
			OBJECTLIST[mobj['trackingobjects'].name]=iconFeature;
			iconFeature.setId(mobj['trackingobjects'].name);
			iconFeature.set("nb",id);
			source.addFeature(iconFeature);
			iconFeature.on('change', function(e) {
	          // flash(e.target);
	          
	           //console.log("Change");
	        });
	       
	        	
	        
	         var row=vlist.row.add([mobj['trackingobjects'].name,mobj.location]).draw().node();
	         
     	 }else{
     	 	
     	 	var of=source.getFeatureById(mobj['trackingobjects'].name);
     	 	var coord =getPointFromLongLat(mobj.longitude,mobj.latitude);
     	 	var geom = of.getGeometry();
     	 	of.setProperties['heading']=mobj.heading;
     	 	of.getStyle().getImage().setRotation( mobj.heading * 0.01745329251);
     	 	//console.log(of.getStyleFunction());
     	 	geom.setCoordinates(coord);
     	 	//of.change();
     	 	map.render();
     	 }
     	
     }
       
  

	
}
var animation=false;


	
function getFeatureStyle (feature, sel)

	{	
		var fs=feature.get('features');
		var size = feature.get('features').length;
		if(size==1){
				var f=feature.get('features');
					var props=f[0].getProperties();
	        	   var r=props['heading']?props['heading']*0.01745329251:0;
	        	   var name=props['name']?props['name']:"";
				return f[0].getStyle();
			   
			   
			}else{
		
		var parked=0,running=0,stopped=0,total=0;
		for(var i=0;i<fs.length;i++){
			var props=fs[i].getProperties();
			var s=props['status'];
			if(s==1)parked++;
			if(s==2)running++;
			if(s==3)stopped++;
			total++;
		}
		
		var k = "donut"+"-"+ "classic"+"-"+(sel?"1-":"")+(parked+running+stopped);
		var style = styleCache[k];
		if (!style) 
		{	var radius = 50;
			// area proportional to data size: s=PI*r^2
			
			 radius = 20* Math.sqrt (total / Math.PI);
			
			// Create chart style
			var c = 'classic';
			styleCache[k] = style = new ol.style.Style(
			{	image: new ol.style.Chart(
				{	type: 'donut', 
					radius: (sel?1.2:1)*radius, 
					offsetY:  0,
					data:  [parked,running,stopped], 
					colors:  c,
					rotateWithView: true,
					animation: animation,
					stroke: new ol.style.Stroke(
					{	color:  "#fff",
						width: 2
					}),
				}),
				text: new ol.style.Text(
						{	text: size.toString(),
							fill: new ol.style.Fill(
							{	color: '#ff0000'
							}),
							stroke: new ol.style.Stroke(
							{	color:  "#fff",
								width: 2
							}),
						})
			});
		}
		style.getImage().setAnimation(animation);
		return [style];
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

