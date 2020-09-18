<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    // Relationships:

    //   - Get Module:

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }


    // - Get DetailsPlan

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(2);
        return $results;
    }

    public function modulesAvailable($filter = null)
    {
        $modules = Module::whereNotIn('id', function($query) {
                            $query->select('ModulePlan.module_id');
                            $query->from('module_plan AS ModulePlan');
                            $query->where('ModulePlan.plan_id', $this->id);
                        })->where(function($queryFilter) use ($filter){
                            if($filter){
                                $queryFilter->where('name', 'LIKE', "%$filter%");
                            }
                        })
                        ->paginate();

        return $modules;
    }
}
