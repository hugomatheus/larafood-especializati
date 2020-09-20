<?php

// Trait criada para ser utilizada nos models (caso necessário) para sobrescrever o método boot
// Método boot:
// chama a TenantObserver (App\Tenant\Observer) para setar automaticamente tenant_id nas colunas da tabela
// chama TenantScope para aplicar automaticamente em todas as consultas passando o tenant_id

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

trait ModelBootTrait
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::observe(TenantObserver::class);

        static::addGlobalScope(new TenantScope);
    }
}
