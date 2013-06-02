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
  jQuery(window).load(function(){
    jQuery('#featured').orbit({
      animation: 'fade',                  // fade, horizontal-slide, vertical-slide, horizontal-push
      animationSpeed: 1000,                // how fast animtions are
      timer: true,                        // true or false to have the timer
      resetTimerOnClick: true,           // true resets the timer instead of pausing slideshow progress
      advanceSpeed: 6000,                 // if timer is enabled, time between transitions
      pauseOnHover: true,                // if you hover pauses the slider
      startClockOnMouseOut: false,        // if clock should start on MouseOut
      startClockOnMouseOutAfter: 1000,    // how long after MouseOut should the timer start again
      directionalNav: true,               // manual advancing directional navs
      captions: true,                     // do you want captions?
      captionAnimation: 'fade',           // fade, slideOpen, none
      captionAnimationSpeed: 800,         // if so how quickly should they animate in
      bullets: false,                     // true or false to activate the bullet navigation
      bulletThumbs: false,                // thumbnails for the bullets
      bulletThumbLocation: '',            // location from this file where thumbs will be
      afterSlideChange: function(){},     // empty function
      fluid: true                         // or set a aspect ratio for content slides (ex: '4x3')
    });
  })
  jQuery(document).ready(function(){
    jQuery('.navigation').addClass('right');
    jQuery('#search-form #query').wrap('<div class="small-3 large-9 columns" />');
    jQuery('#search-form input[type=submit]').wrap('<div class="small-1 large-3 columns" />');
    jQuery('#search-form input[type=submit]').addClass('button expand postfix');
    jQuery('#sort-links .sort-label').prependTo('#sort-links-list');
    jQuery('#recent-items .item-title').each(function() {
      jQuery(this).prev('.item-img').children('.th').append(this);
    });
    Omeka.showAdvancedForm();
  });
  $(window).load(function() {
  $('#slider').orbit();
</script>

</body>
</html>
