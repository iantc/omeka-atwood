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
          </div>
        </div>
    </div>
    <div class="row" id="primary" class="content">
        <div class="small-8 columns">
            <div class="row">
                <div class="small-8 columns">
                    <?php echo search_form(array('show_advanced' => false)); ?>
                </div>
            </div>
            <div class="row" id="search-results-wrapper">
                <?php echo search_filters(); ?>
                <?php if ($total_results): ?>
                    <?php echo pagination_links(); ?>
                    <div id="search-results">
                        <?php foreach (loop('search_texts') as $searchText):
                            $record = get_record_by_id($searchText['record_type'], $searchText['record_id']);
                            echo "<p><a href=\"" . record_url($record, 'show') . "\">";
                            echo $searchText['title'] ? $searchText['title'] : '[Unknown]';
                            echo "</a>";
                            echo " <span class=\"search-result-type\">[" . $searchRecordTypes[$searchText['record_type']] . "]</span>";
                            echo "<span class=\"search-result-desc\">";
                            if (!strstr($searchText['record_type'],"Exhibit")){
                                echo metadata($record, array('Dublin Core', 'Description'), array('snippet'=>300));
                                echo metadata($record, array('Dublin Core', 'Date'));
                                echo metadata($record, array('Dublin Core', 'Subject'));
                                echo metadata($record, array('Dublin Core', 'Publisher'));
                            }
                            echo "</span>";
                            echo "</p>";
                        endforeach; ?>
                    </div>
                    <?php echo pagination_links(); ?>
                <?php else: ?>
                    <div id="no-results">
                        <p><?php echo __('Your query returned no results.');?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="small-4 columns">
          <div class="row collapse">
          </div>
        </div>
    </div>
</div>
<?php echo foot(); ?>
