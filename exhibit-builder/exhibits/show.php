<?php echo head(array('title' => metadata('exhibit', 'title') . ' : '. metadata('exhibit_page', 'title'), 'bodyid'=>'exhibit','bodyclass'=>'show')); ?>
<div class="row">
  <div class="twelve columns">
    <div id="primary">  
      <h1><?php echo link_to_exhibit(); ?></h1>
      <h2><?php echo metadata('exhibit_page', 'title'); ?></h2>
      <?php exhibit_builder_render_exhibit_page(); ?>
    </div>
  </div>
</div>
<?php echo foot(); ?>