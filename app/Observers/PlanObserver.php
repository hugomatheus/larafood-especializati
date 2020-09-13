<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plan "created" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function created(Plan $plan)
    {
        //
    }

    /**
     * Handle the plan "updating" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }
    /**
     * Handle the plan "updated" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updated(Plan $plan)
    {
        //
    }

    /**
     * Handle the plan "deleted" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function deleted(Plan $plan)
    {
        //
    }

    /**
     * Handle the plan "restored" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function restored(Plan $plan)
    {
        //
    }

    /**
     * Handle the plan "force deleted" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function forceDeleted(Plan $plan)
    {
        //
    }
}
