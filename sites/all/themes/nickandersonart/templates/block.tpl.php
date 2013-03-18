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
  <?php print $content; ?>
</div>
