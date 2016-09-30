var data=[
25.1929088,51.4572608,
25.2385184,	51.5404736,
25.2770048,	51.5525088,
25.2776864,	51.5538592,
25.2872144,	51.5513536,
25.30716,	51.5577888,
25.2993776,	51.5519136];
//a simulated path
var path = [
    
];
for(var i=0;i<data.length/2;i+=2){
  		   var p=ol.proj.transform([data[i+1],data[i]], 'EPSG:4326', 'EPSG:3857');
  		   path.push(p);
  		   
}

  function addData()
  {
  	 for(var i=0;i<path.length;i++){
  	 	 var f= feature_start = new ol.Feature({
            geometry: new ol.geom.Point(path[i])
         });
  	 	 addFeatureAt(f);
  	 	 console.log("Called add Data");
  	 }
  }

	
	// The map
	var map = new ol.Map({
    target: 'map',
    view: new ol.View({
        center: path[2],
        zoom: 12,
        minZoom: 2,
        maxZoom: 20
    }),
    layers: [
      new ol.layer.Tile({ 
          source: new ol.source.OSM(),
          opacity: 0.6
      })
    ]
});


	// Get font glyph
	var theGlyph = "fa-plane";
	
	
	function addFeatureAt(f)
	{	
		
		//var f, r = map.getView().getResolution() *10;
		////f = new ol.Feature(new ol.geom.Point(p));
		f.on('click',function(e){
			
			
		});
		vectorSource.addFeature(f);
		vector.animateFeature (f, 
			[	new ol.featureAnimation['Drop'](
				{	speed: 0.8, 
					duration:1000-240,
					side: false
				}),
				new ol.featureAnimation['Bounce'](
				{	speed: 0.8, 
					duration: 1000-240,
					horizontal: false
				})
			]);
		
	}

	// Style function
	function getDelectedFeatureStyle (feature,r)
	{	var st= [];
		// Shadow style
		var p=new ol.style.Style(
					{	image: new ol.style.Shadow(
						{	radius: 15,
							blur: 5,
							offsetX: 0,
							offsetY: 0,
							fill: new ol.style.Fill(
							{	color: "rgba(0,0,0,0.5)"
							})
						})
					});
		st.push(p);
		// Font style
		st.push ( new ol.style.Style(
					{	image: new ol.style.FontSymbol(
						{	form: "poi", 
							gradient: true,
							glyph: theGlyph, 
							fontSize: 1,
							radius: 16, 
							//offsetX: -15,
							rotation: 0,
							rotateWithView: false,
							offsetY: -16,
							color: 'white',
							fill: new ol.style.Fill(
							{	color: 'red'
							}),
							stroke: new ol.style.Stroke(
							{	color: 'white',
								width: 1
							})
						}),
						stroke: new ol.style.Stroke(
						{	width: 2,
							color: '#f80'
						}),
						fill: new ol.style.Fill(
						{	color: [255, 0, 0, 0.6]
						})
					}));
			return st;
	}

	
	
	// Style function
	function getFeatureStyle (feature)
	{	var st= [];
		// Shadow style
		var p=new ol.style.Style(
					{	image: new ol.style.Shadow(
						{	radius: 15,
							blur: 5,
							offsetX: 0,
							offsetY: 0,
							fill: new ol.style.Fill(
							{	color: "rgba(0,0,0,0.5)"
							})
						})
					});
		st.push(p);
		// Font style
		st.push ( new ol.style.Style(
					{	image: new ol.style.FontSymbol(
						{	form: "poi", 
							gradient: true,
							glyph: theGlyph, 
							fontSize: 1,
							radius: 16, 
							//offsetX: -15,
							rotation: 0,
							rotateWithView: false,
							offsetY: -16,
							color: 'white',
							fill: new ol.style.Fill(
							{	color: 'green'
							}),
							stroke: new ol.style.Stroke(
							{	color: 'white',
								width: 1
							})
						}),
						stroke: new ol.style.Stroke(
						{	width: 2,
							color: '#f80'
						}),
						fill: new ol.style.Fill(
						{	color: [255, 0, 0, 0.6]
						})
					}));
			return st;
	}

	function getStyle(feature, resolution) 
	{	var s = getFeatureStyle(feature);
		// Ne pas recalculer
		//feature.setStyle(s);
		return s;
		
	};

	// GeoJSON layer
	var vectorSource = new ol.source.Vector({
        wrapX: false
      });

	var vector = new ol.layer.Vector(
	{	name: '1914-18',
		
		source: vectorSource,
		// y ordering
		renderOrder: ol.ordering.yOrdering(),
		style: getStyle()
	});

	map.addLayer(vector);
    var select_interaction = new ol.interaction.Select({
    	
    	style: getDelectedFeatureStyle
    });
    
	select_interaction.getFeatures().on("add", function (e) { 
         var feature = e.element; //the feature selected
         toastr.info('Alert Clicked..');
     });

     map.addInteraction(select_interaction);

	// Redraw layer when fonts are loaded
	$(window).on("load", function(){ console.log("loaded"); addData(); });
	