<?php head(); ?>
<div class="container">
<div id="primary"  class="content">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <p><?php echo $homepageText; ?></p>
    <?php endif; ?>

<?php if (get_theme_option('Display Featured Item') == 1): ?>

<!-- Featured Item -->

<div class="row">
  <div id="featured-items" class="six columns">

	<?php echo display_random_featured_item(); ?>
</div>


<?php endif; ?>
<!--end featured-item-->

<!-- Featured Collection -->
<div class="row">
<div class="twelve columns">
<?php
$collections = get_collections();
foreach ($collections as $collection) {
	echo '<h2>' . $collection->name . '</h2>';
	echo '<p>' . $collection->description . '</p>';
}
?>
			<div class="panel">
	<?php if (get_theme_option('Display Featured Collection')): ?>

	<div id="featured-collection">
	<?php echo display_random_featured_collection(); ?>
	</div>
	

	</div>

<?php endif; ?>
	<!-- end featured collection -->
	
	
	<!-- Featured Exhibit -->
	
	<div class="row">


<?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
</div>


<?php echo exhibit_builder_display_random_featured_exhibit(); ?>
<?php endif; ?>
</div>
	<!-- End featured Exhibit -->

</div>
<footer>
<?php foot(); ?></footer>