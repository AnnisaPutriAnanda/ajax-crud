<!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post">
            <label>ID</label>
            <input type="text" name="id" id="id" value="" class="form-control" disabled="disabled">
            <label>Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="save-changes" class="btn btn-primary">Save changes</button>
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
    
         $('#save-changes').on('click', function(e) {
          e.preventDefault();

          let id =  $("[name='id']").val();

          // var nama =  $("[name='nama']").serialize();

            var x = $("form").serializeArray();
            $.each(x, function(i, field){
            $nama = (field.value + " ");
            
              });
                   
              alert( $nama );
            
          // alert(field.name + ":" + field.value + " ");

            $.ajax({
    
              url : '{{url("update")}}/' + id,
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
                  $('#crud').DataTable().ajax.reload();
                }
            });   
            
            

            
         });
          
    
        });
      
    
      </script>