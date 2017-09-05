var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix
     //.phpUnit()
     //.compressHtml()

    /**
     * Copy needed files from /node directories
     * to /public directory.
     */
     .copy(
       'node_modules/font-awesome/fonts',
       'public/build/fonts/font-awesome'
     )
     .copy(
       'node_modules/bootstrap-sass/assets/fonts/bootstrap',
       'public/build/fonts/bootstrap'
     )
     .copy(
       'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
       'public/js/vendor/bootstrap'
     )
     .copy(
        'node_modules/pdfmake/build/pdfmake.min.js',
        'public/js/vendor/pdfmake'
     )
     .copy(
         'node_modules/pdfmake/build/vfs_fonts.js',
         'public/js/vendor/pdfmake'
     )
     .copy(
         'client/build/client-modules.min.js',
         'public/js/client-modules.min.js'
     )
     .copy(
         'client/build/client-modules.min.css',
         'public/css/client-modules.min.css'
     )


        /**
      * Process frontend SCSS stylesheets
      */
     .sass([
        'frontend/app.scss'
     ], 'resources/assets/css/frontend/app.css')

     /**
      * Combine pre-processed frontend CSS files
      */
     .styles([
        'frontend/app.css'
     ], 'public/css/frontend.css')

     /**
      * Combine frontend scripts
      */
     .scripts([
        'plugin/sweetalert/sweetalert.min.js',
        'plugins.js',
        'frontend/app.js'
     ], 'public/js/frontend.js')

     /**
      * Process backend SCSS stylesheets
      */
     .sass([
         'backend/plugin/toastr/toastr.scss'
     ], 'resources/assets/css/backend/app.css')

     /**
      * Combine pre-processed backend CSS files
      */
     .styles([
         'backend/app.css',
         'plugin/jquery/jquery.ui.css',
         'plugin/perfect-scrollbar/perfect-scrollbar.css'
     ], 'public/css/backend.css')

     /**
      * Combine backend scripts
      */
     .scripts([
         'plugin/sweetalert/sweetalert.min.js',
         'plugins.js',
         'backend/app.js',
         'backend/plugin/toastr/toastr.min.js',
         'plugin/jquery/jquery.ui.js',
         'plugin/perfect-scrollbar/perfect-scrollbar.js',
         'plugin/medium-js/rangy-core.js',
         'plugin/medium-js/rangy-classapplier.js',
         'plugin/medium-js/undo.js',
         'plugin/medium-js/medium.js',
         'backend/custom.js'
     ], 'public/js/backend.js');

    // Front Styles
    mix.styles([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'front.css',
        'animate.css',
        'bootstrap-select.min.css'
    ], 'public/css/front.css');

    // Front Scripts
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'bootstrap-select.min.js',
        'vendor/password_strength/strength.js',
        'views.js',
        'moment.js',
        'data-slider.js'
    ], 'public/js/front.js');

    // Client Styles
    mix.styles([
        'bootstrap.min.css',
        'bootstrap-custom-xl.css',
        'style.css',
        'flexgrid.css',
        'colorpanel.css',
        'animate.css',
        'bxslider.css',
        'slideshow/slideshow.css',
        'slideshow/responsive.css'
    ], 'public/css/client.css');

    // Client Scripts
    mix.scripts([
        'jquery.min.js',
        'jquery-ui.js',
        'bootstrap.min.js',
        'bxslider.js',
        'moment.js',
        'moment-range.js',
        'moment-tz.js',
        'views.js',
        'full-archive-slider.js',
        'plugin/underscore/underscore.min.js'
    ], 'public/js/client.js');

    // Client Styles
    mix.styles([
        'style.css',
        'bootstrap.min.css',
        'jquery-ui.css',
        'kiosk/base.css',
        'kiosk/font-awesome.css',
        'kiosk/perfect-scrollbar.css',
        'plugin/owl-carousel/owl.carousel.css'
    ], 'public/css/kiosk.css');

    // Client Scripts
    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'jquery-ui.js',
        'modernizr-3.0.0.js',
        'perfect-scrollbar.jquery.js',
        'plugin/owl-carousel/owl.carousel.js',
        'jquery-mousewheel.js',
        'handlebars-v4.0.5.js'
    ], 'public/js/kiosk.js');

    // Interface Styles
    mix.styles([
        'bootstrap.min.css',
        'bootstrap-custom-xl.css',
        'jquery-ui.css',
        'flexgrid.css',
        'plugin/businessHours/jquery.businessHours.css',
        'jquery.scrollbar.css',
        'c-icons.css',
        'timeline.css',
        'plugin/inno-fileuploader/jquery.fileuploader.css',
        'fileupload.css',
        'animate.css',
        'timepicker.css',
        'alert.css',
        'bootstrap-toggle.min.css',
        'bootstrap-datepicker.min.css',
        'bootstrap-colorpicker.css',
        'bootstrap-select.min.css',
        'font-awesome.min.css',
        'bxslider.css',
        'plugin/sweetalert/sweetalert.min.css',
        'plugin/owl-carousel/owl.carousel.css',
        'plugin/owl-carousel/owl.theme.green.css',
        'backend/app.css',
        'plugin/bootstrap-wysiwig/bootstrap-wysiwig.css',
        'plugin/bootstrap-multiselect/bootstrap-multiselect.css',
        'plugin/perfect-scrollbar/perfect-scrollbar.css',
        'style.css',
        'colorpanel.css',
	    'lightbox.css',
        'slideshow/slideshow.css',
        'slideshow/responsive.css',
        'responsive.css',
        'bootstrap-slider.min.css',
        '../../../client/build/client-modules.min.css'
    ], 'public/css/app.css');

    // Interface Scripts
    mix.scripts([
        'jquery.min.js',
        'bootstrap-slider.min.js',
        'jquery-ui.js',
        'bootstrap.min.js',
        'plugin/underscore/underscore.min.js',
        'plugin/polyfill/bluebird-promise.min.js',
        'plugin/sweetalert/sweetalert.min.js',
        'moment.js',
        'moment-range.js',
        'display.js',
        'daypart.js',
        'canvas.js',
        'moment-tz.js',
        'transition.js',
        'collapse.js',
        'dateformatter.js',
        'bootstrap-toggle.min.js',
        'bootstrap-colorpicker.js',
        'plugin/select2/select2.min.js',
        'bootstrap-datepicker.min.js',
        'responsive-tabs.js',
        'timepicker.js',
        'scheduler.js',
        'plugin/inno-fileuploader/jquery.fileuploader.min.js',
        'fileupload.js',
        'timeline.js',
        'bxslider.js',
        'owl.carousel.js',
        'jquery-mousewheel.js',
        'menu-templates.js',
        'spin.js',
        'jquery.scrollbar.js',
        'jquery.formatter.js',
        'backend/plugin/toastr/toastr.min.js',
        'views.js',
        //'ajaxrequest.js',
        'data-slider.js',
        'plugin/bootstrap-wysiwig/bootstrap-wysiwig.js',
        'plugin/bootstrap-multiselect/bootstrap-multiselect.js',
        'plugin/perfect-scrollbar/perfect-scrollbar.js',
        'plugin/chart-js/chart.min.js',
        'plugins.js',
        'handlebars-v4.0.5.js',
        'zoomify.js',
        'plugin/modernizr/modernizr-custom-build.3.3.1.js',
        'plugin/lazyloader/masonry.pkgd.min.js',
        'plugin/lazyloader/imagesloaded.js',
        'plugin/lazyloader/classie.js',
        'plugin/lazyloader/AnimOnScroll.js',
        'plugin/businessHours/jquery.businessHours.js',
        'plugin/ml-push-menu/classie.js',
        'plugin/jquery/jquery.maskedinput.min.js',
        'plugin/jquery/globalize.js',
        'plugin/ml-push-menu/mlpushmenu.js',
        'plugin/hyphenator/hyphenator.js',
        '../../../client/build/client-modules.min.js',
		'dataset-pollyfill.js',
        'plugin/alphanum/jquery-alphanum.js'
    ], 'public/js/app.js');

    /**
     * Combine pre-processed backend CSS files
     */
    mix.styles([
        'style.css',
        'bootstrap.min.css',
        'font-awesome.min.css',
        'plugin/jquery/jquery.ui.css',
        'backend/app.css',
        'bootstrap-toggle.min.css',
        'plugin/sweetalert/sweetalert.min.css',
        'plugin/perfect-scrollbar/perfect-scrollbar.css',
        'plugin/medium-js/medium-js.css',
        'plugin/colorpicker/spectrum.css',
        'plugin/font-select/font-select.css',
        'plugin/jquery-selectboxit/jquery.selectboxit.css',
        'plugin/mperfect-scrollbar/mperfect-scrollbar.css',
        'plugin/owl-carousel/owl.carousel.css',
        'plugin/owl-carousel/owl.theme.green.css',
        'plugin/dhtmlx/dhtmlx-slider.css',
        'plugin/light-gallery/light-gallery.css',
        'plugin/select2/select2.min.css',
        'plugin/jstree/themes/default/style.min.css'
    ], 'public/css/ftx-canvas.css');

    /**
     * Combine backend scripts
     */
     mix.scripts([
        'bootstrap.min.js',
        'plugin/underscore/underscore.min.js',
        'plugin/sweetalert/sweetalert.min.js',
        'plugins.js',
        'backend/app.js',
        'plugin/toastr/toastr.min.js',
        'plugin/jquery/jquery.ui.js',
        'plugin/mperfect-scrollbar/jquery.mousewheel.js',
        'plugin/mperfect-scrollbar/mperfect-scrollbar.js',
        'plugin/perfect-scrollbar/perfect-scrollbar.js',
        'plugin/medium-js/rangy-core.js',
        'plugin/medium-js/rangy-classapplier.js',
        'plugin/medium-js/medium.js',
        'plugin/font-select/font-select.min.js',
        'plugin/colorpicker/spectrum.js',
        'plugin/ddslick/ddslick.js',
        'bootstrap-toggle.min.js',
        'plugin/jquery-selectboxit/jquery.selectboxit.js',
        'plugin/webfont/webfont.js',
        'plugin/lazyload/lazyload.js',
        'plugin/themepunch/jquery.themepunch.tools.min.js',
        'plugin/owl-carousel/owl.carousel.js',
        'plugin/keyboard-js/keyboard.min.js',
        'plugin/svg-js/svg.min.js',
        'plugin/free-transform/matrix.js',
        'plugin/panzoom/jquery.panzoom.js',
        'backend/custom.js',
        'plugin/select2/select2.min.js',
        'plugin/modernizr/modernizr-custom-build.3.3.1.js',
        'plugin/lazyloader/masonry.pkgd.min.js',
        'plugin/lazyloader/imagesloaded.js',
        'plugin/lazyloader/classie.js',
        'plugin/lazyloader/AnimOnScroll.js',
        'plugin/jstree/jstree.min.js',
        'plugin/lazyloader/masonry.pkgd.min.js',
        'plugin/lazyloader/imagesloaded.js',
        //'ajaxrequest.js'
		'dataset-pollyfill.js'
    ], 'public/js/ftx-canvas.js');

    /**
     * Combine POS Panel Scripts
     */
    mix.styles([
        'plugin/angular-gridster/angular-gridster.min.css'
    ], 'public/css/pos-panel.css');

    /**
     * Combine POS Panel Scripts
     */
    mix.scripts([
        'handlebars-v4.0.5.js',
        'plugin/angular/angular.min.js',
        'plugin/angular-bind-html-compile/angular-bind-html-compile.min.js',
        'plugin/angular-gridster/angular-gridster.min.js',
        'plugin/angular-dragdrop/angular-dragdrop.min.js',
        'plugin/keyboard-js/keyboard.min.js'
    ], 'public/js/pos-panel.js');

    /**
     * Combine Data Tables Styles
     */
    mix.styles([
        'plugin/datatables/jquery.dataTables.min.css',
        'plugin/datatables/buttons.dataTables.min.css',
        'plugin/datatables/dataTables.fontAwesome.css'
    ], 'public/css/datatables.css');

    /**
     * Combine Data Tables Scripts
     */
    mix.scripts([
        'plugin/datatables/jquery.datatables.js',
        'plugin/datatables/datatable-buttons.js',
        'plugin/datatables/buttons.flash.min.js',
        'plugin/datatables/jszip.min.js',
        'plugin/datatables/vfs_fonts.js',
        'plugin/datatables/pdfmake.0.1.30.js',
        'plugin/datatables/datatable-buttons.html5.js',
        'plugin/datatables/dragscroll.js',
        'plugin/datatables/buttons.colVis.min.js',
        'plugin/datatables/dataTables.select.min.js',
        'plugin/datatables/dataTables.checkboxes.min.js'
    ], 'public/js/datatables.js');

    /**
      * Apply version control
      */
      mix.version([
        'public/css/front.css',
        'public/js/front.js',
        'public/css/client.css',
        'public/js/client.js',
        'public/css/app.css',
        'public/js/app.js',
        'public/css/kiosk.css',
        'public/js/kiosk.js',
        'public/css/ftx-canvas.css',
        'public/js/ftx-canvas.js',
        'public/css/pos-panel.css',
        'public/js/pos-panel.js',

        /* laravel 5 boilerplate files */
        "public/css/frontend.css",
        "public/js/frontend.js",
        "public/css/backend.css",
        "public/js/backend.js",
        "public/js/ftx-canvas.js"
      ]);

  mix.copy('resources/assets/css/bootstrap.min.css.map', 'public/build/css');
  mix.copy('resources/assets/fonts', 'public/build/fonts');
  mix.copy('node_modules/jquery-ui/themes/base/images', 'public/build/css/images');

});
