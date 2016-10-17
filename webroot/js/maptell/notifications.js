var data=[
25.1929088,51.4572608,
25.2385184,	51.5404736,
25.2770048,	51.5525088,
25.2776864,	51.5538592,
25.2872144,	51.5513536,
25.30716,	51.5577888,
25.2993776,	51.5519136];
var theGlyph = "fa-plane";
var map;
var vector;
var vectorSource;
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
  	 	 var f=  new ol.Feature({
            geometry: new ol.geom.Point(path[i]),
            alertcat_id:i
         });
  	 	 addFeatureAt(f);

  	 }
  }
  var counter=1;
  function addLater(f){

  	setTimeout(function()
				{	addFeatureAt(f);
				}, 100*counter);
	counter++;
  }

  function addFeatureAt(f)
	{


		vectorSource.addFeature(f);
		vector.animateFeature (f,
			[	new ol.featureAnimation['Throw'](
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

	function getGlyph(feature)
	{
		console.log("Calling..."+feature);
		var props=feature.getProperties();
		var id=props['alertcat_id'];
		if(id){

			switch(id){

				case 1:
				   return "fa-battery-1";
				   break;
				case 2:
				   return "fa-exchange";
				   break;
				case 3:
				   return "fa-unlock";
				   break;
				case 4:
				   return "fa-clock-o";
				case 4:
				   return "fa-long-arraow-up";
				case 5:
				   return "fa-bed";

				 case 6:
				   return "maki-fuel";
				   break;
				case 7:
				   return "info-circle";
				   break;
				case 8:
				   return "fa-long-arraow-down";
				   break;


				 default :
				   return "fa-battery-1";
				   break;
			}

		}
		  return "fa-flight";

	}

	// Style function
	function getSelectedFeatureStyle (feature,r)
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
							glyph: getGlyph(feature),
							fontSize: 0.5,
							radius: 20,
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
							glyph: getGlyph(feature),
							fontSize: 0.5,
							radius: 20,
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

	function init(){
	// The map
	 map = new ol.Map({
    target: 'map',
    view: new ol.View({
        center: path[2],
        zoom: 12,
        minZoom: 3,
        maxZoom: 20
    }),
     interactions: ol.interaction.defaults({mouseWheelZoom:false}),
	layers: [
	      new ol.layer.Tile({
	          source: new ol.source.OSM(),
	          title: "OSM",
			  baseLayer: true
	      })
	    ]
	});

    map.addControl (new ol.control.LayerSwitcherImage());

	// GeoJSON layer
	 vectorSource = new ol.source.Vector({
        wrapX: false
      });

	 vector = new ol.layer.Vector(
	{	name: 'Alerts',

		source: vectorSource,
		// y ordering
	   renderOrder: ol.ordering.yOrdering(),
		style: getStyle
	});

	map.addLayer(vector);

    var select_interaction = new ol.interaction.Select({

    	style: getSelectedFeatureStyle
    });

	select_interaction.getFeatures().on("add", function (e) {
         var feature = e.element; //the feature selected
         toastr.info('Alert Clicked..');
     });

     map.addInteraction(select_interaction);

     var ovlayer =
		[	new ol.layer.Tile({	source: new ol.source.OSM()	})

		];

     var ov = new ol.control.Overview(
			{	layers: ovlayer,
				minZoom: 1,
				maxZoom: 12,
				rotation: true,
				align: 'top-left',
				panAnimation: false,
				elasticPan: true
			});

    ov.setPosition("bottom-left");
		map.addControl(ov);

		// Main control bar
		var mainbar = new ol.control.Bar();
		map.addControl(mainbar);

		// Add a custom push button with onToggle function
		mainbar.addControl ( new ol.control.Link(
				{	id: 'export-pdf',
					download: "map.pdf",
					target: "_new",
					text:'<i class="fa fa-download" style="cursor:pointer" title="Download PDF Map"></i>'
				}));
  mainbar.addControl ( new ol.control.Link(
    				{	id: 'email-map',
    					target: "_new",
    					text:'<i class="fa fa-envelope-o" style="cursor:pointer" title="Send Map to E-mail"></i>'
    				}));
		/*mainbar.addControl ( new ol.control.Toggle(
				{	html: '<i class="fa fa-envelope-o"></i>',
					title: "Send Map to E-mail",
					className: "noToggle",
					onToggle: function(active)
						{	if (active) alert("Hello, I'm active");
							else alert("Hello, I'm not active");
						}
				}));*/
		mainbar.setPosition("top-left");
    }

	// Redraw layer when fonts are loaded
$(window).on("load", function(){ console.log("loaded");  init(); addData() });
