const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.setPublicPath('public')
    .css('resources/css/navbar.css', 'public/css');

mix.setPublicPath('public')
    .css("resources/css/footer.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/login.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/register.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/post.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/welcome.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/profile.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/following.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/createPost.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/profile_info.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/searchBar.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/notification.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/theme.css", "public/css")

mix.setPublicPath('public')
    .css("resources/css/textCard.css", "public/css")