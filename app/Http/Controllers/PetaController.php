<?php

namespace App\Http\Controllers;

use App\Models\Peta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class PetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Peta = new Peta();
    }

    public function index()
    {
        if ($user_id = auth()->user()->level == 1) {
            $user_id = auth()->user()->id;
            $towerbts = DB::table('towerbts')
                ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
                ->leftJoin('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
                ->leftJoin('operators', 'operators.id', '=', 'towerbts.operators_id')
                ->leftJoin('jaringans', 'jaringans.id', '=', 'towerbts.jaringans_id')
                ->leftJoin('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
                ->leftJoin('users', 'users.id', '=', 'towerbts.users_id')
                ->select('towerbts.id AS bts', 'providers.provider', 'providers.icon', 'users.nama_lengkap', 'struktur_menaras.struktur_menara', 'operators.operator', 'towerbts.alamat', 'kecamatans.kecamatan', 'towerbts.posisi', 'jaringans.jaringan')
                ->get();
        } elseif ($user_id = auth()->user()->level == 2) {
            $user_id = auth()->user()->id;
            $towerbts = DB::table('towerbts')
                ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
                ->leftJoin('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
                ->leftJoin('operators', 'operators.id', '=', 'towerbts.operators_id')
                ->leftJoin('jaringans', 'jaringans.id', '=', 'towerbts.jaringans_id')
                ->leftJoin('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
                ->leftJoin('users', 'users.id', '=', 'towerbts.users_id')
                ->where('users.id', $user_id)
                ->select('towerbts.id AS bts', 'providers.provider', 'providers.icon', 'struktur_menaras.struktur_menara', 'operators.operator', 'towerbts.alamat', 'kecamatans.kecamatan', 'towerbts.posisi', 'providers.provider', 'jaringans.jaringan')
                ->get();
        } else {
        }
        // dd($towerbts);

        return view('peta.index', compact('towerbts'));
    }
}
