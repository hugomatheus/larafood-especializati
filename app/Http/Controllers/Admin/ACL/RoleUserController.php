<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    protected $user, $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
        $this->middleware(['can:admin']);
    }

    public function users($roleId)
    {
        $role = $this->role->find($roleId);
        if(!$role)
        {
            return redirect()->back();
        }

        $users = $role->users()->paginate();
        return view('admin.pages.roles.users.users', compact('role', 'users'));
    }

    public function roles($userId)
    {
        $user = $this->user->find($userId);

        if(!$user)
        {
            return redirect()->back();
        }

        $roles = $user->roles()->paginate();
        return view('admin.pages.users.roles.roles', compact('user', 'roles'));

    }

    public function rolesAvailable(Request $request, $userId)
    {
        $user = $this->user->find($userId);

        if(!$user)
        {
           return redirect()->back();
        }

        $filters = $request->except('_token');

        $roles = $user->rolesAvailable($request->filter);
        return view('admin.pages.users.roles.available', compact('user', 'roles', 'filters'));
    }

    public function attachRoleUser(Request $request, $userId)
    {
        $user = $this->user->find($userId);

        if(!$user)
        {
            return redirect()->back();
        }

        if(!$request->roles || count($request->roles) == 0)
        {
            return redirect()->route('users.roles.available', $userId)->with('error', 'Nenhum cargo foi selecionada para ser vinculada');
        }
        $user->roles()->attach($request->roles);
        return redirect()->route('users.roles', $userId)->with('success', 'Cargos vinculadas com sucesso');
    }


    public function detachRoleUser($userId, $roleId)
    {
        $user = $this->user->find($userId);
        $role = $this->role->find($roleId);

        if(!$user || !$role)
        {
            return redirect()->back();
        }


        $user->roles()->detach($role);
        return redirect()->route('users.roles', $userId)->with('success', 'Cargo desvinculada com sucesso');
    }
}
