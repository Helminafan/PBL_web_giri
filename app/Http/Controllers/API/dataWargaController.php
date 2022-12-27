<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\warga;
use DB;
use Illuminate\Http\Request;

class DataWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mojopanggung = warga::select(DB::raw("COUNT(*) as jumlah"))
        ->where('id_kelurahan', '=', 2)->count();

        $Giri = warga::select(DB::raw("COUNT(*) as jumlah"))
        ->where('id_kelurahan', '=', 3)->count();

        $Boyolangu = warga::select(DB::raw("COUNT(*) as jumlah"))
        ->where('id_kelurahan', '=', 4)->count();

        $Grogol = warga::select(DB::raw("COUNT(*) as jumlah"))
        ->where('id_kelurahan', '=', 5)->count();

        $penataban = warga::select(DB::raw("COUNT(*) as jumlah"))
        ->where('id_kelurahan', '=', 6)->count();

        $Jembersari = warga::select(DB::raw("COUNT(*) as jumlah"))
        ->where('id_kelurahan', '=', 7)->count();
        
        $warga = warga::all()->count();

        return response()->json([
            'mojopanggung' => $mojopanggung,
            'giri' => $Giri,
            'Boyolangu' => $Boyolangu,
            'Grogol' => $Grogol,
            'Penataban' => $penataban,
            'Jembersari' => $Jembersari,
            'jumlahWarga'=> $warga
        ],
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
