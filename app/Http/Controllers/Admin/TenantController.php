<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTenant;
use App\Http\Requests\StoreUpdateTenantRequest;
use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $tenant;

    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;

        $this->middleware(['can:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = $this->tenant->paginate();

        return view('admin.pages.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = Plan::all();

        return view('admin.pages.tenants.create', compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateTenantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTenantRequest $request)
    {
        $tenant = $this->tenant->create($request->all());
        if ($request->hasFile('logo') && $request->logo->isValid())
        {
            $tenant->logo = $request->logo->store("tenants/{$tenant->uuid}");
            $tenant->update();
        }
        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = $this->tenant->with('plan')->find($id);

        if (!$tenant)
        {
            return redirect()->back();
        }

        return view('admin.pages.tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plans = Plan::all();
        $tenant = $this->tenant->find($id);

        if (!$tenant)
        {
            return redirect()->back();
        }

        return view('admin.pages.tenants.edit', compact('tenant', 'plans'));
    }


    /**
     * Update register by id
     *
     * @param  \App\Http\Requests\StoreUpdateTenantRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTenantRequest $request, $id)
    {
        $tenant = $this->tenant->with('plan')->find($id);

        if (!$tenant)
        {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->hasFile('logo') && $request->logo->isValid())
        {

            if (Storage::exists($tenant->logo))
            {
                Storage::delete($tenant->logo);
            }

            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}");
        }

        $tenant->update($data);

        return redirect()->route('tenants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenant = $this->tenant->find($id);

        if (!$tenant)
        {
            return redirect()->back();
        }

        if (Storage::exists($tenant->logo))
        {
            Storage::delete($tenant->logo);
        }

        $tenant->delete();

        return redirect()->route('tenants.index');
    }


    /**
     * Search results
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $tenants = $this->tenant
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.tenants.index', compact('tenants', 'filters'));
    }
}
