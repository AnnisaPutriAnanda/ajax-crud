<?php

namespace App\Http\Controllers;
use App\Models\crud;
use Illuminate\Http\Request;
// use Yajra\DataTables\Facades\DataTables;
use DataTables;

class CrudController extends Controller
{
    public function redirect()
    {
      return view('tabel.list');
    }

    public function index(){

       return view('index');
    }

    public function yajra(Request $request)
    {
        if ($request->ajax()){
        $data = crud::get();
        return DataTables::of($data)
        ->addColumn('aksi', function($data){
            $button = "<a href='#' data-id='".$data->id."' class='btn btn-warning tombol_edit'>Edit</a>";
            $button .= "<a href='#' data-id='".$data->id."' class='btn btn-danger tombol_hapus'>Hapus</a>";
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


            $data = ([
                'nama'=>$request->nama,
             ]);
            crud::create($data);
            // return response()->json();
        
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {   

        $data = crud::find($id);
        return response()->json($data);

    }


    public function update(Request $request, string $id)
    {
        
        $data = ([
            'nama'=>$request->input('nama'),
         ]);

        crud::where('id', $id)->update($data);
        // return response()->json();

    }

    public function destroy(string $id)
    {
        crud::where('id', $id)->delete();
        // return response()->json();
    }
}
