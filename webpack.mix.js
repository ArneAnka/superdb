const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss')
require('laravel-mix-purgecss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */
mix.js('resources/js/app.js', 'public/js');

mix.sass('./resources/css/main.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .purgeCss();


// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/main.css', 'public/css', [
//       require('tailwindcss'),
// ]);
