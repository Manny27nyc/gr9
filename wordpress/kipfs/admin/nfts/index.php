/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php

add_action('admin_menu', 'nfts_menu');
function nfts_menu()
{
  add_menu_page(
    __('NFTs Kredeum', 'kipfs'),
    __('NFTs', 'kipfs'),
    'edit_posts',
    'nfts',
    'nfts_options',
    'dashicons-format-gallery',
    11
  );
  add_submenu_page(
    'nfts',
    __('NFTs Kredeum', 'kipfs'),
    __('NFTs Kredeum', 'kipfs'),
    'edit_posts',
    'nfts'
  );
}
function nfts_options()
{
  echo '<kredeum-nft/>';
}
