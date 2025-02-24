<x-layouta>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Daftar Tahun</h1>

        <!-- Tombol Tambah Film -->
        {{-- <button onclick="openModal()" class="mb-4 px-4 py-2 bg-blue-500 text-white rounded">Tambah Film</button> --}}

        <!-- Include Form Tambah Film -->
        @include('createt-form')

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    {{-- <th class="border border-gray-300 p-2">Id</th> --}}
                    <th class="border border-gray-300 p-2">Tahun</th>
                    <th class="border border-gray-300 p-2">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tahuns as $tahun)
                    <tr>
                        {{-- <td class="border border-gray-300 p-2">{{ $genre->id }}</td> --}}
                        <td class="border border-gray-300 p-2">{{ $tahun->nama_tahun }}</td>
                        {{-- <td class="border border-gray-300 p-2 space-x-2">
                            <a href="{{ route('genre.edit', $genre->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')x  
                                <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus film ini?')">Hapus</button>
                            </form>
                        </td> --}}
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
</x-layouta>
