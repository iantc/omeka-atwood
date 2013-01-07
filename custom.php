<?php
function link_to_related_exhibits($item) {
  $db = get_db();

  $select = "
    SELECT e.* FROM {$db->prefix}exhibits e
    INNER JOIN {$db->prefix}exhibit_pages ep on ep.exhibit_id = e.id
    INNER JOIN {$db->prefix}exhibit_page_entries epe ON epe.page_id = ep.id
    WHERE epe.item_id = ?";

  $exhibits = $db->getTable("Exhibit")->fetchObjects($select,array($item->id));

  if(!empty($exhibits)) {
    echo '<h4>Exhibits</h4>';
    foreach($exhibits as $exhibit) {
      echo '<p><a href="/exhibits/show/'.$exhibit->slug.'">'.$exhibit->title.'</a></p>';
    }
  }
}
?>
