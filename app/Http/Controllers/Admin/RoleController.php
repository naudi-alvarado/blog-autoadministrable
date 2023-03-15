<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));

    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
       $role= Role::create($request->all());

       $role->permissions()->sync($request->permission);

       return redirect()->route('admin.roles.edit', $role)->with('info','El rol se creo con exíto');;
    }

    public function show(Role $role)
    {
       return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        
        return view('admin.roles.edit',compact('permissions','role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $role->update($request->all());
        
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->with('info','El rol se actualizó con exíto');;
    }
   
    public function destroy(Role $role)
    {
       $role->delete();
       return redirect()->route('admin.roles.index', $role)->with('info','El rol se elimino con exíto');;

    }
}
