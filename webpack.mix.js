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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/frontend/css/normalize.css',
    'public/frontend/css/hamburger.css',
    'public/frontend/css/layout.css',
    'public/frontend/css/social_buttons.css',
    'public/frontend/css/popup_form.css',
    'public/frontend/css/breadcrumbs.css','' +
    'public/frontend/css/home.css',
    'public/frontend/css/product.css',
    'public/frontend/css/contact_us.css'
], 'public/css/my.css');

mix.styles([
    'public/frontend/css/catalog.css'
], 'public/css/catalog.css');

mix.scripts([
    'public/frontend/js/hamburger.js',
    'public/frontend/js/layout.js',
    'public/frontend/js/lazy_load.js'
], 'public/js/my.js');

mix.scripts([
    'public/frontend/js/catalog.js'
], 'public/js/catalog.js');
mix.scripts([
    'public/frontend/js/product.js'
], 'public/js/product.js');
