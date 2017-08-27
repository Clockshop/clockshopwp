const ExtractTextPlugin = require("extract-text-webpack-plugin");
const autoPrefixer = require('autoprefixer');

module.exports = {
    entry: './assets/scss/app.scss',
    output: {
        path: __dirname,
        filename: 'assets/css/all.css'
    },
    module: {
        loaders: [
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract('style-loader', 'css!sass!postcss?sourceMap')
            },
            {
                test: /\.css$/,
                loader: 'style-loader!css-loader'
            },
            {
                test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: 'url-loader'
            },
            {
                test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: 'url-loader'
            },
            {
                test: /\.(png)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: 'url-loader'
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin("assets/css/all.css", {allChunks: true})
    ],
    postcss: [autoPrefixer({browsers: ['last 3 versions']})]
};
