<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\warga;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiMojopanggungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = warga::where('id_kelurahan', Auth::user()->id)->get();
        return response()->json([
            'data' => $data,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new warga();
        $data->nik = $request->nik;
        $data->nama_warga = $request->nama_warga;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->foto_ktp = $request->foto_ktp;
        $data->id_kelurahan = Auth::user()->id;
        $data->save();
        return response()->json([$data, 201]);
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
        $data = warga::find($id);
        return response()->json($data);
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
        $data = warga::find($id);
        $data->nik = $request->nik;
        $data->nama_warga = $request->nama_warga;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->foto_ktp = $request->foto_ktp;
        $data->kelurahan = "mojopanggung";
        $data->update();
        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataWarga = warga::find($id);
        $dataWarga->delete();
        return response()->json(
            ['messege' => 'Warga Berhasil Dihapus'], 
            204);
    }
}
