/**
 *@file
 *
 **/

(function ($, Drupal, window, document, undefined) {
 
 $(function collapsedTree() {
     
         if ($('ul.bef-tree li').children('ul.bef-tree-child')) {
             $('ul.bef-tree li').children('ul.bef-tree-child').parent().addClass('collapse_filter');
             $('.collapse_filter').find('label').addClass("passive");
             
             $('.collapse_filter').children('div').children('input').change(function openTab() {
            
             var $child = $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input');
                 
                 /*if ($(this).prop('checked') === true && $child.prop('checked') === true) {
                         alert('dd');
                         $(this).prop('checked', false);
                         $child[0].checked = false;
                         $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input').prop('checked', false);
                         
                     }*/
                 
                 $(this).prop('checked', $(this)[0].checked);
                 
                 
                 
                 $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideToggle();
                 $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                 $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
             $child.prop('checked', false);
             });
         }
         
         $('ul.bef-tree-depth-1').find('label').removeClass("passive");
     }); 
     
     
     
     
     $(function showChild(){
         
         $('.collapse_filter').children('ul').children('li').find('input:checkbox').change(function(){
          
           var $parent_input = $(this).parent('div').parent('li').parent('ul').parent('.collapse_filter').children('div').find('input:checkbox'); 
           
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
          
          
                       
          $parent_input.change(function(){
              $parent_input[0].checked = false;
              $parent_input.parent('div').parent('.collapse_filter').children('ul').children('li').find('input').each(function(){
                 $parent_input.parent('div').parent('.collapse_filter').children('ul').children('li').find('input').checked = false;
                
              });
         
                //$(this).prop('checked', $(this)[0].checked);
            });
         
                //$(this).prop('checked', $(this)[0].checked);
                
                
       });
       
     });
     
     
     
 })(jQuery, Drupal, this, this.document);   
     