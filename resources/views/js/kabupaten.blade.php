<script type="text/javascript">
function myMap() {
        var marker;
        function taruhMarker(peta, posisiTitik){
            if( marker ){
                // pindahkan marker
                marker.setPosition(posisiTitik);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta,
                    draggable: true,
                    animation: google.maps.Animation.BOUNCE
                });
            }
                // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("long").value = posisiTitik.lng();   
        }
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-7.21626538,107.9011917),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });

        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }

$(document).ready(function(){
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
//Tabel Kabupaten
    var tableKabupaten = $('.table-kabupaten').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'jumlah', name: 'jumlah'},
            {data: 'lat', name: 'lat'},
            {data: 'long', name: 'long'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createKab').click(function () {
        $('#saveUser').val("create-kabupaten");
        $('#kabupaten_id').val('');
        $('#kabFormCreate').trigger("reset");
        $('#modelHeading').html("Tambah Kabupaten");
        $('#modalCreateKab').modal('show');
        $('#modalCreateKab').appendTo('body');
    });


//SAVE & UPDATE User
$('#saveUser').click(function (e) {
        e.preventDefault();
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#kabFormCreate').serialize(),
            url: "{{ route('kabupaten.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#kabFormCreate').trigger("reset");
                $('#modalCreateKab').modal('hide');
                $('#saveUser').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                tableKabupaten.draw();
                Swal.fire("Sukes!", "Kabupaten Berhasil Disimpan!", "success");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveUser').html('Simpan');
            }
        });
    });

//EDIT Jenis
    $('body').on('click', '.editKabupaten', function () {
        var kabupaten_id = $(this).data('id');
        $.get("{{ route('kabupaten.index') }}" +'/' + kabupaten_id +'/edit', function (data) {
            $('#modelHeading').html("Edit User");
                $('#saveUser').val("edit-jenis");
                $('#modalCreateKab').modal('show');
                $('#modalCreateKab').appendTo('body');
                $('#kabupaten_id').val(data.id);
                $('#nama').val(data.nama);
                $('#lat').val(data.lat);
                $('#long').val(data.long);
        })
    });

//DELETE Kabupaten
    $('body').on('click', '.deleteKabupaten', function (){
        var kabupaten_id = $(this).data("id");
        var result = Swal.fire({
            title: 'Peringatan!', 
            text: 'Apakah anda yakin?', 
            icon: 'warning',
            showCancelButton: true,
        }).then((result) =>{
                if (result.isConfirmed){
                    $.ajax({
                    type: "DELETE",
                    url: "{{ route('kabupaten.store') }}"+'/'+kabupaten_id,
                    success: function (data) {
                        tableKabupaten.draw();
                        Swal.fire("Sukes!", "Kabupaten Berhasil Dihapus!", "success");
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