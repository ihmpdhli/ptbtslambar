<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->Kecamatan = new Kecamatan();
        $this->middleware('auth');
    }

    public function index()
    {
        $kecamatans = DB::table('kecamatans')->get();

        return view('kecamatan.index', compact('kecamatans'));
    }

    public function towerbts()
    {
        $data = [
            'towerbts' => $this->Kecamatan->AllDataBTS(),
            'kecamatan' => $this->Kecamatan->Kecamatan(),
        ];

        if ($data == null)
            abort(404);

        return view('kecamatan.towerbts', $data);
    }

    public function datakecamatan($id)
    {
        $kec = $this->Kecamatan->DetailKecamatan($id);
        $data = [
            'title' => $kec->kecamatan,
            'towerbts' => $this->Kecamatan->KecamatanBTS($id),
            'kecamatan' => $this->Kecamatan->Kecamatan(),
            'kec' => $kec,
        ];

        if ($data == null)
            abort(404);

        return view('kecamatan.datakecamatan', $data);
    }

    public function add()
    {
        return view('kecamatan.add');
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'kecamatan'  => 'required|unique:kecamatans,kecamatan',
            ],
            [
                'kecamatan.required' => 'Kecamatan tidak boleh kosong',
                'kecamatan.unique' => 'Kecamatan ini sudah terdaftar, masukkan kecamatan lainnya',
            ]
        );

        $kecamatans = new Kecamatan();
        $kecamatans->kecamatan = $request->kecamatan;
        $kecamatans->save();

        return redirect('kecamatan')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $kecamatans = DB::table('kecamatans')->where('id', $id)->first();

        if ($kecamatans == null)
            abort(404);

        return view('kecamatan.edit', compact('kecamatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'kecamatan'  => 'required|unique:kecamatans,kecamatan',
            ],
            [
                'kecamatan.required' => 'Kecamatan tidak boleh kosong',
                'kecamatan.unique' => 'Kecamatan ini sudah terdaftar, masukkan kecamatan lainnya',
            ]
        );

        $kecamatans = Kecamatan::find($id);
        $kecamatans->kecamatan = $request->kecamatan;
        $kecamatans->save();

        return redirect('kecamatan')->with('success', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        DB::table('kecamatans')->where('id', $id)->delete();

        return redirect('kecamatan')->with('success', 'Data Berhasil di Hapus');
    }
}
