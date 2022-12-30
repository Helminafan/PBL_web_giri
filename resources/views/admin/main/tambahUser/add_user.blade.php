@extends('admin.master.master')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Kelurahan Atau desa Kecamatan Giri</h1>
    <div class="row d-flex justify-content-between">
        <div class="col">
            <p class="mb-4">Kelurahan Dan Desa <a target="_blank" <!-- DataTales Example -->
        </div>
    </div>
    <form id="validate" class="user" method="POST" autocomplete="off" action="{{ route('user.store') }}" >
        @csrf
        <div class="add-more-data">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="kelurahan">Nama Keluarahan Atau Desa</label>
                            <input type="text" required class="form-control kelurahan form-control-lg" id="kelurahan" placeholder="Nama"  name="name">
                            <br>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="email">Email</label>
                            <input type="text" required class="form-control form-control-lg" id="email" placeholder="email" name="email">
                            <br>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="password">password</label>
                            <input type="password" required class="form-control form-control-lg" id="password" placeholder="password" name="password">
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-icon-split" type="submit">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
        </button>
    </form>

</div>
@endsection

@push('js')
    <script type="text/javascript">
        $('#validate').validate({
            rules: {
                'email': {
                    required: true,
                    email: true,  
                },
                'name': {
                    required: true,
                },
                'password': {
                    required: true,
                    minlength: 8,
                },
            },
            messages: {
                'email': {
                    required: "No KK tidak boleh kosong",
                    email: "data harus berupa email",
                },
                'name': {
                    required: "nama tidak boleh kosong",
                },
                'password': {
                    required: "password tidak boleh kosong",
                    minlength: "inputan harus berjumlah 8",
                },
            },
        });
    </script>

@endpush