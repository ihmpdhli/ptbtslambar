<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "kecamatan" => "Balik Bukit",
            ],
            [
                "kecamatan" => "Sukau",
            ],
            [
                "kecamatan" => "Lumbok Seminung",
            ],
            [
                "kecamatan" => "Batu Brak",
            ],
            [
                "kecamatan" => "Belalau",
            ],
            [
                "kecamatan" => "Batu Ketulis",
            ],
            [
                "kecamatan" => "Sekincau",
            ],
            [
                "kecamatan" => "Way Tenong",
            ],
            [
                "kecamatan" => "Air Hitam",
            ],
            [
                "kecamatan" => "Sumber Jaya",
            ],
            [
                "kecamatan" => "Kebun Tebu",
            ],
            [
                "kecamatan" => "Gedung Surian",
            ],
            [
                "kecamatan" => "Pagar Dewa",
            ],
            [
                "kecamatan" => "Suoh",
            ],
            [
                "kecamatan" => "Bandar Negeri Suoh",
            ],
        ];
        foreach ($data as $d) {
            Kecamatan::create($d);
        }
    }
}
