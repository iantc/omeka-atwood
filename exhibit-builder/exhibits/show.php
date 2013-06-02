<?php echo head(array('title' => metadata('exhibit', 'title') . ' : '. metadata('exhibit_page', 'title'), 'bodyid'=>'exhibit','bodyclass'=>'show')); ?>
<div class="container">
  <div class="row" id="exhibit-header">
    <div class="large-8 columns">
      <h1 id="exhibit-title-wrapper"><?php echo link_to_exhibit(metadata('exhibit', 'title'), array('id'=>'exhibit-title')); ?></h1>
    </div>
    <div class="large-4 columns">
      <div class="row collapse">
        <?php echo search_form(array('show_advanced' => false)); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="large-2 columns">
      <div id="exhibit-pages" class="section-container vertical-nav" data-section="vertical-nav" data-options="one_up: false;">
        <section>
          <ul class="side-nav">
            <?php $current_page_id = metadata('exhibit_page', 'id'); ?>
            <?php foreach ($exhibit->TopPages as $exhibitPage) {
              if ($current_page_id == $exhibitPage->id){
                $current_page_marker = " class=\"active\"";
              } else {
                $current_page_marker = "";
              }
              echo "<li" . $current_page_marker . "><a href=\"" . $exhibitPage->slug . "\">" . $exhibitPage->title . "</a></li>";
            } ?>
          </ul>
        </section>
      </div>
    </div>
    <div class="large-10 columns">
      <div id="primary">
        <h2><?php echo metadata('exhibit_page', 'title'); ?></h2>
        <?php exhibit_builder_render_exhibit_page(); ?>
      </div>
    </div>
  </div>
</div>
<?php echo foot(); ?>
