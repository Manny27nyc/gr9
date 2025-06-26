/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
function ipfs_get_attached_file_meta($postId)
{
  $ret = new stdClass;

  $ret->cid  = get_post_meta($postId, 'CID', true);
  $ret->filename = basename(get_post_meta($postId, '_wp_attached_file', true));

  return $ret;
}
