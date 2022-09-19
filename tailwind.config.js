/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.{blade.php,ts,tsx,js,jsx,vue}"],
    theme: {
        extend: {},
    },
    plugins: [
        require("@tailwindcss/typography"),
        require("@tailwindcss/forms"),
        require("@tailwindcss/line-clamp"),
        require("@tailwindcss/aspect-ratio"),
    ],
};
