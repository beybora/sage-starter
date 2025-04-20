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
        primary: '#E30C17',
        accent: '#053D5D',
        muted: '#888888',
        dark: '#1A1A1A',
        surface: '#FAFAFA',
      }
    },
  },
  plugins: [],
}
