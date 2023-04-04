<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware("can:admin.users.index")->only("index");
        $this->middleware("can:admin.users.edit")->only("edit, update");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.users.index");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view("admin.users.edit",[
            "user" => $user,
            "roles" => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route("admin.users.edit", $user)->with("info", "Se asigaron los roles correctamente");
    }

}
