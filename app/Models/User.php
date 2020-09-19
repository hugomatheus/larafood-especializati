<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tenant_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships:

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    //--- Relationships:



    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orWhere('email', 'LIKE', "%$filter%")
                        ->paginate();
        return $results;
    }

    public function search2($filters = null)
    {
        $results = $this->join('tenants', 'tenants.id', 'users.tenant_id')
                        ->where(function($query) use ($filters) {
                               if($filters->filter_name) {
                                  $query->orWhere('users.name', 'LIKE', "%{$filters->filter_name}%");
                               }
                               if($filters->filter_email) {
                                  $query->orWhere('users.email', 'LIKE', "%{$filters->filter_email}%");
                               }
                               if($filters->filter_tenant) {
                                  $query->where('tenants.name',"{$filters->filter_tenant}");
                               }
                        })
                        ->select('users.*')
                        ->with(['tenant'])
                        ->paginate(1);
        return $results;
    }
}
