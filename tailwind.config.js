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

