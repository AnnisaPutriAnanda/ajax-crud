<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <title>Dokumen</title>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <button id="btnbtn1">Table person</button><button id="btnbtn2">Table Produk</button><button id="btnbtn3">Table Product</button>
  
    <div id="page"></div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

     {{-- @push('script') --}}
         
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(data){

            
        $('body').on('click', '#btnbtn1', function(e){
        e.preventDefault();
        $.get("{{url('test')}}",{}, function(data){
        $("#page").html(data);
        
    })
  })

              
              $('body').on('click', '#btnbtn2', function(e){
        e.preventDefault();
        $.get("{{url('test2')}}",{}, function(data){
        $("#page").html(data);
        
    })
  })


  $('body').on('click', '#btnbtn3', function(e){
        e.preventDefault();
        $.get("{{url('test3')}}",{}, function(data){
        $("#page").html(data);
        
    })
  })

//   $('body').on('click', '.tombol_edit', function(e){ 
//                 e.preventDefault();
  
//                 var id = $(this).data('id');

//                 // alert('id=' + id );
           
//                 $.get("{{ url('edit') }}/" + id, 
//                 function(data){
//                     $("[name='id']").val(data.id)
//                     $("[name='nama']").val(data.nama)
//                     // $('#id').val(data.id);
//                     // $('#nama').val(data.nama);
//                     $('#exampleModal2').modal('show');
//                 })
                
                
//             })

//                         //hapus button tes
//                         $('body').on('click', '.tombol_hapus', function(e){
//                 var id = $(this).data('id');
//                 // alert('id' + id);

//                     Swal.fire({

//                         title: 'Are you sure to delete data id=' + id + '?',
//                         text: "You won't be able to revert this!",
//                         icon: 'warning',
//                         showCancelButton: true,
//                         confirmButtonColor: '#3085d6',
//                         cancelButtonColor: '#d33',
//                         confirmButtonText: 'Yes, delete it!'

//                 }).then((result) => {
//                 if (result.isConfirmed) {

//                         Swal.fire({
//                         icon: 'success',
//                         title: 'Your work has been saved',
//                         showConfirmButton: false,
//                         timer: 1500
//                 });
       
//                     $.ajax({
//                         url : "{{url('hapus')}}/" + id,
//                         type : 'delete',
//                         success:function(){
//                             // alert('berhasil');
//                             $('#crud').DataTables().ajax.reload();
//                         }
//                     });     

//                 } //confimr
//                 }) 
//             })


//                         //tombol hapus 2
//                     $('body').on('click', '.tombol_hapus2', function(e){
//                 var id = $(this).data('id');
//                 // alert('id' + id);

//                     Swal.fire({

//                         title: 'Are you sure to delete data id=' + id + '?',
//                         text: "You won't be able to revert this!",
//                         icon: 'warning',
//                         showCancelButton: true,
//                         confirmButtonColor: '#3085d6',
//                         cancelButtonColor: '#d33',
//                         confirmButtonText: 'Yes, delete it!'

//                 }).then((result) => {
//                 if (result.isConfirmed) {

//                         Swal.fire({
//                         icon: 'success',
//                         title: 'Your work has been saved',
//                         showConfirmButton: false,
//                         timer: 1500
//                 });
       
//                     $.ajax({
//                         url : "{{url('hapus2')}}/" + id,
//                         type : 'delete',
//                         success:function(){
//                             // alert('berhasil');
//                             $('#produk').DataTables().ajax.reload();
//                         }
//                     });     

//                 } 
//                 })
//             })

//         $('body').on('click', '.tombol_edit2', function(e){ 
//                 e.preventDefault();
  
//                 var id = $(this).data('id');

//                 // alert('id=' + id );
           
//                 $.get("{{ url('edit2') }}/" + id, 
//                 function(data){
//                     $("[name='id-produk']").val(data.id)
//                     $("[name='nama-produk']").val(data.nama)
//                     // $('#id').val(data.id);
//                     // $('#nama').val(data.nama);
//                     $('#edit-produk').modal('show');
//                 })
                

                
//             })
            

})
</script>

</body>
</html>