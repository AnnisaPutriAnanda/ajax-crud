<!-- Modal -->
<div class="modal fade" id="edit-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form-edit(produk)" method="post">
            <label>ID</label>
            <input type="text" name="id-produk" id="id-produk" value="" class="form-control" disabled="disabled">
            <label>Nama</label>
            <input type="text" name="nama-produk" id="nama-produk" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="save-changes2" class="btn btn-primary">Save changes</button>
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
    
     $(document).ready(function(data){
    
         $('#save-changes2').on('click', function(e) {
          e.preventDefault();

          let id =  $("[name='id-produk']").val();

            var x = $("form").serializeArray();
            $.each(x, function(i, field){
            $nama = (field.value + " ");
            
              });
                   
              alert( $nama );

            $.ajax({
    
              url : '{{url("update2")}}/' + id,
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
                  $('#produk').DataTable().ajax.reload();
                }
            });   
            
         });
          
    
        });
      
    
      </script>