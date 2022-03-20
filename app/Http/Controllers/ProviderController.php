<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Towerbts;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Provider = new Provider();
    }

    public function index()
    {
        $providers = DB::table('providers')->get();

        return view('provider.index', compact('providers'));
    }

    public function towerbts()
    {
        $data = [
            'towerbts' => $this->Provider->AllDataBTS(),
            'provider' => $this->Provider->Provider(),
        ];

        if ($data == null)
            abort(404);

        return view('provider.towerbts', $data);
    }

    public function dataprovider($id)
    {
        $prov = $this->Provider->DetailProvider($id);
        $data = [
            'title' => $prov->provider,
            'towerbts' => $this->Provider->ProviderBTS($id),
            'provider' => $this->Provider->Provider(),
            'prov' => $prov,
        ];

        if ($data == null)
            abort(404);

        return view('provider.dataprovider', $data);
    }

    public function add()
    {
        return view('provider.add');
    }

    public function insert(Request $request)
    {
        Request()->validate(
            [
                'provider'  => 'required|unique:providers,provider',
                'icon' => 'required|file|image|mimes:jpeg,png,jpg|max:1024|unique:providers,icon',
            ],
            [
                'provider.required' => 'Provider tidak boleh kosong',
                'provider.unique' => 'Provider ini sudah terdaftar, masukkan provider lainnya',
                'icon.required' => 'Icon tidak boleh kosong',
                'icon.image' => 'Field icon hanya mendukung format .png, .jpg, .jpeg',
                'icon.max' => 'Ukuran maximal file 1MB',
                'icon.unique' => 'Icon ini sudah terdaftar, masukkan icon lainnya',
            ]
        );

        $file = Request()->icon;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('icon'), $filename);

        $providers = new Provider();
        $providers->provider = $request->provider;
        $providers->icon = $filename;
        $providers->save();

        return redirect('provider')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $providers = DB::table('providers')->where('id', $id)->first();

        if ($providers == null)
            abort(404);

        return view('provider.edit', compact('providers'));
    }

    public function update(Request $request, $id)
    {
        Request()->validate(
            [
                'provider'  => 'required|unique:providers,provider',
                'icon' => 'file|image|mimes:jpeg,png,jpg|max:1024|unique:providers,icon',
            ],
            [
                'provider.required' => 'Provider tidak boleh kosong',
                'provider.unique' => 'Provider ini sudah terdaftar, masukkan provider lainnya',
                'icon.image' => 'Field icon hanya mendukung format .png, .jpg, .jpeg',
                'icon.max' => 'Ukuran maximal file 1MB',
                'icon.unique' => 'Icon ini sudah terdaftar, masukkan icon lainnya',
            ]
        );

        if (Request()->icon <> "") {
            //jika ingin ganti icon
            $file = Request()->icon;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('icon'), $filename);

            $providers = Provider::find($id);
            $providers->provider = $request->provider;
            $providers->icon = $filename;
            $providers->save();
        } else {
            //jika tidak ganti icon
            $providers = Provider::find($id);
            $providers->provider = $request->provider;
            $providers->save();
        }

        return redirect()->route('provider')->with('success', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        DB::table('providers')->where('id', $id)->delete();

        return redirect()->route('provider')->with('success', 'Data Berhasil di Hapus');
    }
}
