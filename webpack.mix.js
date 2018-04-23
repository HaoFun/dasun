let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.js([
    'resources/assets/js/frontend/jquery-1.9.1.min.js',
    'resources/assets/js/frontend/jquery-ui-1.8.17.custom.min.js',
    'resources/assets/js/frontend/min.js'
],'public/js/frontend/app.js').version();
mix.copy('resources/assets/css/frontend/layout.css','public/css/frontend/app.css').version();



mix.js([
        'resources/assets/js/app.js',
        'resources/assets/js/material.min.js',
        'resources/assets/js/perfect-scrollbar.jquery.min.js',
        'resources/assets/js/material-dashboard.js',
        'resources/assets/js/sweetalert.min.js'
    ], 'public/js/app.js').version();
mix.copy('resources/assets/js/moment.js','public/js/moment.js');
mix.copy('resources/assets/js/bootstrap-datetimepicker.min.js','public/js/bootstrap-datetimepicker.min.js');
mix.sass('resources/assets/sass/app.scss', 'public/css/app.css').version();
mix.copy('resources/assets/css/bootstrap-datetimepicker.min.css','public/css/bootstrap-datetimepicker.min.css');