<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Http\Requests\Admin\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $slider_id;

    public function render()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.slider.index', compact('sliders'));
    }

    public function deleteSlider($slider_id)
    {
        return $this->slider_id = $slider_id;
    }

    public function destroySlider()
    {
        $slider = Slider::find($this->slider_id);
        if (File::exists($slider->image)) {
            File::delete($slider->image);
        }
        $slider->delete();
        \Session::flash('message', 'Slider Deleted ');
        $this->dispatchBrowserEvent('close-modal');
    }

}
