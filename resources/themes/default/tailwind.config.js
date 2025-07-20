/** @type {import('tailwindcss').Config} */
module.exports = {
    // CRITICAL CHANGE: Update this content path
    content: [
        './views/**/*.blade.php', // Scans all blade files in your theme's views
        './../../../../packages/Webkul/Shop/src/Resources/views/**/*.blade.php', // Scans the original package files too
    ],

    theme: {
        container: {
            center: true,

            screens: {
                "2xl": "1440px",
            },

            padding: {
                DEFAULT: "90px",
            },
        },

        screens: {
            sm: "525px",
            md: "768px",
            lg: "1024px",
            xl: "1240px",
            "2xl": "1440px",
            1180: "1180px",
            1060: "1060px",
            991: "991px",
            868: "868px",
        },

        extend: {
            colors: {
                // Your color palette looks perfect!
                panabay: {
                    primary: '#f78c1e',
                    'primary-hover': '#e6780f', // Good job using quotes here
                    background: '#F7F5F2',
                    text: {
                        primary: '#2C2C2C',
                        secondary: '#6E6E6E',
                        placeholder: '#BDBDBD',
                    },
                    border: '#E0E0E0',
                    green: '#93A92F',
                    red: '#C4592C',
                    sand: '#F4E3CD',
                    disabled: '#D3D3D3',
                },
                // This is a great trick to re-brand existing components!
                navyBlue: "#f78c1e",
                lightOrange: "#F6F2EB",
                darkGreen: '#40994A',
                darkBlue: '#f78c1e',
                darkPink: '#F85156',
            },

            fontFamily: {
                poppins: ["Poppins"],
                dmserif: ["DM Serif Display"],
            },
        }
    },

    plugins: [],

    safelist: [
        {
            pattern: /icon-/,
        }
    ]
};