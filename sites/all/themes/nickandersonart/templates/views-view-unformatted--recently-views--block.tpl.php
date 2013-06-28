<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php 
/**
 * @file
 * recently read block
 */
$node = node_load(arg(1));
if ($node->field_style){
    foreach ($node->field_style as $und => $id) {
           $tid = end($id);
           $count = count($id);
           $parent = taxonomy_get_parents($tid['tid']);

           if($count > 2 && !empty($parent)) {     
                foreach ($parent as $value => $id) {
                   $similar_link = $GLOBALS['base_root'] . '/products?term_node_tid_depth[]=' . $value;
                   $input = 'edit-term-node-tid-depth-' . $value;
                }

           } else {
               $similar_link = $GLOBALS['base_root'] . '/products?term_node_tid_depth[]=' . $tid['tid'];
               $input = 'edit-term-node-tid-depth-' . $tid['tid'];
           }
    }
}
if ($node->field_apparel){
    foreach ($node->field_apparel as $und => $id) {
           $tid = end($id);
           $count = count($id);
           $parent = taxonomy_get_parents($tid['tid']);

           if($count > 2 && !empty($parent)) {     
                foreach ($parent as $value => $id) {
                   $similar_link = $GLOBALS['base_root'] . '/products?field_apparel_tid[]=' . $value;
                   $input = 'edit-term-node-tid-depth-' . $value;
                }

           } else {
               $similar_link = $GLOBALS['base_root'] . '/products?field_apparel_tid[]=' . $tid['tid'];
               $input = 'edit-term-node-tid-depth-' . $tid['tid'];
           }
    }
}
?>
<div class="you_may_also"><h6>You may also like...</h6></div>
<div class="see_also">
    <?php custom_also(); ?>
</div>    
<div class="recenly_view_title"><h6>recently viewed</h6></div>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div <?php if ($classes_array[$id]) { print 'class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
<div class="sb_list4">
    <ul>
        <!--
        <li>
            <a href="<?php //print $similar_link;  ?>"
                see similar pieces
                <span></span>
            </a>                    

        </li>
        -->
        <li>
            <a href="<?php print $GLOBALS['base_root'] . '/pinecone-information#size_pinecone'; ?>">
                questions about sizing?
            </a>
        </li>
        <li>
            <a href="<?php print $GLOBALS['base_root'] . '/pinecone-information#info_pinecone'; ?>">
                pinecone care 
            </a>
        </li>
    </ul>    
</div>
<div class="cart_block">
    <div class="my_cart">
        <a href="<?php $GLOBALS['base_path']; ?>/cart/checkout">view my cart</a>
    </div>
</div>