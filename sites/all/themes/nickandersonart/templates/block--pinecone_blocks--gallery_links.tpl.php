<?php 
/**
 * @file
 * Standart zen block
 */
?>
<div id="block-<?php print $block->module.'-'.$block->delta; ?>" class="block">
  <?php if ($block->subject): ?>
    <div class="block_subject">
      <?php print $block->subject; ?>
    </div>
  <?php endif;?>
  <?php 
  
      $view_all = '<div class="gallery_link"><a target="_blank" href="/products"><img src="' . $GLOBALS['base_root']. '/sites/default/files/view_all_cut.jpg"><div class="title">View All</div></a></div>';
      print $view_all;
      //get the taxonomy tree for Styles (vid = 2) <- this is static id  
      $style = taxonomy_get_tree(2);
      foreach ($style as $terms) {
          if($terms->depth == '0'){
             $term = taxonomy_term_load($terms->tid);
             
             if($term->tid == 1 || $term->tid == 2 || $term->tid == 16 || $term->tid == 3){
                $view = taxonomy_term_view($term);
                $image = render(($view['uc_catalog_image']));
                $name = $term->name;    
                    
                   $output = '<div class="gallery_link"><a target="_blank" href="/products?term_node_tid_depth[]=' . $term->tid . '">' . $image . '<div class="title">' . $name. '</div>' .'</a></div>';
                   print $output;
          
            }      
          }
      }
      
  //print $content; 
  //$image = taxonomy_image_display($term->tid);
  ?>
</div>
