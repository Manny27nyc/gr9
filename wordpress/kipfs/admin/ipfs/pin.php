/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
// ipfs pin cid
function ipfs_pin($cid)
{
  // if (IPFS_PINNING_API) $ret = _ipfs_pinnning($cid);
  // else if (IPFS_CLUSTER_API) $ret = _ipfs_cluster_pin($cid);
  // else $ret = _ipfs_pin($cid);

  // return $ret;

  return _ipfs_pin($cid);
}

// via ipfs API
function _ipfs_pin($cid)
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, IPFS_API . "/pin/add?arg=" . $cid);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);

  $exec = curl_exec($ch);
  $ret = ($exec === false) ? curl_error($ch) :  json_decode($exec)->Pins[0];
  curl_close($ch);

  return $ret;
}


// via ipfs-cluster API
function _ipfs_cluster_pin($cid)
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, IPFS_CLUSTER_API . "/pins/" . $cid);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);

  $exec = curl_exec($ch);

  $ret = ($exec === false) ? curl_error($ch) : json_decode($exec);
  curl_close($ch);

  return $ret;
}

// via ipfs pinning API
function _ipfs_pinnning($cid)
{
  $postfields = json_encode(array(
    "cid" => $cid,
    "name" => "kipfs " . $cid
  ));
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, IPFS_PINNING_API . "/pins");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
  // curl_setopt($ch, CURLOPT_HEADER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($postfields)
  ));


  $exec = curl_exec($ch);
  $ret = ($exec === false) ? curl_error($ch) :  json_decode($exec)->Hash;
  curl_close($ch);

  return $ret;
}
