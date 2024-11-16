import defaultTheme from "tailwindcss/defaultTheme";

import typography from '@tailwindcss/typography';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.css",
    "./resources/**/*.vue",
    "./src/**/*.{html,js}",
  ],

  theme: {
 
    extend: {},
  },
  plugins: [
    typography,
    forms,
    aspectRatio
  ],
}

