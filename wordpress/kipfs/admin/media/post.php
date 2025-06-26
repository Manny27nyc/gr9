/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
<?php
// affiche box avec CID
add_action('add_meta_boxes_attachment', function () {
  add_meta_box('ipfs_link_box', 'IPFS', function ($post) {
    $cid = $post->CID;
    if ($cid) echo __('Archive link', 'kipfs') . " : " . ipfs_link($cid);
    else {
    }
  });
});

add_filter('attachment_fields_to_edit', function ($form_fields, $post) {
  $file = ipfs_get_attached_file_meta($post->ID);

  if (!$file->cid) {
    $form_fields['cid'] = array(
      'label' => __('Archive to IPFS'),
      'value' => '',
      'input' => 'html',
      'html' => '<label for="attachments-' . $post->ID . '-ipfs"> ' .
        '<input type="checkbox" id="attachments-' . $post->ID . '-ipfs" name="attachments[' . $post->ID . '][ipfs]" value="1" /></label>  ',
    );
  }
  return $form_fields;
}, 10, 2);


add_action('edit_attachment', function ($attachmentId) {
  if ($_REQUEST['attachments'][$attachmentId]['ipfs']) {
    ipfs_insert($attachmentId);
  }
});
