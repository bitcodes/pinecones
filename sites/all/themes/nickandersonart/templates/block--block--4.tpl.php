<?php 
/**
 * @file
 * Standart zen block
 */
global $top_pager;
?>
<div id="block-<?php print $block->module.'-'.$block->delta; ?>" class="block">
  <?php if ($block->subject): ?>
    <div class="block_subject">
      <?php print $block->subject; ?>
    </div>
  <?php endif;?>
    <div class="text_block_vrapper">  
        <?php print $content; ?>
    </div> 
    <?php 
        print $top_pager;
    ?>
</div>
