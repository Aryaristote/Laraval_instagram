// webpack.mix.js

const mix = require('laravel-mix');

mix.js('resources/sass/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
