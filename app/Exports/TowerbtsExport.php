<?php

namespace App\Exports;

use App\Models\Towerbts;
use Maatwebsite\Excel\Concerns\FromCollection;

class TowerbtsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Towerbts::all();
    }
}
