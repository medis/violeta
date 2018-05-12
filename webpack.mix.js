let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .postCss('resources/assets/css/backend.css', 'public/css')
    .options({
        postCss: [
            require('tailwindcss')
        ]
    })
    .version();

mix.webpackConfig({
    resolve: {
        extensions: ['.gql', '.graphql'],
        modules: [
            path.resolve(__dirname),
            'node_modules',
        ]
    },
    module: {
        rules: [
            {
                test: /\.(gql|graphql)$/,
                loader: 'graphql-tag/loader'
            }
        ]
    }
});