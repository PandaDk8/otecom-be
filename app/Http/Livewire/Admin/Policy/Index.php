<?php

namespace App\Http\Livewire\Admin\Policy;

use App\Models\ProductPolicy;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public $policy_id;

    public function render()
    {
        $policies = ProductPolicy::all();
        return view('livewire.policy.index', compact('policies'));
    }

    public function deletePolicy($policy_id)
    {
        $this->policy_id = $policy_id;
    }

    public function destroyPolicy()
    {
        $policy = ProductPolicy::find($this->policy_id);
        $policy->delete();
        Session::flash('message', 'Policy Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
}
