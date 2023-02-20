module.exports = {
    darkMode: ['class', '[data-mode="dark"]'],
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
};
