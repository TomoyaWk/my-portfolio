module.exports = {
    future: {
        removeDeprecatedGapUtilities: true
        // purgeLayersByDefault: true,
    },
    purge: [],
    theme: {
        fontfamily:{
            'sans':'Helvetica Neue,Arial,Hiragino Sans,Hiragino Kaku Gothic ProN,BIZ UDPGothic,Meiryo,sans-serif'
        },
        extend: {
            colors: {
                black: {
                    default: "#1b1c1d"
                },
                green: {
                    "500": "#29cc5c",
                    "600": "#008F2B"
                }
            },
            variants: {},
            plugins: []
        }
    }
};
