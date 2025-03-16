<div x-data="{ open: false }">
    <button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Film</button>

    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg mt-24 mb-10 shadow-lg w-full max-w-3xl">
            <h2 class="text-lg font-semibold mb-3 text-center">Tambah Film</h2>
            <form action="{{ route('author.film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label class="block text-sm">Nama:</label>
                        <input type="text" name="nama" class="w-full border p-2 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm">Gambar:</label>
                        <input type="file" name="gambar" class="w-full border p-2 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm">Trailer:</label>
                        <input type="url" name="trailer" class="w-full border p-2 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm">Genre:</label>
                        <select name="genre_id[]" class="w-full border p-2 rounded-md" multiple required>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->nama_genre }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500">Gunakan Ctrl (Windows) atau Cmd (Mac) untuk memilih lebih dari satu genre.</p>
                    </div>
                    <div>
                        <label class="block text-sm">Tahun:</label>
                        <select name="tahun_id" class="w-full border p-2 rounded-md" required>
                            <option value="" disabled selected>Pilih Tahun</option>
                            @foreach($tahuns as $tahun)
                                <option value="{{ $tahun->id }}">{{ $tahun->nama_tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm">Negara:</label>
                        <select name="negara_id" class="w-full border p-2 rounded-md" required>
                            <option value="" disabled selected>Pilih Negara</option>
                            @foreach($negaras as $negara)
                                <option value="{{ $negara->id }}">{{ $negara->nama_negara }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm">Durasi (menit):</label>
                        <input type="number" name="durasi" class="w-full border p-2 rounded-md" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="block text-sm">Deskripsi:</label>
                    <textarea name="deskripsi" class="w-full border p-2 rounded-md" rows="2" required></textarea>
                </div>
                <div class="flex justify-between">
                    <button type="button" @click="open = false" class="bg-gray-500 text-white px-3 py-1 rounded-md">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
