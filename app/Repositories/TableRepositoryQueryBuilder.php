<?php

namespace App\Repositories;

use App\Repositories\Contracts\ITableRepository;
use Illuminate\Support\Facades\DB;

class TableRepositoryQueryBuilder implements ITableRepository
{
    private $db_table;
    public function __construct()
    {
        $this->db_table = 'tables';
    }

    public function getAllByTenantUuid(string $tenantUuid)
    {
        $tables =  DB::table($this->db_table)
                            ->join('tenants', 'tenants.id', 'tables.tenant_id')
                            ->where('tenants.uuid', $tenantUuid)
                            ->select('tables.*')
                            ->get();
        return $tables;
    }

    public function getAllByTenantId(int $tenantId)
    {
        $tables = DB::table($this->db_table)->where('tenant_id', $tenantId)->get();
        return $tables;
    }

    public function getByIdentify(string $identify)
    {
        $table = DB::table($this->db_table)->where('identify', $identify)->first();
        return $table;
    }


}
