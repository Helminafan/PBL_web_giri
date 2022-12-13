<?php

namespace App\Http\Controllers;

use App\Models\warga;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenatabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = warga::all();
        return view('admin.main.kel_penataban.view_penataban', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.main.kel_penataban.add_penataban');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        foreach ($request->nama_warga as $key => $nama_warga) {
            $data = warga::find($id);
            $data->nama_warga = $nama_warga;
            $data->alamat = $request->alamat[$key];
            $data->no_hp = $request->no_hp[$key];
            if ($data->foto_ktp = $request->file('foto_ktp')[$key]) {
                $extension = $request->file('foto_ktp')[$key]->getClientOriginalExtension();
                $newbaru = $request->nama_warga[$key] . '-' . now()->timestamp . '.' . $extension;
                $request->file('foto_ktp')[$key]->move('fotoPetugas/', $newbaru);
            }
            $data['foto_ktp'] = $newbaru;
            $data->kelurahan = "Penataban";
            $data->save();
        }


        return redirect()->route('penataban.view')->with('success', 'Data Berhasil Ditambah');;
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
        return view('admin.main.kel_penataban.edit_penataban', compact('editData'));
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
        foreach ($request->nama_warga as $key => $nama_warga) {
            $data = warga::find($id);
            $data->nama_warga = $nama_warga;
            $data->alamat = $request->alamat[$key];
            $data->no_hp = $request->no_hp[$key];
            if ($data->foto_ktp = $request->file('foto_ktp')[$key]) {
                $extension = $request->file('foto_ktp')[$key]->getClientOriginalExtension();
                $newbaru = $request->nama_warga[$key] . '-' . now()->timestamp . '.' . $extension;
                $request->file('foto_ktp')[$key]->move('fotoPetugas/', $newbaru);
            }
            $data['foto_ktp'] = $newbaru;
            $data->kelurahan = "Penataban";
            $data->save();

            $notifikasi = array();

            return redirect()->route('penataban.view')->with('info', 'USER TELAH BERHASIL DIUBAH');
        }
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
        return redirect()->route('penataban.view')->with('info', 'DATA TELAH BERHASIL DIHAPUS');
    }
}
