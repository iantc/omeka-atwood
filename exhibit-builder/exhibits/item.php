<?php $title = html_escape(__('Item #%s', $item->id));
echo head(array('title' => $title, 'bodyid' => 'exhibit', 'bodyclass' => 'exhibit-item-show'));
?>
<div class="container" id="exhibit-header-wrapper">
  <div class="row" id="exhibit-header">
    <div class="small-8 columns">
      <h1 id="exhibit-title-wrapper"><?php echo link_to_exhibit(metadata('exhibit', 'title'), array('id'=>'exhibit-title')); ?></h1>
    </div>
    <div class="small-4 columns">
      <div class="row collapse">
        <?php echo search_form(array('show_advanced' => false)); ?>
      </div>
    </div>
  </div>
</div>
<div class="container" id="item-content-wrapper">
<?php $exhibitData = get_exhibit_info($item); ?>
  <div class="row">
    <div class="small-12 columns">
      <ul class="breadcrumbs">
        <li><?php echo link_to_exhibit('Home'); ?></li>
        <li><a href="/exhibits/show/atwood/<?php echo $exhibitData->slug;?>"><?php echo $exhibitData->title;?></a></li>
        <li class="current"><a href="#"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="small-12 columns">
      <h2 id="item-title"><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h2>
      <div class="row">
        <div class="small-4 columns" id="secondary">
          <div id="item-info-elements" class="panel radius">
            <?php echo all_element_texts('item'); ?>
            <?php if (metadata('item', 'has tags')): ?>
              <div class="tags">
                <h3><?php echo __('Tags'); ?></h3>
                <?php echo tag_string('item'); ?>
              </div>
            <?php endif;?>
            <div id="citation" class="field">
              <h3><?php echo __('Citation'); ?></h3>
              <p id="citation-value" class="field-value"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></p>
            </div>
            <?php if (metadata('item', 'Collection Name')): ?>
              <div id="collection" class="field">
                <h3><?php echo __('Collection'); ?></h3>
                <div class="field-value"><p><?php echo link_to_collection_for_item(); ?></p></div>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="small-8 columns" id="primary">
          <div id="itemfiles">
            <?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="top-bar" id="footer-nav">
  <ul class="title-area">
    <li class="name"><!-- Leave this empty --></li>
  </ul>
  <section class="top-bar-section">
    <ul class="left">
      <?php echo exhibit_sub_nav($exhibitData->exhibit_id,'li'); ?>
    </ul>
  </section>
</div>
<?php echo foot(); ?>
