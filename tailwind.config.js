/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
      themes: [
        {
          nord: {
            ...require("daisyui/src/theming/themes")["nord"],
            primary: "#1B55B2",
            secondary: "#1b396a",

            ".btn-primary": {
              "background-color": "#f8faf9",
              "border-color": "#172554",
              "border-radius": "0.75rem",
              "line-height": "1.75rem",
              "font-size": "1.125rem",
              "font-weight": "500",
              "justify-content": "space-between", 
              "color": "#1b396a",
              "padding-left": "1rem",
              "padding-right": "1rem",
              "padding-top": "0.5rem",
              "padding-bottom": "0.5rem",
              "align-items": "center",
            },
            ".btn-secondary": {
              "background-color": "#1b396a",
              "border-color": "#172554",
              "color": "#f8faf9",
              "border-radius": "0.75rem",
              
            },
            ". selects":{
              "padding-left": "1rem",
              "padding-right": "1rem",
              "padding-top": "0.5rem",
              "padding-bottom": "0.5rem",
              "background-color":"#ffffff",

            },
            ".nav":{
              "background-color": "#1b396a",
              "justify-content": "space-between",
              "place-items": "center"
              
            },
            ".navlink":{
              "border-color": "#1b396a",
               "border-radius": "0.75rem",
               "color": "#fafafa",
               "font-weight": "500",
               "font-size": "1rem;",
               "line-height": "1.5rem",
 
             },
             ".containerRegister":{
              "background-color": "#1b396a",
              "margin-top": "2.5rem",
              
            },
            ".containerCertificate":{
              "margin-top": "7rem",
              "flex-direction": "column",
              "justify-content": "center",
              "align-items": "center",
              "display": "flex",
            },

            ".text":{
              "color": "#1b396a",
              "font-weight": "700",
              "font-size": "6rem",
              "line-height": "1",
              "text-align": "center",
            }, 
            ".homelinks":{
              "background-color": "#fafafa",
              "border-width": "2px",
              "border-color": "#1b396a",
              "border-radius": "0.75rem",
              "color": "#1b396a",
              "font-weight": "500",
              "padding-left": "2.5rem",
              "padding-right": "2.5rem",
              "padding-top": "0.5rem",
              "padding-bottom": "0.5rem",
              "font-weight": "500",

            },

            ".cardtitle":{
              "color": "#fafafa",
              "text-align": "center",
              "font-weight": "700",
              "font-size": "1.25rem",
              "line-height": "1.75rem"
            },

            ".textLabel":{
              "color": "#fafafa",
              "display": "block"
              
            }, 





 



          },
        },
      ],
    },
};
