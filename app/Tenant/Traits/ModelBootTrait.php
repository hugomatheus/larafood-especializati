<?php

// Trait criada para ser utilizada nos models (caso necessário) para sobrescrever o método boot
// Método boot chama a TenantObserver (App\Tenant\Observer) para setar automaticamente tenant_id nas colunas da tabela

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;

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
    }
}
