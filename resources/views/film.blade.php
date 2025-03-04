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
                    <iframe class="w-full h-64 rounded-lg" src="{{ $film->trailer }}" frameborder="0" allowfullscreen></iframe>
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
                    <p><strong>Rating:</strong> ⭐ {{ $film->rating }}/10</p>
                    <p><strong>Durasi:</strong> {{ $film->durasi }} menit</p>
                </div>
                
                 
                    {{-- komen --}}
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
                            @foreach ($film->komentar as $komentar)
                            <div class="border-b border-gray-700 pb-2">
                                <p class="text-sm text-gray-400">{{ $komentar->user->name }} - {{ $komentar->created_at->diffForHumans() }}</p>
                                <p>{{ $komentar->isi_komentar }}</p>
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

                <h3 class="mt-4 text-lg font-bold">Rating</h3>
                <div class="flex items-center space-x-2 mt-2">
                    <span class="text-xl font-bold">{{ $film->rating }}</span>
                    <span class="text-yellow-400">⭐</span>
                </div>
                
                <form action="{{ route('watchlist.add', $film->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600">
                        Tambah ke Watchlist
                    </button>
                </form>
                
            </div>
        </div>
       
        
    </div>   
</body>
