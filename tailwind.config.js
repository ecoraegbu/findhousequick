/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./Pages/**/*.{html,php,js}"],
  theme: {
    fontFamily: {
      'sans': ['Manrope', 'sans-serif'],
      'roboto-c': ['Roboto Condensed', 'sans-serif'],
    },
    extend: {
      colors: {
        primary: '#1877F2',
        sidebar: '#0A4FA9',
        main: '#F3F8FE',
        'primary-light': '#E7EEFA',
        success: '#4FDC6B',
        'success-light': '#F1F9F4',
        warning: '#FFC022',
        'warning-light': '#FEF7EA',
        error: '#FB5659',
        'error-light': '#FAF0EA',
        'text': '#041B38'
      },
      boxShadow: {
        side: '0px 4px 30px rgba(0 0 0 /.1)',
        card: '0px 4px 50px rgba(0 0 0 /.1)'
      },
      minWidth: {
        table: '768px'
      },
      backgroundImage: {
        'login': 'url("./../Assets/login.jpg")',
        'register': 'url("./../Assets/register.jpg")',
        'reset': 'url("./../Assets/reset.jpg")',
        'hero': 'url("./../Assets/bg.png")',
      }
    },
  },
  plugins: [],
}