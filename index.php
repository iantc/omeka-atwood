<?php echo head(array('bodyid'=>'home')); ?>
<div class="container">
  <div class="row" id="site-title-wrapper">
    <div class="large-8 columns">
      <h1 id="site-title">
        <?php echo link_to_home_page(theme_logo()); ?>
      </h1>
    </div>
    <div class="large-4 columns">
      <div class="row collapse">
    	  <?php echo search_form(array('show_advanced' => false)); ?>
      </div>
    </div>
  </div>
  <div class="row" id="primary" class="content">
    <div class="large-5 columns">
      <aside id="intro" role="introduction">
        <p><?php echo option('description'); ?></p>
      </aside>

      <?php if (get_theme_option('Homepage Text')): ?>
        <p><?php echo get_theme_option('Homepage Text'); ?></p>
      <?php endif; ?>

      <?php if (get_theme_option('Display Featured Item') !== '0'): ?>
        <!-- Featured Item -->
        <div id="featured-item">
          <h2><?php echo __('Featured Item'); ?></h2>
          <?php echo random_featured_items(1); ?>
        </div><!--end featured-item-->
      <?php endif; ?>

      <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
        <!-- Featured Collection -->
        <div id="featured-collection">
          <h2><?php echo __('Featured Collection'); ?></h2>
          <?php echo random_featured_collection(); ?>
        </div><!-- end featured collection -->
      <?php endif; ?>

      <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
              && plugin_is_active('ExhibitBuilder')
              && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
        <!-- Featured Exhibit -->
        <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
      <?php endif; ?>
    </div>
    <div class="large-7 columns">
      <div id="recent-items">
        <h2><?php echo __('Recent Additions'); ?></h2>

        <?php
        $homepageRecentItems = (int)get_theme_option('Homepage Recent Items') ? get_theme_option('Homepage Recent Items') : '3';
        set_loop_records('items', get_recent_items($homepageRecentItems));
        if (has_loop_records('items')): ?>
          <div class="items-list">
            <div class="row">
              <?php
              $counta = 1;
              foreach (loop('items') as $item): ?>
                <div class="item large-4 columns front">
                  <?php if (metadata('item', 'has thumbnail')): ?>
                    <div class="item-img">
                      <?php echo link_to_item(item_image('square_thumbnail'),array('class'=>'recent-item th')); ?>
                      <span class="item-title"><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title'))); ?></span>
                    </div>
                  <?php endif; ?>
                </div>
              <?php
              if ($counta == 3 || $counta == 6){
                echo "</div><div class=\"row\">";
              }
              $counta++;
              endforeach; ?>
            </div>
          </div>
        <?php else: ?>
          <p><?php echo __('No recent items available.'); ?></p>
        <?php endif; ?>
        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
      </div><!--end recent-items -->
    </div>
  </div>
</div>
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>
<?php echo foot(); ?>
