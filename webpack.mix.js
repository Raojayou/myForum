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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/validation.js', 'public/js')
    .js('resources/assets/js/validationForm.js', 'public/js')
    .js('resources/assets/js/modal.js', 'public/js')
    .js('resources/assets/js/create.js', 'public/js')
    .js('resources/assets/js/read.js', 'public/js')
    .js('resources/assets/js/update.js', 'public/js')
    .js('resources/assets/js/delete.js', 'public/js')
    .js('resources/assets/js/delay.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/spinner.scss', 'public/css')
    .sass('resources/assets/sass/styles.scss', 'public/css');
