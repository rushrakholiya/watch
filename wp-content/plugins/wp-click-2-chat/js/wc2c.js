(function( $ ) {
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $(document).on("click",".wc2c-wrap",function() {
            var googleEventName = $(this).attr('data-google-event-name');
            var facebookEventName = $(this).attr('data-facebook_event_name');
            var pageTitle = $('title').text();

            if(facebookEventName == '') {
                facebookEventName = 'WPClick2Chat - Click';
            }
            if(googleEventName == '') {
                googleEventName = 'WPClick2Chat - Click';
            }
            try {
                fbq('WPClick2Chat', facebookEventName, {pageTitle:pageTitle});
            } catch(e){}

            try {
                ga('send', 'event', 'WPClick2Chat', googleEventName, pageTitle);
            } catch(e){}
        });
    });

})( jQuery );