@if(isset($genre))
    <div x-data="{ open: false }">
        <button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">Edit Genre</button>

        <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-3xl">
                <h2 class="text-lg font-semibold mb-3 text-center">Edit Genre</h2>
                <form action="{{ route('genre.update', $genre->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm">Nama:</label>
                        <input type="text" name="nama_genre" value="{{ $genre->nama_genre }}" class="w-full border p-2 rounded-md" required>
                    </div>
                    <div class="flex justify-between mt-4">
                        <button type="button" @click="open = false" class="bg-gray-500 text-white px-3 py-1 rounded-md">Batal</button>
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endif
