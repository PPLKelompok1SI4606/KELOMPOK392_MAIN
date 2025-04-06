<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex justify-center">

    <div class="container w-full h-full">

        {{-- Navbar --}}
        <section class="flex items-center justify-between w-full h-[116px] bg-orange-100 px-[100px]">
            <x-landingpage.logoNavbar></x-landingpage.logoNavbar>
            <x-landingpage.nav-item></x-landingpage.nav-item>
            <x-landingpage.buttonNomor></x-landingpage.buttonNomor>
        </section>
        <hr class="w-full h-2">
        {{-- Navbar End --}}

        {{-- Hero --}}
        <section class="hero">

        </section>
        {{-- Hero End --}}

    </div>
</body>
</html>
