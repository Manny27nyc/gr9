/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
function ipfs_upsert($postId)
{
  $file = ipfs_get_attached_file_meta($postId);
  if ($file->cid === "") {
    $cid = ipfs_insert($postId, $file->filename);
  }
  return $cid;
}
function ipfs_insert($postId)
{
  if(defined('IPFS_PINATA_SECRET') ) {
    $cid = ipfs_pinata_insert($postId);
  }
  else{
    $cid = ipfs_add($postId);
    ipfs_pin($cid);
  }
  update_post_meta($postId, 'CID', $cid);
  return $cid;
}
