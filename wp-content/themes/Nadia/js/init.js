jQuery(window).load(function() {

// Masonry
// ===============================================================================

jQuery('.home-content .js-masonry').masonry({
  itemSelector: '.col-lg-4',
  columnWidth: '.col-lg-4'
});


jQuery('.archive-content .js-masonry').masonry({
  itemSelector: '.col-lg-6',
  columnWidth: '.col-lg-6'
});


// Slider
// ===============================================================================
jQuery('#slider-nn').flexslider({
    animation: dphvars.fx,
    itemWidth: 900,
    slideshow: jQuery.parseJSON(dphvars.dphauto),
    controlNav: false, 
    pauseOnHover: jQuery.parseJSON(dphvars.pausem),
    slideshowSpeed: jQuery.parseJSON(dphvars.showsp),
    animationSpeed: jQuery.parseJSON(dphvars.fxsp),

    start: function(slider) {
        jQuery('.slides').removeClass('loading');
    }

});

jQuery('.gallery-slider').flexslider({
    animation: "fade",
    controlNav: false, 
    slideshow: false,
    smoothHeight:true,
    animationLoop: true,

    start: function(slider) {
        jQuery('.gallery-slider').removeClass('loading');
    }

});

jQuery('.flexi').flexslider({
    animation: "slide",
    controlNav: false, 
    slideshow: false,
    animationLoop: true,
    itemWidth: 293,
    minItems: 1,
    maxItems: 4,
    itemMargin: 0,
    start: function(slider) {
        jQuery('.ami').fadeIn();
    }
  });


  jQuery('.flexslider').flexslider({
    animation: "slide",
    controlNav: false, 
    slideshow: false,
    animationLoop: false,
    itemWidth: 263,
    itemMargin: 10
  });
});


jQuery(document).ready(function() {

// dotdotdot
// ===============================================================================
  jQuery(".slide-panel h2").dotdotdot({
    ellipsis  : '...',
    watch   : true,
    height    : 68
  });

// Sidr
// ===============================================================================
  jQuery('#simple-menu').sidr({
      name: 'sidr-existing-content',
      source: '.main-nav'
    }),

  jQuery('body').click(function() {
    jQuery.sidr('close', 'sidr-existing-content'); 
  });


// Tooltip 
// ===============================================================================
  jQuery('a[data-toggle="tooltip"]').tooltip();

// Superfish Menu
// ===============================================================================
  jQuery('.main-nav ul').superfish();

// Share Buttons
// ===============================================================================
  jQuery('a.share-fb, a.share-tw').on('click', function(){
      newwindow=window.open(jQuery(this).attr('href'),'','width=626,height=436');
      if (window.focus) {newwindow.focus()}
      return false;
  });

// FitVids
// ===============================================================================
  jQuery(".wg-video").fitVids();


 jQuery(function() {
     jQuery(".dial").knob({
        readOnly: true,
        fgColor: "#fff",
        bgColor: "#00BF76",
        inputColor: "#fff",
        thickness: ".06",
        fontWeight:"100",
        font: "Dosis"
    });

     jQuery(".ubscore input").fadeIn();

});

// Gallery & Video position
// ===============================================================================

  jQuery(".gallery_format").appendTo( ".featured-media" );
  jQuery(".format-video .wp-video").appendTo( ".featured-media" );
  jQuery(".format-video .entry-content .wg-video").eq(0).appendTo( ".featured-media" );
  jQuery(".format-audio .wp-audio-shortcode").eq(0).appendTo( ".featured-media" );

// Coolll
// ===============================================================================
  jQuery("#collapse1").addClass("in");


// Overlay Hover
// ===============================================================================
  jQuery(".block-inner, #slider-nn").hover(function() {
    jQuery('.overlay', this).fadeOut();
  }, function() {
    jQuery('.overlay', this).fadeIn('slow');
  });


// Tabs
// ===============================================================================
  jQuery("ul.nav-tabs li:first").addClass("active"); //Activate first tab
  jQuery("div.tab-content div:first").addClass("active"); //Show first tab content
  jQuery("ul.nav-tabs li").click(function() {
      jQuery("ul.nav-tabs li").removeClass("active"); //Remove any "active" class
      jQuery(this).addClass("active"); //Add "active" class to selected tab
      var activeTab = jQuery(this).find("a").attr("href");
      jQuery("div.tab-content div").removeClass("active"); //Hide all tab content
      jQuery('div.tab-content #' + activeTab).addClass("active"); //Fade in the active ID content
      return false;
  });

// Facebook Comments
// ===============================================================================
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) { return; }
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }  (document, 'script', 'facebook-jssdk'));

    // Responsive fix
    function resizefbc(){
        jQuery(".fb-comments").attr("data-width", jQuery(".single-content").width());
        FB.XFBML.parse(jQuery(".single-content")[0]);
    }
    setTimeout(function(){
        resizefbc();
    }, 1000);

    jQuery(window).on('resize', function(){
        resizefbc();
    });

});