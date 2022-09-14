<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentModel;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller
{


    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $comments = CommentModel::select('*');

        //     //dd($roles);

        //     return DataTables::of($comments)
        //     ->addColumn('approve', function ($row) {

        //         $approve = $row->approved;
        //         $id =  $row->id;

        //         return view('comments.approve', compact('id', 'approve'))->render();
        //     })


        //         ->addColumn('action', function ($row) {

        //             $id = $row->id;
        //             $approve = $row->approved;
        //             return view('comments.actions', compact('id', 'approve'))->render();
        //         })

        //         ->make(true);
        // }

        return view('comments.index');
    }

    // public function store(Request $request)
    // {
    //     //dd($request->permission);
    //     $this->validate($request, [
    //         'name' => 'required|unique:products,name',
    //         'stock'=>'required|numeric',
    //         'type'=>'required',
    //         'price'=>'required'
    //     ]);


    //     ProductModel::create(
    //         [
    //             'name' => $request->name,
    //             'total_stock'=>$request->stock,
    //             'price'=>$request->price,
    //             'type'=>ProductTypeModel::where('id', '=', $request->type)->first()->name
    //         ]
    //     );
        // return redirect()->route('products.index')
        //     ->with('success', "{$request->name} created successfully");
    //}

    public function approve(Request $request, $id){
        $comment = CommentModel::find($id);
        //dd($comment);
        $bool =  !$comment->approved;
        $comment->update(['approved'=>$bool]);
        return redirect()->route('comments.index')
        ->with('success', "comment has been updated successfully");
    }

    public function show($id)
    {
        $comment = CommentModel::find($id);
        return view('comments.show', compact('comment'));
    }

    public function edit($id){
        $comment = CommentModel::find($id);
        return view('comments.edit', compact('comment'));

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'comment' => 'required']);

            $comment = CommentModel::find($id);
            $comment->update(['comment'=>$request->comment]);
            return redirect()->route('comments.index')
            ->with('success', "comment has been editted successfully");
    }

}



