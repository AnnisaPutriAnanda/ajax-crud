<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tabel <button type="button" class="btn btn-success" id="modal-create" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                  </button></div>

                <div class="card-body">
                    <table id="crud" class="table table-striped table-bordered crud" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nama</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                </table>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

@include('modal.modal-create')
@include('modal.edit-modal')

<script type="text/javascript">

    $(document).ready(function(data){

        $('body').on('click', '.tombol_edit', function(e){ 
                e.preventDefault();
  
                var id = $(this).data('id');

                // alert('id=' + id );
           
                $.get("{{ url('edit') }}/" + id, 
                function(data){
                    $("[name='id']").val(data.id)
                    $("[name='nama']").val(data.nama)
                    // $('#id').val(data.id);
                    // $('#nama').val(data.nama);
                    $('#exampleModal2').modal('show');
                })
                
                
            })

                        //hapus button tes
                        $('body').on('click', '.tombol_hapus', function(e){
                var id = $(this).data('id');
                // alert('id' + id);

                    Swal.fire({

                        title: 'Are you sure to delete data id=' + id + '?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'

                }).then((result) => {
                if (result.isConfirmed) {

                        Swal.fire({
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                });
       
                    $.ajax({
                        url : "{{url('hapus')}}/" + id,
                        type : 'delete',
                        success:function(){
                            // alert('berhasil');
                            $('#crud').DataTable().ajax.reload();
                        }
                    });     

                } //confimr
                }) 
            })

        // var data = $(data).val();
        $('#crud').DataTable({
            processing : true,
            serverside : true,
            responsive : true,
            ajax : {  
                
              url :  "{{ url('data') }}", 
    
            },
                 columns :[ 
                 {
                     "data" : null, "sortable": false,
                     render : function(data, type, row, meta){
                         return meta.row + meta.settings._iDisplayStart + 1
                     }
                 },
                    
                    {data: 'nama', name: 'nama'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'aksi', name: 'aksi'},
                ],
                    
        });
    })

    </script>