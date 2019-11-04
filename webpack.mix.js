const mix = require('laravel-mix');

mix.setPublicPath(path.normalize('public'))
    .sass('resources/sass/horizontal.scss', 'public/css');
