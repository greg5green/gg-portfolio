jQuery(document).ready(function($) {

    // our magic number, in pixels, for use in maintaining vertical rhythm with any image
    var magicNumber = 24;

    $('.entry').find('img, iframe').each(function() {
        var eleHeight = this.offsetHeight,
            eleRemainder = eleHeight % magicNumber;

        // check if our element is a multiple of our Magic Number
        // and therefore, not something that ruins rhythm
        if ( eleRemainder !== 0 ) {

            // calculate what to multiply our height and width by
            var sizeMultiplier = (eleHeight - eleRemainder) / eleHeight,
                eleWidth = this.offsetWidth;

            // actually set height and width so as to avoid ruining rhythm
            this.style.height = eleHeight * sizeMultiplier + 'px';
            this.style.width = eleWidth * sizeMultiplier + 'px';
        }
    });

    // Polyfill for input placeholder test
    if (!Modernizr.placeholder) {
        $('input[type=text]').each(function() {
            var placeholder = $(this).attr('placeholder');

            // on focus, if the input contains the placeholder,
            // remove it so the user knows to type
            $(this).prop('value', placeholder).on('focus', function() {
                if (this.value === placeholder) {
                    this.value = '';
                }
            }).on('blur', function() {

                // on blur, if the box is empty, put the placeholder back
                if (this.value === '') {
                    this.value = placeholder;
                }
            });
        });
    }

});
