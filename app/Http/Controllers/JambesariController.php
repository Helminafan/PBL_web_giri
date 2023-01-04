<?php

namespace App\Http\Controllers;

use App\Models\warga;
use File;
use Illuminate\Http\Request;

class JambesariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = warga::with('user')
            ->where('id_kelurahan', '=', 7)
            ->get();
        return view('admin.main.jambesari.view_jambesari', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.main.jambesari.add_jambesari');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->nama_warga as $key => $nama_warga) {

            $data = new warga();
            $data->nama_warga = $nama_warga;
            $data->nik = $request->nik[$key];
            $data->alamat = $request->alamat[$key];
            $data->no_hp = $request->no_hp[$key];
            if ($data->foto_ktp = $request->file('foto_ktp')[$key]) {
                $extension = $request->file('foto_ktp')[$key]->getClientOriginalExtension();
                $newbaru = $request->nama_warga[$key] . '-' . now()->timestamp . '.' . $extension;
                $request->file('foto_ktp')[$key]->move('fotoPetugas/', $newbaru);
            }
            $data['foto_ktp'] = $newbaru;
            $data->id_kelurahan = 7;
            $data->save();
        }


        return redirect()->route('jambesari.view')->with('success', 'Data Berhasil Ditambah');
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
        // dd('Berhasil');
        $editData = warga::find($id);
        return view('admin.main.jambesari.edit_jambesari', compact('editData'));
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
        if ($request->hasFile('foto_ktp')) {
            if (File::exists('fotoPetugas/' . $data->foto_ktp)) {
                File::delete('fotoPetugas/' . $data->foto_ktp);
            }
            $request->file('foto_ktp')->move('fotoPetugas/', $request->file('foto_ktp')->getClientOriginalName());
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
        }
        $data->nama_warga   = $request->nama_warga;
        $data->nik   = $request->nik;
        $data->no_hp   = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->update();
        return redirect()->route('jambesari.view')->with('Success', 'Update Warga berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = warga::find($id);
        $deleteData->delete();
        return redirect()->route('jambesari.view')->with('info', 'DATA TELAH BERHASIL DIHAPUS');
    }
}
