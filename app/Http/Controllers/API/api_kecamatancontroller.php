<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\kecamatan;
use Illuminate\Http\Request;

class api_kecamatancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kecamatan::all();
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
        $data = new kecamatan();
        $data->id_kecamatan = $request->id_kecamatan;
        $data->kecamatan = $request->kecamatan;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->save();
        return response()->json($data, 201);
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
        $data = kecamatan::find($id);
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
        $data = kecamatan::find($id);
        $data->id_kecamatan = $request->id_kecamatan;
        $data->kecamatan = $request->kecamatan;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
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
        $dataWarga = kecamatan::find($id);
        $dataWarga->delete();
        return response()->json(
            ['messege' => 'data kecamatan Berhasil Dihapus'],
            204
        );
    }
}
