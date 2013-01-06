<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>
<div class="container">
  <div class="row" id="exhibit-header">
    <div class="eight columns">
      <h1 id="exhibit-title-wrapper"><?php echo $pageTitle; ?></h1>
      <p> <?php echo __('(%s total)', $total_results); ?></p>
    <nav class="items-nav navigation" id="secondary-nav">
        <?php echo public_nav_items(); ?>
    </nav>
    </div>
    <div class="four columns">
      <div class="row collapse">
        <?php echo search_form(array('show_advanced' => false)); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="two columns">
      <div id="exhibit-pages">
      </div>
    </div>
    <div class="ten columns">
      <div id="primary">
        <?php echo pagination_links(); ?>

        <?php if ($total_results > 0): ?>

        <?php
        $sortLinks[__('Title')] = 'Dublin Core,Title';
        $sortLinks[__('Creator')] = 'Dublin Core,Creator';
        $sortLinks[__('Date Added')] = 'added';
        ?>
        <div id="sort-links">
            <dd class="sort-label"><?php echo __('Sort by: '); ?></dd><?php echo browse_sort_links($sortLinks,array('link_tag' => 'dd', 'list_tag' => 'dl class="sub-nav"')); ?>
        </div>

        <?php endif; ?>

        <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
            <div class="item-meta">

            <div class="item-title"><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></div>

            <?php if (metadata('item', 'has thumbnail')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail')); ?>
            </div>
            <?php endif; ?>

            <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
            <div class="item-description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>

            <?php if (metadata('item', 'has tags')): ?>
            <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
                <?php echo tag_string('items'); ?></p>
            </div>
            <?php endif; ?>

            <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
        <?php endforeach; ?>

        <?php echo pagination_links(); ?>

        <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
      </div>
    </div>
  </div>
</div>
<?php echo foot(); ?>
