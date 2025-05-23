@if(isset($film))
<div x-data="{ open: false }">
    <!-- Tombol untuk membuka modal -->
    <button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">Edit Film</button>

    <!-- Modal Popup -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-3xl">
            <h2 class="text-lg font-semibold mb-3 text-center">Edit Film</h2>
            <form action="{{ route('author.film.update', $film->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label class="block text-sm">Nama:</label>
                        <input type="text" name="nama" value="{{ $film->nama }}" class="w-full border p-2 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm">Gambar:</label>
                        <input type="file" name="gambar" class="w-full border rounded-md">
                        @if($film->gambar)
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $film->gambar) }}" alt="Gambar Film" class="w-5 h-5 object-cover rounded-md">
                            </div>
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm">Trailer:</label>
                        <input type="url" name="trailer" value="{{ $film->trailer }}" class="w-full border p-2 rounded-md" required>
                    </div>
                    <div>
                        <label class="block text-sm">Genre:</label>
                        <select name="genre_id[]" class="w-full border p-2 rounded-md" multiple required>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ in_array($genre->id, $film->genres->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $genre->nama_genre }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500">Gunakan Ctrl (Windows) atau Cmd (Mac) untuk memilih lebih dari satu genre.</p>
                    </div>
                    <div>
                        <label class="block text-sm">Tahun:</label>
                        <select name="tahun_id" class="w-full border p-2 rounded-md" required>
                            <option value="" disabled>Pilih Tahun</option>
                            @foreach($tahuns as $tahun)
                                <option value="{{ $tahun->id }}" {{ $film->tahun_id == $tahun->id ? 'selected' : '' }}>{{ $tahun->nama_tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm">Negara:</label>
                        <select name="negara_id" class="w-full border p-2 rounded-md" required>
                            <option value="" disabled>Pilih Negara</option>
                            @foreach($negaras as $negara)
                                <option value="{{ $negara->id }}" {{ $film->negara_id == $negara->id ? 'selected' : '' }}>{{ $negara->nama_negara }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm">Aktor:</label>
                        <select name="aktor_id[]" class="w-full border p-2 rounded-md" multiple required>
                            @foreach($aktors as $aktor)
                                <option value="{{ $aktor->id }}" {{ in_array($aktor->id, $film->aktors->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $aktor->nama_aktor }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm">Durasi (menit):</label>
                        <input type="number" name="durasi" value="{{ $film->durasi }}" class="w-full border p-2 rounded-md" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="block text-sm">Deskripsi:</label>
                    <textarea name="deskripsi" class="w-full border p-2 rounded-md" rows="2" required>{{ $film->deskripsi }}</textarea>
                </div>

                <div class="flex justify-between">
                    <button type="button" @click="open = false" class="bg-gray-500 text-white px-3 py-1 rounded-md">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
