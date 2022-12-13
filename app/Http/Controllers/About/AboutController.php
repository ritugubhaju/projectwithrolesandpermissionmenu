<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\Form\AboutRequest;
use App\Modules\Models\About\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AboutController extends Controller
{
    protected $about;

    function __construct(About $about)
    {
        $this->about = $about;
    }
    public function index()
    {
        $abouts = $this->about->orderBy('created_at', 'desc')->get();

        return view('about.index', compact('abouts'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * @param Storeabout $request
     * @return mixed
     */
    public function store(AboutRequest $request)
    {
        if ($about = $this->about->create($request->data())) {
        }
        Toastr()->success('about Added Successfully.','Success');
        return redirect()->route('about.index');

    }

    /**
     * @param about $page
     * @return \Illuminate\View\View
     */
    public function edit(about $about)
    {
        return view('about.edit',compact('about'));
    }

    public function update(AboutRequest $request, About $about)
    {
        if ($about->update($request->data())) {
            $about->fill([
                'slug' => Str::slug($request->title),
            ])->save();
            Toastr()->success('about Updated Successfully.','Success');
            return redirect()->route('about.index');

        }

    }

    public function destroy($id)
    {
        $about = $this->about->find($id);
        $about->delete();
        Toastr()->success('about Deleted Successfully.','Success');
        return redirect()->route('about.index');
    }

}


