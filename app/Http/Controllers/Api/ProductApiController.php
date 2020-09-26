<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function productsByTenant(TenantFormRequest $request)
    {
        $products = $this->productService->getAllByTenantUuid($request->token_company, $request->get('categories', []));
        return ProductResource::collection($products);
    }

    public function show(TenantFormRequest $request, $flag)
    {
        $product = $this->productService->getByFlag($flag);

        if(!$product)
        {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new ProductResource($product);
    }
}
