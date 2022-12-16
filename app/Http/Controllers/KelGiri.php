<?php

namespace App\Http\Controllers;

use App\Models\warga;
use DB;
use File;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelGiri extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('warga')
            ->where('kelurahan', '=', 'Giri')
            ->get();
        return view('admin.main.kel_giri.view_kelgiri', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.main.kel_giri.add_kelgiri');
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
            $data->kelurahan = "Giri";
            $data->save();
        }


        return redirect()->route('kelgiri.view')->with('success', 'Data Berhasil Ditambah');
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
        return view('admin.main.kel_giri.edit_kelgiri', compact('editData'));
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
        return redirect()->route('kelgiri.view')->with('Success', 'Update Warga berhasil');
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
        return redirect()->route('kelgiri.view')->with('info', 'DATA TELAH BERHASIL DIHAPUS');
    }
}
