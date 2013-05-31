/**
 *@file
 *
 **/

(function ($, Drupal, window, document, undefined) {
   //var redirect = '/products';
    //history.pushState('', '', redirect);
  //alert(window.location.href);

/**
 * Make filter collapsed with some css
 * @returns {Boolean}
 */
 $(function collapsedTree() {
     $('.views-widget').find('input').each(function(){
        $(this)[0].checked = false;
     });
         if ($('ul.bef-tree li').children('ul.bef-tree-child')) {
             $('ul.bef-tree li').children('ul.bef-tree-child').parent().addClass('collapse_filter');
             $('.collapse_filter').find('label').addClass("passive");
             $('.collapse_filter').find('.collapse_filter').addClass('second_depth');
             $('.collapse_filter').find('li').removeClass('collapse_filter');// remove class for depth-2 categories
            
         $('.collapse_filter').children('div').children('input').change(function openTab() {
             
             //delete "?some_part[]ID" from url? when we going from other page
             //var redirect = '/products';
                 //history.pushState('', '', redirect);
               
                
             var $child = $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input');
                
                
                
                    $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').each(function(){
                        
                              if ($(this).find('input').prop('checked') === true) {
                                  $(this).parents('.collapse_filter').children('div').find('input')[0].checked = false;
                              }
                              if($(this).hasClass('second_depth')){
                                  $(this).children('div ul').children('li').each(function(){
                                       if ($(this).find('input').prop('checked') === true) {
                                            $(this).parents('.collapse_filter').children('div').find('input')[0].checked = false;
                                        }
                                  });
                              }
                         });
                 
                 if ($(this).prop('checked') === false) {
                     $(this).removeAttr('checked');
                 }
                if ($(this).hasClass("children_check") === true) {
                    $(this).removeClass("children_check");
                    $(this).prop('checked', true);
                    $(this).attr('checked');
                   $($child).prop('checked', false);
                }
                else {
                    $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideToggle();
                    $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                    $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
                    $($child).prop('checked', false);
                    $($child).removeAttr('checked');
                }
             });
         }
         
         $('ul.bef-tree-depth-1').find('label').removeClass("passive");
         
         /**********/
         $('.collapse_filter').children('ul').children('li').find('input:checkbox').change(function(){
           var $parent_input = $(this).parents('.collapse_filter').children('div').find('input:checkbox'); 
           $parent_input.parent('div').parent('.collapse_filter').children('div').children('input').addClass('children_check');

           $parent_input[0].checked = false;
           
          $(this).prop('checked', $(this)[0].checked);
          
          var $i = 0;
          
           $parent_input.parent('div').parent('.collapse_filter').children('ul').children('li').find('input:checkbox').each(function(){
              if($(this)[0].checked === true){
                  $i++;
                  //
              } 
           });
         
          if($i === 0) {
              //when uncheck children checkbox
               $(this).parent('div').parent('li').find('input').prop('checked', false);
               $parent_input.parent('div').parent('.collapse_filter').children('div').children('input').prop('checked', true);
               $parent_input.parent('div').parent('.collapse_filter').children('div').children('input').removeClass('children_check');
               //$parent_input.parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideUp();
               //$parent_input.parent('div').parent('.collapse_filter').children('div').children('label').removeClass("active");
               //$parent_input.parent('div').parent('.collapse_filter').children('div').children('label').addClass("passive");
          }
          
          if($(this).parents().hasClass('bef-tree-depth-2')){
                $(this).addClass('child');
                $(this).parents('.collapse_filter').children('div').children('input')[0].checked = false;
                $(this).parent('div').parent('li').parent('ul').parent('.second_depth').children('div').children('input')[0].checked = false;
                $(this).parent('div').parent('li').parent('ul').parent('.second_depth').children('div').children('input').click(function(){
                    $(this).parents('.second_depth').children('.bef-tree-depth-2').find('input').each(function(){
                       $(this)[0].checked = false; 
                    });
                });
           } 

                $(this).prop('checked', $(this)[0].checked);
       });
         
         return;
     }); 
     
 })(jQuery, Drupal, this, this.document);   
     