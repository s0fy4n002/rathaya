<?php

namespace App\Http\Controllers\Be;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    public function index()
    {
        return view('be.permissions.index', ['permissions' => Permission::orderBy('name','asc')->paginate(50)]);
    }

    public function create()
    {
        return view('be.permissions.create');
    }

    public function store(Request $request)
    {
        $permission = Permission::create(['name' => $request->name]);
        activity()->event('permission-store')->withProperties(['name' => $request->name])->log('permission added success');
        return redirect()->route('permissions.index')->with('success','New permission is added successfully.');
    }

    public function show(string $id)
    {
        dd('permission.show');
    }

    public function edit(Permission $permission)
    {
        return view('be.permissions.edit', ['permission' => $permission]);
    }

    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $name_old = $permission->name;
        $input = $request->only('name');
        $permission->update($input);
        activity()->event('permission-update')->withProperties(['id' => $permission->id,'name' => $permission->name,'id_old' => $permission->id,'name_old' => $name_old])->log('permission updated success');
        return redirect()->route('permissions.index')->with('success','Permission is updated successfully.');
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();
        activity()->event('permission-delete')->withProperties(['name' => $permission->name,'id' => $permission->id])->log('permission deleted success');
        return redirect()->route('permissions.index')->with('success','Permission is deleted successfully.');
    }
}
