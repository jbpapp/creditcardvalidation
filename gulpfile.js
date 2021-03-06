var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'bootstrap': './vendor/bower_components/bootstrap-sass-official/assets/'
}

elixir(function(mix) {
    mix.sass('app.scss', '', {'includePaths': [paths.bootstrap + 'stylesheets']})
    	.coffee('app.coffee')
    	.copy('vendor/bower_components/jquery-maskedinput/dist/jquery.maskedinput.min.js', 'public/js/vendor/');
});
