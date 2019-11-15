(function($) {
    'use strict';
    $(window).load(function() {
        $('body').on('click', '.advance_search_for_woocommerce_save_btn', function( ) {
            var Product_Category = $('input[id="advance_search_product_category"][type="checkbox"]:checked').val();
            var Product_Tag = $('input[id="advance_search_product_tag"][type="checkbox"]:checked').val();
            var Advance_search_filter = $('input[name="advance_search_filter"][type="radio"]:checked').val();
            var order_by = $(".advance_search_filter_order_by_html option:selected").val();
            var custom_css = $("#woo-advance-search-custom-id").val();
            $.ajax({
                type: "POST",
                url: adminajaxjs.adminajaxjsurl,
                data: ({
                    action: 'Save_advance_search_settings_free',
                    Product_Category: Product_Category,
                    Product_Tag: Product_Tag,
                    Advance_search_filter: Advance_search_filter,
                    order_by: order_by,
                    custom_css: custom_css,
                }),
                success: function(data) {
                    $('.woo_advance_save_record_messgae').css('display', 'block').delay(2000).fadeOut('slow');
                    ;
                    $('.woo_advance_save_record_messgae').html(data);
                }
            });
        });


        $('body').on('click', '#advance_search_open_preview', function( ) {
            $('#advance_search_open_preview').addClass('nav-tab-active');
            $('#advance_search_open_setting').removeClass('nav-tab-active');
            $('#advance_search_open_shortcode').removeClass('nav-tab-active');
            $('#advance_search_open_custom_css').removeClass('nav-tab-active');

            $('.woo-advance-search-preview-tab').css('display', 'block');
            $('.woo-advance-search-setting-tab').css('display', 'none');
            $('.woo-advance-search-shortcode-tab').css('display', 'none');


            var Product_Category = $('input[id="advance_search_product_category"][type="checkbox"]:checked').val();
            var Product_Tag = $('input[id="advance_search_product_tag"][type="checkbox"]:checked').val();
            if (Product_Category == 'Active') {
                var product_category_css = 'inline-block';
            } else {
                var product_category_css = 'none';
            }
            if (Product_Tag == 'Active') {

                var Product_Tag_css = 'inline-block';
            } else {
                var Product_Tag_css = 'none';
            }
            $('select#advance_search_category_preview_html').css('display', product_category_css);
            $('select#advance_search_category_tag_html').css('display', Product_Tag_css);


        });
        $('body').on('click', '#advance_search_open_setting', function( ) {
            $('#advance_search_open_preview').removeClass('nav-tab-active');
            $('#advance_search_open_setting').addClass('nav-tab-active');
            $('#advance_search_open_shortcode').removeClass('nav-tab-active');
            $('#advance_search_open_custom_css').removeClass('nav-tab-active');

            $('.woo-advance-search-setting-tab').css('display', 'block');
            $('.woo-advance-search-preview-tab').css('display', 'none');
            $('.woo-advance-search-shortcode-tab').css('display', 'none');
            $('.woo-advance-search-custom-css').css('display', 'none');
        });

        $('body').on('click', '#advance_search_open_shortcode', function( ) {
            $('#advance_search_open_preview').removeClass('nav-tab-active');
            $('#advance_search_open_shortcode').addClass('nav-tab-active');
            $('#advance_search_open_setting').removeClass('nav-tab-active');
            $('#advance_search_open_custom_css').removeClass('nav-tab-active');

            $('.woo-advance-search-shortcode-tab').css('display', 'block');
            $('.woo-advance-search-setting-tab').css('display', 'none');
            $('.woo-advance-search-preview-tab').css('display', 'none');
            $('.woo-advance-search-custom-css').css('display', 'none');

        });

        $('body').on('click', '#advance_search_open_custom_css', function( ) {
            $('#advance_search_open_preview').removeClass('nav-tab-active');
            $('#advance_search_open_shortcode').removeClass('nav-tab-active');
            $('#advance_search_open_setting').removeClass('nav-tab-active');
            $('#advance_search_open_custom_css').addClass('nav-tab-active');

            $('.woo-advance-search-shortcode-tab').css('display', 'none');
            $('.woo-advance-search-setting-tab').css('display', 'none');
            $('.woo-advance-search-preview-tab').css('display', 'none');
            $('.woo-advance-search-custom-css').css('display', 'block');

        });

        var clipboard = new Clipboard('.btn');

        clipboard.on('success', function(e) {
            e.clearSelection();
        });

        clipboard.on('error', function(e) {
        });
    });

    /**/

})(jQuery);
