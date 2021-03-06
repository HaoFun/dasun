<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\NewsRequest;
use App\News;

class NewsController extends Controller
{
    protected $repository;
    protected $news;
    protected $type = ['最新消息', '最新公告', '最新宣導', '最新活動'];
    public function __construct(AdminRepository $repository,News $news)
    {
        $this->middleware(['auth']);
        $this->repository = $repository;
        $this->news = $news;
    }

    protected function index($type='default')
    {
        $news = $this->repository->getModelAllByPaginate($this->news,10,'publish_at',true,'news');
        if($type === 'ajax')
        {
            return view('admin.news.index',compact('news'))->render();
        }
        return view('admin.news.index',compact('news'));
    }

    protected function create()
    {
        $type = $this->type;
        return view('admin.news.create',compact('type'));
    }

    protected function store(NewsRequest $request)
    {
        $data = [
            'title'  =>  request('title'),
            'type'   =>  request('type'),
            'publish_at' => request('publish_at'),
            'content'   =>  request('content')
        ];
        $this->repository->createModel($this->news,$data);
        return Redirect()->route('admin.news.index')->with(['message' => 'Add News Success']);
    }

    protected function edit($id)
    {
        $type = $this->type;
        $news = $this->repository->getModelID($this->news,$id);
        return view('admin.news.edit',compact('news','type'));
    }

    protected function update(NewsRequest $request,$id)
    {
        $data = [
            'title'  =>  request('title'),
            'type'   =>  request('type'),
            'publish_at' => request('publish_at'),
            'content'   =>  request('content')
        ];
        $this->repository->updateModel($this->news,$id,$data);
        return Redirect()->route('admin.news.index')->with(['message' => 'Update News Success']);
    }

    protected function destroy(NewsRequest $request)
    {
        $ids = request('ids');
        if(!empty($ids))
        {
            $this->repository->deleteModel($this->news,$ids);
            return response()->json(['status' => true, 'message'=>"Delete Success!",'data'=>$this->index('ajax')]);
        }
        return response()->json(['status' => false, 'message'=>"Delete Error! Please try again"]);
    }
}
