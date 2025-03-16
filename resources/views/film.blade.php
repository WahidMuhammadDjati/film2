@vite(['resources/css/app.css','resources/js/app.js'])
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/546907f101.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

<x-navbar></x-navbar>

<body class="bg-gray-900 text-white">

    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-1000 flex items-center justify-center"
        style="background-image: url('{{ asset('storage/' . $film->gambar) }}'); background-attachment: fixed;">
        <h2 class="absolute top-5 left-1/2 -translate-x-1/2 text-4xl font-bold bg-gray-800 bg-opacity-75 px-4 py-2">
            {{ $film->nama }}
        </h2>
    

        <!-- Main Content -->
        <div class="max-w-5xl w-full mt-16 mx-auto py-8 px-6 grid grid-cols-3 gap-6">
            
            <!-- Detail Film -->
            <div class="col-span-2 bg-gray-800 p-6 rounded-lg overflow-hidden">
                <h2 class="text-3xl font-bold text-blue-400"></h2>

                <!-- Trailer -->
                <div class="mt-4">
                    <iframe class="w-full h-64 rounded-lg" src="{{ $film->embed_trailer }}" frameborder="0" allowfullscreen></iframe>

                    {{-- <iframe class="w-full h-64 rounded-lg" src="{{ $film->trailer }}" frameborder="0" allowfullscreen></iframe> --}}
                </div>

                <!-- Deskripsi -->
                <p class="mt-4 text-gray-300 break-words whitespace-normal overflow-hidden text-justify h-auto">
                    {{ $film->deskripsi }}
                </p>

                <!-- Informasi Film -->
                <div class="mt-4 space-y-2">
                    <p><strong>Genre:</strong> {{ implode(', ', $film->genres->pluck('nama_genre')->toArray()) }}</p>
                    <p><strong>Tahun:</strong> {{ $film->tahun->nama_tahun }}</p>
                    <p><strong>Negara:</strong> {{ $film->negara->nama_negara }}</p>
                    {{-- <p><strong>Rating:</strong> {{ number_format($film->ratings->avg('rating'), 1) ?? '0' }}</p> --}}
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">{{ number_format($film->ratings->avg('rating'), 1) ?? '0' }}</p>
                        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">{{ $film->ratings->count() }} reviews</a>
                    </div>
                    <p><strong>Durasi:</strong> {{ $film->durasi }} menit</p>
                </div>
                
                 
                   {{-- Komentar --}}
                   <div class="mt-8 bg-gray-800 p-6 rounded-lg">
                    <h3 class="text-lg font-bold mb-4">Komentar</h3>
                
                    @auth
                    <form action="{{ route('komentar.store', $film->id) }}" method="POST">
                        @csrf
                        <textarea name="isi_komentar" rows="3" class="w-full p-2 rounded bg-gray-900 text-white" placeholder="Tulis komentar..."></textarea>
                        <button type="submit" class="mt-2 bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">Kirim</button>
                    </form>
                    @else
                    <p class="text-gray-400">Silakan <a href="{{ route('login') }}" class="text-blue-400">login</a> untuk memberi komentar.</p>
                    @endauth
                
                    <div class="mt-6 space-y-4">
                        @foreach ($film->komentar->whereNull('parent_id') as $komentar)
                        <div class="border-b border-gray-700 pb-2">
                            <p class="text-sm text-gray-400">{{ $komentar->user->name }} - {{ $komentar->created_at->diffForHumans() }}</p>
                            <p>{{ $komentar->isi_komentar }}</p>
                
                            {{-- Form Balasan Komentar --}}
                            @auth
                            <button onclick="document.getElementById('reply-form-{{ $komentar->id }}').classList.toggle('hidden')" class="text-blue-400 text-sm mt-1">Balas</button>
                            <form action="{{ route('komentar.store', $film->id) }}" method="POST" id="reply-form-{{ $komentar->id }}" class="hidden mt-2">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $komentar->id }}">
                                <textarea name="isi_komentar" rows="2" class="w-full p-2 rounded bg-gray-900 text-white" placeholder="Tulis balasan..."></textarea>
                                <button type="submit" class="mt-2 bg-green-500 px-4 py-2 rounded hover:bg-green-600">Kirim Balasan</button>
                            </form>
                            @endauth
                
                            {{-- Menampilkan Balasan Komentar --}}
                            @if ($komentar->replies->count())
                                @foreach ($komentar->replies as $reply)
                                <div class="ml-6 mt-3 border-l border-gray-700 pl-3 space-y-2">
                                    <p class="text-sm text-gray-400">{{ $reply->user->name }} - {{ $reply->created_at->diffForHumans() }}</p>
                                    <p>{{ $reply->isi_komentar }}</p>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                


            </div>

            <!-- Sidebar -->
            <div class="bg-gray-800 p-6 rounded-lg">
                <h3 class="text-lg font-bold">Poster</h3>
                <img src="{{ asset('storage/' . $film->gambar) }}" alt="Poster {{ $film->nama }}"
                    class="w-full h-auto rounded-lg mt-2">

                            {{-- Rating --}}
                <div class="flex items-center space-x-2 mt-2">
                    <span class="text-xl font-bold">{{ number_format($film->ratings->avg('rating'), 1) ?? '0' }}</span>
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                </div>

                @if(Auth::check())
                <form id="ratingForm" action="{{ route('ratings.store', $film->id) }}" method="POST" class="mt-4" onsubmit="return confirmRating()">
                    @csrf
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Level Rating</label>
                    <div class="grid grid-cols-5 gap-2">
                        @for($i = 1; $i <= 10; $i++)
                            <button type="button" class="px-3 py-1 rounded-lg bg-gray-300 dark:bg-gray-700 hover:bg-blue-500 hover:text-white" onclick="setRating({{ $i }})">{{ $i }}</button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="selectedRating">
                </form>
                @endif

                <script>
                function setRating(value) {
                    if (confirm(`Apakah Anda yakin ingin memberikan rating ${value}?`)) {
                        document.getElementById('selectedRating').value = value;
                        document.getElementById('ratingForm').submit();
                    }
                }
                </script>   


            

                
                {{-- watchlist --}}
                <form action="{{ route('watchlist.add', $film->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600">
                        Tambah ke Watchlist
                    </button>
                </form>
                
            </div>
        </div>
       
    </div>   
    @include('components.footer')
</body>
