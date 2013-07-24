<?php $title = html_escape(__('Item #%s', $item->id));
echo head(array('title' => $title, 'bodyid' => 'exhibit', 'bodyclass' => 'exhibit-item-show'));
?>
<div class="container" id="exhibit-header-wrapper">
  <div class="row" id="exhibit-header">
    <div class="small-8 columns">
      <h1 id="exhibit-title-wrapper"><?php echo link_to_related_exhibits($item); ?></h1>
    </div>
    <div class="small-4 columns">
      <div class="row collapse">
        <?php echo search_form(array('show_advanced' => false)); ?>
      </div>
    </div>
  </div>
</div>
<div class="container" id="item-content-wrapper">
  <div class="row">
    <div class="small-11 columns">
      <h2 id="item-title"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h2>
      <div class="row">
        <div class="small-4 columns" id="secondary">
          <div id="item-info-elements" class="panel radius">
            <?php $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));?>
            <?php if ($description): ?>
              <p class="item-description"><?php echo $description; ?></p>
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
            <?php if (metadata('item', 'Collection Name')): ?>
              <div id="collection" class="field">
                <h4><?php echo __('Collection'); ?></h4>
                  <div class="field-value"><p><?php echo link_to_collection_for_item(); ?></p></div>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="small-8 columns">
          <div id="primary">
            <div id="itemfiles">
        		  <?php echo files_for_item($options = array('imageSize' => 'fullsize'));?>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="small-4 columns">
    </div>
  </div>
</div>
<?php echo foot(); ?>
