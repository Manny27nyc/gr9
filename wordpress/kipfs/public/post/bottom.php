/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
// add IPFS content at bottom of post
add_filter('the_content', function ($content)
{
  if (is_singular() && in_the_loop() && is_main_query()) {
    $content .= ipfs_links();
  }
  return $content;
});
