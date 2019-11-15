(function( $ ) {
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-picker-input').wpColorPicker();

        $('.select-2').select2();
    });

})( jQuery );