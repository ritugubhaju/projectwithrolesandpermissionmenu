<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\AlbumRequest;
use App\Modules\Models\Album\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    protected $album;

    function __construct(Album $album)
    {
        $this->album = $album;
    }
    public function index()
    {
        $albums = $this->album->orderBy('created_at', 'desc')->get();

        return view('album.index', compact('albums'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * @param Storealbum $request
     * @return mixed
     */
    public function store(AlbumRequest $request)
    {
        if ($album = $this->album->create($request->data())) {

        }
        Toastr()->success('Album Added Successfully.','Success');
        return redirect()->route('album.index');
    }

    /**
     * @param album $page
     * @return \Illuminate\View\View
     */
    public function edit(Album $album)
    {
        return view('album.edit', compact('album'));
    }

    public function update(AlbumRequest $request, Album $album)
    {
        if ($album->update($request->data())) {
            $album->fill([
                'slug' => Str::slug($request->title),
            ])->save();
            Toastr()->success('Album Updated Successfully.','Success');
            return redirect()->route('album.index');

        }

    }

    public function destroy($id)
    {
        $album = $this->album->find($id);
        $album->delete();
        Toastr()->success('Album Deleted Successfully.','Success');
        return redirect()->route('album.index');
    }
}

