<?php $title = html_escape(__('Item #%s', $item->id));
echo head(array('title' => $title, 'bodyid' => 'exhibit', 'bodyclass' => 'exhibit-item-show'));
?>
<div class="row">
  <div class="twelve columns">
    <h1 class="item-title"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
  </div>
</div>
<div class="row">
  <div class="six columns">
    <div id="primary">
      <div id="itemfiles">
  		  <?php echo files_for_item($options = array('imageSize' => 'fullsize'));?>
      </div>
    </div>
  </div>
  <div class="six columns">
    <?php echo link_to_related_exhibits($item);?>
		<?php if (metadata('item', 'Collection Name')): ?>
      <div id="collection" class="field">
        <h4><?php echo __('Collection'); ?></h4>
          <div class="field-value"><p><?php echo link_to_collection_for_item(); ?></p></div>
      </div>
		<?php endif; ?>
		<?php if (metadata('item', 'has tags')): ?>
      <div class="tags">
        <h2><?php echo __('Tags'); ?></h2>
  		  <?php echo tag_string('item'); ?>
      </div>
		<?php endif;?>
    <div id="citation" class="field">
      <h4><?php echo __('Citation'); ?></h4>
      <p id="citation-value" class="field-value"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></p>
    </div>
		<?php $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));?>
    <?php if ($description): ?>
      <p class="item-description"><?php echo $description; ?></p>
    <?php endif; ?>
  </div>
</div>
<?php echo foot(); ?>
