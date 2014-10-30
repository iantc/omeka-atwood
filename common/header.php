<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo option('site_title'); echo isset($title) ? ' | ' . $title : ''; ?></title>
  <!-- Meta -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="<?php echo option('description'); ?>" />
  <?php echo auto_discovery_link_tags(); ?>
  <!-- Plugin Stuff -->
  <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>
  <!-- Stylesheets -->

  <link href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.0/css/normalize.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.0/css/foundation.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" media="all" rel="stylesheet" type="text/css"/>
  <?php
  queue_css_file(array('local'));
  queue_css_url('//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Trykker|Montserrat');
  echo head_css();
  ?>
  <!-- JavaScripts -->
  <?php 
    queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)'));
    queue_js_file('vendor/respond');
    queue_js_file('globals');
    echo head_js(); 
    ?>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.0/js/vendor/modernizr.js"></script>
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
