/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily:{
        "Poppins" :['"Poppins"', 'sans-serif']
      },
      colors:{
         //'negro-menu': '#5C5470',
        'negro-menu': '#484258',
         'negro-fondo': '#352F44',
         'secundario': '#29bcb2',
         'fuente-botones': '#171717',
         'active':'#2CC9BF',
         'principal':'#eeeeee',
         'fuente':'#D1D5DB',
         'rojo':'#EF4444',
         'menu':'#141414',
      }
    },
  },
  plugins: [],
}