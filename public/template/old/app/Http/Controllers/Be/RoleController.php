<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DB;
use Spatie\Activitylog\Models\Activity;

class RoleController extends Controller
{
    public function index()
    {
        return view('be.roles.index', ['roles' => Role::orderBy('id','DESC')->paginate(20)]);
    }

    public function create()
    {
        return view('be.roles.create', ['permissions' => Permission::get()]);
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        activity()->event('role-store')->withProperties(['name' => $request->name])->log('role added success');
        return redirect()->route('roles.index')->with('success','New role is added successfully.');
    }

    public function show(Role $role)
    {
        $rolePermissions = Permission::join("role_has_permissions","permission_id","=","id")->where("role_id",$role->id)->select('name')->get();
        // activity()->event('role-show')->withProperties(['name' => $role->name,'id' => $role->id])->log('role show success');
        return view('be.roles.show', ['role' => $role, 'rolePermissions' => $rolePermissions]);
    }

    public function edit(Role $role)
    {
        if($role->name=='Super Admin'){
            abort(403, 'SUPER ADMIN ROLE CAN NOT BE EDITED');
        }

        $rolePermissions = DB::table("role_has_permissions")->where("role_id",$role->id)->pluck('permission_id')->all();
        return view('be.roles.edit', ['role' => $role, 'permissions' => Permission::get(), 'rolePermissions' => $rolePermissions]);
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $input = $request->only('name');
        $name_old = $role->name;
        $role->update($input);
        $role->syncPermissions($request->permissions);
        activity()->event('role-update')->withProperties(['id' => $role->id,'name' => $role->name,'id_old' => $role->id,'name_old' => $name_old])->log('role updated success');
        return redirect()->route('roles.index')->with('success','Role is updated successfully.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        if($role->name=='Admin'){
            abort(403, 'SUPER ADMIN ROLE CAN NOT BE DELETED');
        }
        if(auth()->user()->hasRole($role->name)){
            abort(403, 'CAN NOT DELETE SELF ASSIGNED ROLE');
        }
        $role->delete();

        activity()->event('role-delete')->withProperties(['name' => $role->name,'id' => $role->id])->log('role deleted success');
        return redirect()->route('roles.index')->with('success','Role is deleted successfully.');
    }
}
