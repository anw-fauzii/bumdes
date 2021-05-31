<script type="text/javascript">
$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

//Tabel Jenis Usaha
    var tableJenisUsaha = $('.table-jenis').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE Jenis
    $('#createJenis').click(function () {
        $('#saveJenisUsaha').val("create-jenis");
        $('#jenis_id').val('');
        $('#jenisUsahaFormCreate').trigger("reset");
        $('#modelHeading').html("Tambah Jenis Usaha");
        $('#modalCreateJenisUsaha').modal('show');
        $('#modalCreateJenisUsaha').appendTo('body');
    });

//EDIT Jenis
    $('body').on('click', '.editJenisUsaha', function () {
        var jenis_id = $(this).data('id');
        $.get("{{ route('jenisUsaha.index') }}" +'/' + jenis_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Jenis Usaha");
                $('#saveJenisUsaha').val("edit-jenis");
                $('#modalCreateJenisUsaha').modal('show');
                $('#modalCreateJenisUsaha').appendTo('body');
                $('#jenis_id').val(data.id);
                $('#nama').val(data.nama);
        })
    });

//SAVE & UPDATE Jenis
    $('#saveJenisUsaha').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#jenisUsahaFormCreate').serialize(),
            url: "{{ route('jenisUsaha.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#jenisUsahaFormCreate').trigger("reset");
                $('#modalCreateJenisUsaha').modal('hide');
                $('#saveJenisUsaha').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                tableJenisUsaha.draw();
                Swal.fire("Sukes!", "Jenis Usaha Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveJenisUsaha').html('Simpan');
            }
        });
    });

//DELETE Jenis
    $('body').on('click', '.deleteJenisUsaha', function (){
        var jenis_id = $(this).data("id");
        var result = Swal.fire({
            title: 'Peringatan!', 
            text: 'Apakah anda yakin?', 
            icon: 'warning',
            showCancelButton: true,
        }).then((result) =>{
                if (result.isConfirmed){
                    $.ajax({
                    type: "DELETE",
                    url: "{{ route('jenisUsaha.store') }}"+'/'+jenis_id,
                    success: function (data) {
                        tableJenisUsaha.draw();
                        Swal.fire("Sukes!", "Jenis Usaha Berhasil Dihapus!", "success");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });

});
</script>