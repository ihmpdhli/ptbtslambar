<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Retribusi;
use App\Models\Tahun;
use App\Models\Towerbts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetribusiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Retribusi = new Retribusi();
        $this->Towerbts = new Towerbts();
        $this->Provider = new Provider();
        $this->Tahun = new Tahun();
        $this->User = new User();
    }

    public function index()
    {
        if ($user_id = auth()->user()->level == 1) {
            $user_id = auth()->user()->id;
            $retribusi = DB::table('retribusis')
                ->orderBy('updated_at', 'desc')
                ->leftJoin('towerbts', 'towerbts.id', '=', 'retribusis.towerbts_id')
                ->leftJoin('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
                ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
                ->leftJoin('tahuns', 'tahuns.id', '=', 'retribusis.tahuns_id')
                ->leftJoin('users', 'users.id', '=', 'retribusis.users_id')
                ->select('retribusis.id AS retribusi', 'providers.provider', 'struktur_menaras.struktur_menara', 'towerbts.alamat', 'towerbts.posisi', 'tahuns.tahun', 'retribusis.tgl_pembayaran', 'retribusis.tarif', 'users.nama_lengkap', 'retribusis.status',  'retribusis.ket_tarif', 'retribusis.updated_at')
                ->get();
        } elseif ($user_id = auth()->user()->level == 2) {
            $user_id = auth()->user()->id;
            $retribusi = DB::table('retribusis')
                ->orderBy('updated_at', 'desc')
                ->leftJoin('towerbts', 'towerbts.id', '=', 'retribusis.towerbts_id')
                ->leftJoin('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
                ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
                ->leftJoin('tahuns', 'tahuns.id', '=', 'retribusis.tahuns_id')
                ->leftJoin('users', 'users.id', '=', 'retribusis.users_id')
                ->where('users.id', $user_id)
                ->select('retribusis.id AS retribusi', 'providers.provider', 'struktur_menaras.struktur_menara', 'towerbts.alamat', 'towerbts.posisi', 'tahuns.tahun', 'retribusis.tgl_pembayaran', 'retribusis.tarif', 'retribusis.status', 'retribusis.ket_tarif', 'retribusis.updated_at')
                ->get();
        } else {
        }
        //dd($retribusi);

        return view('retribusi.index', compact('retribusi'));
    }

    public function add()
    {
        if ($user_id = auth()->user()->level == 1) {
            $user_id = auth()->user()->id;
            $towerbts = DB::table('towerbts')->get();
        } elseif ($user_id = auth()->user()->level == 2) {
            $user_id = auth()->user()->id;
            $towerbts = DB::table('towerbts')
                ->select('towerbts.id', 'towerbts.alamat')
                ->join('users', 'users.id', '=', 'towerbts.users_id')
                ->where('users.id', $user_id)
                ->get();
        } else {
        }
        $tahuns = DB::table('tahuns')
            ->get();

        return view('retribusi.add', compact('towerbts', 'tahuns'));
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'towerbts_id' => 'required',
                'tahun_id' => 'required',
            ],
            [
                'towerbts_id.required' => 'Alamat tower bts tidak boleh kosong',
                'tahun_id.required' => 'Tahun tidak boleh kosong',
            ]
        );

        // dd(Request()->towerbts_id);
        $retribusis = new Retribusi();
        $retribusis->towerbts_id = Request()->towerbts_id;
        $retribusis->tahuns_id = Request()->tahun_id;
        $retribusis->tarif = Request()->tarif;
        $retribusis->keterangan = Request()->keterangan;
        $retribusis->users_id = auth()->user()->id;
        $retribusis->status = 2;

        $retribusis->save();

        return redirect()->route('retribusi')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $retribusi = DB::table('retribusis')->where('id', $id)->first();

        if ($user_id = auth()->user()->level == 1) {
            $user_id = auth()->user()->id;
            $towerbts = DB::table('towerbts')->get();
        } elseif ($user_id = auth()->user()->level == 2) {
            $user_id = auth()->user()->id;
            $towerbts = DB::table('towerbts')
                ->select('towerbts.id', 'towerbts.alamat')
                ->join('users', 'users.id', '=', 'towerbts.users_id')
                ->where('users.id', $user_id)
                ->get();
        } else {
        }
        $tahuns = DB::table('tahuns')
            ->get();

        if ($retribusi == null)
            abort(404);

        return view('retribusi.edit', compact('retribusi', 'towerbts', 'tahuns'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'towerbts_id' => 'required',
                'tahun_id' => 'required',
            ],
            [
                'towerbts_id.required' => 'Alamat tower bts tidak boleh kosong',
                'tahun_id.required' => 'Tahun tidak boleh kosong',
            ]
        );

        //dd(Request()->id);
        $retribusis = Retribusi::find($id);
        $retribusis->towerbts_id = $request->towerbts_id;
        $retribusis->tahuns_id = $request->tahun_id;
        $retribusis->tarif = $request->tarif;
        $retribusis->keterangan = $request->keterangan;

        $retribusis->save();

        return redirect()->route('retribusi')->with('success', 'Data Berhasil di Edit');
    }

    public function detail($id)
    {
        $retribusi = DB::table('retribusis')
            ->leftJoin('towerbts', 'towerbts.id', '=', 'retribusis.towerbts_id')
            ->leftJoin('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
            ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
            ->leftJoin('tahuns', 'tahuns.id', '=', 'retribusis.tahuns_id')
            ->leftJoin('users', 'users.id', '=', 'retribusis.users_id')
            ->select('retribusis.id AS retribusi', 'providers.provider', 'struktur_menaras.struktur_menara', 'towerbts.alamat', 'towerbts.posisi', 'tahuns.tahun', 'retribusis.tgl_pembayaran', 'retribusis.tarif', 'users.nama_lengkap', 'retribusis.status', 'retribusis.ket_tarif', 'retribusis.keterangan')
            ->where('retribusis.id', $id)->first();

        $towerbts = Towerbts::all();

        if ($retribusi == null)
            abort(404);

        return view('retribusi.detail', compact('retribusi'));
    }

    public function delete($id)
    {
        DB::table('retribusis')->where('towerbts_id', $id)->delete();

        DB::table('retribusis')->where('id', $id)->delete();

        return redirect()->route('retribusi')->with('success', 'Data Berhasil di Hapus');
    }

    public function accept($id)
    {
        $data = [
            'status' => 1,
            'keterangan' => 'Retribusi berhasil di terima'
        ];

        Retribusi::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Retribusi Berhasil di Terima');
    }

    public function reject($id)
    {
        $data = [
            'status' => 0,
            'keterangan' => 'Retribusi berhasil di ditolak'
        ];

        Retribusi::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Retribusi Telah di Tolak');
    }

    public function wrong($id)
    {
        $data = [
            'status' => 3,
        ];

        Retribusi::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Terdapat Kesalahan Data');
    }

    public function done($id)
    {
        $data = [
            'status' => 4
        ];

        Retribusi::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Data Sudah di Perbaiki');
    }

    public function bayar($id)
    {
        $data = [
            'status' => 5
        ];

        Retribusi::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Retribusi Sudah di Bayar');
    }

    public function slkbayar($id)
    {
        $data = [
            'status' => 6,
            'keterangan' => null,
            'ket_tarif' => 'Jumlah tarif pembayaran retribusi BTS sebesar'
        ];

        Retribusi::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Menunggu Pembayaran Retribusi BTS');
    }
}
