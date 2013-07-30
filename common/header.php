<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title><?php echo option('site_title'); echo isset($title) ? ' | ' . $title : ''; ?></title>
  <!-- Meta -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="<?php echo option('description'); ?>" />
  <?php echo auto_discovery_link_tags(); ?>
  <!-- Plugin Stuff -->
  <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>
  <!-- Stylesheets -->

  <link href="//cdnjs.cloudflare.com/ajax/libs/foundation/4.1.6/css/normalize.min.css" media="all" rel="stylesheet" type="text/css" >
  <link href="//cdnjs.cloudflare.com/ajax/libs/foundation/4.1.6/css/foundation.min.css" media="all" rel="stylesheet" type="text/css" >
  <?php
  queue_css_file(array('local'));
  queue_css_url('//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Trykker|Montserrat');
  echo head_css();
  ?>
  <!-- JavaScripts -->
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.1.6/js/vendor/custom.modernizr.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.1.6/js/vendor/jquery.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.1.6/js/foundation.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery('#site-header .navigation').addClass('right');
      jQuery('#secondary-nav .navigation').addClass('side-nav')
      jQuery('#search-form input[type=submit]').addClass('button expand postfix');
      jQuery('#atwood-layout .primary .exhibit-item a').addClass('th');
      jQuery('#atwood-layout .secondary .exhibit-item a').addClass('th');
      jQuery('#sort-links .sort-label').prependTo('#sort-links-list');
      jQuery('#itemfiles .image-jpeg a').addClass('th');
      jQuery('.sub-nav .sorting').addClass('active');
      jQuery('#recent-items .item-title').each(function() {
        jQuery(this).prev('.item-img').children('.th').append(this);
      });
      if (jQuery('#side-gallery').length) {
        jQuery('#side-gallery .exhibit-item').each(function(){
          jQuery(this).append('<a class="caption"/>');
          var itemLink = jQuery(this).find('.exhibit-item-link').attr('href');
          var itemCaption = jQuery(this).find('.permalink').attr('title');
          jQuery(this).find('.caption').attr('href',itemLink).html(itemCaption);
        })
      }
    });
  </script>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
  <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
  <nav class="container top-bar home-border" id="site-header">
    <?php fire_plugin_hook('public_header'); ?>
    <ul class="title-area">        <!-- Title Area -->
      <li class="name">
        <h1 id="site-title"><?php echo link_to_home_page(theme_logo()); ?></h1>
      </li>
    </ul>
    <section class="top-bar-section">
      <!-- Left Nav Section -->
      <?php echo public_nav_main(); ?>
    </section>
    <?php fire_plugin_hook('public_content_top'); ?>
  </nav>
