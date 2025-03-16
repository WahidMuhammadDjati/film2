<x-navbar></x-navbar>

<div class="max-w-5xl mx-auto py-8 px-6">
    <h2 class="text-3xl font-bold mb-4">Watchlist Saya</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($watchlist->isEmpty())
        <p class="text-gray-400">Watchlist masih kosong.</p>
    @else
        <div class="grid grid-cols-3 gap-6">
            @foreach($watchlist as $item)
                <div class="bg-gray-800 p-4 rounded-lg text-white">
                    <img src="{{ asset('storage/' . $item->film->gambar) }}" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="mt-2 text-lg font-bold">{{ $item->film->nama }}</h3>
                    <a href="{{ $item->film->trailer }}" target="_blank" class="text-blue-400 text-sm underline">Lihat Trailer</a>

                    <div class="mt-4 space-y-2">
                        <p><strong>Genre:</strong> {{ implode(', ', $item->film->genres->pluck('nama_genre')->toArray()) }}</p>
                        <p><strong>Tahun:</strong> {{ $item->film->tahun->nama_tahun }}</p>
                        <p><strong>Negara:</strong> {{ $item->film->negara->nama_negara }}</p>
                        <p><strong>Rating:</strong> ⭐ {{ $item->film->rating }}/10</p>
                        <p><strong>Durasi:</strong> {{ $item->film->durasi }} menit</p>
                    </div>

                    <form action="{{ route('watchlist.remove', $item->film->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg mt-2 hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
