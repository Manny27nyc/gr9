/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
// list IPFS links
// caution : all medias included in the post are not attached :-(

function ipfs_links()
{
  $ret = "";
  $n = 0;
  $attachments = get_attached_media("");
  foreach ($attachments as $attachment) {
    $file = ipfs_get_attached_file_meta($attachment->ID);
    if ($file->cid) {
      $ret .= "<li>" . ipfs_link($file->cid, $file->filename) . "</li>";
      $n++;
    }
  }
  if ($n > 0) {
    $s = ($n > 1) ? "s" : "";
    $ret = __('Archive', 'kipfs') . "$s<ul>" . $ret . "</ul>";
  }
  return $ret;
}
