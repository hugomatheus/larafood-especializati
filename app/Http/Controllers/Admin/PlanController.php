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

    public function index() {
        $plans = $this->plan->latest()->paginate();
        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create() {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);

        //$this->plan->create($request->all());
        $this->plan->create($data);
        return redirect()->route('plans.index');
    }
}
