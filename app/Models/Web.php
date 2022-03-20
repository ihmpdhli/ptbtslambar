<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Web extends Model
{

    public function AllDataBTS()
    {
        return DB::table('towerbts')
            ->join('providers', 'providers.id', '=', 'towerbts.providers_id')
            ->join('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
            ->get();
    }

    public function Kecamatan()
    {
        return DB::table('kecamatans')
            ->get();
    }

    public function DetailKecamatan($id)
    {
        return DB::table('kecamatans')
            ->where('id', $id)->first();
    }

    public function KecamatanBTS($kecamatans_id)
    {
        return DB::table('towerbts')
            ->join('providers', 'providers.id', '=', 'towerbts.providers_id')
            ->join('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
            ->where('towerbts.kecamatans_id', $kecamatans_id)
            ->get();
    }

    public function Provider()
    {
        return DB::table('providers')
            ->get();
    }

    public function DetailProvider($id)
    {
        return DB::table('providers')
            ->where('id', $id)->first();
    }

    public function ProviderBTS($providers_id)
    {
        return DB::table('towerbts')
            ->join('providers', 'providers.id', '=', 'towerbts.providers_id')
            ->join('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatans_id')
            ->where('towerbts.providers_id', $providers_id)
            ->get();
    }
}
