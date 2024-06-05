/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        txt: "#100F0F",
        bgc: "#FDFCFC",
        accent: "#E7606A",
        button: "#B04F56",
        btnprimary: "#B04F56",
        btnsecondary: "#DE8B90"
      }
    },
  },
  plugins: [],
}

