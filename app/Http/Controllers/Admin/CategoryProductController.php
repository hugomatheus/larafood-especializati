<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $product, $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function products($categoryId)
    {
        $category = $this->category->find($categoryId);
        if(!$category)
        {
            return redirect()->back();
        }

        $products = $category->products()->paginate();
        return view('admin.pages.categories.products.products', compact('category', 'products'));
    }

    public function categories($productId)
    {
        $product = $this->product->find($productId);
        if(!$product)
        {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();
        return view('admin.pages.products.categories.categories', compact('product', 'categories'));

    }

    public function categoriesAvailable(Request $request, $productId)
    {
        $product = $this->product->find($productId);

        if(!$product)
        {
           return redirect()->back();
        }

        $filters = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);
        return view('admin.pages.products.categories.available', compact('product', 'categories', 'filters'));
    }

    public function attachProductCategory(Request $request, $productId)
    {
        $product = $this->product->find($productId);

        if(!$product)
        {
            return redirect()->back();
        }

        if(!$request->categories || count($request->categories) == 0)
        {
            return redirect()->route('products.categories.available', $productId)->with('error', 'Nenhuma categoria foi selecionada para ser vinculada');
        }
        $product->categories()->attach($request->categories);
        return redirect()->route('products.categories', $productId)->with('success', 'Categorias vinculadas com sucesso');
    }


    public function detachProductCategory($productId, $categoryId)
    {
        $product = $this->product->find($productId);
        $category = $this->category->find($categoryId);

        if(!$product || !$category)
        {
            return redirect()->back();
        }


        $product->categories()->detach($category);
        return redirect()->route('products.categories', $productId)->with('success', 'Categorias desvinculadas com sucesso');
    }
}
