var webpack = require('webpack');

module.exports = {
    entry: [
        "./assets/js/app.js",
    ],
    output: {
      filename: "./bundle.js"
    },
    mode: 'production',
    plugins:[
        new webpack.ProvidePlugin({   
            jQuery: 'jquery',
            $: 'jquery',
            jquery: 'jquery',
        })        
    ]
}