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
                sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                calm: {
                    DEFAULT: '#0D9488',
                    primary: '#0D9488',
                    'primary-hover': '#0F766E',
                    accent: '#0D9488',
                    'accent-hover': '#0F766E',
                    background: '#FAFAFA',
                    surface: '#F8FAFC',
                    card: '#FFFFFF',
                    charcoal: '#0F172A',
                    muted: '#64748B',
                    border: '#E2E8F0',
                    success: '#059669',
                    error: '#DC2626',
                },
            },
            boxShadow: {
                'calm-sm': '0 1px 2px 0 rgb(0 0 0 / 0.05)',
                'calm': '0 4px 6px -1px rgb(0 0 0 / 0.07), 0 2px 4px -2px rgb(0 0 0 / 0.05)',
                'calm-lg': '0 10px 15px -3px rgb(0 0 0 / 0.08), 0 4px 6px -4px rgb(0 0 0 / 0.05)',
                'calm-xl': '0 20px 25px -5px rgb(0 0 0 / 0.08), 0 8px 10px -6px rgb(0 0 0 / 0.04)',
                'store': '0 1px 3px 0 rgb(0 0 0 / 0.06), 0 1px 2px -1px rgb(0 0 0 / 0.04)',
                'store-lg': '0 10px 40px -10px rgb(0 0 0 / 0.12)',
            },
            borderRadius: {
                'store': '0.75rem',
                'store-lg': '1rem',
            },
        },
    },

    plugins: [forms],
};
