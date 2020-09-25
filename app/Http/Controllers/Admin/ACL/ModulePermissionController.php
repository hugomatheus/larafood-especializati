<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class ModulePermissionController extends Controller
{
    protected $module, $permission;
    public function __construct(Module $module, Permission $permission)
    {
        $this->module = $module;
        $this->permission = $permission;
        $this->middleware(['can:admin']);
    }

    public function modules($permissionId)
    {
        $permission = $this->permission->find($permissionId);
        if(!$permission)
        {
            return redirect()->back();
        }

        $modules = $permission->modules()->paginate();
        return view('admin.pages.permissions.modules.modules', compact('permission', 'modules'));
    }

    public function permissions($moduleId)
    {
        $module = $this->module->find($moduleId);

        if(!$module)
        {
            return redirect()->back();
        }

        $permissions = $module->permissions()->paginate();
        return view('admin.pages.modules.permissions.permissions', compact('module', 'permissions'));

    }

    public function permissionsAvailable(Request $request, $moduleId)
    {
        $module = $this->module->find($moduleId);

        if(!$module)
        {
           return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $module->permissionsAvailable($request->filter);
        return view('admin.pages.modules.permissions.available', compact('module', 'permissions', 'filters'));
    }

    public function attachModulePermission(Request $request, $moduleId)
    {
        $module = $this->module->find($moduleId);

        if(!$module)
        {
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0)
        {
            return redirect()->route('modules.permissions.available', $moduleId)->with('error', 'Nenhuma permissão foi selecionada para ser vinculada');
        }
        $module->permissions()->attach($request->permissions);
        return redirect()->route('modules.permissions', $moduleId)->with('success', 'Permissões vinculadas com sucesso');
    }


    public function detachModulePermission($moduleId, $permissionId)
    {
        $module = $this->module->find($moduleId);
        $permission = $this->permission->find($permissionId);

        if(!$module || !$permission)
        {
            return redirect()->back();
        }


        $module->permissions()->detach($permission);
        return redirect()->route('modules.permissions', $moduleId)->with('success', 'Permissões desvinculada com sucesso');
    }
}
