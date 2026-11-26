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
            colors: {
                // Public — clean white & blue
                paper: '#FFFFFF',
                cloud: '#F7F9FC',
                sky: '#EEF3FC',
                line: '#E4E9F1',
                ink: '#0F1E36',
                navy: '#0B2447',
                'navy-deep': '#071A38',
                blue: '#1E63E0',
                'blue-deep': '#154CAF',
                slate: '#5B6B80',
                // Admin — aligned with the public brand palette
                board: '#1E63E0',
                'board-deep': '#154CAF',
                chalk: '#FFFFFF',
                leaf: '#15803D',
                'leaf-soft': '#16A34A',
                spidol: '#F5A524',
                'spidol-dark': '#B45309',
            },
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                display: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                mono: ['"JetBrains Mono"', ...defaultTheme.fontFamily.mono],
            },
            boxShadow: {
                soft: '0 1px 2px rgba(15, 30, 54, 0.04), 0 4px 16px -4px rgba(15, 30, 54, 0.08)',
                lift: '0 2px 4px rgba(15, 30, 54, 0.04), 0 16px 40px -12px rgba(15, 30, 54, 0.18)',
            },
        },
    },

    plugins: [forms],
};