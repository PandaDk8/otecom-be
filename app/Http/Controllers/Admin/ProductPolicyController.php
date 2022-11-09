<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductPolicy;
use Illuminate\Http\Request;

class ProductPolicyController extends Controller
{
    public function index()
    {
        return view('admin.policy.index');
    }

    public function create()
    {
        return view('admin.policy.create');
    }

    public function store(Request $request)
    {
        ProductPolicy::create($request->all());
        return redirect('admin/policy');
    }

    public function edit(ProductPolicy $policy)
    {
        return view('admin.policy.edit', compact('policy'));
    }

    public function update(Request $request, $policy)
    {
        $policy = ProductPolicy::findOrFail($policy);
        $policy->customer_policy = $request->input('customer_policy');
        $policy->shipping_policy = $request->input('shipping_policy');
        $policy->return_policy = $request->input('return_policy');
        $policy->update();
        return redirect('admin/policy')->with('message', 'Policy Updated Successfully');

       
    }
}
