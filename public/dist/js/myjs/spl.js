var tableSpl;
var method;
var url;
$(document).ready(function () {
    $('.select2').select2();
    tableSpl = $('#dataSpl').dataTable({
        ajax: {
            url: 'spl/splRead',
            type: 'GET'
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        dom: 'Bfrtip',

        buttons: [{
            text: 'Tambah Data',
            action: function (e, dt, button, config) {
                addSpl();
            }
        },
        {
            extend: 'excel',
            text: '<i class="far fa-file-excel" aria-hidden="true"></i> Excel',
            filename: 'Spl',
            title: 'Data Spl',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
            }
        },
        {
            extend: 'print',
            title: '<br><center><p style="font-size:25px">SURAT PERINTAH LEMBUR [SPL] / OVERTIME SHEET</p></center>',
            customize: function (win) {

                var last = null;
                var current = null;
                var bod = [];

                var css = '@page { size: landscape; }',
                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                    style = win.document.createElement('style');

                style.type = 'text/css';
                style.media = 'print';

                if (style.styleSheet) {
                    style.styleSheet.cssText = css;
                }
                else {
                    style.appendChild(win.document.createTextNode(css));
                }

                head.appendChild(style);

                $(win.document.body)
                    .css('font-size', '10pt')
                    .append(
                        '<img src="ttd.png" style="position:absolute; bottom:0; right:0;width:450px" />'
                        // `<br><br><table border="1" width="50%" style="float:right;z-index:999;margin-top:200px">
                        // <tr>
                        //     <td>Dibuat: </td>
                        //     <td>Di Periksa: </td>
                        //     <td>Di Setujui: </td>
                        // </tr>
                        // <tr height="100px">
                        //     <td> </td>
                        //     <td> </td>
                        //     <td> </td>
                        // </tr>
                        // <tr height="20px">
                        //     <td> </td>
                        //     <td> </td>
                        //     <td> </td>
                        // </tr>
                        // </table>`
                    )
                    .prepend(
                        '<img src="logo-tjforge.png" style="position:absolute; top:0; left:0;width:200px" />'
                    );

                $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherite');
            },
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            }
        },
        {
            extend: 'pageLength',
            text: 'Page',
        },
        {
            text: '<i class="fas fa-sync"></i>',
            action: function (e, dt, button, config) {
                reloadSpl();
            }
        },
        ],
    });
});

function reloadSpl() {
    tableSpl.api().ajax.reload();

}

function addSpl() {
    method = 'save';
    $('#form')[0].reset();
    $('#modalSpl').modal('show');
    $('.modal-title').text('Form Tambah Data');
    $('#submit').text('Simpan');
}

function saveSpl() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if (method == 'save') {
        url = 'spl/splSave';
        $text = 'Data berhasil di Tambah';
    } else {
        url = 'spl/splUpdate';
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
                reloadSpl();
                $('.help-block').empty();
                $('#modalSpl').modal('hide');
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

function editSpl(spl_id) {
    method = 'update';
    $.ajax({
        url: 'spl/splEdit/' + spl_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('[name="spl_id"]').val(data.spl_id);
            $('[name="date"]').val(data.date);
            $('[name="plant"]').val(data.plant);
            $('[name="shift"]').val(data.shift);
            $('[name="karyawan_id"]').val(data.karyawan_id).select2();
            $('[name="from"]').val(data.from);
            $('[name="to"]').val(data.to);
            $('[name="description"]').val(data.description);
            $('[name="approve_foreman"]').val(data.approve_foreman);
            $('[name="approve_manager"]').val(data.approve_manager);

            $('#modalSpl').modal('show');
            $('.modal-title').text('Form Edit Data');
            $('#submit').text('Update');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
}

function deleteSpl(spl_id) {
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
                url: 'spl/splDelete/' + spl_id,
                type: "DELETE",
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Berhasil di tambahkan'
                        })
                        reloadSpl();
                    };
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }

            })

        }
    })
}
