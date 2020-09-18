<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Plan;
use Illuminate\Http\Request;

class ModulePlanController extends Controller
{
    protected $plan, $module;
    public function __construct(Plan $plan, Module $module)
    {
        $this->plan = $plan;
        $this->module = $module;
    }

    public function plans($moduleId)
    {
        $module = $this->module->find($moduleId);
        if(!$module)
        {
            return redirect()->back();
        }

        $plans = $module->plans()->paginate();
        return view('admin.pages.modules.plans.plans', compact('module', 'plans'));
    }

    public function modules($planId)
    {
        $plan = $this->plan->find($planId);

        if(!$plan)
        {
            return redirect()->back();
        }

        $modules = $plan->modules()->paginate();
        return view('admin.pages.plans.modules.modules', compact('plan', 'modules'));

    }

    public function modulesAvailable(Request $request, $planId)
    {
        $plan = $this->plan->find($planId);

        if(!$plan)
        {
           return redirect()->back();
        }

        $filters = $request->except('_token');

        $modules = $plan->modulesAvailable($request->filter);
        return view('admin.pages.plans.modules.available', compact('plan', 'modules', 'filters'));
    }

    public function attachModulePlan(Request $request, $planId)
    {
        $plan = $this->plan->find($planId);

        if(!$plan)
        {
            return redirect()->back();
        }

        if(!$request->modules || count($request->modules) == 0)
        {
            return redirect()->route('plans.modules.available', $plan->id)->with('error', 'Nenhum módulo foi selecionado para ser vinculado');
        }
        $plan->modules()->attach($request->modules);
        return redirect()->route('plans.modules', $planId)->with('success', 'Módulos vinculadas com sucesso');
    }


    public function detachModulePlan($planId, $moduleId)
    {
        $plan = $this->plan->find($planId);
        $module = $this->module->find($moduleId);

        if(!$plan || !$module)
        {
            return redirect()->back();
        }


        $plan->modules()->detach($module);
        return redirect()->route('plans.modules', $planId)->with('success', 'Módulo desvinculado com sucesso');
    }
}
