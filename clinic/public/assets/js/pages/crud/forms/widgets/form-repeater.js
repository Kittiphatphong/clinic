// Class definition
var KTFormRepeater = function() {

    // Private functions
    var demo1 = function() {
        $('#kt_repeater_1').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    var demo2 = function() {
        $('#kt_repeater_2').repeater({
            initEmpty: false,

            defaultValues: {

            },
            show: function() {
                $(this).slideDown("slow", function() {
                    console.log($(this).val());
                });
            },
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            },

            repeaters: [{
                // (Required)`enter code here`
                // Specify the jQuery selector for this nested repeater
                selector: '.inner-repeater'
            }],



            // hide: function(deleteElement) {
            //     if(confirm('Are you sure you want to delete this element?')) {
            //         $(this).slideUp(deleteElement);
            //     }
            // }
        });
    }


    var demo3 = function() {
        $('#kt_repeater_3').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    }

    var demo4 = function() {
        $('#kt_repeater_4').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    var demo5 = function() {
        $('#kt_repeater_5').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    var demo6 = function() {
        $('#kt_repeater_6').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }
    var demo7 = function() {
        $('#kt_repeater_7').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }
    var demo8 = function() {
        $('#kt_repeater_8').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }
    var demo9 = function() {
        $('#kt_repeater_9').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }
    var demo10 = function() {
        $('#kt_repeater_10').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }
    return {
        // public functions
        init: function() {
            demo1();
            demo2();
            demo3();
            demo4();
            demo5();
            demo6();
            demo7();
            demo8();
            demo9();
            demo10();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormRepeater.init();
});

