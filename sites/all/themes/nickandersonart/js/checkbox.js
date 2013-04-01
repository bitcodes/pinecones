/**
 *@file
 *not used
 **/
(function ($, Drupal, window, document, undefined) {

    $(function collapsedTree() {
        if ($('ul.bef-tree li').children('ul.bef-tree-child')) {
            $('ul.bef-tree li').children('ul.bef-tree-child').parent().addClass('collapse_filter');
            $('.collapse_filter').find('label').addClass("passive");

            $('.collapse_filter').children('div').children('input').click(function openTab() {
            
            var $child = $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input');
                
                if ($(this).prop('checked') === false && $child.prop('checked') === true) {
                        $(this).prop('checked', false);
                        $child[0].checked = false;
                        $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input').prop('checked', false);

                    }
                alert('ssss');
            //$(this)[0].checked = false;
                
                $(this).prop('checked', $(this)[0].checked);
                
                $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideToggle();
                $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
            $child.prop('checked', false);
            });
        }
        
        $('ul.bef-tree-depth-1').find('label').removeClass("passive");
    }); 
    
    
    /*
    $(function showChild(){
        
        $('.collapse_filter').children('ul').children('li').find('input').click(function(){
          var $parent_input = $(this).parent('div').parent('li').parent('ul').parent('.collapse_filter').children('div').find('input'); 
          $parent_input[0].checked = false;
          $(this)[0].checked = true;
         
         
          if(!$(this).parent('div').parent('li').find('input')[0].checked){
              
              $(this).parent('div').parent('li').find('input').prop('checked', false);
              $parent_input.parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideUp();
              $(this).parent('div').parent('.collapse_filter').children('div').children('label').addClass("passive");
              $(this).parent('div').parent('.collapse_filter').children('div').children('label').removeClass("active");
              
          }
           $(this).prop('checked', $(this)[0].checked);
      });
    });
    */
})(jQuery, Drupal, this, this.document);    
             //alert($('.collapse_filter').children('div').children('input').data('clicked'));
                
            
            
        /*    
      $('.collapse_filter').children('ul').children('li').find('input').click(function(){
          if($(this).data('clicked')){
              alert('ddd');
              $(this)[0].checked = false;
          }
      }); */     
                
                
                                //$(this)[0].checked = false;

                /*$(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideDown();
                
                if(!$(this)[0].checked && !$(this).parent('div').parent('.collapse_filter').children('ul').children('li').find('input')[0].checked) {
                   
                        $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideUp();
                        $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                        $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
                    
                }
                    
               // $(this)[0].checked = true;
                
                $(this).parent('div').parent('.collapse_filter').addClass('parent');
                $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').addClass('childrens');
           
                $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
           
                $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideDown();

           if($(this).prop('checked') === true && $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input').prop('checked') === true){
                   
                    $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideToggle();
                    $(this)[0].checked = false;
                   
                   // $(this).prop('checked') === false;
                    $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input')[0].checked = false;
                
                } else {
                    
                    if($(this).prop('checked') === false && $(this).parent('div').parent('.collapse_filter').children('div ul').children('li').find('input').prop('checked') === false){
                        
                        $(this).prop('checked', false);
                        $(this).parent('div').parent('.collapse_filter').children('ul.bef-tree-depth-1').slideUp();
                        $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("passive");
                        $(this).parent('div').parent('.collapse_filter').children('div').children('label').toggleClass("active");
                    
                    } else {
                        if($(this).prop('checked') === true && $(this).parent('div').parent('.collapse_filter').children('div').find('active')){
                        }
                    }
                    

                    
                }
                */
               // $(this)[0].checked = false;    
               
           
        
   

 //when we click on children item - only one must be active 
 /*
 $('.collapse_filter').children('ul').children('li').find('input').click(function(){
                $(this)[0].checked = false;
                   var $parent_input = $(this).parent('div').parent('li').parent('ul').parent('.collapse_filter').children('div').children('input');
                  $parent_input[0].checked = false;
                   $parent_input.prop('checked', true);
                   
                    if ($parent_input.prop('checked') === false && $('.collapse_filter').children('ul').children('li').find('input').prop('checked') === false) {
                        $parent_input.prop('checked', true);
                        $parent_input.toggleClass("active");
                    } else {
                        $parent_input[0].checked = false;
                        $(this).attr('checked');
                    }
                 
            });    */
        

