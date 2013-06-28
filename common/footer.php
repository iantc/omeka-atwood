<footer>
  <div class="row">
    <div id="footer-text">
	  <?php echo get_theme_option('Footer Text'); ?>
	  <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
	  <?php endif; ?>
      <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
    </div>
	<?php fire_plugin_hook('public_theme_footer'); ?>
  </div>
</footer>
<!-- Check for Zepto support, load jQuery if necessary -->
<script>
  document.write('<script src=/themes/atwood/javascripts/vendor/'
    + ('__proto__' in {} ? 'zepto' : 'jquery')
    + '.js><\/script>');
</script>
<?php queue_js_file(array('foundation.min', 'app')); ?>
<?php echo head_js(); ?>
<script type="text/javascript">
  jQuery('.navigation').addClass('right');
  jQuery('#search-form #query').wrap('<div class="small-3 large-9 columns" />');
  jQuery('#search-form input[type=submit]').wrap('<div class="small-1 large-3 columns" />');
  jQuery('#search-form input[type=submit]').addClass('button expand postfix');
  jQuery('#atwood-layout .secondary a').addClass('th');
  jQuery('#sort-links .sort-label').prependTo('#sort-links-list');
  jQuery('#recent-items .item-title').each(function() {
    jQuery(this).prev('.item-img').children('.th').append(this);
  });
  Omeka.showAdvancedForm();
  $(document).foundation();
</script>
</body>
</html>
