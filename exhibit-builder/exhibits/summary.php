<?php echo head(array('title' => metadata('exhibit', 'title'),'bodyid'=>'exhibit','bodyclass'=>'exhibits summary')); ?>
<div class="container" id="exhibit-header-wrapper">
  <div class="row" id="exhibit-header">
    <div class="small-8 columns">
      <h1 id="exhibit-title-wrapper">
        <?php echo link_to_exhibit(metadata('exhibit', 'title'), array('id'=>'exhibit-title')); ?>
      </h1>
    </div>
    <div class="small-4 columns">
      <div class="row collapse">
          <?php echo search_form(array('show_advanced' => false)); ?>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="small-12 columns">
      <div id="exhibit-pages" class="section-container vertical-nav" data-section="vertical-nav" data-options="one_up: false;">
        <section>
          <ul class="small-block-grid-2 large-block-grid-4">
            <?php foreach ($exhibit->TopPages as $exhibitPage) {
              $exhibitPageLink = $exhibit->slug . "/" . $exhibitPage->slug;
              echo "<li class=\"th\"><h2><a href=\"" . $exhibitPageLink . "\">" . $exhibitPage->title . "</a></h2>";
              display_exhibit_page_image($exhibitPage->id);
              echo "</li>";
            } ?>
          </ul>
        </section>
      </div>
      <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
        <div class="exhibit-description">
          <?php echo $exhibitDescription; ?>
        </div>
      <?php endif; ?>
      <?php echo exhibit_builder_page_nav(); ?>
    </div>
  </div>
  <div class="row">
	  <?php //echo metadata('exhibit', 'description', array('no_escape' => true)); ?>
  </div>
  <div class="row">
    <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
      <div class="exhibit-credits">
        <h4><?php echo __('Credits'); ?></h4>
        <p><?php echo $exhibitCredits; ?></p>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php echo foot(); ?>
