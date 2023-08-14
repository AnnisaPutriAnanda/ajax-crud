<!-- Modal -->
<div class="modal fade" id="modal-edit-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form-edit(produk)" method="post">
            <label>ID</label>
            <input type="text" name="id-product" id="id-product" value="" class="form-control" disabled="disabled">
            <label>Nama</label>
            <input type="text" name="nama-product" id="nama-product" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="save-changes3" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
     $(document).ready(function(datas){
    
         $('#save-changes3').on('click', function(e) {
          e.preventDefault();

          let id =  $("[name='id-product']").val();

            // var x = $("form").serializeArray();
            // $.each(x, function(i, field){
            // $nama = (field.value + " ");
            
            //   });

            $nama = $("[name='nama-product']").val();
                   
              alert( $nama );

            $.ajax({
    
              url : '{{url("update3")}}/' + id,
              type : 'put',
              data : {
                'nama' : $nama,
              },
              success:function(response){
    
                Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
                })
                  $("#close").click();
                  $('#product').DataTable().ajax.reload();
                }
            });   
            
         });
          
    
        });
      
    
      </script>