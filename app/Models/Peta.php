<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Peta extends Model
{
    protected $table = "towerbts";

    protected $fillable = ["operators_id", "alamat", "kecamatans_id", "jaringans_id", "tinggi_tower", "luas_tanah", "tgl_berdiri", "pemilik_lahan", "posisi", "users_id"];

    public function AllData()
    {
        return DB::table('towerbts')
            ->leftJoin('providers', 'providers.id', '=', 'towerbts.providers_id')
            ->leftJoin('jaringans', 'jaringans.id', '=', 'towerbts.jaringan_id')
            ->leftJoin('kecamatans', 'kecamatans.id', '=', 'towerbts.kecamatan_id')
            ->get();
    }
}
