<?php $title = html_escape(__('Item #%s', $item->id));
echo head(array('title' => $title, 'bodyid' => 'exhibit', 'bodyclass' => 'exhibit-item-show'));
?>
<div class="container" id="exhibit-header-wrapper">
  <div class="row" id="exhibit-header">
    <div class="small-8 columns">
      <div id="exhibit-title-wrapper"><?php echo link_to_related_exhibits($item); ?></div>
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
    <div class="small-12 columns">
      <h1 id="item-title"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
      <div class="row">
        <div class="small-4 columns" id="secondary">
          <div id="item-info-elements" class="panel radius">
            <?php $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));?>
            <?php if ($description): ?>
              <p class="item-description"><?php echo $description; ?></p>
            <?php endif; ?>
            <!-- The following prints a list of all tags associated with the item -->
            <?php if (metadata('item', 'has tags')): ?>
              <div id="item-tags" class="tags" class="element">
                <h2><?php echo __('Tags'); ?></h2>
                <div class="element-text">
                  <?php echo tag_string('item'); ?>
                </div>
              </div>
            <?php endif;?>
            <!-- The following prints a citation for this item. -->
            <div id="item-citation" class="element">
              <h4><?php echo __('Citation'); ?></h4>
              <p id="citation-value" class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></p>
            </div>
            <!-- If the item belongs to a collection, the following creates a link to that collection. -->
            <?php if (metadata('item', 'Collection Name')): ?>
              <div id="collection" class="field element">
                <h4><?php echo __('Collection'); ?></h4>
                <div class="element-text">
                  <p><?php echo link_to_collection_for_item(); ?></p>
                </div>
              </div>
            <?php endif; ?>
            <div id="exhibits">
              <h4><?php echo __('Exhibits'); ?></h4>
              <div class="element-text">
                <?php echo link_to_related_exhibits($item); ?>
              </div>
            </div>
          </div>
          <a onclick="goBack()">&laquo; Return to previous page</a>
        </div>
        <div class="small-8 columns">
          <div id="primary">
            <!-- The following returns all of the files associated with an item. -->
            <?php if (metadata('item', 'has files')): ?>
            <div id="itemfiles" class="element">
              <?php if (get_theme_option('Item FileGallery') == 1): ?>
                <div class="element-text">
                  <?php echo files_for_item(array('imageSize'=>'fullsize')); ?>
                </div>
              <?php else: ?>
                <div class="element-text"><?php echo files_for_item(); ?></div>
              <?php endif; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <nav>
      <ul class="item-pagination navigation inline-list">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
      </ul>
      </nav>
    </div>
  </div>
</div>
<?php echo foot(); ?>
