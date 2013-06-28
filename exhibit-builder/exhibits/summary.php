<?php echo head(array('title' => metadata('exhibit', 'title'),'bodyid'=>'exhibit','bodyclass'=>'summary')); ?>
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
    <div class="large-12 columns">
      <div id="exhibit-pages" class="section-container vertical-nav" data-section="vertical-nav" data-options="one_up: false;">
        <section>
          <ul class="large-block-grid-4">
            <?php foreach ($exhibit->TopPages as $exhibitPage) {
              echo "<li class=\"th\"><h2><a href=\"" . $exhibit->slug . "/" . $exhibitPage->slug . "\">" . $exhibitPage->title . "</a></h2>";
              $exhibitarray = exhibit_builder_page_attachment(1,0,$exhibitPage);
              echo "<div class=\"imgholder\">" . exhibit_builder_attachment_markup($exhibitarray, array('imageSize' => 'thumbnail'), array('class' => 'permalink')) . "</div>";
              echo "</li>";
            } ?>
          </ul>
        </section>
      </div>
    </div>
  </div>
  <div class="row">
	  <?php //echo metadata('exhibit', 'description', array('no_escape' => true)); ?>
  </div>
  <div class="row">
      <h4><?php echo __('Credits'); ?></h4>
      <p><?php echo metadata('exhibit', 'credits'); ?></p>
  </div>
</div>
<?php echo foot(); ?>
