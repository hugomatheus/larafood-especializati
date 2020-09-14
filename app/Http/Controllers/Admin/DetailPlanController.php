<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlanRequest;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{

    protected $detailPlan, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->detailPlan = $detailPlan;
        $this->plan = $plan;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($planId)
    {
        $plan = $this->plan->where('id', $planId)->first();

        if(!$plan)
        {
            return redirect()->back();
        }
        $details = $plan->details()->paginate();
        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($planId)
    {
        $plan = $this->plan->where('id', $planId)->first();

        if(!$plan)
        {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDetailPlanRequest $request, $planId)
    {
        $plan = $this->plan->where('id', $planId)->first();

        if(!$plan)
        {
            return redirect()->back();
        }

        $plan->details()->create($request->all());
        return redirect()->route('plans.details.index', $planId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($planId, $detailId)
    {
        $plan = $this->plan->where('id', $planId)->first();
        $detail = $this->detailPlan->find($detailId);

        if(!$plan || !$detail)
        {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDetailPlanRequest $request, $planId, $detailId)
    {
        $plan = $this->plan->where('id', $planId)->first();
        $detail = $this->detailPlan->find($detailId);

        if(!$plan || !$detail)
        {
            return redirect()->back();
        }

        $detail->update($request->all());
        return redirect()->route('plans.details.index', $plan->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
