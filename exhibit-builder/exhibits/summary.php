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
        <ul class="tabs vertical">
          <?php foreach ($exhibit->TopPages as $exhibitPage) {
            echo "<li><a href=\"" . $exhibit->slug . "/" . $exhibitPage->slug . "\">" . $exhibitPage->title . "</a></li>";
          } ?>
        </ul>
      </div>
    </div>
    <div class="six columns">
      <div id="featured">
        <img src="/themes/atwood/assets/images/slideshow1.jpg" />
        <img src="/themes/atwood/assets/images/slideshow2.jpg" />
        <img src="/themes/atwood/assets/images/slideshow3.jpg" />
        <img src="/themes/atwood/assets/images/slideshow4.jpg" />
        <img src="/themes/atwood/assets/images/slideshow5.jpg" />
      </div>
      <hr />
    </div>
    <div class="three columns">
    </div>
  </div>
  <div class="row">
    <div class="twelve columns">
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
