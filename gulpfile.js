var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')

    .styles([
        'libs/blog-home.css',
        'libs/blog-post.css',
        'libs/bootstrap.css',
        'libs/bootstrap.min.css'
    ] , './public/css/libs.css')

        /*  Admin CSS   */
    .styles([
            'adm/blog-post.css',
            'adm/bootstrap.css',
            'adm/bootstrap.min.css',
            'adm/font-awesome.css',
            'adm/metisMenu.css',
            'adm/sb-admin-2.css',
            'adm/styles.css'
        ] , './public/css/adm.css')


        .scripts([
            'libs/jquery.js',
            'libs/bootstrap.js',
            'libs/bootstrap.min.js'
        ] , './public/js/libs.js')


        /*  Admin JS   */
        .scripts([
            'adm/jquery.js',
            'adm/bootstrap.js',
            'adm/bootstrap.min.js',
            'adm/metisMenu.js',
            'adm/sb-admin-2.js',
            'adm/scripts.js'
        ] , './public/js/adm.js')

});
