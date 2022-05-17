const mix = require("laravel-mix");

const tailwindcss = require("tailwindcss");

require("laravel-mix-purgecss");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(["resources/js/admin/admin.js"], "public/js")
    .sass("resources/sass/admin/admin.scss", "public/css")
    .vue();

mix.js("resources/js/app.js", "public/js").vue({ version: 2 });

// mix.sass("resources/sass/client/app.scss", "public/css/client").options({
//     processCssUrls: false,
//     postCss: [tailwindcss("tailwind.config.js")],
// });
// .purgeCss({
//     enabled: mix.inProduction(),
//     folders: ["src", "templates"],
//     extensions: ["html", "js", "php", "vue"],
// });

if (mix.inProduction()) {
    mix.version();
}
