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
        $module = $this->module->with(['permissions'])->find($moduleId);

        if(!$module)
        {
            return redirect()->back();
        }

        $permissions = $module->permissions;
        return view('admin.pages.modules.permissions.permissions', compact('module', 'permissions'));

    }
}
