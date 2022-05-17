module.exports = {
    purge: false,
    darkMode: false, // or 'media' or 'class'
    theme: {
        screens: {
            sxs: "320px",
            xs: "360px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            lap: "1366px",
            mac: "1440px",
            "2xl": "1600px",
            "3xl": "1920px",
        },
        extend: {
            colors: {
                transparent: "transparent",
                primary: "#59b75d",
                "primary-light": "#98ee99",
                secondary: "#338a3e",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
