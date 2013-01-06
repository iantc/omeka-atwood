<?php echo head(array('title' => metadata('exhibit', 'title'),'bodyid'=>'exhibit','bodyclass'=>'summary')); ?>
<div class="container">
  <div class="row" id="exhibit-header">
    <div class="eight columns">
      <h1 id="exhibit-title-wrapper"><?php echo link_to_exhibit(metadata('exhibit', 'title'), array('id'=>'exhibit-title')); ?></h1>
    </div>
    <div class="four columns">
      <div class="row collapse">
          <?php echo search_form(array('show_advanced' => false)); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="three columns">
      <div id="exhibit-pages">
        <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
        <?php foreach (loop('exhibit_page') as $exhibitPages): ?>
        <?php exhibit_builder_render_page_summary(); ?>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="nine columns">
      <div id="featured">
        <img src="http://placehold.it/600x240&text=[img 1]" />
        <img src="http://placehold.it/600x240&text=[img 2]" />
        <img src="http://placehold.it/600x240&text=[img 3]" />
        <img src="http://placehold.it/600x240&text=[img 4]" />
      </div>
      <hr />
    </div>
  </div>
  <div class="row">
    <div class="nine columns">
	  <?php //echo metadata('exhibit', 'description', array('no_escape' => true)); ?>
    </div>
  </div>
  <div class="row">
    <div class="twelve columns">
      <h4><?php echo __('Credits'); ?></h4>
      <p><?php echo metadata('exhibit', 'credits'); ?></p>
    </div>
  </div>
</div>
<?php echo foot(); ?>
