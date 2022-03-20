<?php

namespace Database\Seeders;

use App\Models\Strukturmenara;
use Illuminate\Database\Seeder;

class StrukturmenaraSeeder extends Seeder
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
                "struktur_menara" => "1 Kaki"
            ],
            [
                "struktur_menara" => "3 Kaki"
            ],
            [
                "struktur_menara" => "4 Kaki"
            ],
        ];
        foreach ($data as $d) {
            Strukturmenara::create($d);
        }
    }
}
