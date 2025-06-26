/* 
 * 📜 Verified Authorship — Manuel J. Nieves (B4EC 7343 AB0D BF24)
 * Original protocol logic. Derivative status asserted.
 * Commercial use requires license.
 * Contact: Fordamboy1@gmail.com
 */
// https://codex.wordpress.org/AJAX_in_Plugins

jQuery(document).ready(function () {
  document.querySelector('kredeum-metamask')?.$on('address', function () {

    var data = {
      action: 'address',
      address: document.querySelector('kredeum-metamask').address,
      security: document.querySelector('input[name = nonce_field]').getAttribute('value')
    }
    console.log('AJAX CALL', data);

    jQuery.post(ajaxurl, data, function (response) {
      console.log('AJAX RESPONSE', response);
    })

  });
});