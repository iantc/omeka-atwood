<?php echo head(array('title' => metadata('exhibit', 'title'),'bodyid'=>'exhibit','bodyclass'=>'summary')); ?>
<div class="container">
  <div class="row">
    <div class="nine columns">
      <h1><?php echo metadata('exhibit', 'title'); ?></h1>
    </div>
    <div class="three columns">
	  <?php echo search_form(array('show_advanced' => false)); ?>
    </div>
  </div>
  <div class="row">
    <div class="three columns">
    <div id="exhibit-pages">
	  <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
	  <?php foreach (loop('exhibit_page') as $exhibitPages): ?>
	  <?php exhibit_builder_render_page_summary(); ?>
	  <?php endforeach; ?>
	  <?php echo exhibit_builder_page_nav(); ?>
    </div>
    </div>
    <div class="nine columns">
	  <?php //echo metadata('exhibit', 'description', array('no_escape' => true)); ?>
    </div>
  </div>
  <div id="primary" class="content">
	<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
      <p><?php echo $homepageText; ?></p>
	<?php endif; ?>
	<?php if (get_theme_option('Display Featured Item') == 1): ?>
      <div class="row">
      <div id="featured-items" class="six columns">
        <h2><?php echo __('Featured Item'); ?></h2>
		<?php echo random_featured_items(1); ?>
      </div>
      </div>
	<?php endif; ?>
    <div class="row">
      <div class="twelve columns">
        <h4><?php echo __('Credits'); ?></h4>
        <p><?php echo metadata('exhibit', 'credits'); ?></p>
      </div>
    </div>
  </div>
</div>
<?php echo foot(); ?>