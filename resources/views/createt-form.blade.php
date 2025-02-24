<div x-data="{ open: false }">
    <button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Tahun</button>

<div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg w-[500px] h-[500px] shadow-lg">
        <h2 class="text-lg font-semibold mb-4 text-center">Tambah Tahun</h2>
        <form action="{{ route('tahun.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Form Film -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm">Tahun:</label>
                    <input type="number" name="nama_tahun" class="w-full border p-2 rounded-md" 
                           min="1900" max="2099" step="1" required placeholder="Masukkan tahun (4 digit)">
                </div>
                
            </div>
            <div class="flex justify-between">
                <button type="button" @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded-md">Batal</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
