const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
                serif: ["EB Garamond", ...defaultTheme.fontFamily.serif],
                masthina: ["Masthina", ...defaultTheme.fontFamily.serif],
                tangerine: ["Tangerine", ...defaultTheme.fontFamily.serif],
                greatVibes: ["Great Vibes", ...defaultTheme.fontFamily.serif],
                alkatra: ["Alkatra", ...defaultTheme.fontFamily.serif],
            },
            colors: {
                primary: {
                    100: "#AFD3E2",
                    200: "#19A7CE",
                    300: "#146C94",
                },
                base: "#f8f8fc",
            }
        },
        container: {
            center: true,
            padding: "1rem",
        },
    },

    plugins: [require("@tailwindcss/forms"), require("daisyui")],

    daisyui: {
        styled: true,
        themes: true,
        base: false,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        darkTheme: "light",
    },
};
