var tableUser;
var tableGroupUser;
var method;
var url;
$(document).ready(function () {
    tableUser = $('#dataUser').dataTable({
        ajax: {
            url: 'user/userRead',
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
                addUser();
            }
        },
        {
            extend: 'excel',
            text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
            filename: 'User',
            title: 'Data User',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'print',
            text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
            filename: 'User',
            title: '<center>PT. TJFORGE INDONESIA <br> Data User<br><hr>',
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
                reloadUser();
            }
        },
        ],
    });

    tableGroupUser = $('#dataGroupUser').dataTable({
        ajax: {
            url: 'user/groupUserRead',
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
                addGroupUser();
            }
        },
        {
            extend: 'excel',
            text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
            filename: 'Group User',
            title: 'Data Group User',
            exportOptions: {
                columns: [0, 1, 2, 3]
            }
        },
        {
            extend: 'print',
            text: '<i class="fas fa-print" aria-hidden="true"></i> Print',
            filename: 'GroupUser',
            title: '<center>PT. TJFORGE INDONESIA <br> Data GroupUser<br><hr>',
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
                reloadGroupUser();
            }
        },
        ],
    });
});

function reloadUser() {
    tableUser.api().ajax.reload();

}
function reloadGroupUser() {
    tableGroupUser.api().ajax.reload();

}

function addUser() {
    method = 'save';
    $('#formUser')[0].reset();
    $('#modalUser').modal('show');
    $('.modal-title').text('Form Tambah Data');
    $('#submitUser').text('Simpan');
}
function addGroupUser() {
    method = 'save';
    $('#formGroupUser')[0].reset();
    $('#modalGroupUser').modal('show');
    $('.modal-title').text('Form Tambah Data');
    $('#submitGroupUser').text('Simpan');
}

function saveUser() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if (method == 'save') {
        url = 'user/userSave';
        $text = 'Data berhasil di Tambah';
    } else {
        url = 'user/userUpdate';
        $text = 'Data berhasil di Update';
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formUser')[0]),
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function (data) {
            $('#submitUser').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: function (data) {
            if (data.status) {
                Toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil di tambahkan'
                })
                reloadUser();
                $('.help-block').empty();
                $('#modalUser').modal('hide');
                $('#formUser')[0].reset();
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
function saveGroupUser() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if (method == 'save') {
        url = 'user/groupUserSave';
        $text = 'Data berhasil di Tambah';
    } else {
        url = 'user/groupUserUpdate';
        $text = 'Data berhasil di Update';
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: new FormData($('#formGroupUser')[0]),
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function (data) {
            $('#submitGroupUser').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        success: function (data) {
            if (data.status) {
                Toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil di tambahkan'
                })
                reloadGroupUser();
                $('.help-block').empty();
                $('#modalGroupUser').modal('hide');
                $('#formGroupUser')[0].reset();
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

function editUser(id) {
    method = 'update';
    $.ajax({
        url: 'user/userEdit/' + id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('[name="id"]').val(data.id);
            $('[name="email"]').val(data.email);
            $('[name="username"]').val(data.username);
            $('[name="password_hash"]').val(data.password_hash);

            $('#modalUser').modal('show');
            $('.modal-title').text('Form Edit Data');
            $('#submitUser').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}
function editGroupUser(groups_users_id) {
    method = 'update';
    $.ajax({
        url: 'user/groupUserEdit/' + groups_users_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('[name="groups_users_id"]').val(data.groups_users_id);
            $('[name="group_id"]').val(data.group_id);
            $('[name="user_id"]').val(data.user_id);

            $('#modalGroupUser').modal('show');
            $('.modal-title').text('Form Edit Data');
            $('#submitGroupUser').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteUser(user_id) {
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
                url: 'user/userDelete/' + user_id,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Berhasil di tambahkan'
                        })
                        reloadUser();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }

            })

        }
    })
}
function deleteGroupUser(groups_users_id) {
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
                url: 'user/groupUserDelete/' + groups_users_id,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Berhasil di tambahkan'
                        })
                        reloadUser();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }

            })

        }
    })
}
