<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Module;

class ModuleController extends Controller
{
    protected $repository;
    protected $module;
    public function __construct(AdminRepository $repository,Module $module)
    {
        $this->middleware(['auth']);
        $this->module = $module;
        $this->repository = $repository;
    }

    public function index($type = 'default')
    {
        $modules = $this->repository->getModelAllByPaginate($this->module,10,'created_at',true);
        if($type === 'ajax')
        {
            return view('admin.module.index',compact('modules'))->render();
        }
        return view('admin.module.index',compact('modules'));
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
