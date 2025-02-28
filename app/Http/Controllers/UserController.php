<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
        public function index()
    {
        $users = User::all(); // Ambil semua user dari database
        return view('creates', compact('users')); // Kirim data ke view
    }

    public function destroy($id) // menghapus data film
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Film berhasil dihapus!');
    }

}
