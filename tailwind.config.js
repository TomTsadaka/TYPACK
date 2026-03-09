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
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                calm: {
                    DEFAULT: '#5B7B6B',
                    primary: '#5B7B6B',
                    'primary-hover': '#4A6A5A',
                    accent: '#9B8B7E',
                    'accent-hover': '#8A7A6D',
                    background: '#F8F7F4',
                    surface: '#F0F2EF',
                    card: '#FDFCFA',
                    charcoal: '#2C2B28',
                    muted: '#6B6A65',
                    border: '#E5E3DF',
                    success: '#5B7B6B',
                    error: '#B86B6B',
                },
            },
            boxShadow: {
                'calm-sm': '0 1px 3px 0 rgb(44 43 40 / 0.06), 0 1px 2px -1px rgb(44 43 40 / 0.06)',
                'calm': '0 4px 6px -1px rgb(44 43 40 / 0.06), 0 2px 4px -2px rgb(44 43 40 / 0.06)',
                'calm-lg': '0 10px 15px -3px rgb(44 43 40 / 0.06), 0 4px 6px -4px rgb(44 43 40 / 0.06)',
            },
        },
    },

    plugins: [forms],
};
