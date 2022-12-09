@extends('admin.master.master')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col">
        <h1 class="h3 mb-2 text-gray-800">Table Kelurahan Giri</h1>
        <p class="mb-4">Data warga miskin <a target="_blank">
    </div>
    {{-- <div class="co">
        <a href=""><button class="btn btn-primary">Tambah Data Warga</button></a>
    </div> --}}
</div>

<!-- DataTales Example -->

    {{-- <div class="d-flex justify-content-end">
        <a href=""><button class="btn btn-primary">Tambah Data Warga</button></a>
    </div> --}}


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="col"><h6 class="m-0 font-weight-bold text-primary"> </h6></div>
            <div class="co">
                <a href="{{route('giri.add')}}"><button class="btn btn-primary">Tambah Data Warga</button></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>No Ktp</th>
                        <th>No Hp</th>
                        <th>Tanggal lahir</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Anis Sulala</td>
                        <td>Giri</td>
                        <td>36517268361921</td>
                        <td>089771235566</td>
                        <td>2011/04/25</td>
                        <td>warga</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection