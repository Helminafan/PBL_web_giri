$(".add-more").on("click", function () {
    var card =
        '<div class="card shadow mb-4">' +
        '<div class="card-body">' +
        '<div class="form-group row">' +
        '<div class="col-sm-6 mb-3 mb-sm-0">' +
        '<label for="nik">No KK</label>' +
        '<input type="text" minlength="16"  maxlength="16"  required class="form-control  form-control-lg"  id="nik" placeholder="No KK" name="nik[]">' +
        "</div>" +
        '<div class="col-sm-6 mb-3 mb-sm-0">' +
        '<label for="Name">Nama Lengkap</label>' +
        '<input type="text" required class="form-control form-control-lg" id="nama" placeholder="Nama Lengkap" name="nama_warga[]"><br>' +
        "</div>" +
        ' <div class="col-sm-6">' +
        '<label for="Alamat">Alamat</label>' +
        '<input type="text" required class="form-control form-control-lg" id="alamat"placeholder="Alamat" name="alamat[]"><br>' +
        "</div>" +
        '<div class="col-sm-6">' +
        '<label for="telepon">No Telepon</label>' +
        '<input type="number" pattern="(\62|62|0)8[1-9][0-9]{6,9}$" required class="form-control form-control-lg" id="telepon" placeholder="Nomor Telepon" name="no_hp[]">' +
        "</div>" +
        '<div class="col-sm-6">' +
        '<label for="fotoktp">Foto KTP</label>' +
        '<input required type="file" class="form-control-file"  id="fotoktp" name="foto_ktp[]">' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="card-footer">' +
        ' <button class="btn btn-danger delete" style="width: 100%"> Hapus Data </button>' +
        "</div>" +
        "</div>";
    $(".add-more-data").append(card);
});

$(".add-more-data").delegate(".delete", "click", function () {
    $(this).parent().parent().remove();
});
