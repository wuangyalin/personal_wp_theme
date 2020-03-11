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
    // module: {
    //     rules: [
    //       {
    //         test: /\.s[ac]ss$/i,
    //         use: [
    //           // Creates `style` nodes from JS strings
    //           'style-loader',
    //           // Translates CSS into CommonJS
    //           'css-loader',
    //           // Compiles Sass to CSS
    //           'sass-loader',
    //         ],
    //       },
    //     ],
    //   },
}