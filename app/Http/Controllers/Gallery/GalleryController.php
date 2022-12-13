<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\GalleryRequest;
use App\Modules\Models\Album\Album;
use App\Modules\Models\Gallery\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    protected $gallery,$album;

    function __construct(Gallery $gallery,Album $album)
    {
        $this->gallery = $gallery;
        $this->album = $album;
    }
    public function index()
    {
        $galleries = $this->gallery->orderBy('created_at', 'desc')->get();

        return view('gallery.index', compact('galleries'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $albums = $this->album->get();
        return view('gallery.create',compact('albums'));
    }

    /**
     * @param Storegallery $request
     * @return mixed
     */
    public function store(GalleryRequest $request)
    {
        if ($gallery = $this->gallery->create($request->data())) {

        }
        Toastr()->success('gallery Added Successfully.','Success');
        return redirect()->route('gallery.index');

    }

    /**
     * @param gallery $page
     * @return \Illuminate\View\View
     */
    public function edit(Gallery $gallery)
    {
        $album_search = Album::find($gallery->album_id);
        $albums = $this->album->get();
        return view('gallery.edit', compact('gallery','albums','album_search'));
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        if ($gallery->update($request->data())) {
            $gallery->fill([
                'slug' => Str::slug($request->title),
            ])->save();

            Toastr()->success('Gallery Updated Successfully.','Success');
            return redirect()->route('gallery.index');

        }

    }

    public function destroy($id)
    {
        $gallery = $this->gallery->find($id);
        $gallery->delete();
        Toastr()->success('Gallery Deleted Successfully.','Success');
        return redirect()->route('gallery.index');
    }

}


