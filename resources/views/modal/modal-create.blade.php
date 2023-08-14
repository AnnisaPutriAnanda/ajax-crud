
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <label>Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="save" class="btn btn-primary">Save</button>
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

    $('#modal-create').on('click', function(){
        $('#exampleModal').modal('show');

    });

     $('#save').on('click', function(e) {
        e.preventDefault();
  
        $.ajax({

          url : '/simpan',
          type : 'post',
          data : {
            nama : $('#nama').val(),
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