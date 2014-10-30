<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<div class="container" id="header-wrapper">
  <div class="row" id="header">
    <div class="small-8 columns">
      <h1><?php echo $title; ?> </h1>
    </div>
    <div class="small-4 columns">
      <?php echo search_form(array('show_advanced' => false)); ?>
    </div>
  </div>
</div>
<div class="container browse-exhibits">
  <div class="row" id="primary" class="content">
    <div class="small-8 columns">
    <?php if (count($exhibits) > 0): ?>
      <?php //echo __('(%s total)', $total_results); ?>
        <nav class="navigation secondary-nav">
          <?php //echo nav(array(
            //array(
                //'label' => __('Browse All'),
                //'uri' => url('exhibits')
            //),
            //array(
                //'label' => __('Browse by Tag'),
                //'uri' => url('exhibits/tags')
            //)
          //)); ?>
        </nav>
      <?php //echo pagination_links(); ?>
      <?php $exhibitCount = 0; ?>
      <?php foreach (loop('exhibit') as $exhibit): ?>
        <?php $exhibitCount++; ?>
        <?php if ($exhibitCount%2==1) echo '<div class="row"><div class="large-6 columns">'; else echo '<div class="large-6 columns">'; ?>
          <div class="panel exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
            <h3><?php echo link_to_exhibit(); ?></h3>
            <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail')): ?>
              <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
            <?php endif; ?>
            <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
              <div class="description"><?php echo $exhibitDescription; ?></div>
            <?php endif; ?>
            <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
              <p class="tags"><?php echo $exhibitTags; ?></p>
            <?php endif; ?>
          </div>
        <?php if ($exhibitCount%2==1) echo '</div>'; else echo '</div></div>'; ?>
      <?php endforeach; ?>
      <?php echo pagination_links(); ?>
      <?php else: ?>
        <p><?php echo __('There are no exhibits available yet.'); ?></p>
      <?php endif; ?>
    </div>
    <div class="small-4 columns">
    </div>
  </div>
</div>
<?php echo foot(); ?>
