/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'red-hat-display': ['Red Hat Display', 'sans-serif']
            },
        
            colors: {
                background: '#212529',
                'off-white': '#FAFAFA',
                border: '#E3E7EA',
                accent: '#DC3545',
                'dark-gray': {
                    '950': '#212529',
                    '900': '#3E454C',
                    '800': '#515F69',
                },

                'light-gray' : {
                    background: '#F5F5F5'
                },

                dashboard: {
                    primary: '#FAFAFA',
                    background: '#F2F5F9',
                    accent: {
                        light: '#FFF8F7',
                        base: '#FF6F61'
                    } 
                    
                    
                }
            }
        },
    },
    plugins: [],
}


//old setup

// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     content: [
//         "./resources/**/*.blade.php",
//         "./resources/**/*.js",
//         "./resources/**/*.vue",
//         "./node_modules/flowbite/**/*.js",
//     ],
//     theme: {
//         extend: {
//             colors: {
//                 background: '#212529',
//                 'off-white': '#FAFAFA',
//                 border: '#E3E7EA',
//                 accent: '#DC3545',
//                 gray: {
//                     '950': '#212529',
//                     '900': '#3E454C',
//                     '800': '#515F69',
//                 }
//             }
//         },
//     },
//     plugins: [require("flowbite/plugin")],
// };

