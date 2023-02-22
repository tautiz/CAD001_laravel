/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    purge: ['./index.html'],
    theme: {
        extend: {},
    },
    darkMode: 'class',
    plugins: [
        require("@tailwindcss/typography"),
        require('@tailwindcss/forms'),
        require("daisyui")
    ],
    daisyui: {
        styled: true,
        themes: true,
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        darkTheme: "dark",
    },
}
