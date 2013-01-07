<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo get_html_lang(); ?>">
<head>
<title><?php echo option('site_title'); echo isset($title) ? ' | ' . $title : ''; ?></title>
<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo option('description'); ?>" />
<?php echo auto_discovery_link_tags(); ?>
<!-- Plugin Stuff -->
<?php fire_plugin_hook('public_head', array('view'=>$this)); ?>
<!-- Stylesheets -->
<?php
queue_css_file(array('app', 'foundation', 'local'));
queue_css_url('http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic');
echo head_css();
?>
<!-- JavaScripts -->
<?php queue_js_file(array('modernizr.foundation','foundation.min', 'app')); ?>
<?php echo head_js(); ?>
<script type="text/javascript">
  jQuery(window).load(function(){
    jQuery('#featured').orbit({
      animation: 'horizontal-slide',                  // fade, horizontal-slide, vertical-slide, horizontal-push
      animationSpeed: 800,                // how fast animtions are
      timer: true,                        // true or false to have the timer
      resetTimerOnClick: false,           // true resets the timer instead of pausing slideshow progress
      advanceSpeed: 4000,                 // if timer is enabled, time between transitions
      pauseOnHover: false,                // if you hover pauses the slider
      startClockOnMouseOut: false,        // if clock should start on MouseOut
      startClockOnMouseOutAfter: 1000,    // how long after MouseOut should the timer start again
      directionalNav: true,               // manual advancing directional navs
      captions: true,                     // do you want captions?
      captionAnimation: 'fade',           // fade, slideOpen, none
      captionAnimationSpeed: 800,         // if so how quickly should they animate in
      bullets: true,                     // true or false to activate the bullet navigation
      bulletThumbs: false,                // thumbnails for the bullets
      bulletThumbLocation: '',            // location from this file where thumbs will be
      afterSlideChange: function(){},     // empty function
      fluid: false                         // or set a aspect ratio for content slides (ex: '4x3')
    });
  })
  jQuery(document).ready(function(){
  	jQuery('.navigation').addClass('right');
    jQuery('#search-form #query').wrap('<div class="nine mobile-three columns" />');
    jQuery('#search-form input[type=submit]').wrap('<div class="three mobile-one columns" />');
    jQuery('#search-form input[type=submit]').addClass('button expand postfix');
    jQuery('#sort-links .sort-label').prependTo('#sort-links-list');
    jQuery('#recent-items .item-title').each(function() {
      jQuery(this).prev('.item-img').children('.th').append(this);
    });
  });
</script>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
<div class="container top-bar home-border" id="site-header">
  <?php fire_plugin_hook('public_header'); ?>
  <div class="attached">
    <nav>
      <ul>
        <!-- Title Area -->
        <li class="name">
          <h1 id="site-title">
            <?php echo link_to_home_page(theme_logo()); ?>
          </h1>
        </li>
      </ul>
      <section>
        <!-- Left Nav Section -->
        <?php echo public_nav_main(); ?>
      </section>
    </nav>
  </div>
  <?php fire_plugin_hook('public_content_top'); ?>
</div>
