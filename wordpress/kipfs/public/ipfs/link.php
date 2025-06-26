/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
// return IPFS url from CID
function ipfs_url($cid)
{
  return $cid ? IPFS_GATEWAY . "/ipfs/$cid" : "";
}

// return IPFS link from CID
function ipfs_link($cid, $text = "")
{
  if (!$text) $text = $cid;
  $url = ipfs_url($cid);

  return $cid ? "<a href='$url'>$text</a>" : "";
}
