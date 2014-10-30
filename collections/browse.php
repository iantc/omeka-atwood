<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
<div class="container" id="header-wrapper">
  <div class="row" id="header">
    <div class="small-8 columns">
      <h1><?php echo $pageTitle; ?></h1>
    </div>
    <div class="small-4 columns">
      <?php echo search_form(array('show_advanced' => false)); ?>
    </div>
  </div>
</div>
<div class="container browse-collections">
  <div class="row" id="primary" class="content">
    <div class="small-8 columns">
      <?php echo pagination_links(); ?>
      <?php foreach (loop('collections') as $collection):           
      //print_r($collection);
      $coll=get_current_record('Collections',false)->id;
?>
        <div class="collection">
          <h2><?php echo link_to_collection(); ?></h2>
          <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
            <div class="element">
              <h3><?php echo __('Description'); ?></h3>
              <div class="element-text"><?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet'=>150))); ?></div>
            </div>
          <?php endif; ?>
          <?php if ($collection->hasContributor()): ?>
            <div class="element">
              <h3><?php echo __('Contributors(s)'); ?></h3>
              <div class="element-text">
                <p><?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?></p>
              </div>
            </div>
          <?php endif; ?>
    <div id="collection-items">
          <?php
          //$items=get_records('item',array('hasImage'=>true,'collection'=> $coll),4);
                   foreach (loop('items') as $item): ?>
                        <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
                        <div class="item hentry">
                            <h3><?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?></h3>
                            <?php if (metadata('item', 'has thumbnail')): ?>
                                <div class="item-img">
                                    <?php echo link_to_item(item_image('thumbnail', array('alt' => $itemTitle))); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
                                <div class="item-description">
                                    <p><?php echo $text; ?></p>
                                </div>
                            <?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                                <div class="item-description">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; 

          ?>
    </div><!-- end collection-items -->
<p class="view-items-link"><?php echo link_to_browse_items('View the items in ' . collection('Name'), array('collection' => collection('id'))); ?></p>
          <p class="view-items-link"><?php echo link_to_items_browse(__('View the items in %s', metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata('collection', 'id'))); ?></p>

          <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
        </div><!-- end class="collection" -->
      <?php endforeach; ?>
      <?php echo pagination_links(); ?>

      <?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>
    </div>
    <div class="small-4 columns">
    </div>
  </div>
</div>
<?php echo foot(); ?>
