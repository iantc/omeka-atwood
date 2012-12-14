<?php echo head(); ?>
<div class="container">
  <div class="row">
    <div class="nine columns">
    </div>
    <div class="three columns">
	  <?php echo search_form(array('show_advanced' => false)); ?>
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
    </div>
    </div>
  </div>
</div>
<?php echo foot(); ?>