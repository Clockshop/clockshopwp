const path = require('path');
const webpack = require('webpack');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const autoprefixer = require('autoprefixer');

const extractSass = new ExtractTextPlugin({
    filename: "./css/style.css"
});

module.exports = {
	entry: ['./assets/src/index.js'],
	output: {
		path: path.resolve(__dirname, './assets/dist'),
		publicPath: 'dist/',
		filename: 'js/scripts.js'
	},
	plugins: [
	    new webpack.ProvidePlugin({
  			config: [path.resolve(__dirname, 'config')],
		})
	],
	module: {

		rules: [
			{
		        test: /\.woff(\?v=\d+\.\d+\.\d+)?$/,
		        loader: "url-loader??limit=10000&mimetype=application/font-woff&name=fonts/[name].[ext]"
		    }, {
		        test: /\.woff2(\?v=\d+\.\d+\.\d+)?$/,
		        loader: "url-loader??limit=10000&mimetype=application/font-woff&name=fonts/[name].[ext]"
		    }, {
		        test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
		        loader: "url-loader??limit=10000&mimetype=application/octet-stream&name=fonts/[name].[ext]"
		    }, {
		        test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
		        use: [
		  			{
						loader: 'file-loader',
						options: {
							name: '[name].[ext]',
				     		outputPath: './fonts/',
		  					publicPath: '../fonts/'
				 		}
					}
				]
		    },
			{
			    test: /\.css$/,
			    use: [
			    	{
						loader: "style-loader"
					},
			    	{
			    		loader: 'css-loader',
			    		options: { "url": true, "import": true, "minimize" : false }
			    	},
			    	{
						loader: 'resolve-url-loader',
						options: {}
					}
			    ]
			  },
			{
				test: /\.scss$/,

				use: ExtractTextPlugin.extract({
					//publicPath: "./",
					fallback: 'style-loader',
					//resolve-url-loader may be chained before sass-loader if necessary

					use: [{
							loader: 'css-loader',
							options: { "url": true, "import": false, "minimize" : true }
						},
						{
							loader: 'resolve-url-loader',
							options: {}
						},
						{
							loader: 'postcss-loader',
							options: {
								plugins: function () {
				                    return [autoprefixer({ browsers: ['> 1%', 'last 3 versions', 'Firefox >= 20', 'iOS >=7'] })]
				                }
							}
						},
						{
							loader: 'sass-loader',
							options: {}
						}


					]
				})
			},
		  	{
		  		test: /\.js$/,
		  		loader: 'babel-loader',
		  		exclude: /node_modules/
		  	},
		  	{
		  		test: /\.(png|jpg|gif|svg)$/,
		  		use: [
		  			{
						loader: 'file-loader',
						options: {
							name: '[name].[ext]?[hash]',
		  					outputPath: './images/',
		  					publicPath: '../images/'
				 		}
					}
				]

		  	}
	  	]
	},
	resolve: {
		modules: [
	        path.resolve('./assets/src'),
	        path.resolve('./node_modules')
	    ],
		extensions: ['*', '.js', '.json', '.scss']
	},
	devServer: {
		historyApiFallback: true,
		noInfo: true,
		overlay: true,
		open: false
	},
	performance: {
		hints: false
	},
	devtool: '#eval-source-map'

}

if (process.env.NODE_ENV === 'production') {
	module.exports.devtool = '#source-map'
	module.exports.plugins = (module.exports.plugins || []).concat([
	  	new webpack.DefinePlugin({
	  		'process.env': {
	  			NODE_ENV: '"production"'
	  		}
	  	}),
	  	new webpack.optimize.UglifyJsPlugin({
	  		sourceMap: true,
	  		compress: {
	  			warnings: false
	  		}
	  	}),
	  	new webpack.LoaderOptionsPlugin({
	  		minimize: true
	  	}),
	  	extractSass
  	])
}
