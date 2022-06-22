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

 mix.js(
 	'resources/js/app.js'
 	, 'public/js')
 .sass(
 	'resources/sass/app.scss'
 	, 'public/css');

// mix.js([
//     'resources/js/jquery-3.5.1.js',
//     'resources/js/bootstrap.js',
//     'resources/js/toastr.js',
//     'resources/js/vue.js',
//     'resources/js/axios.js',
//     'resources/js/vuetify.js',
//     'resources/js/my.js',
//     'resources/js/app.js',
// ],'public/js/app.js').styles([
// 'resources/css/bootstrap.css',
// 'resources/css/materialdesignicons.min.css',
// 'resources/css/vuetify.min.css',
// 'resources/css/toastr.css'
// ],'public/css/app.css').sass('resources/sass/app.scss'
//  	, 'public/css');