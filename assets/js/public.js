;(function($, doc, win) {
  "use strict";
       
    $(window).load(function () {
        $('.slider').fractionSlider({
            'controls' : tusparams.controls, // controls on/off
            'pager' : tusparams.pager, // pager on/off
            'autoChange' : tusparams.autochange, // auto change slides
            'pauseOnHover' : tusparams.pauseonhover, // pauses slider on hover (current step will still be completed)
            'slideEndAnimation' : tusparams.slideendanimation, // if set true, objects will transition out before next slide moves in 
            'backgroundAnimation' : tusparams.backgroundanimation, // background animation
            'backgroundX' : tusparams.backgroundx, // background animation x distance
            'backgroundY' : tusparams.backgroundy, // background animation y distance
            'backgroundSpeed' : tusparams.backgroundspeed, // default background animation speed
            'backgroundEase' : tusparams.backgroundease, // default background animation easing
            'fullWidth': tusparams.fullwidth,
            'responsive': tusparams.responsive, // responsive slider (see below for some implementation tipps)
            'increase': tusparams.increase, // if set, slider is allowed to get bigger than basic dimensions
            'dimensions': tusparams.dimensions, // slider dimensions
        });
    });
})(jQuery, document, window);