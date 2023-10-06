/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        orange: '#FF7400',
        navy: '#1F21A9e',
        maroon: '#9D0000',
      }},
  },
  plugins: [
    require('flowbite/plugin'),
    require('tailwind/forms'),
]
}