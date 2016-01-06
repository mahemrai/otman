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
    mix.scripts([
        'vendor/vue.min.js',
        'vendor/vue-resource.min.js',
        'vendor/vue-strap.min.js'
    ], 'public/js/vendor.js');

    mix.scriptsIn('resources/assets/js/app', 'public/js/app.js');
});
