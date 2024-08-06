import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        "./node_modules/flowbite/**/*.js",
        './resources/views/**/*.blade.php',
        './storage/framework/views/*.php',
    ],
   
    theme: {
        fontFamily: {
            display: ['Tajawal', 'sans-serif'],
            serif: ['Tajawal', 'sans-serif'],
        },
        extend: {
            colors: {
                display: 'hsl(0, 0%, 90%)',
                dark: 'hsl(0, 0%, 12%)',
                increment: '#0e634e',
            },
            
            fontFamily: {
                ar: ['"Noto Naskh Arabic"', 'serif'],
                cairo: ['Cairo', 'sans-serif'],
                roboto: ['Roboto', 'sans-serif'],
            },
            
        },
    },

    plugins: [
        require('@tailwindcss/typography'),
        require('flowbite/plugin')
    ],
};
