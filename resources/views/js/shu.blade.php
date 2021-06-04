<script type="text/javascript">
$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

//Tabel Jenis Usaha
    var tableShu = $('.table-shu').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nilai', render: $.fn.dataTable.render.number(',','.',0,'Rp. '), name: 'nilai'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE SHU
    $('#createShu').click(function () {
        $('#saveShu').val("create-shu");
        $('#shu_id').val('');
        $('#shuFormCreate').trigger("reset");
        $('#modelHeading').html("Tambah Sisa Hasil Usaha");
        $('#modalCreateShu').modal('show');
        $('#modalCreateShu').appendTo('body');
    });

//EDIT Jenis
    $('body').on('click', '.editShu', function () {
        var jenis_id = $(this).data('id');
        $.get("{{ route('shu.index') }}" +'/' + jenis_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Jenis Usaha");
                $('#saveShu').val("edit-jenis");
                $('#modalCreateShu').modal('show');
                $('#modalCreateShu').appendTo('body');
                $('#shu_id').val(data.id);
                $('#nama').val(data.nama);
                $('#nilai').val(data.nilai);
                $('#tanggal').val(data.tanggal);
        })
    });

//SAVE & UPDATE Jenis
    $('#saveShu').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#shuFormCreate').serialize(),
            url: "{{ route('shu.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#shuFormCreate').trigger("reset");
                $('#modalCreateShu').modal('hide');
                $('#saveShu').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                tableShu.draw();
                Swal.fire("Sukes!", "Jenis Usaha Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveShu').html('Simpan');
            }
        });
    });

//DELETE Jenis
    $('body').on('click', '.deleteShu', function (){
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
                    url: "{{ route('shu.store') }}"+'/'+jenis_id,
                    success: function (data) {
                        tableShu.draw();
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