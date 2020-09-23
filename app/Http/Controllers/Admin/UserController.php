<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->TenantIdScope()->paginate();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->all();
        $data['tenant_id'] = auth()->user()->tenant_id;
        $data['password'] = bcrypt($data['password']);

        $this->user->create($data);
        return redirect()->route('users.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->TenantIdScope()->find($id);
        if(!$user)
        {
            return redirect()->back();
        }
        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->TenantIdScope()->find($id);
        if(!$user)
        {
            return redirect()->back();
        }
        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserRequest $request, $id)
    {
        $user = $this->user->TenantIdScope()->find($id);
        if(!$user)
        {
            return redirect()->back();
        }

        $data = $request->only(['name', 'email']);
        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->TenantIdScope()->find($id);
        if(!$user)
        {
            return redirect()->back();
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $users = $this->user->search($request->filter);
        //$users = $this->user->search2($request);
        return view('admin.pages.users.index', compact('users','filters'));
    }
}
