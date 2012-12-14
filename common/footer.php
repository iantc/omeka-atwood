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
<script type="text/javascript">
  $(window).load(function() {
	$('#slider').orbit();
  });
</script>
<script type="text/javascript">
  jQuery(document).ready(function () {
	Omeka.showAdvancedForm();
  });
</script>
</body>
</html>