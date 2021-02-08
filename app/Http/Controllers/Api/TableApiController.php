<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    private $tableService;
    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function tablesByTenant(TenantFormRequest $request)
    {
        $tables = $this->tableService->getAllByTenantUuid($request->token_company);
        return TableResource::collection($tables);
    }

    public function show(TenantFormRequest $request, $uuid)
    {
        $table = $this->tableService->getByUuid($uuid);

        if(!$table)
        {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new TableResource($table);
    }
}
