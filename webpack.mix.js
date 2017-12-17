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
	.copy('node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css', 'public/css/fancybox.css')
	.copy('node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js', 'public/js/fancybox.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/master.scss', 'public/css')
    .sass('resources/assets/sass/welcome.scss', 'public/css')
    .sass('resources/assets/sass/forms.scss', 'public/css')
    .js('resources/assets/js/home.js', 'public/js')
    .js('resources/assets/js/create_product.js', 'public/js')
    .copy('resources/assets/css/home.css', 'public/css/home.css')
    .copy('resources/assets/css/list_products.css', 'public/css/list_products.css')
    .copy('resources/assets/css/bouton.css', 'public/css/bouton.css')
    .copy('resources/assets/img', 'public/img')
    .copy('node_modules/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css')
    .copy('node_modules/font-awesome/fonts/', 'public/fonts/',true);
