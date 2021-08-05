const mix = require('laravel-mix');

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

 mix.js('resources/js/appMobile.js', 'public/js')
 .js('resources/js/appDesktop.js', 'public/js')
 .sass('resources/sass/appMobile.scss', 'public/css/')
 .sass('resources/sass/appDesktop.scss', 'public/css/', {
     implementation: require('node-sass')
});
