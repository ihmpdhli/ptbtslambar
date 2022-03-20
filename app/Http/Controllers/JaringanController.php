<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jaringan;
use Illuminate\Support\Facades\DB;

class JaringanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->Jaringan = new Jaringan();
    }

    public function index()
    {
        $jaringans = DB::table('jaringans')->get();

        return view('jaringan.index', compact('jaringans'));
    }

    public function add()
    {
        return view('jaringan.add');
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'jaringan'  => 'required|unique:jaringans,jaringan',
            ],
            [
                'jaringan.required' => 'Jaringan tidak boleh kosong',
                'jaringan.unique' => 'Jaringan ini sudah terdaftar, masukkan jaringan lainnya',
            ]
        );

        $jaringans = new Jaringan();
        $jaringans->jaringan = $request->jaringan;
        $jaringans->save();

        return redirect('jaringan')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $jaringans = DB::table('jaringans')->where('id', $id)->first();

        if ($jaringans == null)
            abort(404);

        return view('jaringan.edit', compact('jaringans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'jaringan'  => 'required|unique:jaringans,jaringan',
            ],
            [
                'jaringan.required' => 'Jaringan tidak boleh kosong',
                'jaringan.unique' => 'Jaringan ini sudah terdaftar, masukkan jaringan lainnya',
            ]
        );

        $jaringans = Jaringan::find($id);
        $jaringans->jaringan = $request->jaringan;
        $jaringans->save();

        return redirect('jaringan')->with('success', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        DB::table('jaringans')->where('id', $id)->delete();

        return redirect('jaringan')->with('success', 'Data Berhasil di Hapus');
    }
}
