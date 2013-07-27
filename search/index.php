<?php
$pageTitle = __('Search Omeka ') . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>
<div class="container">
    <div class="row" id="site-title-wrapper">
        <div class="small-8 columns">
          <h1 id="site-title">
            <?php echo link_to_home_page(theme_logo()); ?>
          </h1>
        </div>
        <div class="small-4 columns">
          <div class="row collapse">
              <?php echo search_form(array('show_advanced' => false)); ?>
          </div>
        </div>
    </div>
    <div class="row" id="primary" class="content">
        <?php echo search_filters(); ?>
        <?php if ($total_results): ?>
            <?php echo pagination_links(); ?>
            <div id="search-results">
                <?php foreach (loop('search_texts') as $searchText): ?>
                    <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                    <p><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a> [<?php echo $searchRecordTypes[$searchText['record_type']]; ?>]</p>
                <?php endforeach; ?>
            </div>
            <?php echo pagination_links(); ?>
        <?php else: ?>
            <div id="no-results">
                <p><?php echo __('Your query returned no results.');?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php echo foot(); ?>
