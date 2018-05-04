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

mix.sass('resources/assets/sass/style.scss', 'public/css');

mix.browserSync({
    open: 'external',
    host: 'app.silentshow',
    proxy: 'app.silentshow',
    files: ['resources/views/**/*.php', 'resources/assets/**/*.js', 'resources/assets/**/*.scss', 'app/**/*.php', 'routes/**/*.php']
});
