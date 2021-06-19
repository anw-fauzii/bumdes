<script type="text/javascript">
$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

//Tabel User
    var tableUser = $('.table-user').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'status', name: 'status'},
            {data: 'last_seen', name: 'last_seen'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE Jenis
    $('#createUser').click(function () {
        $('#saveUser').val("create-jenis");
        $('#jenis_id').val('');
        $('#userFormCreate').trigger("reset");
        $('#modelHeading').html("Tambah Jenis Usaha");
        $('#modalCreateUser').modal('show');
        $('#modalCreateUser').appendTo('body');
    });

//EDIT Jenis
    $('body').on('click', '.editUser', function () {
        var jenis_id = $(this).data('id');
        $.get("{{ route('user.index') }}" +'/' + jenis_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Jenis Usaha");
                $('#saveUser').val("edit-jenis");
                $('#modalCreateUser').modal('show');
                $('#modalCreateUser').appendTo('body');
                $('#user_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
        })
    });

//SAVE & UPDATE Jenis
    $('#saveUser').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#userFormCreate').serialize(),
            url: "{{ route('user.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#userFormCreate').trigger("reset");
                $('#modalCreateUser').modal('hide');
                $('#saveUser').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                tableUser.draw();
                Swal.fire("Sukes!", "User Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveUser').html('Simpan');
            }
        });
    });

//DELETE Jenis
    $('body').on('click', '.deleteUser', function (){
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
                    url: "{{ route('user.store') }}"+'/'+jenis_id,
                    success: function (data) {
                        tableUser.draw();
                        Swal.fire("Sukes!", "User Berhasil Dihapus!", "success");
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