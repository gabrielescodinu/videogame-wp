
const ImageminWebpackPlugin = require('imagemin-webpack-plugin').default;
const CopyPlugin = require("copy-webpack-plugin");
const HtmlMinimizerPlugin = require("html-minimizer-webpack-plugin");
const webpack = require('webpack'); // to access built-in plugins
const path = require('path');
const { glob } = require('glob');
const GoogleFontsPlugin = require("@beyonk/google-fonts-webpack-plugin")

module.exports = {
  mode: 'production',
  entry: './src/js/app.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
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
      {
        test: /\.html$/i,
        type: "asset/resource",
      },
    ],

  },
  plugins: [
    new webpack.ProgressPlugin(),

    new CopyPlugin({
      patterns: [
        {
          context: path.resolve(__dirname),
          from: "*.html",
        },
      ],
    }),

    new ImageminWebpackPlugin({
      externalImages: {
        context: 'src', // Important! This tells the plugin where to "base" the paths at
        sources: glob.sync('src/images/**/*.{png,jpg,jpeg,gif,svg,webp}'),
        destination: 'dist/assets/',
        fileName: '[path][name].[ext]' // (filePath) => filePath.replace('jpg', 'webp') is also possible
      }
    }),

    new GoogleFontsPlugin({
			fonts: [
				// { family: "Barlow", variants: [ "400", "700" ], display: "swap" }
			]
			/* ...options */
      ,
      filename: "assets/css/fonts.css"

		}),

  ],
  optimization: {
    minimize: true,
    minimizer: [
      // For webpack@5 you can use the `...` syntax to extend existing minimizers (i.e. `terser-webpack-plugin`), uncomment the next line
      `...`,
      new HtmlMinimizerPlugin(),
    ],
  },
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