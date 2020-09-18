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

    public function permissionsAvailable($moduleId)
    {
        $module = $this->module->find($moduleId);

        if(!$module)
        {
            return redirect()->back();
        }

        $permissions = $module->permissionsAvailable();
        return view('admin.pages.modules.permissions.available', compact('module', 'permissions'));
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
}
