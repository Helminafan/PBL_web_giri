@extends('admin.master.master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Table Kelurahan Giri</h1>
        <p class="mb-4">Data warga miskin <a target="_blank" <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row d-flex justify-content-between">
                            <div class="col mt-2">
                                <h6 class="m-0 font-weight-bold text-primary">Data Warga Kel Giri</h6>
                            </div>
                            <div class="co">
                                <a href="{{ route('kelgiri.add') }}"><button class="btn btn-primary"> Tambah Data
                                    </button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Alamat</th>
                                        <th>Kelurahan</th>
                                        <th>No Hp</th>
                                        <th>Tanggal Ditambah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $item => $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->nama_warga }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->kelurahan }}</td>
                                            <td>{{ $row->no_hp }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>
                                                <a href="{{route('kelgiri.edit', $row->id)}}" class="btn btn-warning"> Edit </a>
                                                <a href="{{route('kelgiri.delete', $row->id)}}" id="delete"><button type="button"
                                                        class="btn btn-danger delete">Hapus</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

    </div>
@endsection
