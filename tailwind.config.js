/** @type {import('tailwindcss').Config} */
module.exports = {
  daisyui: {
    themes: ["light", "dark", "cupcake","synthwave","dracula"],
  },
   content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

