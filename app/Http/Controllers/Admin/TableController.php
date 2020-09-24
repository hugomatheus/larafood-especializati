<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    protected $table;
    public function __construct(Table $table)
    {
        $this->table = $table;
        $this->middleware(['can:index_tables']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = $this->table->paginate();
        return view('admin.pages.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTableRequest $request)
    {
        $this->table->create($request->all());
        return redirect()->route('tables.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = $this->table->find($id);

        if(!$table)
        {
            return redirect()->back();
        }

        return view('admin.pages.tables.show', compact('table'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = $this->table->find($id);

        if(!$table)
        {
            return redirect()->back();
        }

        return view('admin.pages.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTableRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTableRequest $request, $id)
    {
        $table = $this->table->find($id);

        if(!$table)
        {
            return redirect()->back();
        }

        $table->update($request->all());
        return redirect()->route('tables.index')->with('success', 'Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = $this->table->find($id);

        if(!$table)
        {
            return redirect()->back();
        }
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $tables = $this->table->search($request->filter);

        return view('admin.pages.tables.index', compact('tables','filters'));
    }
}
