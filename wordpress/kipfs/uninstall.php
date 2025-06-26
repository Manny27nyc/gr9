/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
// Uninstall IPFS
defined("WP_UNINSTALL_PLUGIN") or die(__('Not allowed', 'kipfs'));

// clear database data
global $wpdb;
$postmeta_table = $wpdb->postmeta;
$postmeta_table = str_replace($wpdb->base_prefix, $wpdb->prefix, $postmeta_table);
$wpdb->query("DELETE FROM " . $postmeta_table . " WHERE meta_key = 'CID'");
