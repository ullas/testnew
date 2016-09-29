/*
	Ullas
	
*/

/** Path animation: feature follow a path
* @param {ol.featureAnimationPathOptions} options
*/
ol.featureAnimation.Play = function(options)
{	options = options || {};
	ol.featureAnimation.call(this, options);
	
	this.currentPos=0;
	
	this.numPoints_=(this.path_) ? this.path_.length:0;
}
ol.inherits(ol.featureAnimation.Path, ol.featureAnimation);

/** Animate
* @param {ol.featureAnimationEvent} e
*/
ol.featureAnimation.Path.prototype.animate = function (e)
{	// First time 
	if (!e.time) 
	{	if (!this.dist_) return false;
	}
	var px=this.path_[this.currentPos][0];
	var py=this.path_[this.currentPos][y];
	e.geom.setCoordinates([px,py]);
	// Animate
	this.drawGeom_(e, e.geom);
	
	return (this.currentVertex_ < this.numPoints_);
}
