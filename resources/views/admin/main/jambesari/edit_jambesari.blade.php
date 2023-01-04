@extends('admin.master.master')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Update Data Warga Miskin Kelurahan Jambesari</h1>
        <div class="row d-flex justify-content-between">
            <div class="col">
                <p class="mb-4">Data warga miskin<a target="_blank" <!-- DataTales Example -->
            </div>
            
        </div>
        <form class="user" method="POST" action="{{route('jambesari.update', $editData->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="add-more-data">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="nik">No KK</label>
                                <input type="text" required class="form-control nik form-control-lg" id="nik"
                                    placeholder="No KK" minlength="16" maxlength="16" name="nik" value="{{$editData->nik}}">
                                <br>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="Name">Nama Lengkap</label>
                                <input type="text" required class="form-control form-control-lg" id="nama"
                                    placeholder="Nama Lengkap" name="nama_warga" value="{{$editData->nama_warga}}">
                                <br>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="Alamat">Alamat</label>
                                <input type="text" required class="form-control form-control-lg"
                                    id="alamat"placeholder="Alamat" name="alamat" value="{{$editData->alamat}}">
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <label for="telepon">No Telepon</label>
                                <input type="number" required class="form-control form-control-lg" id="telepon"
                                    placeholder="Nomor Telepon" pattern="(\+62|62|0)8[1-9][0-9]{6,9}$" name="no_hp" value="{{$editData->no_hp}}">
                            </div>
                            <div class="col-sm-6">
                                <label for="fotoktp">Foto KTP</label>
                                <input type="file" class="form-control-file" required name="foto_ktp" id="fotoktp" value="{{$editData->foto_ktp}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-icon-split" type="submit">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Edit Data</span>
            </button>
        </form>

    </div>
@endsection

{{-- @push('js')
    <script src="{{ asset('admin/tambahdata/scriptTambah.js') }}"></script>
@endpush --}}
