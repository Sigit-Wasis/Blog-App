<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = DB::table('users')->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'name.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak cocok',
            'password_confirmation.required' => 'Konfirmasi password harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format file harus jpeg, png, jpg, atau gif',
            'foto.max' => 'Ukuran file maksimal 2MB',
        ]);

        $image = $request->file('foto');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // Simpan file ke folder public/assets/images/foto
        $image->move(public_path('assets/images/foto/'), $imageName);

        DB::table('users')->insert([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'foto'          => $imageName,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('user')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'name.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format file harus jpeg, png, jpg, atau gif',
            'foto.max' => 'Ukuran file maksimal 2MB',
        ]);

        $user = DB::table('users')->where('id', $id)->first();

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Simpan file ke folder public/assets/images/foto
            $image->move(public_path('assets/images/foto/'), $imageName);

            // hapus filenya jika ada
            if ($user->foto) {
                unlink(public_path('assets/images/foto/' . $user->foto));
            }

            DB::table('users')->where('id', $id)->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat'        => $request->alamat,
                'foto'          => $imageName,
                'updated_at'    => now(),
            ]);

            return redirect()->route('user')->with('success', 'Data berhasil diperbarui');

        } else {
            DB::table('users')->where('id', $id)->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat'        => $request->alamat,
                'updated_at'    => now(),
            ]);

            return redirect()->route('user')->with('success', 'Data berhasil diperbarui');
        }
    }

    public function destroy($id)
    {
        // hapus filenya jika ada
        $user = DB::table('users')->where('id', $id)->first();
        if ($user->foto) {
            unlink(public_path('assets/images/foto/' . $user->foto));
        }
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('user')->with('success', 'Data berhasil dihapus');
    }
}
