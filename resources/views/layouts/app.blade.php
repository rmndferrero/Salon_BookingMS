<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Tailwind Config -->
    <script>
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

    <!-- Global Styles -->
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

    <!-- Modal Logic -->
    <script>
        function toggleModal() {
            document.getElementById('loginModal').classList.toggle('hidden');
        }

        function toggleRegisterModal() {
            document.getElementById('registerModal').classList.toggle('hidden');
        }

        function switchToRegister() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('registerModal').classList.remove('hidden');
        }

        function switchToLogin() {
            document.getElementById('registerModal').classList.add('hidden');
            document.getElementById('loginModal').classList.remove('hidden');
        }

        window.addEventListener('click', function(event) {
            const loginModal = document.getElementById('loginModal');
            const regModal = document.getElementById('registerModal');

            if (event.target === loginModal) toggleModal();
            if (event.target === regModal) toggleRegisterModal();
        });

        document.addEventListener('DOMContentLoaded', function() {
            
            @if(old('first_name'))
                switchToRegister();
            
            
            @elseif($errors->has('first_name') || $errors->has('last_name'))
                switchToRegister();

           
            @elseif($errors->any())
                switchToLogin();
            @endif
        });
    </script>
</head>

<body class="selection:bg-primary-fixed selection:text-on-primary-fixed">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    <main class="pt-24">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- MODALS --}}
    @include('partials.modals')

</body>
</html>