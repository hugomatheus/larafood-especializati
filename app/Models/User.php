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
        'name', 'email', 'password',
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

    public function tenent()
    {
        return $this->belongsTo(Tenant::class);
    }

    //--- Relationships:


    
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%$filter%")
                        ->orWhere('email', 'LIKE', "%$filter%")
                        ->orWhere(function($query) use ($filter){
                            if($filter['tenant']){
                                $tenantName =$filter['tenant'];
                                $query->orWhere('tenant.name', 'LIKE', "%$tenantName%");
                            }
                        })
                        ->paginate();
        return $results;
    }
}
