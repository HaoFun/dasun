<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\ModuleRequest;
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
        $modules = $this->repository->getModelAllByPaginate($this->module,10,'order',false,'module');
        if($type === 'ajax')
        {
            return view('admin.module.index',compact('modules'))->render();
        }
        return view('admin.module.index',compact('modules'));
    }

    protected function create()
    {
        return view('admin.module.create');
    }

    protected function store(ModuleRequest $request)
    {
        $data = [
            'name'    =>  request('name'),
            'url'     =>  request('url'),
            'content' =>  request('content'),
            'order'   =>  request('order')
        ];
        $this->repository->createModel($this->module,$data);
        return Redirect()->route('admin.module.index')->with(['message' => 'Add Module Success']);
    }

    protected function edit($id)
    {
        $module = $this->repository->getModelID($this->module,$id);
        return view('admin.module.edit',compact('module'));
    }

    protected function update(ModuleRequest $request,$id)
    {
        $data = [
            'name'    =>  request('name'),
            'url'     =>  request('url'),
            'content' =>  request('content'),
            'order'   =>  request('order')
        ];
        $this->repository->updateModel($this->module,$id,$data);
        return Redirect()->route('admin.module.index')->with(['message' => 'Update Module Success']);
    }

    protected function destroy(ModuleRequest $request)
    {
        $ids = request('ids');
        if(!empty($ids))
        {
            $this->repository->deleteModel($this->module,$ids);
            return response()->json(['status' => true, 'message'=>"Delete Success!",'data'=>$this->index('ajax')]);
        }
        return response()->json(['status' => false, 'message'=>"Delete Error! Please try again"]);
    }
}
