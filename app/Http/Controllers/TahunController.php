<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function __construct()
    {
        $this->Tahun = new Tahun();
        $this->middleware('auth');
    }

    public function index()
    {
        $tahuns = DB::table('tahuns')
            ->get();

        return view('tahun.index', compact('tahuns'));
    }

    public function retribusi()
    {
        $data = [
            'retribusi' => $this->Tahun->AllDataRetribusi(),
            'tahun' => $this->Tahun->Tahun(),
        ];

        if ($data == null)
            abort(404);

        return view('tahun.retribusi', $data);
    }

    public function datatahun($id)
    {
        $thn = $this->Tahun->DetailTahun($id);
        $data = [
            'title' => $thn->tahun,
            'retribusi' => $this->Tahun->TahunRetribusi($id),
            'tahun' => $this->Tahun->Tahun(),
            'thn' => $thn,
        ];

        if ($data == null)
            abort(404);

        return view('tahun.datatahun', $data);
    }

    public function add()
    {
        return view('tahun.add');
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'tahun' => 'required|numeric|unique:tahuns,tahun',
            ],
            [
                'tahun.required' => 'Tahun tidak boleh kosong',
                'tahun.numeric' => 'Field tahun hanya mendukung format angka',
                'tahun.unique' => 'Tahun ini sudah terdaftar, masukkan tahun lainnya',
            ]
        );

        $tahuns = new Tahun();
        $tahuns->tahun = $request->tahun;
        $tahuns->save();

        return redirect('tahun')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $tahuns = DB::table('tahuns')->where('id', $id)->first();

        if ($tahuns == null)
            abort(404);

        return view('tahun.edit', compact('tahuns'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'tahun' => 'required|numeric|unique:tahuns,tahun',
            ],
            [
                'tahun.required' => 'Tahun tidak boleh kosong',
                'tahun.numeric' => 'Field tahun hanya mendukung format angka',
                'tahun.unique' => 'Tahun ini sudah terdaftar, masukkan tahun lainnya',
            ]
        );

        $tahuns = Tahun::find($id);
        $tahuns->tahun = $request->tahun;
        $tahuns->save();

        return redirect('tahun')->with('success', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        DB::table('retribusis')->where('towerbts_id', $id)->delete();
        DB::table('retribusis')->where('tahuns_id', $id)->delete();
        DB::table('tahuns')->where('id', $id)->delete();

        return redirect('tahun')->with('success', 'Data Berhasil di Hapus');
    }
}
