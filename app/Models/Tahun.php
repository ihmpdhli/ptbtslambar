<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tahun extends Model
{
    use HasFactory;

    protected $table = "tahuns";

    public function AllDataRetribusi()
    {
        return DB::table('retribusis')
            ->join('towerbts', 'towerbts.id', '=', 'retribusis.towerbts_id')
            ->join('users', 'users.id', '=', 'towerbts.users_id')
            ->join('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
            ->join('providers', 'providers.id', '=', 'towerbts.providers_id')
            ->join('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
            ->join('tahuns', 'tahuns.id', '=', 'retribusis.tahuns_id')
            ->get();
    }

    public function Tahun()
    {
        return DB::table('tahuns')
            ->get();
    }

    public function DetailTahun($id)
    {
        return DB::table('tahuns')
            ->where('id', $id)->first();
    }

    public function TahunRetribusi($tahuns_id)
    {
        return DB::table('retribusis')
            ->join('towerbts', 'towerbts.id', '=', 'retribusis.towerbts_id')
            ->join('users', 'users.id', '=', 'towerbts.users_id')
            ->join('struktur_menaras', 'struktur_menaras.id', '=', 'towerbts.struktur_menaras_id')
            ->join('providers', 'providers.id', '=', 'towerbts.providers_id')
            ->join('tahuns', 'tahuns.id', '=', 'retribusis.tahuns_id')
            ->join('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
            ->where('retribusis.tahuns_id', $tahuns_id)
            ->get();
    }
}
