<x-layouta>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Daftar Pengguna</h1>

        <!-- Include Form Tambah User (jika diperlukan) -->
        {{-- @include('create-user-form')  --}}

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">Nama</th>
                    <th class="border border-gray-300 p-2">Email</th>
                    <th class="border border-gray-300 p-2">Role</th>
                    <th class="border border-gray-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 p-2">{{ $user->role }}</td> 
                        <td class="border border-gray-300 p-2 space-x-2">
                            <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <select name="role" class="p-1 border border-gray-300 rounded">
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="author" {{ $user->role === 'author' ? 'selected' : '' }}>Author</option>
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                <button type="submit" class="text-blue-500 ml-2">Update</button>
                            </form>
                        
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouta>
