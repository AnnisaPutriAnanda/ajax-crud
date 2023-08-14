<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
// use Yajra\DataTables\Facades\DataTables;
use DataTables;

class ProductController extends Controller
{
    public function redirect()
    {
      return view('tabel.list3');
    }

    public function yajra(Request $request)
    {
        if ($request->ajax()){
        $data3 = product::get();
        return DataTables::of($data3)
        ->addColumn('aksi', function($data3){
            $button = "<a href='#' data-id='".$data3->id."' class='btn btn-warning tombol_edit3'>Edit</a>";
            $button .= "<a href='#' data-id='".$data3->id."' class='btn btn-danger tombol_hapus3'>Hapus</a>";
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


            $data3 = ([
                'nama'=>$request->nama,
             ]);
            product::create($data3);
            // return response()->json();
        
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {   

        $data3 = product::find($id);
        return response()->json($data3);

    }


    public function update(Request $request, string $id)
    {
        
        $data3 = ([
            'nama'=>$request->input('nama'),
         ]);

        product::where('id', $id)->update($data3);
        // return response()->json();

    }

    public function destroy(string $id)
    {
        product::where('id', $id)->delete();
        // return response()->json();
    }
}
