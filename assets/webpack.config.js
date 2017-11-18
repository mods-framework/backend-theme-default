const webpack = require('webpack')
const IgnoreIssuerPlugin = require(__base + 'webpack/plugins/IgnoreIssuerPlugin')

module.exports = {
  	resolve: {
	    alias: {
	        jquery: "themePath/js/jquery"
	    }
	},
	plugins: [
		new webpack.ProvidePlugin({
		    $: "jquery",
		    jQuery: "jquery",
		    "window.jQuery": "jquery"
		}),
		new IgnoreIssuerPlugin(/^codemirror$/, /summernote.js$/)
	],
	module: {
	  rules: [
		  {
	          test: /\popper.js$/, 
	          use: [{
	              loader: 'expose-loader',
	              options: 'Popper'
	          }]
	      },
	      {
	          test: /\jquery.js$/, 
	          use: [{
	              loader: 'expose-loader',
	              options: 'jQuery'
	          },{
	              loader: 'expose-loader',
	              options: '$'
	          }]
	      }
      ]
	}
};