<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite([
            'resources/css/input.css', 
            'resources/js/app.js'
        ])
         <script src="https://cdn.tailwindcss.com"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
     
    </head>
    <body class="bg-gray-200">
        <div class="text-gray-900 antialiased">
            <div class="flex flex-col sm:justify-center items-center pt-5 pb-5"> 
            
            </div>
        </div>
    
        @livewireScripts
        @yield('scripts')
        

</script>

    </body>
</html>
