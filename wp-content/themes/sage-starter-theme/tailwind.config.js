// tailwind.config.js
export default {
  content: [
    './app/**/*.php',
    './resources/**/*.{php,js,scss}',
    './index.php',
    './functions.php',
    './single.php',
    './404.php',
  ],
  safelist: [
    'text-dark', 'text-muted', 'text-body',
    'bg-surface', 'text-primary', 'text-accent',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#E30C17',        // Rot für Hauptaktionen
        accent: '#053D5D',         // Dunkelblau für Headlines/Links
        muted: '#888888',          // Subtext/Fußnoten
        dark: '#1A1A1A',           // Text/Fokusinhalt
        surface: '#FAFAFA',        // Hintergrund-Flächen
      }
    },
  },
  plugins: [],
}
