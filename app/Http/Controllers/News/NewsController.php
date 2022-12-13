<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsRequest;
use App\Modules\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    protected $news;

    function __construct(News $news)
    {
        $this->news = $news;
    }
    public function index()
    {
        $newss = $this->news->orderBy('created_at', 'desc')->get();

        return view('news.index', compact('newss'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * @param StoreNews $request
     * @return mixed
     */
    public function store(NewsRequest $request)
    {
        if ($news = $this->news->create($request->data())) {

        }
        Toastr()->success('News Added Successfully.','Success');
        return redirect()->route('news.index');

    }

    /**
     * @param News $page
     * @return \Illuminate\View\View
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        if ($news->update($request->data())) {
            $news->fill([
                'slug' => Str::slug($request->title),
            ])->save();

            Toastr()->success('News Updated Successfully.','Success');
            return redirect()->route('news.index');

        }

    }

    public function destroy($id)
    {
        $news = $this->news->find($id);
        $news->delete();
        Toastr()->success('News Deleted Successfully.','Success');
        return redirect()->route('news.index');
    }

}


