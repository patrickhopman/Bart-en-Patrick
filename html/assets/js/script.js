jQuery(document).ready(function(){
	var api = $("#slidetabs").tabs("ul.slider > li", {
 
    // enable "cross-fading" effect
    effect: 'fade',
    fadeOutSpeed: "slow",
 
    // start from the beginning after the last tab
    rotate: true
 
    // use the slideshow plugin. It accepts its own configuration
    }).slideshow( {
		clickable: false,
		autoplay:  true,
		interval:  2000
    } );
});