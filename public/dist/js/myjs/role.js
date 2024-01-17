var tableRole;
var method;
var url;
$(document).ready(function () {
    tableRole = $('#dataRole').dataTable({
        ajax: {
            url: 'role/roleRead',
            type: 'GET'
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        buttons: [{
            text: 'Tambah Data',
            action: function (e, dt, button, config) {
                addRole();
            }
        },
        {
            extend: 'excel',
            text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
            filename: 'Role',
            title: 'Data Role',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'print',
            text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
            filename: 'Role',
            title: '<center>PT. TJFORGE INDONESIA <br> Data Role<br><hr>',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'pageLength',
            text: 'Page',
        },
        {
            text: '<i class="fas fa-sync"></i>',
            action: function (e, dt, button, config) {
                reloadRole();
            }
        },
        ],
    });
});

function reloadRole() {
    tableRole.api().ajax.reload();

}

function addRole() {
    method = 'save';
    $('#form')[0].reset();
    $('#modalRole').modal('show');
    $('.modal-title').text('Form Tambah Data');
    $('#submit').text('Simpan');
}

function saveRole() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if (method == 'save') {
        url = 'role/roleSave';
        $text = 'Data berhasil di Tambah';
    } else {
        url = 'role/roleUpdate';
        $text = 'Data berhasil di Update';
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#form')[0]),
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function (data) {
            $('#submit').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: function (data) {
            if (data.status) {
                Toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil di tambahkan'
                })
                reloadRole();
                $('.help-block').empty();
                $('#modalRole').modal('hide');
                $('#form')[0].reset();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function editRole(id) {
    method = 'update';
    $.ajax({
        url: 'role/roleEdit/' + id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('[name="id"]').val(data.id);
            $('[name="name"]').val(data.name);
            $('[name="description"]').val(data.description);

            $('#modalRole').modal('show');
            $('.modal-title').text('Form Edit Data');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteRole(role_id) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    Swal.fire({
        title: 'Hapus Data?',
        text: "Anda yakin ingin menghapus Data ini",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'role/roleDelete/' + role_id,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Berhasil di tambahkan'
                        })
                        reloadRole();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }

            })

        }
    })
}
