<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;


class PlanController extends Controller
{

    protected $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function index()
    {
        $plans = $this->plan->latest()->paginate(2);
        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlanRequest $request)
    {
        $this->plan->create($request->all());
        return redirect()->route('plans.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    public function show($id)
    {
        $plan = $this->plan->where('id', $id)->first();
        if(!$plan)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.show', compact('plan'));
    }


    public function edit($id)
    {
        $plan = $this->plan->where('id', $id)->first();
        if(!$plan)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.edit', compact('plan'));
    }

    public function update(StoreUpdatePlanRequest $request, $id)
    {
        $plan = $this->plan->where('id', $id)->first();
        if(!$plan)
        {
            return redirect()->back();
        }
        $plan->update($request->all());
        return redirect()->route('plans.index')->with('success', 'Registro alterado com sucesso!');
    }

    public function destroy($id)
    {
        $plan = $this->plan->with(['details'])->where('id',$id)->first();
        if(!$plan)
        {
          return redirect()->back();
        }

        if($plan->details->count() > 0)
        {
            return redirect()->route('plans.index')->with('error', 'Necessário remover os detalhes vinculados ao plano!');
        }

        $plan->delete();
        return redirect()->route('plans.index')->with('success', 'Registro deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->plan->search($request->filter);
        return view('admin.pages.plans.index', compact('plans', 'filters'));
    }
}
