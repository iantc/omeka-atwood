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
    <div class="large-3 columns">
      <div id="exhibit-pages" class="section-container vertical-nav" data-section="vertical-nav" data-options="one_up: false;">
        <section>
          <ul class="side-nav">
            <?php foreach ($exhibit->TopPages as $exhibitPage) {
              echo "<li><a href=\"" . $exhibit->slug . "/" . $exhibitPage->slug . "\">" . $exhibitPage->title . "</a></li>";
            } ?>
          </ul>
        </section>
      </div>
    </div>
    <div class="large-6 columns">
      <div id="featured">
        <img src="/themes/atwood/assets/images/slideshow1.jpg" />
        <img src="/themes/atwood/assets/images/slideshow2.jpg" />
        <img src="/themes/atwood/assets/images/slideshow3.jpg" />
        <img src="/themes/atwood/assets/images/slideshow4.jpg" />
        <img src="/themes/atwood/assets/images/slideshow5.jpg" />
      </div>
      <hr />
    </div>
    <div class="large-3 columns">
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
