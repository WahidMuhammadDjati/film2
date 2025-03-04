{{-- @extends('components.layout', ['films'=>$films]) --}}
<x-navbar :films="$films"></x-navbar>
{{-- @section('content') --}}
<div class="max-w-5xl mx-auto py-8 px-6">
    <h2 class="text-3xl font-bold mb-4">Watchlist Saya</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($watchlist))
        <p class="text-gray-400">Watchlist masih kosong.</p>
    @else
        <div class="grid grid-cols-3 gap-6">
            @foreach($watchlist as $film)
                <div class="bg-gray-800 p-4 rounded-lg">
                    <img src="{{ asset('storage/' . $film['gambar']) }}" class="w-full h-40 object-cover rounded-lg">
                    <h3 class="mt-2 text-lg font-bold">{{ $film['nama'] }}</h3>
                    <a href="{{ $film['trailer'] }}" target="_blank" class="text-blue-400 text-sm">Lihat Trailer</a>

                    <form action="{{ route('watchlist.remove', $film['id']) }}" method="POST">
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
{{-- @endsection --}}
