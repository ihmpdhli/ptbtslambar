<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Towerbts extends Model
{
    use HasFactory;

    protected $table = "towerbts";

    protected $fillable = ["operators_id", "alamat", "kecamatans_id", "jaringans_id", "tinggi_tower", "luas_tanah", "tgl_berdiri", "pemilik_lahan", "posisi", "users_id"];
}
