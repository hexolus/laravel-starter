const mix = require("laravel-mix");

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

mix.extract(["lodash", "axios", "react", "react-dom", "socket.io-client"]);

mix
  .react("resources/js/hexolus.js", "public/js")
  .sass("resources/sass/hexolus.scss", "public/css")
  .sass("resources/sass/maintenance.scss", "public/css")
  .sass("resources/sass/not-found.scss", "public/css");
