<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Modules\Models\Slider\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    protected $slider;

    function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->orderBy('created_at', 'desc')->get();

        return view('slider.index', compact('sliders'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * @param Storeslider $request
     * @return mixed
     */
    public function store(SliderRequest $request)
    {
        if ($slider = $this->slider->create($request->data())) {

        }
        Toastr()->success('Slider Added Successfully.','Success');
        return redirect()->route('slider.index');

    }

    /**
     * @param slider $page
     * @return \Illuminate\View\View
     */
    public function edit(Slider $slider)
    {
        return view('slider.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        if ($slider->update($request->data())) {
            $slider->fill([
                'slug' => Str::slug($request->title),
            ])->save();

            Toastr()->success('Slider Updated Successfully.','Success');
            return redirect()->route('slider.index');

        }

    }

    public function destroy($id)
    {
        $slider = $this->slider->find($id);
        $slider->delete();
        Toastr()->success('Slider Deleted Successfully.','Success');
        return redirect()->route('slider.index');
    }

}


