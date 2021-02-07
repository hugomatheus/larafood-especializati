<?php

namespace App\Observers;

use App\Models\Table;
use Illuminate\Support\Str;

class TableObserver
{

     /**
     * Handle the table "creating" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function creating(Table $table)
    {
        $table->uuid = Str::uuid();
    }

    /**
     * Handle the table "created" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function created(Table $table)
    {
        //
    }

     /**
     * Handle the table "updating" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function updating(Table $table)
    {
        //
    }

    /**
     * Handle the table "updated" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function updated(Table $table)
    {
        //
    }

    /**
     * Handle the table "deleted" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function deleted(Table $table)
    {
        //
    }

    /**
     * Handle the table "restored" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function restored(Table $table)
    {
        //
    }

    /**
     * Handle the table "force deleted" event.
     *
     * @param  \App\Models\Table  $table
     * @return void
     */
    public function forceDeleted(Table $table)
    {
        //
    }
}
