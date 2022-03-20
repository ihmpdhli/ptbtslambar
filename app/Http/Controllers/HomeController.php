<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'towerbts' => DB::table('towerbts')->count(),
            'kecamatans' => DB::table('kecamatans')->count(),
            'providers' => DB::table('providers')->count(),
        ];
        return view('home', $data);
    }

    public function user()
    {
        return Auth::user();
    }
}
