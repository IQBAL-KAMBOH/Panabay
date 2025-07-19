/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/Resources/**/*.blade.php", "./src/Resources/**/*.js"],

    theme: {
        extend: {
            fontFamily: {
                inter: ['Inter'],
            },
            colors: {
                darkGreen: '#40994A',
                darkBlue: '#f78c1e',
                blue: '#f78c1e',
                darkPink: '#F85156',
            },
        },
    },

    plugins: [],
}

