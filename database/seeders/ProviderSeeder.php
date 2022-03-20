<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $data = [
            [
                "provider" => "Tower Bersama Group",
                "icon" => "TBG.png"
            ],
            [
                "provider" => "Telkomsel",
                "icon" => "TELKOMSEL.png"
            ],
            [
                "provider" => "Indosat",
                "icon" => "INDOSAT.png"
            ],
            [
                "provider" => "XL-Axiata",
                "icon" => "XLAXIATA.png"
            ],
            [
                "provider" => "Solusi Tunas Pratama",
                "icon" => "STP.png"
            ],
            [
                "provider" => "Protelindo",
                "icon" => "PROTELINDO.png"
            ],
            [
                "provider" => "Daya Mitratel",
                "icon" => "DAYAMITRATEL.png"
            ],
            [
                "provider" => "Inti Bangun Sejahtera",
                "icon" => "IBS.png"
            ],
            [
                "provider" => "Era Bangun Towerindo",
                "icon" => "EBT.png"
            ],
            [
                "provider" => "Persada Sokta Tama",
                "icon" => "PST.png"
            ],
            [
                "provider" => "Centratama Menara Indonesia",
                "icon" => "CMI.png"
            ],
            [
                "provider" => "Gihon",
                "icon" => "GIHON.png"
            ],
        ];
        foreach ($data as $d) {
            Provider::create($d);
        }
    }
}
