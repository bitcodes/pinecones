<?php 
/**
 * @file
 * Standart zen block
 */
?>
<div id="block-<?php print $block->module.'-'.$block->delta; ?>" class="block clearfix">
  <?php if ($block->subject): ?>
    <div class="block_subject">
      <?php print $block->subject; ?>
    </div>
  <?php endif;?>
    <div class="text_block_vrapper">  
        <?php print $content; ?>
    </div> 
</div>
