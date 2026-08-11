import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Inaruhusu mfumo wa Dark Mode kufanya kazi kwa kutumia class ya .dark kwenye HTML
    
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: '#F78F06',   // Rangi kuu ya TFL (Chungwa)
                secondary: '#0F172A', // Rangi inayosapoti (Navy Blue) kwa muonekano wa kitaasisi
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};