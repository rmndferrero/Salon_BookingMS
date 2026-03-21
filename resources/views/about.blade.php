<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "tertiary-container": "#9b687b",
                        "error": "#ba1a1a",
                        "primary": "#b5106a",
                        "on-secondary-fixed-variant": "#574500",
                        "on-secondary-container": "#725a00",
                        "on-secondary": "#ffffff",
                        "inverse-primary": "#ffb0cc",
                        "surface-dim": "#dadad9",
                        "outline": "#8b7078",
                        "on-surface-variant": "#584048",
                        "surface-container": "#eeeeed",
                        "primary-fixed-dim": "#ffb0cc",
                        "inverse-surface": "#2f3130",
                        "surface-variant": "#e3e2e1",
                        "on-secondary-fixed": "#241a00",
                        "on-tertiary": "#ffffff",
                        "on-primary-container": "#ffffff",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#ffe089",
                        "on-primary-fixed-variant": "#8d0051",
                        "tertiary-fixed": "#ffd9e4",
                        "on-tertiary-container": "#ffffff",
                        "on-background": "#1a1c1c",
                        "primary-fixed": "#ffd9e4",
                        "on-error": "#ffffff",
                        "surface-container-highest": "#e3e2e1",
                        "secondary-fixed-dim": "#eac243",
                        "surface-bright": "#faf9f8",
                        "on-primary-fixed": "#3e0020",
                        "outline-variant": "#dfbec8",
                        "surface-container-lowest": "#ffffff",
                        "surface": "#faf9f8",
                        "secondary-container": "#fcd353",
                        "surface-tint": "#b5106b",
                        "on-error-container": "#93000a",
                        "background": "#faf9f8",
                        "tertiary": "#805062",
                        "primary-container": "#d63384",
                        "on-tertiary-fixed": "#330f1f",
                        "surface-container-low": "#f4f3f2",
                        "surface-container-high": "#e9e8e7",
                        "on-primary": "#ffffff",
                        "secondary": "#745b00",
                        "on-tertiary-fixed-variant": "#65394b",
                        "on-surface": "#1a1c1c",
                        "tertiary-fixed-dim": "#f2b6cb",
                        "inverse-on-surface": "#f1f0f0"
                    },
                    fontFamily: {
                        "headline": ["Noto Serif"],
                        "body": ["Manrope"],
                        "label": ["Manrope"]
                    },
                    borderRadius: { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" },
                },
            },
        }
    </script>
    <style>
        body {
            background-color: #FFECF0;
            /* Requested page background */
            font-family: 'Manrope', sans-serif;
            color: #1a1c1c;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        .editorial-text-wrap {
            shape-outside: circle(50%);
        }
    </style>
</head>

<body class="selection:bg-primary-fixed selection:text-on-primary-fixed">

    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 bg-[#b5106a] backdrop-blur-xl">
        <div class="flex justify-between items-center px-8 py-4 max-w-screen-2xl mx-auto">
            <div class="flex items-center gap-8">
                <a class="flex items-center" href="#">
                    <img class="h-10 w-auto invert brightness-0" data-alt="Sib Style minimalist luxury beauty logo" src="{{ asset('sibs22.png') }}"/>
                    <span class="ml-4 text-2xl font-serif italic text-white tracking-tight"> Style Beauty Lounge</span>
                </a>
                <div class="hidden md:flex gap-10 absolute left-1/2 transform -translate-x-1/2">
                    <a class="text-white/90 font-medium hover:text-white transition-opacity duration-300" href="{{ route('homepage') }}">Home</a>
                    <a class="text-white/90 font-medium hover:text-white transition-opacity duration-300" href="{{ route('services') }}">Services</a>
                    <a class="text-white/90 font-medium hover:text-white transition-opacity duration-300" href="{{ route('about') }}">About</a>
                    <a class="text-white/90 font-medium hover:text-white transition-opacity duration-300" href="{{ route('contact') }}">Contact</a>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <button class="text-white font-label font-medium hover:opacity-80 transition-opacity">Login</button>
                <button class="bg-white text-[#b5106a] px-6 py-2 rounded-full font-label font-semibold text-sm hover:scale-95 transition-transform duration-200">Register</button>
            </div>
        </div>
    </nav>

</body>

</html>