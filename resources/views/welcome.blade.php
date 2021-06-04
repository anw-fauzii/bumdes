<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel Dependent Dropdown  Tutorial With Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
  </head>
  <body>
    <div class="container">
    <h2>Laravel Dependent Dropdown  Tutorial With Example</h2>
            <div class="form-group">
                <label for="namaKab">Select namaKab:</label>
                <select name="namaKab" class="form-control" style="width:250px">
                    <option value="">--- Select namaKab ---</option>
                    @foreach ($namaKab as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="namaKec">Select namaKec:</label>
                <select name="namaKec" class="form-control"style="width:250px">
                <option>--namaKec--</option>
                </select>
            </div>
      </div>
    <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="namaKab"]').on('change',function(){
               var namaKabID = jQuery(this).val();
               if(namaKabID)
               {
                  jQuery.ajax({
                     url : '/kec/' +namaKabID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="namaKec"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="namaKec"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="namaKec"]').empty();
               }
            });
    });
    </script>
  </body>
</html>