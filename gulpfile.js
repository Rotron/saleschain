var elixir = require('laravel-elixir');

elixir(function(mix) {
    // Styles
    mix.styles([
        'bootstrap.min.css',
        'notifIt.css',
        'styles.css']);

    // Frontend js
    // mix.scripts([
    // 	'jquery.min.js',
    // 	'bootstrap.min.js',
    //     'notifIt.js',
    // 	'vue.js'
    // ], 'public/js/frontend/all.js');

    // // Backend js
    // mix.scripts([
    // 	'jquery.min.js',
    // 	'bootstrap.min.js',
    //     'notifIt.js',
    // 	'vue.js'
    // ], 'public/js/backend/all.js');
});
