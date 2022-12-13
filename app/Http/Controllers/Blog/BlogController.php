<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Modules\Models\Blog\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    protected $blog;

    function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    public function index()
    {
        $blogs = $this->blog->orderBy('created_at', 'desc')->get();

        return view('blog.index', compact('blogs'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * @param Storeblog $request
     * @return mixed
     */
    public function store(BlogRequest $request)
    {
        if ($blog = $this->blog->create($request->data())) {

        }
        Toastr()->success('Blog Added Successfully.','Success');
        return redirect()->route('blog.index');

    }

    /**
     * @param blog $page
     * @return \Illuminate\View\View
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        if ($blog->update($request->data())) {
            $blog->fill([
                'slug' => Str::slug($request->title),
            ])->save();

            Toastr()->success('Blog Updated Successfully.','Success');
            return redirect()->route('blog.index');

        }

    }

    public function destroy($id)
    {
        $blog = $this->blog->find($id);
        $blog->delete();
        Toastr()->success('Blog Deleted Successfully.','Success');
        return redirect()->route('blog.index');
    }

}


