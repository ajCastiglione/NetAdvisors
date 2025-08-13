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
                gray: "#f5f5f5",
            },
            fontFamily: {
                sans: ["Poppins"],
            },
            animation: {
                "pulse-slow": "pulse-slow 2.5s ease-in-out infinite",
                "rotate-slow": "rotate-slow 6s ease-in-out infinite",
                "up-and-down": "up-and-down 3s ease-in-out infinite",
            },
            keyframes: {
                "pulse-slow": {
                    "0%, 100%": { transform: "scale(1)" },
                    "50%": { transform: "scale(1.04)" },
                },
                "rotate-slow": {
                    "0%": { transform: "rotate(-2deg)" },
                    "50%": { transform: "rotate(2deg)" },
                    "100%": { transform: "rotate(-2deg)" },
                },
                "up-and-down": {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-10%)" },
                },
            },
        },
    },
    plugins: [],
};
