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
    .js('resources/js/common.js', 'public/js')
    .js('resources/js/users.js', 'public/js')
    .js('resources/js/salas.js', 'public/js')
    .js('resources/js/eventos.js', 'public/js')
    .js('resources/js/eventosAll.js', 'public/js')
    .js('resources/js/eventosAllSala.js', 'public/js')
    .js('resources/js/eventosSala.js', 'public/js')
    .js('resources/js/eventosTabla.js', 'public/js')
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/css', 'public/css')
    .copyDirectory('resources/js/datatables', 'public/js/datatables')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
