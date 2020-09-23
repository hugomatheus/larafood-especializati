<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use App\Tenant\ManagerTenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate();
        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image') && $request->image->isValid())
        {
            $managerTenant = app(ManagerTenant::class);
            $tenant = $managerTenant->getTenant();

            $data['image'] = $request->image->store("tenants/{$tenant->uuid}/products");

        }
        $this->product->create($data);
        return redirect()->route('products.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);

        if(!$product)
        {
            return redirect()->back();
        }

        return view('admin.pages.products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);

        if(!$product)
        {
            return redirect()->back();
        }

        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        $product = $this->product->find($id);

        if(!$product)
        {
            return redirect()->back();
        }

        $data = $request->all();
        if($request->hasFile('image') && $request->image->isValid())
        {
            if(Storage::exists($product->image))
            {
                Storage::delete($product->image);
            }

            $managerTenant = app(ManagerTenant::class);
            $tenant = $managerTenant->getTenant();

            $data['image'] = $request->image->store("tenants/{$tenant->uuid}/products");

        }

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);

        if(!$product)
        {
            return redirect()->back();
        }

        if(Storage::exists($product->image))
        {
            Storage::delete($product->image);
        }
        
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $products = $this->product->search($request->filter);

        return view('admin.pages.products.index', compact('products','filters'));
    }
}
