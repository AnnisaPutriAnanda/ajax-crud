
  <!-- Modal -->
  <div class="modal fade" id="tambah-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="tambah-product">
            <label>Nama</label>
            <input type="text" name="nama-product" id="nama-product" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="save3" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

 {{-- @stack('script') --}}

 <script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 $(document).ready(function(data){

    $('#modal-create3').on('click', function(){
        $('#tambah-product').modal('show');


    });

    $('body').on('click', '#save3', function(){
        
      var x = $("form").serializeArray();
            $.each(x, function(i, field){
            $nama = (field.value + " ");
            
              });
     
        $.ajax({

          url : '/simpan3',
          type : 'post',
          data : {
            nama : $nama,
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