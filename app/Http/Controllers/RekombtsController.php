<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use App\Models\Rekombts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RekombtsController extends Controller
{

    public function __construct()
    {
        $this->Rekombts = new Rekombts();
        $this->User = new User();
        $this->middleware('auth');
    }

    public function index()
    {
        if ($user_id = auth()->user()->level == 1) {
            $user_id = auth()->user()->id;
            $rekombts = DB::table('rekombts')
                ->orderBy('updated_at', 'desc')
                ->select('rekombts.id AS rekom', 'rekombts.nama_pemohon', 'rekombts.no_telp', 'rekombts.email', 'rekombts.posisi', 'rekombts.status', 'rekombts.tgl_pengajuan', 'rekombts.updated_at', 'rekombts.created_at')
                ->get();
        } elseif ($user_id = auth()->user()->level == 2) {
            $user_id = auth()->user()->id;
            $rekombts = DB::table('rekombts')
                ->orderBy('updated_at', 'desc')
                ->Join('users', 'users.id', '=', 'rekombts.users_id')
                ->where('users.id', $user_id)
                ->select('rekombts.id AS rekom', 'rekombts.nama_pemohon', 'rekombts.no_telp', 'rekombts.email', 'rekombts.posisi', 'rekombts.status', 'rekombts.tgl_pengajuan', 'rekombts.updated_at', 'rekombts.created_at')
                ->get();
        } else {
        }
        return view('rekombts.index', compact('rekombts'));
    }

    public function add()
    {
        return view('rekombts.add');
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'nama_pemohon' => 'required',
                'no_telp' => 'required|numeric',
                'email' => 'required',
                'surat_permohonan' => 'required|file|mimetypes:application/pdf|max:2048',
                'fotocopy_ktp' => 'required|file|mimetypes:application/pdf|max:2048',
                'surat_izinlokasi' => 'required|file|mimetypes:application/pdf|max:2048',
                'fotocopy_akta' => 'required|file|mimetypes:application/pdf|max:2048',
                'gambar_menara' => 'required|file|mimetypes:application/pdf|max:2048',
                'rencana_anggaran' => 'required|file|mimetypes:application/pdf|max:2048',
                'jaminan_asuransi' => 'required|file|mimetypes:application/pdf|max:2048',
                'izin_lingkungan' => 'required|file|mimetypes:application/pdf|max:2048',
                'tinggi_tower' => 'required|numeric',
                'luas_tanah' => 'required|numeric',
                'tgl_pengajuan' => 'required|date',
                'posisi' => 'required',
            ],
            [
                'nama_pemohon.required' => 'Nama pemohon tidak boleh kosong',
                'no_telp.required' => 'Nomor telephon tidak boleh kosong',
                'no_telp.numeric' => 'Field nomor telp hanya mendukung format angka',
                'email.required' => 'Email tidak boleh kosong',
                'posisi.required' => '* Posisi koordinat tidak boleh kosong',
                'surat_permohonan.required' => 'Surat permohonan tidak boleh kosong',
                'surat_permohonan.mimetypes' => 'Field surat permohonan hanya mendukung format .pdf',
                'surat_permohonan.max' => 'Ukuran maximal file 2MB',
                'fotocopy_ktp.required' => 'Foto copy ktp tidak boleh kosong',
                'fotocopy_ktp.mimetypes' => 'Field foto copy ktp hanya mendukung format .pdf',
                'fotocopy_ktp.max' => 'Ukuran maximal file 2MB',
                'surat_izinlokasi.required' => 'Izin lokasi pendirian tower tidak boleh kosong',
                'surat_izinlokasi.mimetypes' => 'Field izin lokasi pendirian tower ktp hanya mendukung format .pdf',
                'surat_izinlokasi.max' => 'Ukuran maximal file 2MB',
                'fotocopy_akta.required' => 'Foto copy akta pendirian usaha dari notaris tidak boleh kosong',
                'fotocopy_akta.mimetypes' => 'Field foto copy akta pendirian usaha dari notaris hanya mendukung format .pdf',
                'fotocopy_akta.max' => 'Ukuran maximal file 2MB',
                'gambar_menara.required' => 'Gambar bangunan menara tower tidak boleh kosong',
                'gambar_menara.mimetypes' => ' Hanya dapat mendukung format pdf',
                'gambar_menara.max' => 'Ukuran maximal file 2MB',
                'rencana_anggaran.required' => 'Rencana anggaran dan biaya tidak boleh kosong',
                'rencana_anggaran.mimetypes' => ' Hanya dapat mendukung format pdf',
                'rencana_anggaran.max' => 'Ukuran maximal file 2MB',
                'jaminan_asuransi.required' => 'Jaminan asuransi bagi masyarakat tidak boleh kosong',
                'jaminan_asuransi.mimetypes' => ' Hanya dapat mendukung format pdf',
                'jaminan_asuransi.max' => 'Ukuran maximal file 2MB',
                'izin_lingkungan.required' => 'Surat izin lingkungan tidak boleh kosong',
                'izin_lingkungan.mimetypes' => ' Hanya dapat mendukung format pdf',
                'izin_lingkungan.max' => 'Ukuran maximal file 2MB',
                'tinggi_tower.required' => 'Tinggi tower tidak boleh kosong',
                'tinggi_tower.numeric' => 'Field tinggi tower hanya mendukung format angka',
                'luas_tanah.required' => 'Luas tanah tidak boleh kosong',
                'luas_tanah.numeric' => 'Field luas tanah hanya mendukung format angka',
                'tgl_pengajuan.required' => 'Tanggal pengajuan tidak boleh kosong',
                'tgl_pengajuan.date' => 'Field tanggal berdiri hanya mendukung format tanggal',
            ]
        );
        // dd(Request()->tgl_pengajuan);

        $filesuratpermohonan = Request()->surat_permohonan;
        $filenamesuratpermohonan = $filesuratpermohonan->getClientOriginalName();
        $filesuratpermohonan->move(public_path('berkas'), $filenamesuratpermohonan);
        $filefotocopyktp = Request()->fotocopy_ktp;
        $filenamefotocopyktp = $filefotocopyktp->getClientOriginalName();
        $filefotocopyktp->move(public_path('berkas'), $filenamefotocopyktp);
        $fileizinlokasi = Request()->surat_izinlokasi;
        $filenameizinlokasi = $fileizinlokasi->getClientOriginalName();
        $fileizinlokasi->move(public_path('berkas'), $filenameizinlokasi);
        $filefotocopyakta = Request()->fotocopy_akta;
        $filenamefotocopyakta = $filefotocopyakta->getClientOriginalName();
        $filefotocopyakta->move(public_path('berkas'), $filenamefotocopyakta);
        $filegambarmenara = Request()->gambar_menara;
        $filenamegambarmenara = $filegambarmenara->getClientOriginalName();
        $filegambarmenara->move(public_path('berkas'), $filenamegambarmenara);
        $filerencanaanggaran = Request()->rencana_anggaran;
        $filenamerencanaanggaran = $filerencanaanggaran->getClientOriginalName();
        $filerencanaanggaran->move(public_path('berkas'), $filenamerencanaanggaran);
        $filejaminanasuransi = Request()->jaminan_asuransi;
        $filenamejaminanasuransi = $filejaminanasuransi->getClientOriginalName();
        $filejaminanasuransi->move(public_path('berkas'), $filenamejaminanasuransi);
        $filesuratizinlingkungan = Request()->izin_lingkungan;
        $filenamesuratizinlingkungan = $filesuratizinlingkungan->getClientOriginalName();
        $filesuratizinlingkungan->move(public_path('berkas'), $filenamesuratizinlingkungan);

        $rekombts = new Rekombts();
        $rekombts->nama_pemohon = $request->nama_pemohon;
        $rekombts->no_telp = $request->no_telp;
        $rekombts->email = $request->email;
        $rekombts->posisi = $request->posisi;
        $rekombts->surat_permohonan = $filenamesuratpermohonan;
        $rekombts->fotocopy_ktp = $filenamefotocopyktp;
        $rekombts->surat_izinlokasi = $filenameizinlokasi;
        $rekombts->fotocopy_akta = $filenamefotocopyakta;
        $rekombts->gambar_menara = $filenamegambarmenara;
        $rekombts->rencana_anggaran = $filenamerencanaanggaran;
        $rekombts->jaminan_asuransi = $filenamejaminanasuransi;
        $rekombts->izin_lingkungan = $filenamesuratizinlingkungan;
        $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
        $rekombts->tinggi_tower = $request->tinggi_tower;
        $rekombts->luas_tanah = $request->luas_tanah;
        $rekombts->keterangan = $request->keterangan;
        $rekombts->users_id = auth()->user()->id;
        $rekombts->status = 2;
        $rekombts->save();

        return redirect()->route('rekombts')->with('success', 'Data Berhasil di Tambah');
    }

    public function detail($id)
    {
        $rekombts = DB::table('rekombts')->where('id', $id)->first();

        if ($rekombts == null)
            abort(404);

        return view('rekombts.detail', compact('rekombts'));
    }

    //download
    public function downloadpermohonan(Request $request, $surat_permohonan)
    {
        return response()->download(public_path('berkas/' . $surat_permohonan));
    }
    public function downloadktp(Request $request, $fotocopy_ktp)
    {
        return response()->download(public_path('berkas/' . $fotocopy_ktp));
    }
    public function downloadizinlokasi(Request $request, $surat_izinlokasi)
    {
        return response()->download(public_path('berkas/' . $surat_izinlokasi));
    }
    public function downloadakta(Request $request, $fotocopy_akta)
    {
        return response()->download(public_path('berkas/' . $fotocopy_akta));
    }
    public function downloadgambar(Request $request, $gambar_menara)
    {
        return response()->download(public_path('berkas/' . $gambar_menara));
    }
    public function downloadanggaran(Request $request, $rencana_anggaran)
    {
        return response()->download(public_path('berkas/' . $rencana_anggaran));
    }
    public function downloadasuransi(Request $request, $jaminan_asuransi)
    {
        return response()->download(public_path('berkas/' . $jaminan_asuransi));
    }
    public function downloadizinlingkungan(Request $request, $izin_lingkungan)
    {
        return response()->download(public_path('berkas/' . $izin_lingkungan));
    }

    public function edit($id)
    {
        $rekombts = DB::table('rekombts')->where('id', $id)->first();

        if ($rekombts == null)
            abort(404);

        return view('rekombts.edit', compact('rekombts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_pemohon' => 'required',
                'no_telp' => 'required|numeric',
                'email' => 'required',
                'surat_permohonan' => 'file|mimetypes:application/pdf|max:2048',
                'fotocopy_ktp' => 'file|mimetypes:application/pdf|max:2048',
                'surat_izinlokasi' => 'file|mimetypes:application/pdf|max:2048',
                'fotocopy_akta' => 'file|mimetypes:application/pdf|max:2048',
                'gambar_menara' => 'file|mimetypes:application/pdf|max:2048',
                'rencana_anggaran' => 'file|mimetypes:application/pdf|max:2048',
                'jaminan_asuransi' => 'file|mimetypes:application/pdf|max:2048',
                'izin_lingkungan' => 'file|mimetypes:application/pdf|max:2048',
                'tinggi_tower' => 'required|numeric',
                'luas_tanah' => 'required|numeric',
                'tgl_pengajuan' => 'required|date',
                'posisi' => 'required',
            ],
            [
                'nama_pemohon.required' => 'Nama pemohon tidak boleh kosong',
                'no_telp.required' => 'Nomor telephon tidak boleh kosong',
                'no_telp.numeric' => 'Field nomor telp hanya mendukung format angka',
                'email.required' => 'Email tidak boleh kosong',
                'posisi.required' => '* Posisi koordinat tidak boleh kosong',
                'surat_permohonan.mimetypes' => 'Field surat permohonan hanya mendukung format .pdf',
                'surat_permohonan.max' => 'Ukuran maximal file 2MB',
                'fotocopy_ktp.mimetypes' => 'Field foto copy ktp hanya mendukung format .pdf',
                'fotocopy_ktp.max' => 'Ukuran maximal file 2MB',
                'surat_izinlokasi.mimetypes' => 'Field izin lokasi pendirian tower ktp hanya mendukung format .pdf',
                'surat_izinlokasi.max' => 'Ukuran maximal file 2MB',
                'fotocopy_akta.mimetypes' => 'Field foto copy akta pendirian usaha dari notaris hanya mendukung format .pdf',
                'fotocopy_akta.max' => 'Ukuran maximal file 2MB',
                'gambar_menara.mimetypes' => ' Hanya dapat mendukung format pdf',
                'gambar_menara.max' => 'Ukuran maximal file 2MB',
                'rencana_anggaran.mimetypes' => ' Hanya dapat mendukung format pdf',
                'rencana_anggaran.max' => 'Ukuran maximal file 2MB',
                'jaminan_asuransi.mimetypes' => ' Hanya dapat mendukung format pdf',
                'jaminan_asuransi.max' => 'Ukuran maximal file 2MB',
                'izin_lingkungan.mimetypes' => ' Hanya dapat mendukung format pdf',
                'izin_lingkungan.max' => 'Ukuran maximal file 2MB',
                'tinggi_tower.required' => 'Tinggi tower tidak boleh kosong',
                'tinggi_tower.numeric' => 'Field tinggi tower hanya mendukung format angka',
                'luas_tanah.required' => 'Luas tanah tidak boleh kosong',
                'luas_tanah.numeric' => 'Field luas tanah hanya mendukung format angka',
                'tgl_pengajuan.required' => 'Tanggal pengajuan tidak boleh kosong',
                'tgl_pengajuan.date' => 'Field tanggal berdiri hanya mendukung format tanggal',
            ]
        );

        if (Request()->surat_permohonan <> "") {
            //jika ingin ganti file
            $filesuratpermohonan = Request()->surat_permohonan;
            $filenamesuratpermohonan = $filesuratpermohonan->getClientOriginalName();
            $filesuratpermohonan->move(public_path('berkas'), $filenamesuratpermohonan);

            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->surat_permohonan = $filenamesuratpermohonan;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        } else {
            //jika tidak ganti file
            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        }

        if (Request()->fotocopy_ktp <> "") {
            //jika ingin ganti file
            $filefotocopyktp = Request()->fotocopy_ktp;
            $filenamefotocopyktp = $filefotocopyktp->getClientOriginalName();
            $filefotocopyktp->move(public_path('berkas'), $filenamefotocopyktp);

            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->fotocopy_ktp = $filenamefotocopyktp;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        } else {
            //jika tidak ganti file
            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        }

        if (Request()->surat_izinlokasi <> "") {
            //jika ingin ganti file
            $fileizinlokasi = Request()->surat_izinlokasi;
            $filenameizinlokasi = $fileizinlokasi->getClientOriginalName();
            $fileizinlokasi->move(public_path('berkas'), $filenameizinlokasi);

            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->surat_izinlokasi = $filenameizinlokasi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        } else {
            //jika tidak ganti file
            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        }

        if (Request()->fotocopy_akta <> "") {
            //jika ingin ganti file
            $filefotocopyakta = Request()->fotocopy_akta;
            $filenamefotocopyakta = $filefotocopyakta->getClientOriginalName();
            $filefotocopyakta->move(public_path('berkas'), $filenamefotocopyakta);

            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->fotocopy_akta = $filenamefotocopyakta;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        } else {
            //jika tidak ganti file
            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        }

        if (Request()->gambar_menara <> "") {
            //jika ingin ganti file
            $filegambarmenara = Request()->gambar_menara;
            $filenamegambarmenara = $filegambarmenara->getClientOriginalName();
            $filegambarmenara->move(public_path('berkas'), $filenamegambarmenara);

            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->gambar_menara = $filenamegambarmenara;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        } else {
            //jika tidak ganti file
            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        }

        if (Request()->rencana_anggaran <> "") {
            //jika ingin ganti file
            $filerencanaanggaran = Request()->rencana_anggaran;
            $filenamerencanaanggaran = $filerencanaanggaran->getClientOriginalName();
            $filerencanaanggaran->move(public_path('berkas'), $filenamerencanaanggaran);

            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->rencana_anggaran = $filenamerencanaanggaran;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        } else {
            //jika tidak ganti file
            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        }

        if (Request()->jaminan_asuransi <> "") {
            //jika ingin ganti file
            $filejaminanasuransi = Request()->jaminan_asuransi;
            $filenamejaminanasuransi = $filejaminanasuransi->getClientOriginalName();
            $filejaminanasuransi->move(public_path('berkas'), $filenamejaminanasuransi);

            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->jaminan_asuransi = $filenamejaminanasuransi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        } else {
            //jika tidak ganti file
            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        }

        if (Request()->izin_lingkungan <> "") {
            //jika ingin ganti file
            $filesuratizinlingkungan = Request()->izin_lingkungan;
            $filenamesuratizinlingkungan = $filesuratizinlingkungan->getClientOriginalName();
            $filesuratizinlingkungan->move(public_path('berkas'), $filenamesuratizinlingkungan);

            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->izin_lingkungan = $filenamesuratizinlingkungan;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        } else {
            //jika tidak ganti file
            $rekombts = Rekombts::find($id);
            $rekombts->nama_pemohon = $request->nama_pemohon;
            $rekombts->no_telp = $request->no_telp;
            $rekombts->email = $request->email;
            $rekombts->posisi = $request->posisi;
            $rekombts->tgl_pengajuan = $request->tgl_pengajuan;
            $rekombts->tinggi_tower = $request->tinggi_tower;
            $rekombts->luas_tanah = $request->luas_tanah;
            $rekombts->keterangan = $request->keterangan;
            $rekombts->save();
        }

        return redirect('rekombts')->with('success', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        DB::table('rekombts')->where('id', $id)->delete();

        return redirect('rekombts')->with('success', 'Data Berhasil di Hapus');
    }

    public function accept($id)
    {
        $data = [
            'status' => 1,
            'keterangan' => 'Rekomendasi BTS disetujui'
        ];

        Rekombts::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Rekomendasi BTS Berhasil di Sejutui');
    }

    public function reject($id)
    {
        $data = [
            'status' => 0,
            'keterangan' => 'Rekomendasi BTS ditolak'
        ];

        Rekombts::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Rekomendasi BTS Telah di Tolak');
    }

    public function wrong($id)
    {
        $data = [
            'status' => 3
        ];

        Rekombts::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Terdapat Kesalahan Data');
    }

    public function done($id)
    {
        $data = [
            'status' => 4,
        ];

        Rekombts::where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Data Sudah Diperbaiki');
    }
}
