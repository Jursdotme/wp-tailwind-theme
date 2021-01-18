module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: {
    content: [
      './**/*.php',
      './**/*.html',
      './**/*.vue',
      './**/*.jsx',
    ],
    options: {
      safelist: [/has-[^-]*-[^-]*-background-color/, 'px-4'],
    }
  },
  theme: {
    fontFamily: {
      sans: ['Raleway', 'sans-serif'],
    },

    extend: {
      height: {
        128: '32rem',
        136: '34rem',
      },
      colors: {
        brand: {
          50: '#f9f4e9',
          100: '#f5ecd9',
          200: '#ecdcbb',
          300: '#dbc398',
          400: '#bf9e7d',
          500: '#aa8067',
          600: '#996754',
          700: '#925747',
          800: '#7e3c2e',
          900: '#662d22',
          light: '#e6d0a2',
          dark: '#6f3226',
        },
        gray: {
          50: '#fafafa',
          100: '#f5f5f4',
          200: '#e8e7e6',
          300: '#d6d5d3',
          400: '#a7a4a2',
          500: '#766f70',
          600: '#5a5153',
          700: '#473d40',
          800: '#352b2e',
          900: '#231a1d',
        },
      },

    },
    typography: {
      default: {
        css: {
          color: '#352b2e',
          a: {
            color: '#996754',
            '&:hover': {
              color: '#925747',
            },
          },
        },
      },
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),

    function ({ addUtilities, theme, e }) {
      const palette = theme('colors', {});
      const utilities = {};

      for (let [slug, colors] of Object.entries(palette)) {
        for (let [variation, color] of Object.entries(colors)) {
          utilities[`.${e(`has-${slug}-${variation}-background-color`)}`] = { 'background-color': color };
          utilities[`.${e(`has-${slug}-${variation}-color`)}`] = { color: color };
        }
      }

      utilities['.wp-block-group__inner-container *:first-child'] = { 'margin-top': 0 };
      utilities['.wp-block-group__inner-container *:last-child'] = { 'margin-bottom': 0 };

      addUtilities(utilities, {
        respectPrefix: false,
        respectImportant: true,
      });
    }

  ]
}
