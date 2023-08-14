
  <!-- Modal -->
  <div class="modal fade" id="tambah-produk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <label>Nama</label>
            <input type="text" name="nama-produk" id="nama-produk" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="save2" class="btn btn-primary">Save</button>
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

    $('#modal-create2').on('click', function(){
        $('#tambah-produk').modal('show');

    });

     $('#save2').on('click', function(e) {
        e.preventDefault();
  
        $.ajax({

          url : '/simpan2',
          type : 'post',
          data : {
            nama : $('#nama-produk').val(),
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