// postcss.config.js

const cssnano = require('cssnano')({ preset: 'default' });

module.exports = {
    syntax: 'postcss-scss',
    plugins: [
        require('autoprefixer'),
        require('tailwindcss')('./tailwind.config.js'),
        require('postcss-import'),
        require('postcss-nested'),
        ...(process.env.NODE_ENV === 'production' ? [cssnano] : []),
    ],
};