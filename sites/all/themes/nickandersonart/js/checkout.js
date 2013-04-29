/**
 *@file
 * This function need for the customisation /cart/checkout collapsible steps
 */
(function ($, Drupal, window, document, undefined){   
    $(document).ready(function() {
        //Make collapsible cart pane
        
        $("#cart-pane").addClass("collapsible collapse-processed");
        $("#cart-pane legend").css('display', 'none').click(function(){
            $("#cart-pane").toggleClass("collapsed");
            $("#cart-pane legend").css('display', 'none');
            
        });
        
        $("#delivery-pane").addClass("collapsed");
        $("#cart_next").click(function(){
            $("#cart-pane").addClass("collapsed");
            $("#delivery-pane").removeClass("collapsed");
            $("#delivery-pane .fieldset-wrapper").css('display', 'block');
            $(".ttl_sb").css('display', 'none');
            $("#cart-pane legend").css('display', 'block');
            $("#cart-pane legend").css('cursor', 'pointer');
        });
        
        //Make quotes-pane collapsed
        $("#quotes-pane .fieldset-wrapper").css('display', 'none');
        
        $("#edit-panes-billing-next").click(function(){
            $("#quotes-pane .fieldset-wrapper").css('display', 'block');
        });
        
        //Make coupon-pane collapsed
        $("#coupon-pane .fieldset-wrapper").css('display', 'none');
        
        $("#edit-panes-customer-next").click(function(){
            $("#coupon-pane .fieldset-wrapper").css('display', 'block');
        });
        
        //hide refresh button (don't need - we use AJAX)
        $('input#edit-panes-quotes-quote-button').css('display', 'none'); 
        
    });


})(jQuery, Drupal, this, this.document);


