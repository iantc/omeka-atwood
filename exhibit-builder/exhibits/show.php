<?php echo head(array('title' => metadata('exhibit', 'title') . ' : '. metadata('exhibit_page', 'title'), 'bodyid'=>'exhibit','bodyclass'=>'show')); ?>
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
<div class="container" id="exhibit-page-wrapper">
  <div class="row">
    <div class="small-2 columns">
      <div id="exhibit-pages" class="section-container vertical-nav" data-section="vertical-nav" data-options="one_up: false;">
        <section>
          <ul class="side-nav">
            <?php exhibit_side_nav($exhibit, 'li'); ?>
          </ul>
        </section>
      </div>
    </div>
    <div class="small-10 columns">
      <div id="primary">
        <h2><?php echo metadata('exhibit_page', 'title'); ?></h2>
        <?php exhibit_builder_render_exhibit_page(); ?>
      </div>
    </div>
  </div>
</div>
<?php echo foot(); ?>
