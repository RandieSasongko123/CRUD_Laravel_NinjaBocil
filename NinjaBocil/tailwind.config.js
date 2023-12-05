/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        colors: {
          'dark': {
            'primary': '#1a202c',
            'secondary': '#2d3748',
            'accent': '#e2e8f0',
            'text': '#e2e8f0',
            'background': '#1F2937',
          },
        },
        backgroundColor: {
          'dark': 'var(--color-dark-primary)',
        },
        textColor: {
          'dark': 'var(--color-dark-text)',
        },
        borderColor: {
          'dark': 'var(--color-dark-border)',
        },
      },
    },
    variants: {
      extend: {
        backgroundColor: ['dark'],
        textColor: ['dark'],
        borderColor: ['dark'],
      },
    },
    plugins: [
      require('flowbite/plugin')
    ],
  };
