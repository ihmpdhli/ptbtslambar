<?php

namespace Database\Seeders;

use App\Models\Operator;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
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
                "operator" => "Telkomsel",
            ],
            [
                "operator" => "Indosat",
            ],
            [
                "operator" => "XL-Axiata",
            ],
        ];
        foreach ($data as $d) {
            Operator::create($d);
        }
    }
}
