<?php

namespace App\Http\Controllers;
use App\Models\produk;
use Illuminate\Http\Request;
// use Yajra\DataTables\Facades\DataTables;
use DataTables;

class ProdukController extends Controller
{
    public function redirect()
    {
      return view('tabel.list2');
    }

    public function yajra(Request $request)
    {
        if ($request->ajax()){
        $data2 = produk::get();
        return DataTables::of($data2)
        ->addColumn('aksi', function($data2){
            $button = "<a href='#' data-id='".$data2->id."' class='btn btn-warning tombol_edit2'>Edit</a>";
            $button .= "<a href='#' data-id='".$data2->id."' class='btn btn-danger tombol_hapus2'>Hapus</a>";
            return $button;
        })
        ->rawColumns(['aksi'])
        ->make();
         }
        
    }

    
    public function create()
    {

    }

    public function store(Request $request)
    {


            $data2 = ([
                'nama'=>$request->nama,
             ]);
            produk::create($data2);
            // return response()->json();
        
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {   

        $data2 = produk::find($id);
        return response()->json($data2);

    }


    public function update(Request $request, string $id)
    {
        
        $data2 = ([
            'nama'=>$request->input('nama'),
         ]);

        produk::where('id', $id)->update($data2);
        // return response()->json();

    }

    public function destroy(string $id)
    {
        produk::where('id', $id)->delete();
        // return response()->json();
    }
}
