<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pondok Pesantren Babul Hasanah')</title>

    <!-- Favicon Website -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo.png') }}">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS (via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            /* Palette Colors */
            --color-white: #fefefe;
            --color-pharmaceutical-green: #1b7b32;
            --color-kashmir: #698d6e;
            --color-misty-marsh: #cdd9cf;
            --color-copper-patina: #9cb49d;
            --color-woodgrain: #916438;
            --color-queen-of-the-night: #44467e;
            --color-bourbon-peach: #ee8a3e;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body>
    <main class="flex-grow">
        @yield('content')
    </main>
</body>

</html>
