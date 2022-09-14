<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\AccessTrait;
use Illuminate\Support\Facades\Response;

class RoleController extends Controller
{
    use AccessTrait;
    public function fetchroles()
    {
        $roles =  RoleModel::all();
        return  Response::json($roles);
        //$districts;
    }
     public function index(Request $request)
     {



         if ($request->ajax()) {
             $roles = RoleModel::select('*');

             //dd($roles);

             return DataTables::of($roles)
                 ->addColumn('action', function ($row) {

                     $id = $row->id;
                     //   ';
                     return view('roles.actions', compact('id'))->render();
                 })

                 ->make(true);
         }

         return view('roles.index');
     }

     public function create()
     {

         return view('roles.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         //dd($request->permission);
         $this->validate($request, [
             'role' => 'required|unique:roles,name',
         ]);

         $role = RoleModel::create(['name' => $request->input('role')]);
         return redirect()->route('roles.index')
             ->with('success', 'Role created successfully');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $role = RoleModel::find($id);
        //  $staff_permissions  = $rolesModel->where('id', '=', $role_id)->get(['actions'])[0];
         $staff_permissions = $role->permissions!=null?json_decode($role->permissions):array();


         $staff_per = $this->getAccessControl();
         return view('roles.show', compact('role', 'staff_per', 'staff_permissions'));
     }
     public function edit(Request $request ,$id)
     {
        $permissions = json_encode($request->persmissions_menu);
         $role = RoleModel::find($id);
         //update role
            $role->name = $request->role;
            $role->permissions = $permissions;

         return view('roles.edit', compact('role', 'permission', 'rolePermissions', 'allpermissions', 'routes'));
     }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'permission' => 'required',
        // ]);

    //     dd("am here");
       // $permissions = json_encode($request->persmissions_menu);


        // $role = RoleModel::find($id);
        // $role->persmissions = $permissions;
        // $role->save();

        // return redirect()->route('roles.index')
        //     ->with('success', 'Role updated successfully');
    //}

    public function update_permissions(Request $request, $id){
      $this->validate($request, ['persmissions_menu' => 'required']);
      $permissions = json_encode($request->persmissions_menu);
      $role = RoleModel::where('id', '=',$id)->update(['permissions'=>$permissions]);;

      return redirect()->route('roles.index')
      ->with('success', 'Permissions Update Successfully');

    }
}
