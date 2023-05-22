<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\SessionMessages;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermessionController extends Controller
{
    Use SessionMessages;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('show permissions')){

            $data=Permission::all();
            return view('permissions.permissions',compact('data'));
        }
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('add permissions')){
            $user=User::findOrFail($request->id);
            $data=$user->givePermissionTo($request->name);
            $this->messages($data);
            return redirect()->back();
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (auth()->user()->hasPermissionTo('show permissions')){

            $user=User::findOrFail($id);
            $data=$user->getAllPermissions();
            $permissions=Permission::all();
            foreach ($permissions as $permission){
                if(!$user->hasPermissionTo($permission->name)){
                    $rmPermission[]=$permission->name;
                }
            }
            if(isset($rmPermission)){
                return view('users.users-permissions',compact('data','user','rmPermission'));
            }else{
                return view('users.users-permissions',compact('data','user'));
            }
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Request $request)
    {
        if (auth()->user()->hasPermissionTo('delete permissions')){

            $user=User::findOrFail($id);
                $status=$user->revokePermissionTo($request->name);
            $this->messages($status);
            return redirect()->back();
        }
        return abort(404);
    }
}
