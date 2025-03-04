@props(['films'])
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($films as $film)
        <div class="bg-blue-900 text-white rounded-lg shadow-lg overflow-hidden relative">
            <!-- Tombol Tambah ke Watchlist -->
            <button class="absolute top-2 left-2 bg-gray-800 p-2 rounded-full">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                </svg>
            </button>
            
            <!-- Gambar Film -->
            <img class="w-full h-60 object-cover" src="{{ asset('storage/' . $film->gambar) }}" alt="{{ $film->nama }}" />
            
            <!-- Konten Film -->
            <div class="p-3">
                <!-- Rating -->
                <div class="flex items-center text-yellow-400 text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 3.316a1 1 0 011.902 0l1.228 3.77a1 1 0 00.95.69h3.957a1 1 0 01.592 1.81l-3.198 2.323a1 1 0 00-.364 1.118l1.228 3.77a1 1 0 01-1.54 1.118L10 14.12l-3.894 2.795a1 1 0 01-1.54-1.118l1.228-3.77a1 1 0 00-.364-1.118L2.232 8.586a1 1 0 01.592-1.81h3.957a1 1 0 00.95-.69l1.228-3.77z"></path></svg>
                    <span>{{ $film->rating }}</span>
                </div>
                
                <!-- Nama Film -->
                <h5 class="text-lg font-semibold mt-1">{{ $film->nama }}</h5>
                
                <!-- Tombol Watchlist -->
                
                <button class="w-full bg-gray-700 text-white py-1 mt-2 rounded-md">+ Watchlist</button>
                
                {{-- @foreach ($films as $film)
                <div class="bg-gray-800 p-4 rounded-lg">
                <h3 class="text-xl font-bold">{{ $film->judul }}</h3>
                <a href="{{ route('film.show', $film->id) }}" class="text-blue-400 hover:underline">Lihat Detail</a>
                </div>
                @endforeach --}}

                <a href="{{ route('film.show', $film->id) }}" class="w-full block text-center bg-gray-900 text-white py-1 mt-2 rounded-md">=APENI?=</a>
                
                <!-- Tombol Trailer -->
                <a href="{{ $film->trailer }}" target="_blank" class="w-full block text-center bg-gray-900 text-white py-1 mt-2 rounded-md">▶ Trailer</a>
            </div>
        </div>
    @endforeach
</div>
