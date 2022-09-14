<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function fetchproducts()
    {
        $products =  ProductModel::all();
        return  Response::json($products);

    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = ProductModel::select('*');

            //dd($roles);

            return DataTables::of($products)
                ->addColumn('action', function ($row) {

                    $id = $row->id;
                    //   ';
                    return view('products.actions', compact('id'))->render();
                })

                ->make(true);
        }

        return view('products.index');
    }

    public function create()
    {

        return view('products.create');
    }

    public function store(Request $request)
    {
        //dd($request->permission);
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'stock'=>'required|numeric',
            'type'=>'required',
            'price'=>'required'
        ]);


        ProductModel::create(
            [
                'name' => $request->name,
                'total_stock'=>$request->stock,
                'price'=>$request->price,
                'type'=>ProductTypeModel::where('id', '=', $request->type)->first()->name
            ]
        );
        return redirect()->route('products.index')
            ->with('success', "{$request->name} created successfully");
    }

    public function edit($id)
    {
        $product = ProductModel::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id){


        $this->validate($request, [
            'name' => 'required',
            'stock'=>'required|numeric',
            'type'=>'required',
            'price'=>'required'
        ]);


        ProductModel::where('id', '=', $id)->update(
            [
                'name' => $request->name,
                'total_stock'=>$request->stock,
                'price'=>$request->price,
                'type'=>ProductTypeModel::where('id', '=', $request->type)->first()->name
            ]
        );
        return redirect()->route('products.index')
            ->with('success', "{$request->name}  updated successfully");


    }

}
