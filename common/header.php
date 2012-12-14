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
queue_css_file(array('app', 'foundation', 'style','local'));
queue_css_url('http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic');
echo head_css();
?>
<!-- JavaScripts -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<?php queue_js_file(array('app', 'foundation')); ?>
<?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
<div class="container" id="site-header">
<?php fire_plugin_hook('public_header'); ?>
<div class="row">
<div class="twelve columns">
<h1 id="site-title">
<?php echo link_to_home_page(theme_logo()); ?>
</h1>
<?php fire_plugin_hook('public_content_top'); ?>
<nav id="primary-nav" class="top-bar">
<?php echo public_nav_main(); ?>
<ul class="nav-bar">
<li>
</li>
<li id="search-container">
<?php echo search_form(array('show_advanced' => false)); ?>
</li>
</ul>
</nav>
</div>
</div>
</div>