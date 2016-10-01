/*	
 * By Ullas Dastakar
 *
*/
/**
 * @classdesc OpenLayers 3 Permalink Control.
 *	Layers with a permalink properties are handled by the control. 
 *  The permalink propertie is used to name the layer in the url.
 *	The control must be added after all layer are inserted in the map.
 *
 * @constructor
 * @extends {ol.control.Control}
 * @param {Object=} Control options.
 *		- urlReplace {bool} replace url or not, default true
 *		- fixed {integer} number of digit in coords, default 6
 *		- anchor {bool} use "#" instead of "?" in href
 *		- onclick {function} a function called when control is clicked
 *
 * Layers attributes extension:
 *		- permalink {char} a short string to identify layer in the url
 */
ol.control.Link = function(opt_options) 
{	var options = opt_options || {};
	var self = this;
	
	var link = document.createElement('a');
	
	link.setAttribute('download', options.download);
	link.setAttribute('id', options.id);
	link.setAttribute('target', options.target);
	link.innerHTML=options.text;
	link.setAttribute('class',"mptl-download");
	link.setAttribute('data-margin',10);

	
    link.addEventListener('click', function(e){
    	$("a[download]").exportMap(map);
    }, false);
    

	var element = document.createElement('div');
    element.className = (options.className || "noToggle") + " ol-unselectable ol-control";
    element.appendChild(link);
    
	ol.control.Control.call(this, 
	{	element: element,
		target: options.target
	});

	
};
ol.inherits(ol.control.Link, ol.control.Control);





/**
 * Get the permalink
 * @return {permalink}
 */
ol.control.Link.prototype.download = function()
{	
	alert("Test");
};

