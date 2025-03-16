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
<body>
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
