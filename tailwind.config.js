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
    safelist: ["text-center", "bg-blueDark", "bg-blueLight", "bg-blueMid", "bg-accent"],
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
        },
    },
    plugins: [],
};
