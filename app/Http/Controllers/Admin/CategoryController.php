<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->paginate();
        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoryRequest $request)
    {
        $this->category->create($request->all());
        return redirect()->route('categories.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->category->find($id);

        if(!$category)
        {
            return redirect()->back();
        }

        return view('admin.pages.categories.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);

        if(!$category)
        {
            return redirect()->back();
        }

        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoryRequest $request, $id)
    {
        $category = $this->category->find($id);

        if(!$category)
        {
            return redirect()->back();
        }

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);

        if(!$category)
        {
            return redirect()->back();
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $categories = $this->category->search($request->filter);

        return view('admin.pages.categories.index', compact('categories','filters'));
    }
}
