<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\UserACLTrait;

class User extends Authenticatable
{
    use Notifiable, UserACLTrait;


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

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenantIdScope($query)
    {
        return $query->where('tenant_id', auth()->user()->tenant_id);
    }



    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orWhere('email', 'LIKE', "%$filter%")
                        ->TenantIdScope()
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
                        ->TenantIdScope()
                        ->paginate();
        return $results;
    }
}
