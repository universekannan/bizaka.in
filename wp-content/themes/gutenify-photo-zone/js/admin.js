"use strict";

var _wp = wp,
    apiFetch = _wp.apiFetch;
jQuery(function ($) {
  var gutenify_photo_zoneRedirectToKitPage = function gutenify_photo_zoneRedirectToKitPage(res) {
    // if( res?.status && 'active' === res.status ) {
    window.location = "".concat(window.gutenify_photo_zone.gutenify_kit_gallery); // }
  }; // Activate Gutenify.


  $(document).on('click', '.gutenify-photo-zone-activate-gutenify', function () {
    $(this).html('<span class="dashicons dashicons-update"></span> Loading...').addClass('gutenify-photo-zone-importing-gutenify');
    apiFetch({
      path: '/wp/v2/plugins/gutenify/gutenify',
      method: 'POST',
      data: {
        "status": "active"
      }
    }).then(function (res) {
      gutenify_photo_zoneRedirectToKitPage(res);
    })["catch"](function () {
      gutenify_photo_zoneRedirectToKitPage({});
    });
  });
  $(document).on('click', '.gutenify-photo-zone-install-gutenify', function () {
    $(this).html('<span class="dashicons dashicons-update"></span> Loading...').addClass('gutenify-photo-zone-importing-gutenify');
    apiFetch({
      path: '/wp/v2/plugins',
      method: 'POST',
      data: {
        "slug": "gutenify",
        "status": "active"
      }
    }).then(function (res) {
      gutenify_photo_zoneRedirectToKitPage(res);
    })["catch"](function () {
      gutenify_photo_zoneRedirectToKitPage({});
    });
  });
  $(document).on('click', '.gutenify-photo-zone-admin-notice .notice-dismiss', function () {
    console.log(ajaxurl + "?action=gutenify_photo_zone_hide_theme_info_noticebar");
    apiFetch({
      url: ajaxurl + "?action=gutenify_photo_zone_hide_theme_info_noticebar&gutenify_photo_zone-nonce-name=".concat(window.gutenify_photo_zone.gutenify_photo_zone_nonce),
      method: 'POST'
    }).then(function (res) {
      console.log(res);
    })["catch"](function (res) {
      console.log(res);
    });
  });
});