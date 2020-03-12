var webpack = require('webpack');

module.exports = {
    entry: {
        app: './assets/js/app.js',
        three: './assets/js/threebundle.js',
    },
    output: {
      filename: '[name].bundle.js'
    },
    mode: 'production',
    plugins:[
        new webpack.ProvidePlugin({   
            jQuery: 'jquery',
            $: 'jquery',
            jquery: 'jquery',
        })        
    ],
}