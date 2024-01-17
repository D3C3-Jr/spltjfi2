var tableDepartement;
var method;
var url;
$(document).ready(function () {
    tableDepartement = $('#dataDepartement').dataTable({
        ajax: {
            url: 'departement/departementRead',
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
                addDepartement();
            }
        },
        {
            extend: 'excel',
            text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
            filename: 'Departement',
            title: 'Data Departement',
            exportOptions: {
                columns: [0, 1, 2,]
            }
        },
        {
            extend: 'print',
            text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
            filename: 'Departement',
            title: '<center>PT. TJFORGE INDONESIA <br> Data Departement<br><hr>',
            exportOptions: {
                columns: [0, 1, 2,]
            }
        },
        {
            extend: 'pageLength',
            text: 'Page',
        },
        {
            text: '<i class="fas fa-sync"></i>',
            action: function (e, dt, button, config) {
                reloadDepartement();
            }
        },
        ],
    });
});

function reloadDepartement() {
    tableDepartement.api().ajax.reload();

}

function addDepartement() {
    method = 'save';
    $('#modalDepartement').modal('show');
    $('.modal-title').text('Form Tambah Data');
    $('#submit').text('Simpan');
}

function saveDepartement() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if (method == 'save') {
        url = 'departement/departementSave';
        $text = 'Data berhasil di Tambah';
    } else {
        url = 'departement/departementUpdate';
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
                reloadDepartement();
                $('.help-block').empty();
                $('#modalDepartement').modal('hide');
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

function editDepartement(departement_id) {
    method = 'update';
    $.ajax({
        url: 'departement/departementEdit/' + departement_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('[name="departement_id"]').val(data.departement_id);
            $('[name="departement_code"]').val(data.departement_code);
            $('[name="departement_name"]').val(data.departement_name);

            $('#modalDepartement').modal('show');
            $('.modal-title').text('Form Edit Data');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteDepartement(departement_id) {
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
                url: 'departement/departementDelete/' + departement_id,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Berhasil di tambahkan'
                        })
                        reloadDepartement();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }

                })

}
        })
    }
