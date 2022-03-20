<?php

namespace Database\Seeders;

use App\Models\Jaringan;
use Illuminate\Database\Seeder;

class JaringanSeeder extends Seeder
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
                "jaringan" => "3G",
            ],
            [
                "jaringan" => "4G",
            ],
            [
                "jaringan" => "5G",
            ],
        ];
        foreach ($data as $d) {
            Jaringan::create($d);
        }
    }
}
