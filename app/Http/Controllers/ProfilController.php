<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->User = new User();
    }

    public function edit($id)
    {
        $user = auth()->user()->id;

        if ($user == null)
            abort(404);

        return view('profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'nama_lengkap' => 'required',
                'oldpassword' => 'required|min:8',
                'newpassword' => 'required|min:8',
                'renewpassword' => 'required|min:8|same:newpassword'
            ],
            [
                'nama_lengkap.required' => 'Nama lengkap tidak boleh kosong',
                'oldpassword.required' => 'Password lama tidak boleh kosong',
                'oldpassword.min' => 'Masukkan Minimal 8 Karakter!',
                'newpassword.required' => 'Password baru tidak boleh kosong',
                'newpassword.min' => 'Masukkan Minimal 8 Karakter!',
                'renewpassword.same' => 'Konfirmasi password tidak sama',
                'renewpassword.required' => 'Konfirmasi password baru tidak boleh kosong',
                'renewpassword.min' => 'Masukkan Minimal 8 Karakter!',
            ]
        );


        if ($request->newpassword) {
            if (Hash::check($request->oldpassword, auth()->user()->password)) {
                $data = [
                    'nama_lengkap' => $request->nama_lengkap,
                    'password' => Hash::make($request->newpassword)
                ];
                User::where('id', auth()->user()->id)->update($data);
            } else {
                return redirect()->back()->with('gagal', 'Password lama salah');
            }
        } else {
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
            ];
            User::where('id', auth()->user()->id)->update($data);
        }

        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }
}
