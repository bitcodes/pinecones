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
        
        
    var exppoductH = $('#block-views--exp-products-page').height();
       $('.sidebar_collaps_button').css( "height", exppoductH );
       $(".page-products #sidebar").click(function(){
         $(this).toggleClass("openSi");
      });           
    });
})(jQuery);

})(jQuery, Drupal, this, this.document);
