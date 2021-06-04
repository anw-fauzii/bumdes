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

$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
    
//Tabel Kecamatan
    var tableKecamatan = $('.table-kecamatan').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'jumlah', render: function(data, row, row){return data +' Bumdes';}, name: 'jumlah'},
            {data: 'lat', name: 'lat'},
            {data: 'long', name: 'long'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//DELETE Kecamatan
    $('body').on('click', '.deleteKecamatan', function (){
        var kecamatan_id = $(this).data("id");
        var result = Swal.fire({
            title: 'Peringatan!', 
            text: 'Apakah anda yakin?', 
            icon: 'warning',
            showCancelButton: true,
        }).then((result) =>{
                if (result.isConfirmed){
                    $.ajax({
                    type: "DELETE",
                    url: "{{ route('kecamatan.store') }}"+'/'+kecamatan_id,
                    success: function (data) {
                        tableKecamatan.draw();
                        Swal.fire("Sukes!", "Kecamatan Berhasil Dihapus!", "success");
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