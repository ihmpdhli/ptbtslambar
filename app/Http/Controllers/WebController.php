<?php

namespace App\Http\Controllers;

use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function __construct()
    {
        $this->Web = new Web();
    }

    public function index()
    {
        $data = [
            'towerbts' => $this->Web->AllDataBTS(),
            'kecamatan' => $this->Web->Kecamatan(),
            'provider' => $this->Web->Provider(),
        ];

        if ($data == null)
            abort(404);

        return view('petahome', $data);
    }

    public function kecamatan($id)
    {
        $kec = $this->Web->DetailKecamatan($id);
        $data = [
            'title' => $kec->kecamatan,
            'towerbts' => $this->Web->KecamatanBTS($id),
            'kecamatan' => $this->Web->Kecamatan(),
            'provider' => $this->Web->Provider(),
            'kec' => $kec,
        ];

        if ($data == null)
            abort(404);

        return view('petakecamatan', $data);
    }

    public function provider($id)
    {
        $prov = $this->Web->DetailProvider($id);
        $data = [
            'title' => $prov->provider,
            'towerbts' => $this->Web->ProviderBTS($id),
            'kecamatan' => $this->Web->Kecamatan(),
            'provider' => $this->Web->Provider(),
            'prov' => $prov,
        ];

        if ($data == null)
            abort(404);

        return view('petaprovider', $data);
    }

    public function tentang()
    {
        $data = [
            'kecamatan' => $this->Web->Kecamatan(),
            'provider' => $this->Web->Provider(),
        ];

        if ($data == null)
            abort(404);

        return view('tentang', $data);
    }
}
