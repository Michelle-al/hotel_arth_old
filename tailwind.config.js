/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './storage/framework/views/*.php',
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  theme: {
    extend: {
        colors: {
            'arth-dark-blue': '#2D494C',
            'arth-light-blue': '#ECF2F0',
            'arth-green': '#8BA89A',
            'arth-grey': '#C7CFCA',
            'arth-dark-yellow': '#E0C64D',
            'arth-yellow': '#FFD15A'
        },
        fontFamily: {
            'playfair': ['Playfair Display', 'serif'],
            'montserrat': ['Montserrat', 'sans-serif'],
            'tinos': ['Tinos', 'serif']
        }
    },
  },
  plugins: [],
}
