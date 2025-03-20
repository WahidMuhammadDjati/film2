
{{-- <button data-modal-target="kategoriModal" data-modal-toggle="kategoriModal"
    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
    Pilih Kategori
</button> --}}


<!-- Load Popup dari kategori.blade.php -->


@props(['films'])
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($films as $film)
        <div class="bg-blue-900 text-white rounded-lg shadow-lg overflow-hidden relative">
            <!-- Tombol Tambah ke Watchlist -->
            @php
            $isInWatchlist = \App\Models\Watchlist::where('user_id', auth()->id())->where('film_id', $film->id)->exists();
        @endphp
        
        <form action="{{ route($isInWatchlist ? 'watchlist.remove' : 'watchlist.add', $film->id) }}" method="POST">
            @csrf
            <button class="absolute top-2 left-2 p-2 rounded-full {{ $isInWatchlist ? 'bg-green-500' : 'bg-gray-800' }}">
                @if($isInWatchlist)
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                @else
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                @endif
            </button>
        </form>
        
           
   
            {{-- <form action="{{ route('watchlist.add', $film->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-600">
                    Tambah ke Watchlist
                </button>
            </form> --}}

            <!-- Gambar Film -->
            <img class="w-full h-60 object-cover" src="{{ asset('storage/' . $film->gambar) }}" alt="{{ $film->nama }}" />
            
            <!-- Konten Film -->
            <div class="p-3">
                <!-- Rating -->
                <div class="flex items-center text-yellow-400 text-sm">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 3.316a1 1 0 011.902 0l1.228 3.77a1 1 0 00.95.69h3.957a1 1 0 01.592 1.81l-3.198 2.323a1 1 0 00-.364 1.118l1.228 3.77a1 1 0 01-1.54 1.118L10 14.12l-3.894 2.795a1 1 0 01-1.54-1.118l1.228-3.77a1 1 0 00-.364-1.118L2.232 8.586a1 1 0 01.592-1.81h3.957a1 1 0 00.95-.69l1.228-3.77z"></path></svg>
                    <span>{{ number_format($film->ratings->avg('rating'), 1) ?? '0' }}</span>
                </div>
                
                <!-- Nama Film -->
                <h5 class="text-lg font-semibold mt-1">{{ $film->nama }}</h5>
                
                <!-- Tombol Watchlist -->
                
                {{-- <button class="w-full bg-gray-700 text-white py-1 mt-2 rounded-md">+ Watchlist</button> --}}
                
                {{-- @foreach ($films as $film)
                <div class="bg-gray-800 p-4 rounded-lg">
                <h3 class="text-xl font-bold">{{ $film->judul }}</h3>
                <a href="{{ route('film.show', $film->id) }}" class="text-blue-400 hover:underline">Lihat Detail</a>
                </div>
                @endforeach --}}

                <a href="{{ route('film.show', $film->id) }}" class="w-full block text-center bg-gray-900 text-white py-1 mt-2 rounded-md">Detail Film</a>
                
                <!-- Tombol Trailer -->
                {{-- <a href="{{ $film->trailer }}" target="_blank" class="w-full block text-center bg-gray-900 text-white py-1 mt-2 rounded-md">▶ Trailer</a> --}}
                
                <!-- Tombol Trailer -->
                <button onclick="openTrailerModal('{{ $film->embed_trailer }}')" class="w-full block text-center bg-gray-900 text-white py-1 mt-2 rounded-md">▶ Trailer</button>

                <!-- Modal Trailer -->
                <div id="trailer-modal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-80 justify-center items-center z-[9999] hidden">

                {{-- <div id="trailer-modal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden"> --}}
                    <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-11/12 max-w-3xl relative">
                        <!-- Tombol Close -->
                        <button onclick="closeTrailerModal()" class="absolute top-2 right-2 text-white text-2xl">&times;</button>

                        <!-- Video Trailer -->
                        <div class="relative w-full h-0 pb-[56.25%]">
                            <iframe id="trailer-iframe" class="absolute top-0 left-0 w-full h-full rounded-lg" src="" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
<script>
    function openTrailerModal(embedUrl) {
    let modal = document.getElementById('trailer-modal');
    let iframe = document.getElementById('trailer-iframe');

    iframe.src = embedUrl;
    modal.classList.remove('hidden'); 
    modal.classList.add('flex');
    modal.classList.remove('hidden');  // Hapus hidden saat modal muncul
}

function closeTrailerModal() {
    let modal = document.getElementById('trailer-modal');
    let iframe = document.getElementById('trailer-iframe');

    modal.classList.add('hidden');
    modal.classList.remove('flex');  // Hapus flex saat modal disembunyikan
    modal.classList.add('hidden');  
    modal.classList.remove('flex');  // Hapus flex saat modal disembunyikan
}

</script>