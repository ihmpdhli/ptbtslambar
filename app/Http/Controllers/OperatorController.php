<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;
use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->Operator = new Operator();
    }

    public function index()
    {
        $operators = DB::table('operators')->get();

        return view('operator.index', compact('operators'));
    }

    public function add()
    {
        return view('operator.add');
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'operator'  => 'required|unique:operators,operator',
            ],
            [
                'operator.required' => 'Operator tidak boleh kosong',
                'operator.unique' => 'Operator ini sudah terdaftar, masukkan operator lainnya',
            ]
        );

        $operators = new Operator();
        $operators->operator = $request->operator;
        $operators->save();

        return redirect('operator')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $operators = DB::table('operators')->where('id', $id)->first();

        if ($operators == null)
            abort(404);

        return view('operator.edit', compact('operators'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'operator'  => 'required|unique:operators,operator',
            ],
            [
                'operator.required' => 'Operator tidak boleh kosong',
                'operator.unique' => 'Operator ini sudah terdaftar, masukkan operator lainnya',
            ]
        );

        $operators = Operator::find($id);
        $operators->operator = $request->operator;
        $operators->save();

        return redirect('operator')->with('success', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        DB::table('operators')->where('id', $id)->delete();

        return redirect('operator')->with('success', 'Data Berhasil di Hapus');
    }
}
