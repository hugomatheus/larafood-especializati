<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    private $permission, $role;

    public function __construct(Permission $permission, Role $role)
    {
        $this->permission = $permission;
        $this->role = $role;
        $this->middleware(['can:admin']);
    }

    public function permissions($roleId)
    {
        $role = $this->role->find($roleId);

        if(!$role)
        {
            return redirect()->back();
        }

        $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permissions.permissions', compact('role', 'permissions'));
    }

    public function permissionsAvailable(Request $request, $roleId)
    {
        $filters = $request->except('_token');
        $role = $this->role->find($roleId);

        if(!$role)
        {
            return redirect()->back();
        }

        $permissions = $role->permissionsAvailable($request->filter);

        return view('admin.pages.roles.permissions.available', compact('role', 'permissions', 'filters'));
    }
    public function attachPermissionRole(Request $request, $roleId)
    {
        $role = $this->role->find($roleId);

        if(!$role)
        {
            return redirect()->back();
        }

        if(!isset($request->permissions) || count($request->permissions) == 0)
        {
            return redirect()->back()->with('error', 'Nenhuma permissão foi selecionada para ser vinculada');
        }


        $role->permissions()->attach($request->permissions);
        return redirect()->route('roles.permissions', $role->id);

    }
    public function detachPermissionRole($roleId, $permissionId)
    {

        $role = $this->role->find($roleId);
        $permission = $this->permission->find($permissionId);

        if(!$role || !$permission)
        {
            return redirect()->back();
        }

        $role->permissions()->detach($permission);
        return redirect()->route('roles.permissions', $role->id)->with('success', 'Módulo desvinculado com sucesso');

    }
}
