<x-layoutthor>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Daftar Film</h1>

        <!-- Tombol Tambah Film -->
        {{-- <button onclick="openModal()" class="mb-4 px-4 py-2 bg-blue-500 text-white rounded">Tambah Film</button> --}}

        <!-- Include Form Tambah Film -->
        @include('author-create')
        {{-- @include('editf-form') --}}

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">Gambar</th>
                    <th class="border border-gray-300 p-2">Nama</th>
                    <th class="border border-gray-300 p-2">Trailer</th>
                    <th class="border border-gray-300 p-2">Deskripsi</th>
                    <th class="border border-gray-300 p-2">Genre</th>
                    <th class="border border-gray-300 p-2">Tahun</th>
                    <th class="border border-gray-300 p-2">Negara</th>
                    <th class="border border-gray-300 p-2">Aktor</th>
                    <th class="border border-gray-300 p-2">Rating</th>
                    <th class="border border-gray-300 p-2">Durasi</th>
                    <th class="border border-gray-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
                        <td class="border border-gray-300 p-2">
                            <img src="{{ asset('storage/' . $film->gambar) }}" alt="{{ $film->nama }}" class="w-16 h-16 object-cover">
                        </td>
                        <td class="border border-gray-300 p-2">{{ $film->nama }}</td>
                        <td class="border border-gray-300 p-2">
                            <a href="{{ $film->trailer }}" target="_blank" class="text-blue-500">Lihat Trailer</a>
                        </td>
                        <td class="border border-gray-300 p-2">{{ Str::limit($film->deskripsi, 50) }}</td>
                        <td class="border border-gray-300 p-2">
                            @if($film->genres->isNotEmpty())
                                {{ implode(', ', $film->genres->pluck('nama_genre')->toArray()) }}
                            @else
                                <span class="text-gray-500">Tidak ada genre</span>
                            @endif
                        </td>
                        
                        <td class="border border-gray-300 p-2">{{ $film->tahun->nama_tahun }}</td>
                        <td class="border border-gray-300 p-2">{{ $film->negara->nama_negara }}</td>
                        {{-- <td class="border border-gray-300 p-2">{{ $film->aktor->nama_aktor }}</td> --}}
                        <td class="border border-gray-300 p-2">
                            @if($film->aktors->isNotEmpty())
                                {{ implode(', ', $film->aktors->pluck('nama_aktor')->toArray()) }}
                            @else
                                <span class="text-gray-500">Tidak ada aktor</span>
                            @endif
                        </td>
                        <td class="border border-gray-300 p-2">{{ number_format($film->ratings->avg('rating'), 1) ?? '0' }}</td>
                        <td class="border border-gray-300 p-2">{{ $film->durasi }} menit</td>
                        <td class="border border-gray-300 p-2 space-x-2">
                            <div x-data="{ open: false }">
                                {{-- <a href="#" @click="open = true" class="text-blue-500">Edit</a> --}}
                            
                                @include('author-edit')
                            </div>
                            {{-- <a href="{{ route('films.edit', $film->id) }}" class="text-blue-500">Edit</a> --}}
                            <form action="{{ route('author.film.destroy', $film->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus film ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach                                                                         
            </tbody>
        </table>
    </div>

    {{-- <!-- Script Modal -->
    <script>
        function openModal() {
            document.getElementById('filmModal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('filmModal').classList.add('hidden');
        }
    </script> --}}
</x-layoutthor>
