
/* $(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

  var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      autoWidth: false,
      retrieve: true,
      ajax: "",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'nama_mapel', name: 'nama_mapel'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });

  $('#createNewProduct').click(function () {
      $('#saveBtn').val("create-product");
      $('#product_id').val('');
      $('#productForm').trigger("reset");
      $('#modelHeading').html("Create New Product");
      $('#ajaxModel').modal('show');
      $('#ajaxModel').appendTo('body');
  });

  $('body').on('click', '.editCustomer', function () {
    var Customer_id = $(this).data('id');
    $.get("" +'/' + Customer_id +'/edit', function (data) {
        $('#modelHeading').html("Edit Customer");
        $('#saveBtn').val("edit-user");
        $('#ajaxModel').modal('show');
        $('#Customer_id').val(data.id);
        $('#name').val(data.name);
        $('#detail').val(data.detail);
    })
 });

 $('#saveBtn').click(function (e) {
      e.preventDefault();
      $(this).html('Sending..');
  
      $.ajax({
        data: $('#productForm').serialize(),
        url: "{{ route('mapel.store') }}",
        type: "POST",
        dataType: 'json',
        success: function (data) {
            $('#productForm').trigger("reset");
            $('#ajaxModel').modal('hide');
            table.draw();
            Swal.fire("Sukes!", "Mata Pelajaran Berhasil Disimpan!", "success");
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
  });

  $('body').on('click', '.deleteCustomer', function () {

    var Customer_id = $(this).data("id");
    confirm("Are You sure want to delete !");

    $.ajax({
            type: "DELETE",
            url: "{{ route('mapel.destroy') }}"+'/'+Customer_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
});

});
*/