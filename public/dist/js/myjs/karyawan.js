var tableKaryawan;
var method;
var url;
$(document).ready(function () {
    tableKaryawan = $('#dataKaryawan').dataTable({
        ajax: {
            url: 'karyawan/karyawanRead',
            type: 'GET'
        },
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        rowReorder: true,
        columnDefs: [
            { orderable: false, targets: '_all' }
        ],
        buttons: [{
            text: 'Tambah Data',
            action: function (e, dt, button, config) {
                addKaryawan();
            }
        },
        {
            extend: 'excel',
            text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
            filename: 'Karyawan',
            title: 'Data Karyawan',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'print',
            text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
            filename: 'Karyawan',
            title: '<center>PT. TJFORGE INDONESIA <br> Data Karyawan<br><hr>',
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
                reloadKaryawan();
            }
        },
        ],
    });
});

function reloadKaryawan() {
    tableKaryawan.api().ajax.reload();

}

function addKaryawan() {
    method = 'save';
    $('#form')[0].reset();
    $('#modalKaryawan').modal('show');
    $('.modal-title').text('Form Tambah Data');
    $('#submit').text('Simpan');
}

function saveKaryawan() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if (method == 'save') {
        url = 'karyawan/karyawanSave';
        $text = 'Data berhasil di Tambah';
    } else {
        url = 'karyawan/karyawanUpdate';
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
                reloadKaryawan();
                $('.help-block').empty();
                $('#modalKaryawan').modal('hide');
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

function editKaryawan(karyawan_id) {
    method = 'update';
    $.ajax({
        url: 'karyawan/karyawanEdit/' + karyawan_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('[name="karyawan_id"]').val(data.karyawan_id);
            $('[name="karyawan_code"]').val(data.karyawan_code);
            $('[name="karyawan_name"]').val(data.karyawan_name);
            $('[name="departement_id"]').val(data.departement_id);
            $('[name="plant"]').val(data.plant);

            $('#modalKaryawan').modal('show');
            $('.modal-title').text('Form Edit Data');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteKaryawan(karyawan_id) {
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
                url: 'karyawan/karyawanDelete/' + karyawan_id,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Berhasil di tambahkan'
                        })
                        reloadKaryawan();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }

            })

        }
    })
}
