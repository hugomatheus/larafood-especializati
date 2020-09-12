<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    private $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function index() {
        $plans = $this->plan->all();
        return view('admin.pages.plans.index', compact('plans'));
    }
}
