<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\NewsRequest;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $repository;
    protected $news_model;
    public function __construct(AdminRepository $repository,News $news_model)
    {
        $this->middleware(['auth']);
        $this->repository = $repository;
        $this->news_model = $news_model;
    }

    protected function index($type='default')
    {
        $news = $this->repository->getModelAllByPaginate($this->news_model,10,'publish_at');
        if($type === 'ajax')
        {
            return view('admin.news.index',compact('news'))->render();
        }
        return view('admin.news.index',compact('news'));
    }

    protected function create()
    {
        return view('admin.news.create');
    }

    protected function store(NewsRequest $request)
    {
        $data = [
            'title'  =>  request('title'),
            'body'   =>  request('body')
        ];
        $this->repository->createModel($this->news_model,$data);
        return Redirect()->route('admin.news.index')->with(['message' => 'Add News Success']);
    }

    protected function edit($id)
    {
        $news = $this->repository->getModelID($this->news_model,$id);
        return view('admin.news.edit',compact('news'));
    }

    protected function update(NewsRequest $request,$id)
    {
        $news = $this->repository->getModelID($this->news_model,$id);
        $data = [
            'title'  =>  request('title'),
            'body'   =>  request('body')
        ];
        $this->repository->updateModel($this->news_model,$news,$data);
        return Redirect()->route('admin.news.index');
    }

    protected function destroy(Request $request)
    {
        $ids = request('ids');
        if(!empty($ids))
        {
            $this->repository->deleteModel($this->news_model,$ids);
            return response()->json(['status' => true, 'message'=>"刪除成功!",'data'=>$this->index('ajax')]);
        }
        return response()->json(['status' => false, 'message'=>"刪除失敗，請重試!"]);
    }
}
