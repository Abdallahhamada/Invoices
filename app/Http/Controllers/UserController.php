<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Traits\SessionMessages;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    use SessionMessages;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('show users')){

            $data=User::all();
            return view('users.users',compact('data'));
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
    public function store(UsersRequest $request)
    {
        if (auth()->user()->hasPermissionTo('add users')){
            $data=$request->validated();
            if($data){
                $path=$request->image->store('','users');
                $info=array_merge(['photo'=>'storage/users/'.$path],$data);
                $data=User::create($info);
            }
            $this->messages($data);
            return redirect()->back();
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()->hasPermissionTo('edit users')){
            $data=User::findOrFail($id);
            return view('users.edit-users',compact('data'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersEditRequest $request,$id)
    {
        if (auth()->user()->hasPermissionTo('edit users')){
            $data=$request->validated();
            $user='';
            if($data){
                if (isEmpty($data['password'])){
                    unset($data['password']);
                }
                unset($data['password_confirmation']);
                $user=User::findOrFail($id)->update($data);
            }
            $this->messages($user);
            return redirect()->back();
        }
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->hasPermissionTo('delete users')){
            $data=User::destroy($id);
            return redirect()->back();
        }
        return abort(404);
    }
}
