/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

// archive IPFS on media upload
if (IPFS_AUTO){
  add_action('add_attachment', function ($postId) {
    return ipfs_upsert($postId);
  });  
}
