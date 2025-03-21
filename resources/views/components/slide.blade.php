{{-- <div id="indicators-carousel" class="mt-10 bg-black bg-opacity-20 mx-auto relative" data-carousel="slide" data-carousel-ride="carousel" data-carousel-interval="3000">
    <!-- Carousel wrapper -->
    <div class="relative h-56 md:h-96 overflow-hidden rounded-lg">
        @foreach ($slideFilms as $index => $film)
            <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                <div class=" p-2">{{ $film->nama }}</div>
                <a href="{{ route('film.show', $film->id) }}">
                <img src="{{ asset('storage/' . $film->gambar) }}" 
                     class="absolute block w-full h-full object-contain top-0 left-0" 
                     alt="Film Image"> 
                    </a>
            </div> 
        @endforeach
    </div>  
    object-cover ganti jadi object-contain biar pas sama foto
    

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        @foreach ($slideFilms as $index => $film)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $index === 0 ? 'true' : 'false' }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div> --}}



{{--  --}} 


<div id="indicators-carousel" class="mt-10 bg-black bg-opacity-40 mx-auto relative" data-carousel="slide" data-carousel-ride="carousel" data-carousel-interval="3000">
    <!-- Carousel wrapper -->
    <div class="relative h-56 md:h-96 overflow-hidden rounded-lg">
        @foreach ($slideFilms->chunk(3) as $index => $filmsChunk)
            <div class="{{ $index === 0 ? 'flex' : 'hidden' }} duration-700 ease-in-out justify-center" data-carousel-item>
                <div class="flex justify-center w-full">
                    @foreach ($filmsChunk as $film)
                        <a href="{{ route('film.show', $film->id) }}" class="relative w-1/3">
                            <img src="{{ asset('storage/' . $film->gambar) }}" 
                                 class="w-full h-56 md:h-96 object-contain rounded-lg shadow-lg" 
                                 alt="{{ $film->nama }}">
                            <div class="absolute bottom-2 left-2 bg-black bg-opacity-70 text-white px-2 py-1 rounded-md text-sm text-center">
                                {{ $film->nama }}
                            </div>
                        </a>
                    @endforeach

                    {{-- Tambahkan elemen kosong untuk mengisi ruang kosong --}}
                    @for ($i = count($filmsChunk); $i < 3; $i++)
                        <div class="w-1/3"></div>
                    @endfor
                </div>
            </div>
        @endforeach
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        @foreach ($slideFilms->chunk(3) as $index => $filmsChunk)
            <button type="button" class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-gray-400' }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
