<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::paginate(7);
        return view("admin.roles.index", [
            "roles" => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $permissions = Permission::all();

        return view("admin.roles.create",[
            "permissions" => $permissions,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "name" => "required | unique:roles",
        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route("admin.roles.edit", $role)->with("info", "El rol se creo con exito");

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view("admin.roles.show", [
           "role" => $role, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

        $permissions = Permission::all();

        return view("admin.roles.edit", [
            "role" => $role,
            "permissions" => $permissions,
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            "name" => "required | unique:roles,name,$role->id",
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route("admin.roles.edit", $role)->with("info", "El rol se actualizo con exito");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route("admin.roles.index")->with("info", "El rol se elimino con exito");

    }
}
