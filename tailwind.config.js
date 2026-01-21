/** @type {import('tailwindcss').Config} */
export default {
  content: [],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
        title: ['Audiowide', 'sans-serif'],
        subtitle: ['Rajdhani', 'sans-serif']
      },
      colors: {
        brand: {
          primary: '#0087C2',    // Bright blue - CTAs, links, accents
          secondary: '#165A8F',  // Dark blue - secondary elements
          dark: '#231F20',       // Near-black - backgrounds
          gray: '#606164',       // Gray - secondary text
          light: '#F5F5F5'       // Light gray - text on dark
        }
      }
    }
  },
  plugins: []
}
