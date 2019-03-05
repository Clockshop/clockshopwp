const path = require('path');
const webpack = require('webpack');
const HtmlWebpackPlugin = require("html-webpack-plugin");
const HappyPack = require('happypack');
const happyThreadPool = HappyPack.ThreadPool({ size: 5 });

module.exports = {
	entry: ['./assets/src/index.js'],
	output: {
		path: path.resolve(__dirname, './assets/dist'),
		publicPath: 'http://localhost:8080/dist/',
		filename: 'js/scripts.js'
	},
	plugins: [
		new HappyPack({
			id: 'js',
			threadPool: happyThreadPool,
			loaders: [
				{
					loader: 'babel-loader',
					query: {
						presets: ["es2015"]
					}
				}
			]
		}),
		new webpack.ProvidePlugin({
	  			config: [path.resolve(__dirname, 'config')],
		}),
		new HappyPack({
			id: 'styles',
			threadPool: happyThreadPool,
			loaders: [
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
				},
				{
					loader: 'fast-sass-loader',
					options: {}
				}

			]
		})
	],
	module: {

		rules: [
			{
		        test: /\.woff(\?v=\d+\.\d+\.\d+)?$/,
		        loader: "url-loader??limit=10000&mimetype=application/font-woff"
		      }, {
		        test: /\.woff2(\?v=\d+\.\d+\.\d+)?$/,
		        loader: "url-loader??limit=10000&mimetype=application/font-woff"
		      }, {
		        test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
		        loader: "url-loader??limit=10000&mimetype=application/octet-stream"
		      }, {
		        test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
		        loader: "file-loader"
		      }, /*{
		        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
		        loader: "url-loader?limit=1&mimetype=image/svg+xml"
		      },*/
			{
			    test: /\.css$/,
			    use: [
			    	{
						loader: "style-loader"
					},
			    	{
			    		loader: 'css-loader',
			    		options: { "url": false, "import": true, "minimize" : false }
			    	},
			    	{
						loader: 'resolve-url-loader',
						options: {}
					}
			    ]
			  },
			{
				test: /\.scss$/,
				use: 'happypack/loader?id=styles'

			},
		  	{
		  		test: /\.js$/,
		  		use: 'happypack/loader?id=js'
		  	},
		  	{
		  		test: /\.(png|jpg|gif|svg)$/,
		  		loader: 'url-loader??limit=10000',
		  		options: {
		  			name: '[name].[ext]?[hash]',
		  			outputPath: './images/',
		  			publicPath: '../images/'
		  		}
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
		open: false,
		allowedHosts: [

		],
		headers: { 'Access-Control-Allow-Origin': '*' }
	},
	performance: {
		hints: false
	},
	devtool: 'eval'

}
