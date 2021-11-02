<div class="page-title-box">
    <div class="row align-items-center">

        <div class="col-sm-6">
            <h4 class="page-title"><?= $page_title ?></h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <div id="clock"></div>
            </ol>
        </div>
    </div> <!-- end row -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <?= form_open('admin/konfigurasi/submit', ['class' => 'formtambah']) ?>
            <div class="card-body">
                <i class="mdi mdi-circle-edit-outline"></i> Konfigurasi Website
                <hr>
                <input type="hidden" class="form-control" id="konfigurasi_id" value="<?= $data->konfigurasi_id ?>" name="konfigurasi_id" readonly>
                <div class="form-group">
                    <label> <i class="mdi mdi-text-shadow"></i>
                        Judul Halaman Website
                    </label>
                    <input type="text" id="nama_web" value="<?= $data->nama_web ?>" name="nama_web" class="form-control">
                    <div class="invalid-feedback errornama">

                    </div>
                </div>

                <div class="form-group">
                    <label> <i class=" mdi mdi-playlist-star"></i>
                        Deskripsi
                    </label>
                    <textarea type="text" id="deskripsi" name="deskripsi" class="form-control"><?= $data->deskripsi ?></textarea>
                    <div class="invalid-feedback errordeskripsi">

                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-instagram"></i>
                            Instagram
                        </label>
                        <input type="text" id="instagram" name="instagram" value="<?= $data->instagram ?>" class="form-control">

                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-facebook"></i>
                            Facebook
                        </label>
                        <input type="text" id="facebook" name="facebook" value="<?= $data->facebook ?>" class="form-control">

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-whatsapp"></i>
                            Whatsapp
                        </label>
                        <input type="text" id="whatsapp" name="whatsapp" value="<?= $data->whatsapp ?>" class="form-control">

                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-email"></i>
                            Email
                        </label>
                        <input type="text" id="email" name="email" value="<?= $data->email ?>" class="form-control">

                    </div>
                </div>

                <div class="form-group">
                    <label> <i class="mdi mdi-office-building"></i>
                        Alamat
                    </label>
                    <input type="text" id="alamat" name="alamat" value="<?= $data->alamat ?>" class="form-control">

                </div>

                <button class="btn btn-primary btnsimpan"><i class="fa fa-paper-plane"></i> Update</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $('.formtambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: {
                konfigurasi_id: $('input#konfigurasi_id').val(),
                nama_web: $('input#nama_web').val(),
                deskripsi: $('textarea#deskripsi').val(),
                instagram: $('input#instagram').val(),
                facebook: $('input#facebook').val(),
                whatsapp: $('input#whatsapp').val(),
                email: $('input#email').val(),
                alamat: $('input#alamat').val(),

            },
            dataType: "JSON",
            beforeSend: function() {
                $('.btnsimpan').attr('disable', 'disable');
                $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
            },
            complete: function() {
                $('.btnsimpan').removeAttr('disable', 'disable');
                $('.btnsimpan').html('<i class="fa fa-paper-plane"></i> Update');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nama_web) {
                        $('#nama_web').addClass('is-invalid');
                        $('.errornama').html(response.error.nama_web);
                    } else {
                        $('#nama_web').removeClass('is-invalid');
                        $('.errornama').html('');
                    }

                    if (response.error.deskripsi) {
                        $('#deskripsi').addClass('is-invalid');
                        $('.errordeskripsi').html(response.error.deskripsi);
                    } else {
                        $('#deskripsi').removeClass('is-invalid');
                        $('.errordeskripsi').html('');
                    }
                } else {
                    Swal.fire({
                        title: "Berhasil!",
                        text: response.sukses,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    })
</script>