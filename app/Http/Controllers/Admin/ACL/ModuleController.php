<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModuleRequest;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
        $this->middleware(['can:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = $this->module->paginate();
        return view('admin.pages.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateModuleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateModuleRequest $request)
    {
        $this->module->create($request->all());
        return redirect()->route('modules.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = $this->module->find($id);
        if(!$module)
        {
            return redirect()->back();
        }
        return view('admin.pages.modules.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = $this->module->find($id);
        if(!$module)
        {
            return redirect()->back();
        }
        return view('admin.pages.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateModuleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateModuleRequest $request, $id)
    {
        $module = $this->module->find($id);
        if(!$module)
        {
            return redirect()->back();
        }

        $module->update($request->all());
        return redirect()->route('modules.index')->with('success', 'Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = $this->module->find($id);
        if(!$module)
        {
            return redirect()->back();
        }

        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $modules = $this->module->search($request->filter);

        // Alternativa

        // $modules = $this->module->where(function($query) use ($request){
        //                                 if($request->filter) {
        //                                     $query->where('name','LIKE', "%$request->filter%");
        //                                     $query->orWhere('description','LIKE', "%$request->filter%");
        //                                 }
        //                               })
        //                         ->paginate();

        return view('admin.pages.modules.index', compact('modules','filters'));
    }
}
