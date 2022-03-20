<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Users = new Users();
    }

    public function index()
    {
        $users = DB::table('users')
            ->orderBy('created_at', 'desc')
            ->select('users.id AS user', 'users.name', 'users.nama_lengkap', 'users.email', 'users.level', 'users.created_at')
            ->get();

        return view('users.index', compact('users'));
    }

    public function add()
    {
        return view('users.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:users,name',
            'nama_lengkap'  => 'required',
            'email'    => 'required|unique:users,email',
            'password'    => 'required|min:8',
        ], [
            'name.required' => 'Name tidak boleh kosong',
            'name.unique' => 'Name ini sudah terdaftar, masukkan name lainnya',
            'nama_lengkap.required' => 'Nama lengkap tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak boleh kosong',
            'email.unique' => 'Email ini sudah terdaftar, masukkan email lainnya',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal diisi dengan 8 karakter!',

        ]);

        $users = new Users();
        $users->name = Request()->name;
        $users->nama_lengkap = Request()->nama_lengkap;
        $users->email = Request()->email;
        $users->password = Hash::make(Request()->password);
        $users->level = Request()->level;
        $users->save();

        return redirect()->route('users')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $users = DB::table('users')->where('id', $id)->first();

        if ($users == null)
            abort(404);

        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->foto);
        $request->validate([
            //'name'  => 'required|unique:users,name',
            'nama_lengkap'  => 'required',
        ], [
            //'name.required' => 'Wajib Diisi !!!',
            'nama_lengkap.required' => 'Nama lengkap tidak boleh kosong',

        ]);

        $users = Users::find($id);
        $users->name = $request->name;
        $users->nama_lengkap = $request->nama_lengkap;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->level = $request->level;
        $users->save();

        return redirect()->route('users')->with('success', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        DB::table('towerbts')->where('users_id', $id)->delete();
        DB::table('rekombts')->where('users_id', $id)->delete();
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users')->with('success', 'Data Berhasil di Hapus');
    }
}
