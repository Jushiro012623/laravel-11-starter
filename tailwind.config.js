import defaultTheme from 'tailwindcss/defaultTheme';
// const { heroui } = require("@heroui/react");
import {heroui} from "@heroui/theme"

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.vue',
        './resources/**/*.js',
        './resources/**/*.jsx',
        "./node_modules/@heroui/theme/dist/**/*.{js,ts,jsx,tsx}"
        
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    darkMode: "class",
    plugins: [heroui()]
};
