<?php

namespace App\Http\Controllers;

use App\Models\warga;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class mojopanggung extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('warga')
            ->where('kelurahan', '=', 'mojopanggung')
            ->get();
        return view('admin.main.mojopanggung.view_mojopanggung', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.main.mojopanggung.add_mojopanggung');
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
            
        //     $request->validate(
        //         [
        //         'nik.*'         => 'required|numeric|min_digits:12|distinct',
        //         'nik.0'         => 'required|numeric|min_digits:12',
        //         'nama_warga.*'  => 'required',
        //         'alamat.*'      => 'required',
        //         'no_hp.*'       => 'required|numeric|min_digits:12',
        //         'foto_ktp.*'    => 'required',
        //         ],
        //         [
        //             'nik.*.required'            => "NIK tidak boleh kosong",
        //             'nik.*.min_digits'          => "NIK harus berjumlah 12 digit",
        //             'nama_warga.*.required'     => "Nama Warga Harus diisi",
        //             'alamat.*.required'         => "Alamat harus diisi",
        //             'no_hp.*.required'          => "Nomor HP harus diisi",
        //             'no_hp.*.min_digits'        => "Nomor harus berjumlah 12 digit",
        //             'foto_ktp.*.required'       => "Gambar Foto KTP harus dtambahkan",
        //         ]
        // );
            
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
            $data->kelurahan = "mojopanggung";
            $data->save();
        }


        return redirect()->route('mojopanggung.view')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkNik(Request $request)
    {
        $nik = DB::table('warga')->where('nik', $request->nik[])->first();
        dd($nik);
        if ($nik) {
            echo 'false';
        }
        else {
            echo 'true';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataWarga = warga::find($id);
        return view('admin.main.mojopanggung.edit_mojopanggung', compact('dataWarga'));
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
        $dataWarga = warga::find($id);
        if ($request->hasFile('foto_ktp')) {
            if (File::exists('fotoPetugas/' . $dataWarga->foto_ktp)) {
                File::delete('fotoPetugas/' . $dataWarga->foto_ktp);
            }
            $request->file('foto_ktp')->move('fotoPetugas/', $request->file('foto_ktp')->getClientOriginalName());
            $dataWarga->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
        }
        $dataWarga->nama_warga   = $request->nama_warga;
        $dataWarga->nik   = $request->nik;
        $dataWarga->no_hp   = $request->no_hp;
        $dataWarga->update();
        return redirect()->route('mojopanggung.view')->with('Success', 'Update Warga berhasil');
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
        return redirect()->route('mojopanggung.view');
    }
}
