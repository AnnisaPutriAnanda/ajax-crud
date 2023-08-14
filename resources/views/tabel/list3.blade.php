<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tabel <button type="button" class="btn btn-success" id="modal-create3" data-bs-toggle="modal" data-bs-target="#modal-tambah-product">
                    Tambah Data
                  </button></div>

                <div class="card-body">
                    <table id="product" class="table table-striped table-bordered crud" cellspacing="0" width="100%">
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

@include('modal.edit-modal(product)')
@include('modal.modal-create(product)')

<script type="text/javascript">

    $(document).ready(function(data){

        // var data = $(data).val();
        $('#product').DataTable({
            processing : true,
            serverside : true,
            responsive : true,
            ajax : {  
                
              url :  "{{ url('data3') }}", 
    
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

       
        $('body').on('click', '.tombol_edit3', function(e){ 
                e.preventDefault();
  
                var id = $(this).data('id');

                // alert('id=' + id );
           
                $.get("{{ url('edit3') }}/" + id, 
                function(datas){
                    $("[name='id-product']").val(datas.id)
                    $("[name='nama-product']").val(datas.nama)
                    $('#modal-edit-product').modal('show');
                })
                
                
            })

                        //hapus button tes
                        $('body').on('click', '.tombol_hapus3', function(e){
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
                        url : "{{url('hapus3')}}/" + id,
                        type : 'delete',
                        success:function(){
                            // alert('berhasil');
                            $('#product').DataTable().ajax.reload();
                        }
                    });     

                } //confimr
                }) 
            })


    })

    </script>