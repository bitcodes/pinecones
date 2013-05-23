/**
 *@file
 *
 **/

(function ($, Drupal, window, document, undefined) {
/**
 * Make filter collapsed with some css
 * @returns {Boolean}
 */
 $(function collapsedTree() {     
         if ($('ul.bef-tree li').children('ul.bef-tree-child')) {
             $('ul.bef-tree li').children('ul.bef-tree-child').parent().addClass('collapse_filter');
             $('.collapse_filter').find('label').addClass("passive");
             $('.collapse_filter').find('.collapse_filter').addClass('second_depth');
             $('.collapse_filter').find('li').removeClass('collapse_filter');// remove class for depth-2 categories
         
             
         
        
         $('.collapse_filter').children('div').children('input').change(function openTab() {
             
             var $child = $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input');
             
                 if ($(this).prop('checked') === true) {
                     //
                 } 
                 if (($child).prop('checked') === true) {
                     alert('1');
                     $(this)[0].checked = false;
                 }
                 
                 if ($(this).prop('checked') === false) {
                     alert('2');
                     $(this).removeAttr('checked');
                     $(this)[0].checked = false;
                 }
                 
                 $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideToggle();
                 $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                 $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
             $child.prop('checked', false);
         
             });
             /*end openTab*/
            
         }
         
         $('ul.bef-tree-depth-1').find('label').removeClass("passive");
         
         /**********/
         $('.collapse_filter').children('ul').children('li').find('input:checkbox').change(function(){
           var $parent_input = $(this).parents('.collapse_filter').children('div').find('input:checkbox'); 
           
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
               $(this).parent('div').parent('li').find('input').prop('checked', false);
               $parent_input.parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideUp();
               $parent_input.parent('div').parent('.collapse_filter').children('div').children('label').removeClass("active");
               $parent_input.parent('div').parent('.collapse_filter').children('div').children('label').addClass("passive");
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
     