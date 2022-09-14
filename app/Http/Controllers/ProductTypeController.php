<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProductTypeModel;
use Illuminate\Support\Facades\Response;

class ProductTypeController extends Controller
{
    public function fetchtypes()
    {
        $types =  ProductTypeModel::all();
        return  Response::json($types);
        //$districts;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = ProductTypeModel::select('*');

            //dd($roles);

            return DataTables::of($products)
                ->addColumn('action', function ($row) {

                    $id = $row->id;
                    //   ';
                    return view('producttypes.actions', compact('id'))->render();
                })

                ->make(true);
        }

        return view('producttypes.index');
    }

    public function create()
    {

        return view('producttypes.create');
    }

    public function store(Request $request)
     {
         //dd($request->permission);
         $this->validate($request, [
             'name' => 'required|unique:products_types,name',
         ]);

         $role = ProductTypeModel::create(['name' => $request->input('name')]);
         return redirect()->route('products-types.index')
             ->with('success', "{$request->name} created successfully");
     }
}
