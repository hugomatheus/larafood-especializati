<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{

    private $plan;

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

    public function store(Request $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);

        $this->plan->create($data);
        //$this->plan->create($request->all());
        return redirect()->route('plans.index');
    }

    public function show ($url)
    {
        $plan = $this->plan->where('url', $url)->first();
        if(!$plan) {
            return redirect()->back();
        }
        return view('admin.pages.plans.show', compact('plan'));
    }

    public function destroy ($id)
    {
        $plan = $this->plan->where('id',$id)->first();
        if(!$plan) {
          return redirect()->back();
        }

        $plan->delete();
        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->plan->search($request->filter);
        return view('admin.pages.plans.index', compact('plans', 'filters'));
    }
}
