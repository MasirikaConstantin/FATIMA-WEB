const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()  // Cela indique à Laravel Mix d'utiliser Vue.js
    .sass('resources/sass/app.scss', 'public/css');  // Compile le SCSS vers CSS
