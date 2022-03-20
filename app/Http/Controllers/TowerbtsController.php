<?php

namespace App\Http\Controllers;

use App\Exports\TowerbtsExport;
use App\Models\Operator;
use App\Models\Provider;
use App\Models\Jaringan;
use App\Models\Kecamatan;
use App\Models\Strukturmenara;
use App\Models\Towerbts;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TowerbtsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Towerbts = new Towerbts();
        $this->Provider = new Provider();
        $this->Operator = new Operator();
        $this->Jaringan = new Jaringan();
        $this->Kecamatan = new Kecamatan();
        $this->Tipemenara = new Strukturmenara();
        $this->User = new User();
    }

    public function index()
    {
        if ($user_id = auth()->user()->level == 1) {
            $user_id = auth()->user()->id;
            $towerbts = DB::table('towerbts')
                ->orderBy('updated_at', 'desc')
                ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
                ->leftJoin('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
                ->leftJoin('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
                ->leftJoin('users', 'users.id', '=', 'towerbts.users_id')
                ->select('towerbts.id AS bts', 'providers.provider', 'users.nama_lengkap', 'struktur_menaras.struktur_menara', 'towerbts.alamat', 'kecamatans.kecamatan', 'towerbts.posisi', 'towerbts.updated_at')
                ->get();
            $tower_opt = DB::table('tower_opt')
                ->leftJoin('operators', 'operators.id', '=', 'tower_opt.operator_id')
                ->get();
            $tower_jar = DB::table('tower_jar')
                ->leftJoin('jaringans', 'jaringans.id', '=', 'tower_jar.jaringan_id')
                ->get();
        } elseif ($user_id = auth()->user()->level == 2) {
            $user_id = auth()->user()->id;
            $towerbts = DB::table('towerbts')
                ->orderBy('updated_at', 'desc')
                ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
                ->leftJoin('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
                ->leftJoin('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
                ->leftJoin('users', 'users.id', '=', 'towerbts.users_id')
                ->where('users.id', $user_id)
                ->select('towerbts.id AS bts', 'providers.provider', 'struktur_menaras.struktur_menara',  'towerbts.alamat', 'kecamatans.kecamatan', 'towerbts.posisi', 'providers.provider', 'towerbts.updated_at')
                ->get();
            $tower_opt = DB::table('tower_opt')
                ->leftJoin('operators', 'operators.id', '=', 'tower_opt.operator_id')
                ->get();
            $tower_jar = DB::table('tower_jar')
                ->leftJoin('jaringans', 'jaringans.id', '=', 'tower_jar.jaringan_id')
                ->get();
        } else {
        }
        // dd($towerbts);

        return view('towerbts.index', compact('towerbts', 'tower_opt', 'tower_jar'));
    }

    public function towerbtsexport()
    {
        return Excel::download(new TowerbtsExport, 'Towerbts.xlsx');
    }

    public function add()
    {
        $provider = Provider::all();
        $struktur_menara = Strukturmenara::all();
        $kecamatan = Kecamatan::all();
        $operator = Operator::all();
        $jaringan = Jaringan::all();

        return view('towerbts.add', compact('provider', 'struktur_menara', 'kecamatan', 'jaringan', 'operator'));
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'provider_id' => 'required',
                'alamat' => 'required',
                'struktur_menara_id' => 'required',
                'kecamatan_id' => 'required',
                'tinggi_tower' => 'required|numeric',
                'luas_tanah' => 'required|numeric',
                'tgl_berdiri' => 'required|date',
                'pemilik_lahan' => 'required',
                'posisi' => 'required|unique:towerbts,posisi',

            ],
            [
                'provider_id.required' => 'Provider tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'struktur_menara_id.required' => 'Struktur menara tidak boleh kosong',
                'kecamatan_id.required' => 'Kecamatan tidak boleh kosong',
                'tinggi_tower.required' => 'Tinggi tower tidak boleh kosong',
                'tinggi_tower.numeric' => 'Field tinggi tower hanya mendukung format angka',
                'luas_tanah.required' => 'Luas tanah tidak boleh kosong',
                'luas_tanah.numeric' => 'Field luas tanah hanya mendukung format angka',
                'tgl_berdiri.required' => 'Tanggal berdiri tidak boleh kosong',
                'tgl_berdiri.date' => 'Field tanggal berdiri hanya mendukung format tanggal',
                'pemilik_lahan.required' => 'Nama pemilik lahan tidak boleh kosong',
                'posisi.required' => 'Posisi koordinat tidak boleh kosong',
                'posisi.unique' => 'Posisi koordinat ini sudah terdaftar, masukkan posisi koordinat lainnya',

            ]
        );

        // echo '<pre>';
        // print_r(Request()->operator_id);
        // die;

        $idTower = DB::table('towerbts')->insertGetId(
            [
                'providers_id' => Request()->provider_id,
                'struktur_menaras_id' => Request()->struktur_menara_id,
                'alamat' => Request()->alamat,
                'kecamatans_id' => Request()->kecamatan_id,
                'tinggi_tower' => Request()->tinggi_tower,
                'luas_tanah' => Request()->luas_tanah,
                'tgl_berdiri' => Request()->tgl_berdiri,
                'pemilik_lahan' => Request()->pemilik_lahan,
                'posisi' => Request()->posisi,
                'keterangan' => Request()->keterangan,
                'users_id' => auth()->user()->id
            ]
        );

        $opt = Request()->operator_id;
        for ($i = 0; $i < count((is_countable($opt) ? $opt : [])); $i++) {
            DB::table('tower_opt')->insert([
                'towerbts_id' => $idTower,
                'operator_id' => $opt[$i]
            ]);
        }

        $jar = Request()->jaringan_id;
        for ($i = 0; $i < count((is_countable($jar) ? $jar : [])); $i++) {
            DB::table('tower_jar')->insert([
                'towerbts_id' => $idTower,
                'jaringan_id' => $jar[$i]
            ]);
        }

        return redirect()->route('towerbts')->with('success', 'Data Berhasil di Tambah');
    }

    public function detail($id)
    {
        $towerbts = DB::table('towerbts')
            ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
            ->leftJoin('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
            ->leftJoin('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
            ->leftJoin('users', 'users.id', '=', 'towerbts.users_id')
            ->select(
                'towerbts.id AS bts',
                'providers.provider',
                'towerbts.posisi',
                'struktur_menaras.struktur_menara',
                'kecamatans.kecamatan',
                'users.nama_lengkap',
                'towerbts.alamat',
                'towerbts.tinggi_tower',
                'towerbts.luas_tanah',
                'towerbts.tgl_berdiri',
                'towerbts.pemilik_lahan',
                'towerbts.keterangan',
            )
            ->where('towerbts.id', $id)->first();

        $tower_opt = DB::table('tower_opt')
            ->leftJoin('operators', 'operators.id', '=', 'tower_opt.operator_id')
            ->where('tower_opt.towerbts_id', $id)
            ->get();

        $tower_jar = DB::table('tower_jar')
            ->leftJoin('jaringans', 'jaringans.id', '=', 'tower_jar.jaringan_id')
            ->where('tower_jar.towerbts_id', $id)
            ->get();

        $struktur_menara = Strukturmenara::all();
        $kecamatan = Kecamatan::all();
        $jaringan = Jaringan::all();
        $operator = Operator::all();

        if ($towerbts == null)
            abort(404);

        return view('towerbts.detail', compact('towerbts', 'struktur_menara', 'kecamatan', 'jaringan', 'operator', 'tower_opt', 'tower_jar'));
    }

    public function edit($id)
    {
        $towerbts = DB::table('towerbts')->where('id', $id)->first();
        $tower_opt = DB::table('tower_opt')
            ->leftJoin('operators', 'operators.id', '=', 'tower_opt.operator_id')
            ->where('tower_opt.towerbts_id', $id)
            ->get();
        $tower_jar = DB::table('tower_jar')
            ->leftJoin('jaringans', 'jaringans.id', '=', 'tower_jar.jaringan_id')
            ->where('tower_jar.towerbts_id', $id)
            ->get();
        $provider = Provider::all();
        $struktur_menara = Strukturmenara::all();
        $kecamatan = Kecamatan::all();
        $jaringan = Jaringan::all();
        $operator = Operator::all();

        if ($towerbts == null)
            abort(404);

        return view('towerbts.edit', compact('towerbts', 'provider', 'struktur_menara', 'kecamatan', 'jaringan', 'operator', 'tower_opt', 'tower_jar'));
    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'provider_id' => 'required',
                'alamat' => 'required',
                'struktur_menara_id' => 'required',
                'kecamatan_id' => 'required',
                'tinggi_tower' => 'required|numeric',
                'luas_tanah' => 'required|numeric',
                'tgl_berdiri' => 'required|date',
                'pemilik_lahan' => 'required',
                'posisi' => 'required',

            ],
            [
                'provider_id.required' => 'Provider tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'struktur_menara_id.required' => 'Struktur menara tidak boleh kosong',
                'kecamatan_id.required' => 'Kecamatan tidak boleh kosong',
                'tinggi_tower.required' => 'Tinggi tower tidak boleh kosong',
                'tinggi_tower.numeric' => 'Field tinggi tower hanya mendukung format angka',
                'luas_tanah.required' => 'Luas tanah tidak boleh kosong',
                'luas_tanah.numeric' => 'Field luas tanah hanya mendukung format angka',
                'tgl_berdiri.required' => 'Tanggal berdiri tidak boleh kosong',
                'tgl_berdiri.date' => 'Field tanggal berdiri hanya mendukung format tanggal',
                'pemilik_lahan.required' => 'Nama pemilik lahan tidak boleh kosong',
                'posisi.required' => 'Posisi koordinat tidak boleh kosong',

            ]
        );

        $towerbts = Towerbts::find($id);
        $towerbts->providers_id = $request->provider_id;
        $towerbts->struktur_menaras_id = $request->struktur_menara_id;
        $towerbts->alamat = $request->alamat;
        $towerbts->kecamatans_id = $request->kecamatan_id;
        $towerbts->tinggi_tower = $request->tinggi_tower;
        $towerbts->luas_tanah = $request->luas_tanah;
        $towerbts->tgl_berdiri = $request->tgl_berdiri;
        $towerbts->pemilik_lahan = $request->pemilik_lahan;
        $towerbts->posisi = $request->posisi;
        $towerbts->keterangan = $request->keterangan;
        $towerbts->save();

        DB::table('tower_opt')->where('towerbts_id', $id)->delete();

        $opt = Request()->operator_id;
        for ($i = 0; $i < count((is_countable($opt) ? $opt : [])); $i++) {
            DB::table('tower_opt')->insert([
                'towerbts_id' => $id,
                'operator_id' => $opt[$i]
            ]);
        }

        DB::table('tower_jar')->where('towerbts_id', $id)->delete();

        $jar = Request()->jaringan_id;
        for ($i = 0; $i < count((is_countable($jar) ? $jar : [])); $i++) {
            DB::table('tower_jar')->insert([
                'towerbts_id' => $id,
                'jaringan_id' => $jar[$i]
            ]);
        }

        return redirect()->route('towerbts')->with('success', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        DB::table('retribusis')->where('towerbts_id', $id)->delete();

        DB::table('towerbts')->where('id', $id)->delete();
        return redirect()->route('towerbts')->with('success', 'Data Berhasil di Hapus');
    }
}
