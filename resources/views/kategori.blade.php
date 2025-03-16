@vite(['resources/css/app.css','resources/js/app.js'])
<link rel="stylesheet" href="https://rsms.me/inter/inter.css"> 
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://kit.fontawesome.com/546907f101.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
{{-- <div x-data="{ open: false }">
    <!-- Tombol untuk membuka popup -->
    <button @click="open = true" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Pilih Kategori
    </button> --}}

    <!-- Popup Modal -->
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl relative"> <!-- Ukuran diperbesar -->
            <button @click="open = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">✖</button>
            <h2 class="text-2xl font-bold mb-6">Filter Kategori</h2>

            <form action="{{ route('kategori.films') }}" method="GET">
                <div class="grid grid-cols-2 gap-6"> <!-- 2 Kolom agar lebih rapi -->
                    <!-- Filter Genre -->
                    <div x-data="genreDropdown()" class="relative col-span-2"> 
                        <label class="block font-semibold text-lg">Genre</label>

                        <!-- Dropdown Select -->
                        <div class="border p-3 rounded cursor-pointer bg-white" @click="showDropdown = !showDropdown">
                            <template x-if="selectedGenres.length === 0">
                                <span class="text-gray-500">Pilih Genre</span>
                            </template>
                            <div class="flex flex-wrap gap-2">
                                <template x-for="(genre, index) in selectedGenres" :key="index">
                                    <div class="bg-blue-600 text-white px-3 py-1 rounded flex items-center">
                                        <span x-text="genre.nama_genre"></span>
                                        <button type="button" class="ml-2 text-sm" @click="removeGenre(index)">✖</button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Dropdown Options -->
                        <div x-show="showDropdown" class="absolute bg-white border mt-1 w-full z-10 max-h-80 overflow-auto shadow-lg rounded">
                            <template x-for="genre in genres" :key="genre.id">
                                <div @click="toggleGenre(genre)" class="p-3 hover:bg-blue-100 cursor-pointer flex items-center">
                                    <input type="button" x-bind:checked="selectedGenres.some(g => g.id === genre.id)" class="mr-2">
                                    <span x-text="genre.nama_genre"></span>
                                </div>
                            </template>
                            <button type="button" @click="showDropdown = false" class="ml-3 px-6 py-1 bg-gray-500 text-white rounded hover:bg-gray-600 text-lg">
                                selesai
                            </button>
                        </div>

                        <!-- Input Hidden untuk Form -->
                        <template x-for="genre in selectedGenres" :key="genre.id">
                            <input type="hidden" name="genre[]" :value="genre.id">
                        </template>
                    </div>

                    <!-- Filter Tahun -->
                    <div>
                        <label for="tahun" class="block font-semibold text-lg">Tahun</label>
                        <select name="tahun" id="tahun" class="w-full p-3 border rounded">
                            <option value="">Semua Tahun</option>
                            @foreach($tahuns as $tahun)
                                <option value="{{ $tahun->id }}" {{ request('tahun') == $tahun->id ? 'selected' : '' }}>
                                    {{ $tahun->nama_tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter Negara -->
                    <div>
                        <label for="negara" class="block font-semibold text-lg">Negara</label>
                        <select name="negara" id="negara" class="w-full p-3 border rounded">
                            <option value="">Semua Negara</option>
                            @foreach($negaras as $negara)
                                <option value="{{ $negara->id }}" {{ request('negara') == $negara->id ? 'selected' : '' }}>
                                    {{ $negara->nama_negara }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600 text-lg">Filter</button>
                    <button type="button" @click="open = false" class="ml-3 px-6 py-3 bg-gray-500 text-white rounded hover:bg-gray-600 text-lg">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
{{-- </div> --}}

<!-- Alpine.js Data -->
<script>
function genreDropdown() {
    return {
        genres: @json($genres), // Ambil data genre dari controller
        selectedGenres: [],
        showDropdown: false,
        toggleGenre(genre) {
            let exists = this.selectedGenres.find(g => g.id === genre.id);
            if (exists) {
                this.selectedGenres = this.selectedGenres.filter(g => g.id !== genre.id);
            } else {
                this.selectedGenres.push(genre);
            }
        },
        removeGenre(index) {
            this.selectedGenres.splice(index, 1);
        }
    };
}
</script>
