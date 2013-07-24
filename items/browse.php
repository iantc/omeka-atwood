<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>
<div class="container">
  <div class="row" id="exhibit-header">
    <div class="small-8 columns">
      <h1 id="exhibit-title-wrapper"><?php echo $pageTitle; ?></h1>
    </div>
    <div class="small-4 columns">
      <div class="row collapse">
        <?php echo search_form(array('show_advanced' => false)); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="small-2 columns">
      <div id="exhibit-pages">
        <nav class="items-nav panel" id="secondary-nav">
          <?php echo public_nav_items(); ?>
        </nav>
      </div>
    </div>
    <div class="small-10 columns">
      <div id="primary">
        <dl class="sub-nav">
          <dt><?php echo __('%s items', $total_results); ?></dt>
          <?php if ($total_results > 0): ?>
            <?php
            $sortLinks[__('Title')] = 'Dublin Core,Title';
            $sortLinks[__('Creator')] = 'Dublin Core,Creator';
            $sortLinks[__('Date Added')] = 'added';
            ?>
            <dt class="sort-label"><?php echo __('Sort by: '); ?></dt><?php echo browse_sort_links($sortLinks,array('link_tag' => 'dd', 'list_tag' => '')); ?>
            <dt class="pagination-wrapper"><?php echo pagination_links(); ?></dt>
          <?php endif; ?>
        </dl>

        <table id="item-browse-table">
          <tr>
            <th>Image
            </th>
            <th>Title
            </th>
            <th>Description
            </th>
            <th>Tags
            </th>
          </tr>
          <?php foreach (loop('items') as $item): ?>
            <tr class="item hentry">
              <td class="item-img">
                <?php if (metadata('item', 'has thumbnail')): ?>
                  <?php echo link_to_item(item_image('thumbnail')); ?>
                <?php endif; ?>
              </td>
              <td class="item-title">
                <?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?>
              </td>
              <td class="item-description">
                <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                  <?php echo $description; ?>
                <?php endif; ?>
              </td>
              <td class="tags">
                <?php if (metadata('item', 'has tags')): ?>
                  <?php echo tag_string('items'); ?>
                <?php endif; ?>
              </td>
              <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
            </tr><!-- end class="item hentry" -->
          <?php endforeach; ?>
        </table>
        <dl class="sub-nav">
          <?php if ($total_results > 0): ?>
            <dt class="pagination-wrapper"><?php echo pagination_links(); ?></dt>
          <?php endif; ?>
        </dl>
      <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
      </div>
    </div>
  </div>
</div>
<?php echo foot(); ?>
