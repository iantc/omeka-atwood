<?php
function link_to_related_exhibits($item) {

    $db = get_db();

    $select = "
    SELECT e.* FROM {$db->prefix}exhibits AS e
    INNER JOIN {$db->prefix}exhibit_pages AS ep on ep.exhibit_id = e.id
    INNER JOIN {$db->prefix}exhibit_page_blocks AS epb ON epb.page_id = ep.id
    INNER JOIN {$db->prefix}exhibit_block_attachments AS epba ON epba.block_id = epb.id
    WHERE epba.item_id = ?";

    $exhibits = $db->getTable("Exhibit")->fetchObjects($select,array($item->id));

    if(!empty($exhibits)) {
        echo '<h3>Appears in Exhibits</h3>';
        foreach($exhibits as $exhibit) {
            echo '<p><a href="/exhibits/show/'.$exhibit->slug.'">'.$exhibit->title.'</a></p>';
        }
    }
}

function get_exhibit_info($item) {
  $db = get_db();

  $select = "
    SELECT e.*,ep.*,epe.* FROM {$db->prefix}exhibits e
    INNER JOIN {$db->prefix}exhibit_pages ep on ep.exhibit_id = e.id
    INNER JOIN {$db->prefix}exhibit_page_entries epe ON epe.page_id = ep.id
    WHERE epe.item_id = ?";

  $exhibits = $db->getTable("Exhibit")->fetchObjects($select,array($item->id));
  return $exhibits[0];
}

function exhibit_side_nav($exhibit, $navType = 'li'){
  $current_page_id = metadata('exhibit_page', 'id');
  foreach ($exhibit->TopPages as $exhibitPage) {
    if ($current_page_id == $exhibitPage->id){
      $current_page_marker = " class=\"active\"";
    } else {
      $current_page_marker = "";
    }
    echo "<" . $navType . $current_page_marker . "><a href=\"" . $exhibitPage->slug . "\">" . $exhibitPage->title . "</a></" . $navType . ">";
  }
}

function exhibit_sub_nav($exhibitid, $navType = 'li'){
  $db = get_db();

  $select = "
    SELECT * FROM {$db->prefix}exhibit_pages ep
    WHERE ep.exhibit_id = ?
    ORDER BY ep.order ASC";

  $exhibit = $db->getTable("Exhibit")->fetchObjects($select,$exhibitid);
  foreach ($exhibit as $exhibitPage) {
    echo "<" . $navType . "><a href=\"/exhibits/show/atwood/" . $exhibitPage->slug . "\">" . $exhibitPage->title . "</a></" . $navType . ">";
  }
}

/**
* Returns HTML for a set of linked thumbnails for the items on a given exhibit page. Each
* thumbnail is wrapped with a div of class = "exhibit-item"
*
* @param int $start The range of items on the page to display as thumbnails
* @param int $end The end of the range
* @param array $props Properties to apply to the <img> tag for the thumbnails
* @param string $thumbnailType The type of thumbnail to display
* @return string HTML output
**/
function atwood_exhibit_builder_thumbnail_gallery($start, $end, $props = array(), $thumbnailType = 'square_thumbnail'){
  $counter = 2;
  for ($count = (int)$start; $count <= (int)$end; $count++) {
    if ($attachment = exhibit_builder_page_attachment($count)) {
      if ($attachment['file']) {
        $counter++;
      }
    }
  }
  $html = '<div class="row"><div class="small-6 columns">';
  for ($i = (int)$start; $i <= (int)$end; $i++) {
    if ($attachment = exhibit_builder_page_attachment($i)) {
      $html .= "\n" . '<div class="exhibit-item">';
      if ($attachment['file']) {
          $thumbnail = file_image($thumbnailType, $props, $attachment['file']);
          $html .= exhibit_builder_link_to_exhibit_item($thumbnail, array(), $attachment['item']);
      }
      $html .= exhibit_builder_attachment_caption($attachment);
      $html .= '</div>' . "\n";
      if ($i == round(($counter/2), 0, PHP_ROUND_HALF_UP)){
        $html .= '</div><div class="small-6 columns last">';
      }
    }
  }
  $html .= '</div></div>' . "\n";
  return apply_filters('exhibit_builder_thumbnail_gallery', $html,
    array('start' => $start, 'end' => $end, 'props' => $props, 'thumbnail_type' => $thumbnailType));
}


/**
* Return HTML for displaying an attached item on an exhibit page.
*
* @see exhibit_builder_page_attachment for attachment array contents
* @param array $attachment The attachment.
* @param array $fileOptions Options for file_markup when displaying a file
* @param array $linkProperties Attributes for use when linking to an item
* @return string
*/
function atwood_exhibit_builder_attachment_markup($attachment, $fileOptions, $linkProperties, $exhibitLink)
{
    if (!$attachment) {
        return '';
    }

    $item = $attachment['item'];
    $file = $attachment['file'];

    if (!isset($fileOptions['linkAttributes']['href'])) {
        $fileOptions['linkAttributes']['href'] = $exhibitLink;
    }

    if (!isset($fileOptions['imgAttributes']['alt'])) {
        $fileOptions['imgAttributes']['alt'] = metadata($item, array('Dublin Core', 'Title'));
    }

    if ($file) {
        $html = file_markup($file, $fileOptions, null);
    } else if($item) {
        $html = exhibit_builder_link_to_exhibit_item(null, $linkProperties, $item);
    }

    $html .= exhibit_builder_attachment_caption($attachment);

    return apply_filters('exhibit_builder_attachment_markup', $html,
        compact('attachment', 'fileOptions', 'linkProperties')
    );
}

?>
