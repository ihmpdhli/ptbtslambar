<?php

namespace Database\Seeders;

use App\Models\Tahun;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
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
                "tahun" => "2021",
            ],
            [
                "tahun" => "2022",
            ],
            [
                "tahun" => "2023",
            ],
        ];
        foreach ($data as $d) {
            Tahun::create($d);
        }
    }
}
