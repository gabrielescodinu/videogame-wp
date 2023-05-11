module.exports = {
  important: true,
  purge: [
    '**/*.html',
    'assets/js/app.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      screens: {
        '4xl': '2559px',
      },
      colors: {
        steam: {
          dark: '#121212',
          blue: '#66c0f4',
          darkblue: '#1c2839',
          grey: '#212121',
        },
      },

      fontSize: {

      },
      fontFamily: {

      },
      zIndex: {

      },
      spacing: {
        100: '28rem',
        101: '50rem',
        102: '42rem',
        103: '31rem',
        104: '35rem',
        105: '50rem',
      },
      maxWidth: (theme, { breakpoints }) => ({

      }),


    }
  },
  variants: {
    extend: {
      backgroundColor: ['active']
    }
  },
  plugins: [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
    require('postcss-nested')
  ]
}
