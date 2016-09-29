/***
 Usage:                                   *
 function myRender() {
 // render here
 }
 browserAnimation.addRenderer(myRender, 25); // you can add multiple different renderers here
 And when you no longer need it:
 browserAnimation.removeRenderer(myRender);
 
 ***/

var browserAnimation = (function() {
    var _requestAnimationFrame = window.requestAnimationFrame || 
            window.webkitRequestAnimationFrame || 
            window.msRequestAnimationFrame || 
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            function(cb) {
                window.setTimeout(cb, 1000 / 60);
            };

    var renderers = [];
    var active = false;

    var _run = function() {
        active = true;

        var _render = function() {
            if (!active)
                return;

            _requestAnimationFrame(_render);

            var t = +Date.now();

            for (var i = 0; i < renderers.length; i++) {
                var r = renderers[i];
                var interval = r.interval;
                var delta = t - r.last_frame_ms;

                if (delta > interval) {
                    r.last_frame_ms = t - (delta % interval);
                    r.cb(t);
                }
            }
        }

        _render();
    }

    var _stop = function() {
        active = false;
    }

    var addRenderer = function(cb, max_fps) {

        max_fps = max_fps || 60;

        removeRenderer(cb);

        renderers.push({
            cb: cb,
            interval: 1000 / max_fps,
            last_frame_ms: 0
        });


        if (!active) {
            _run();
        }
    }

    var removeRenderer = function(cb) {
        for (var i = 0; i < renderers.length; i++) {
            if (renderers[i].cb === cb) {
                renderers.splice(i, 1);
                break;
            }
        }

        if (renderers.length === 0 && active) {
            _stop();
        }
    }

    return {
        addRenderer: addRenderer,
        removeRenderer: removeRenderer,
    }
})();


/**
 * Behaves the same as setInterval except uses requestAnimationFrame() where possible for better performance
 * @param {function} fn The callback function
 * @param {int} delay The delay in milliseconds
 */
window.requestInterval = function(fn, delay) {
    if( !window.requestAnimationFrame       && 
        !window.webkitRequestAnimationFrame && 
        !(window.mozRequestAnimationFrame && window.mozCancelRequestAnimationFrame) && // Firefox 5 ships without cancel support
        !window.oRequestAnimationFrame      && 
        !window.msRequestAnimationFrame)
        return window.setInterval(fn, delay);
    
    var start = new Date().getTime(),
    handle = new Object();
    
    function loop() {
        var current = new Date().getTime(),
        delta = current - start;
        
        if(delta >= delay) {
            fn.call();
            start = new Date().getTime();
        }
        
        handle.value = requestAnimFrame(loop);
    };
    
    handle.value = requestAnimFrame(loop);
    return handle;
}

/**
 * Behaves the same as clearInterval except uses cancelRequestAnimationFrame() where possible for better performance
 * @param {int|object} fn The callback function
 */
window.clearRequestInterval = function(handle) {
    window.cancelAnimationFrame ? window.cancelAnimationFrame(handle.value) :
    window.webkitCancelAnimationFrame ? window.webkitCancelAnimationFrame(handle.value) :
    window.webkitCancelRequestAnimationFrame ? window.webkitCancelRequestAnimationFrame(handle.value) : /* Support for legacy API */
    window.mozCancelRequestAnimationFrame ? window.mozCancelRequestAnimationFrame(handle.value) :
    window.oCancelRequestAnimationFrame ? window.oCancelRequestAnimationFrame(handle.value) :
    window.msCancelRequestAnimationFrame ? window.msCancelRequestAnimationFrame(handle.value) :
    clearInterval(handle);
};