<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\warga;
use DB;
use Illuminate\Http\Request;

class UserMojopanggungController extends Controller
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
        return view('user.mojopanggung.main.view_mojopanggung', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.mojopanggung.main.add_mojopanggung');
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
            $data->kelurahan = "Mojopanggung";
            $data->save();
        }


        return redirect()->route('user_mojopanggung.view')->with('success', 'Data Berhasil Ditambah');
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
