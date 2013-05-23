<?php 
/**
 * @file
 * Modify for view my cart
 */
?>
<div id="block-<?php print $block->module.'-'.$block->delta; ?>" class="block">
  <?php if ($block->subject): ?>
    <div class="block_subject">
      <?php print $block->subject; ?>
    </div>
  <?php endif;?>
  <?php print $content;?>
    <div class="supplements">
        <h6>supplements</h6>
    </div>
    <div class="cart_block">
        <div class="my_cart">
            <a href="<?php $GLOBALS['base_path'];?>/cart/checkout">view my cart</a>
        </div>
    </div>    
</div>
<div class="sidebar_collaps_button"><i></i></div>
