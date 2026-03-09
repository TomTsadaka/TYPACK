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
                sans: ['Sora', ...defaultTheme.fontFamily.sans],
                display: ['Sora', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                calm: {
                    DEFAULT: '#0f766e',
                    primary: '#0f766e',
                    'primary-hover': '#0d9488',
                    accent: '#0f766e',
                    'accent-hover': '#0d9488',
                    background: '#fafaf9',
                    surface: '#f5f5f4',
                    card: '#ffffff',
                    charcoal: '#1c1917',
                    muted: '#78716c',
                    border: '#e7e5e4',
                    success: '#059669',
                    error: '#dc2626',
                    'ink': '#1c1917',
                    'ink-muted': '#78716c',
                },
            },
            boxShadow: {
                'calm-sm': '0 1px 2px 0 rgb(0 0 0 / 0.03)',
                'calm': '0 2px 8px -2px rgb(0 0 0 / 0.06), 0 2px 4px -2px rgb(0 0 0 / 0.04)',
                'calm-lg': '0 12px 24px -4px rgb(0 0 0 / 0.08), 0 4px 8px -2px rgb(0 0 0 / 0.04)',
                'calm-xl': '0 24px 48px -12px rgb(0 0 0 / 0.12)',
                'store': '0 1px 3px 0 rgb(0 0 0 / 0.04), 0 1px 2px -1px rgb(0 0 0 / 0.02)',
                'store-lg': '0 12px 32px -8px rgb(0 0 0 / 0.1), 0 4px 12px -4px rgb(0 0 0 / 0.04)',
                'store-xl': '0 24px 48px -12px rgb(0 0 0 / 0.12)',
                'store-inner': 'inset 0 1px 2px 0 rgb(0 0 0 / 0.03)',
                'glow': '0 0 0 1px rgb(15 118 110 / 0.1), 0 4px 14px -2px rgb(15 118 110 / 0.25)',
            },
            borderRadius: {
                'store': '0.5rem',
                'store-lg': '0.75rem',
                'store-xl': '1rem',
                'store-2xl': '1.25rem',
            },
            letterSpacing: {
                'tighter': '-0.03em',
                'tight': '-0.02em',
            },
            animation: {
                'fade-in': 'fadeIn 0.4s ease-out',
                'slide-up': 'slideUp 0.4s ease-out',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(8px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
        },
    },

    plugins: [forms],
};
