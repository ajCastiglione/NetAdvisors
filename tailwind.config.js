module.exports = {
    content: [
        // https://tailwindcss.com/docs/content-configuration
        "./*.php",
        "./**/*.php",
        "./inc/**/*.php",
        "./templates/**/*.php",
        "./safelist.txt",
        "*.css",
    ],
    safelist: [
        "text-center",
        "bg-blueDark",
        "bg-blueLight",
        "bg-blueMid",
        "bg-accent",
        "flex",
        "flex-row",
        "flex-row-reverse",
        "flex-col",
        "items-center",
        "justify-center",
        "md:flex-row",
        "md:flex-row-reverse",
    ],
    theme: {
        extend: {
            maxWidth: {
                xs: "16rem",
            },
            colors: {
                accent: "#d9e124",
                blueLight: "#a7dde2",
                blueMid: "#13b1ca",
                blueDark: "#112b4e",
            },
            fontFamily: {
                sans: ["Poppins"],
            },
            animation: {
                "pulse-slow": "pulse-slow 4s ease-in-out infinite",
                "rotate-slow": "rotate-slow 6s ease-in-out infinite",
            },
            keyframes: {
                "pulse-slow": {
                    "0%, 100%": { transform: "scale(1)" },
                    "50%": { transform: "scale(1.02)" },
                },
                "rotate-slow": {
                    "0%": { transform: "rotate(-2deg)" },
                    "50%": { transform: "rotate(2deg)" },
                    "100%": { transform: "rotate(-2deg)" },
                },
            },
        },
    },
    plugins: [],
};
