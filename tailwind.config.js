/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php"],
    theme: {
        extend: {
            screens: {
                xxs: "390px",
                xs: "450px",
                max: "2200px",
            },
            fontFamily: {
                heading: ["Rubik", "sans-serif"],
                text: ["Roboto Mono", "monospace"],
            },
            colors: {
                primary: {
                    200: "#6758fb",
                    400: "#3b3b79",
                    600: "#5c3783",
                    800: "#27264e",
                },
                secondary: {
                    200: "#fec4fe",
                    300: "#fe82ee",
                    400: "#fb2ec5",
                    600: "#7d108e",
                    800: "#5c3783",
                },
                fontPrimary: "#ffffff",
                fontSecondary: "#fec4fe",
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
