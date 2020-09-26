<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function categoriesByTenant(TenantFormRequest $request)
    {
        // Validar no controller e caso não esteja passando o dados retornar 404 com a mensagem
        // if (!$request->token_company) {
        //     return response()->json(['message' => 'Token Not Found'], 404);
        // }

        $categories = $this->categoryService->getAllByTenantUuid($request->token_company);
        return CategoryResource::collection($categories);
    }

    public function show(TenantFormRequest $request, $url)
    {
        $category = $this->categoryService->getByUrl($url);

        if(!$category)
        {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new CategoryResource($category);
    }
}
