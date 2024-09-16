import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from "daisyui"

/** @type {import('tailwindcss').Config} */
export default {
    prefix: 'tw-',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],  // Roboto sebagai font utama
                poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        daisyui,
        forms
    ],
    daisyui: {
        themes: ["light"], // Hanya menyertakan tema light
    },
};
