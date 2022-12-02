@extends('admin.master.master')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Table Kecamatan Penataban</h1>
<p class="mb-4">Data warga miskin <a target="_blank"

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Warga Kec.Penataban</h6>
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