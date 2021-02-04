const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/main.js', 'public/js/main.js');
mix.js('resources/assets/js/select2.js', 'public/js/select2.js');
mix.js('resources/assets/js/mask.js', 'public/js/mask.js');
mix.js('resources/assets/js/product.js', 'public/js/product.js');

mix.styles([
    'resources/assets/css/main.css',
    'resources/assets/css/select2.css',
], 'public/css/main.css');