<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/546907f101.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet
" />
    <!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-gray-300">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
      ````
    -->
    {{-- <x-film :films="$films"/> --}}
    @if(session('welcome_message'))
    <div id="flash-message" class="bg-green-500 text-white p-4 mb-4">
        {{ session('welcome_message') }}
    </div>
    
    <script>
        // Hilangkan flash message setelah 2 detik
        setTimeout(() => {
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.style.transition = 'opacity 0.5s ease';
                flashMessage.style.opacity = '0';
                setTimeout(() => {
                    flashMessage.remove();
                }, 500); // Hapus elemen setelah animasi selesai
            }
        }, 2000);
    </script>
    @endif

    @if(session('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div>
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div>
            <span class="font-medium">Error!</span> {{ session('error') }}
        </div>
    </div>
    @endif
    

    <script>
        setTimeout(function() {
            document.querySelectorAll('[role="alert"]').forEach(function(alert) {
                alert.style.transition = "opacity 0.5s";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000); // Menghilang dalam 3 detik
    </script>

    
@props(['films', 'slideFilms', 'genres', 'tahuns', 'negaras'])

@include('components.navbar', ['films' => $films])

<div class="p-6">
    {{ $slot }}
    @include('components.slide', ['films' => $films , 'slideFilms' => $slideFilms])
    {{-- @include('components.kategori', ['films' => $films , 'genres' => $genres , 'tahuns' => $tahuns]) --}}
</div>
<div class="p-6">

    @include('components.films', ['films' => $films])
</div>
    @include('components.footer')

        
    

</body>
</html>
