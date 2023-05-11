const path = require('path');
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const GoogleFontsPlugin = require("@beyonk/google-fonts-webpack-plugin")

module.exports = {
  mode: 'development',
  entry: './src/js/app.js',
  output: {
    path: path.resolve(__dirname),
    filename: 'assets/js/app.js',
  },
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          'style-loader',
          'css-loader'
        ]
      },
      { test: /\.(png|woff|woff2|eot|ttf|svg)$/, use: ['url-loader?limit=100000'] },

    ]
  },
  devtool: 'inline-source-map',
  devServer: {
    contentBase: './dist'
  },
  plugins: [
    
    new CopyPlugin({
      patterns: [
        {
          context: path.resolve(__dirname, 'src/images'),
          from: "**/*.{png,jpg,jpeg,gif,svg,webp}",
          to: 'assets/images/[path][name][ext]'
        },
      ],
    }),
    
    new GoogleFontsPlugin({
			fonts: [
				// { family: "Barlow", variants: [ "400", "700" ], display: "swap" }
			]
			/* ...options */
      ,
      // path: "",
      filename: "assets/css/fonts.css"

		}),

    new BrowserSyncPlugin({
      host: "localhost",
      port: 3000,
      proxy: "http://127.0.0.1:5500",
      files: '**/**.*',
      snippetOptions: {
        rule: {
          match: /<\/head>/i,
          fn: function (snippet, match) {
            return snippet + match;
          }
        }
      }
    }),


  ],
  
  externals: {
    // require("jquery") is external and available
    //  on the global var jQuery
    // "gsap": "gsap",
    // "$": 'jquery',
    // "jQuery": 'jquery',
    // "jquery": "jQuery",
    // "swup": "Swup",
    // "@swup/body-class-plugin": "SwupBodyClassPlugin"

  }



};
