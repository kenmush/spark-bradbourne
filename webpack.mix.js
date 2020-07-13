let mix = require('laravel-mix');
let exec = require('child_process').exec;
let path = require('path');

const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')

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

 var webpackConfig = {
     plugins :[
         new VuetifyLoaderPlugin()
     ]
 }

 mix.webpackConfig(webpackConfig)
mix
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .copy('node_modules/sweetalert2/dist/sweetalert2.min.js', 'public/js/sweetalert.min.js')
    .sass('resources/sass/app-rtl.scss', 'public/css')
    .then(() => {
        exec('node_modules/rtlcss/bin/rtlcss.js public/css/app-rtl.css ./public/css/app-rtl.css');
    })
    .webpackConfig({
        resolve: {
            modules: [
                path.resolve(__dirname, 'vendor/laravel/spark-aurelius/resources/assets/js'),
                'node_modules'
            ],
            alias: {
                'Api': path.resolve(__dirname, 'resources/js/api/'),
                'vue$': mix.inProduction() ? 'vue/dist/vue.min' : 'vue/dist/vue.js',
                'Themes': path.resolve(__dirname, 'resources/themes/')
            }
        }
    });


if (mix.inProduction()) {
    mix.version();
}
