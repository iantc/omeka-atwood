  <footer>
    <div class="container" id="footer-wrapper">
      <div class="row">
        <div id="footer-text">
      	  <?php echo get_theme_option('Footer Text'); ?>
      	  <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
              <p><?php echo $copyright; ?></p>
      	  <?php endif; ?>
          <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
        </div>
      </div>
    </div>
  	<?php fire_plugin_hook('public_theme_footer'); ?>
    </div>
  </footer>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.0/js/foundation/foundation.min.js"></script>
  <script type="text/javascript">
    jQuery(document).foundation();
    Omeka.showAdvancedForm();
    jQuery(document).ready(function(){
      jQuery(".top-bar-section a[href$='contact']").prepend("<i class='fi-mail'> </i> ");
      jQuery(".top-bar-section a[href$='about']").prepend("<i class='fi-info'> </i> ");
      jQuery(".top-bar-section a[href$='items/browse']").prepend("<i class='fi-thumbnails'> </i> ");
      jQuery(".top-bar-section a[href$='collections/browse']").prepend("<i class='fi-folder'> </i> ");
      jQuery(".top-bar-section a[href$='exhibits']").prepend("<i class='fi-photo'> </i> ");
      jQuery("#search-form input[type=submit]").addClass("button postfix");
    });
    function goBack() {
      window.history.back()
    }
  </script>
</body>
</html>
