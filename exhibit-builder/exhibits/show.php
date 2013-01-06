<?php echo head(array('title' => metadata('exhibit', 'title') . ' : '. metadata('exhibit_page', 'title'), 'bodyid'=>'exhibit','bodyclass'=>'show')); ?>
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
    <div class="two columns">
      <div id="exhibit-pages">
        <h3><?php echo link_to_exhibit('Home', array('id'=>'home-link')); ?></h3>
      </div>
    </div>
    <div class="ten columns">
      <div id="primary">
        <h2><?php echo metadata('exhibit_page', 'title'); ?></h2>
        <?php exhibit_builder_render_exhibit_page(); ?>
      </div>
    </div>
  </div>
</div>
<?php echo foot(); ?>
