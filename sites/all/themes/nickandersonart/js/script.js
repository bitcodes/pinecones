
/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {
// cosial icons, small nice solution. For chnging php see page--cart--checkout--complete.tpl.php
function socialopen(url){
var winpar='width=500,height=400,left=' + ((window.innerWidth - 500)/2) + ',top=' + ((window.innerHeight - 400)/2) ;
window.open(url,'tvkw',winpar);
}
(function ($) { 
    $(document).ready(function(e) {
        $('a.soc-icon').click(function(){
        var url = $(this).attr('href'); 
            socialopen(url);
        return false;
        });

     var exppoductH = $('.page-products #sidebar').height();
      $('.sidebar_collaps_button').css( "height", exppoductH );
      $('#content').css( "min-height", exppoductH );


       $('.page-products #sidebar .sidebar_collaps_button').click(function () {
            var left = jQuery('.page-products #sidebar').css("left");

            if (left == '-186px') {
                jQuery('.page-products #sidebar').animate({ left: '0' }, 'slow');
                jQuery('.colaps_laer').show();
            } else {
                jQuery('.page-products #sidebar').animate({ left: '-186px'}, 'slow');
                jQuery('.colaps_laer').hide();
            }
       });

        jQuery('.colaps_laer').click(function(){
            $('.page-products #sidebar .sidebar_collaps_button').click();
        });

        $('#content').css( "min-height", exppoductH );

    });
})(jQuery);

})(jQuery, Drupal, this, this.document);
