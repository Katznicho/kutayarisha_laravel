<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProductTakenModel;
use App\Models\ProductTypeModel;
use App\Models\ProductModel;
use Carbon\carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class ProductTakenController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = ProductTakenModel::select('*');

            //dd($roles);

            return DataTables::of($orders)
                ->addColumn('action', function ($row) {

                    $id = $row->id;
                    //   ';
                    return view('orders.actions', compact('id'))->render();
                })

                ->make(true);
        }

        return view('orders.index');
    }

    public function create()
    {

        return view('orders.create');
    }

    public function store(Request $request)
    {
        //dd($request->permission);
        $this->validate($request, [
            'name' => 'required',
            'qty'=>'required|numeric',
            'type'=>'required',
            'price'=>'required'
        ]);
        ProductTakenModel::create(
            [
                'name' => ProductModel::where('id', '=', $request->name)->first()->name,
                'qty'=>$request->qty,
                'price'=>$request->price,
                'type'=>ProductTypeModel::where('id', '=', $request->type)->first()->name,
                'date'=>Carbon::now(),
                'person'=>Auth::user()->name
            ]
        );
        //update the product
        ProductModel::where('id', '=', $request->name)->decrement('total_stock', $request->qty);
        return redirect()->route('orders.index')
            ->with('success', "Order Added successfully");
    }
}
