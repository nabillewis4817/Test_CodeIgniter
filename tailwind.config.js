/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./app/Views/**/*.php",
        "./app/Config/*.php",
        "./app/Controllers/**/*.php",
        "./public/**/*.js",
        "./resources/**/*.js"
    ],
    theme: {
        extend: {
            animation: {
                'fade-in-down': 'fadeInDown 0.5s ease-out',
            },
            keyframes: {
                fadeInDown: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                }
            },
            spacing: {
                '128': '32rem',
            }
        },
    },
    plugins: [],
    safelist: [
        'animate-fade-in-down',
        'text-blue-600',
        'text-indigo-600',
        'bg-blue-500',
        'bg-indigo-500',
        'hover:bg-blue-600',
        'hover:bg-indigo-600',
        'focus:ring-blue-500',
        'focus:ring-indigo-500',
    ]
}