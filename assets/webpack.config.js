const webpack = require('webpack')

module.exports = {
  	resolve: {
	    alias: {
	        jquery: "themePath/js/jquery",
	        popper: "themePath/js/popper"
	    }
	},
	plugins: [
		new webpack.ProvidePlugin({
		    $: "jquery",
		    jQuery: "jquery",
		    "window.jQuery": "jquery",
		    Popper: ['popper', 'default']
		})
	]
};