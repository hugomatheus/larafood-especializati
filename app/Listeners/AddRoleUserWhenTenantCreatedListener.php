<?php

namespace App\Listeners;

use App\Models\Role;
use App\Tenant\Events\TenantCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddRoleUserWhenTenantCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TenantCreatedEvent $event)
    {
        $user = $event->getUser();

        $roleDefault = Role::first();
        // Primeira role tem que ser a do admin que tenha todas as permissões ligadas

        if(!$roleDefault)
        {
            return false;
        }

        $user->roles()->attach($roleDefault);

        return true;
    }
}
