<?php

namespace App\Http\Controllers;

use App\Models\warga;
use DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $mojopanngung = warga::select(DB::raw("COUNT(*) as jumlah"))
        ->where('kelurahan', '=', 'Giri')->count();
        dd($mojopanngung);
        return view('test', compact('$mojopanggung'));
    }
}
