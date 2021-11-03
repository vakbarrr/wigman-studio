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


<div class="m-2">
    <button class="btn btn-sm btn-primary" onclick="new_category()"><i class="fa fa-plus"></i> New Category</button>
    <button class="btn btn-sm btn-secondary" onclick="reload()"><i class="fa fa-refresh"></i> Reload</button>
</div>


<div class="viewdata">
    <table id="category-list" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>ID Category</th>
                <th>Category name</th>
                <th>Last updated</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        </tbody>
    </table>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Add category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="category_id" />
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Category Name</label>
                            <input name="category_name" placeholder="Category Name" class="form-control" type="text">
                            <span class="invalid-feedback"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script>
    let save_label;
    let table;

    $(document).ready(function() {
        //DataTable
        table = $('#category-list').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('admin/category/list') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [-1],
                "orderable": false,
            }],
        });

        $('#modal_form').on('hidden.bs.modal', function(e) {
            let inputs = $('#form input, #form textarea, #form select');
            inputs.removeClass('is-valid is-invalid');
        });
    });

    function swalert(method) {
        Swal({
            title: 'Success',
            text: 'Data has been ' + method,
            type: 'success'
        });
    };

    function reload() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function new_category() {
        save_label = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('New Category'); // Set Title to Bootstrap modal title
    }

    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        let url, method;

        if (save_label == 'add') {
            url = "<?= base_url('admin/category/add') ?>";
            method = 'saved';
        } else {
            url = "<?= base_url('admin/category/update') ?>";
            method = 'updated'
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "json",
            success: function(data) {
                //console.log(data);
                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload();
                    swalert(method);
                } else {
                    $.each(data.errors, function(key, value) {
                        $('[name="' + key + '"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + key + '"]').next().text(value); //select span help-block class set text error string
                        if (value == "") {
                            $('[name="' + key + '"]').removeClass('is-invalid');
                            $('[name="' + key + '"]').addClass('is-valid');
                        }
                    });
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 
            }
        });

        $('#form input, #form textarea').on('keyup', function() {
            $(this).removeClass('is-valid is-invalid');
        });
        $('#form select').on('change', function() {
            $(this).removeClass('is-valid is-invalid');
        });
    }


    function edit_category(category_id) {
        save_label = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?= base_url('admin/category/edit/') ?>/" + category_id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="category_id"]').val(data.category_id);
                $('[name="category_name"]').val(data.category_name);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit category'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function delete_category(category_id) {
        Swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                // ajax delete data to database
                $.ajax({
                    url: "<?= base_url('admin/category/delete') ?>/" + category_id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        reload();
                        swalert('deleted');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            }
        });
    }
</script>