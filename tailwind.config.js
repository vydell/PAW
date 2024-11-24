import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            backgroundImage: {
                'diagonal-gradient': 'linear-gradient(270deg, #ffc3a0, #FFAFBD)',
            },

            colors: {
                primary: {
                    DEFAULT: '#D25277', // Default shade of primary
                    light: '#3B82F6',  // Lighter shade of primary
                    dark: '#AF3D5E',   // Darker shade of primary
                },
                secondary: {
                    DEFAULT: '#43BCB2', // Default shade of secondary
                    light: '#FECDD3',   // Lighter shade of secondary
                    dark: '#24A096',    // Darker shade of secondary
                },
                darker: '#0F172A', // Standalone darker color
                background: {
                    DEFAULT: '#FFFCFB',
                    dark: '#F9F2F0',
                },
                textfont: '#4E4E4E',
                inactive: {
                    DEFAULT: '#F1D3D6',
                    dark: '#C99FA0',
                }
            },
        },
    },

    plugins: [forms],
};
