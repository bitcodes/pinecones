/**
 * This  function need for the fading in/out objects (div, img etc.)
 */
(function ($, Drupal, window, document, undefined){   
    $(document).ready(function() {
        /*$(function() {
            $('#logo h1').mouseover(function() {
               $(this).fadeTo(300, 0.4, callback);
            });
            
        });
        */
        $(function() {
            $('.views-field-uc-product-image').mouseover(function() {
               $(this).fadeTo(50, 0.7, callback);
            });
        });
        
        function callback(){
                $(this).mouseout(function(){
                    $(this).fadeTo(50, 1);
                })
        }
    });
    
})(jQuery, Drupal, this, this.document);

