<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\BannerRequest;
use App\Module;

class BannerController extends Controller
{
    //1280X437
    public $banner;
    public $repository;
    public $uploader;
    public $module;
    public $default_module = [

    ] ;
    public function __construct(Banner $banner,Module $module,AdminRepository $repository,ImageUploadHandler $uploader)
    {
        $this->middleware(['auth']);
        $this->banner = $banner;
        $this->repository = $repository;
        $this->uploader = $uploader;
        $this->module = $module;
    }

    public function index($type='default')
    {
        $banners = $this->repository->getModelWith($this->banner,['module']);
        if($type === 'ajax')
        {
            return view('admin.banner.index',compact('banners'))->render();
        }
        return view('admin.banner.index',compact('banners'));
    }

    public function create()
    {
        $modules = $this->repository->getModelAll($this->module);
        return view('admin.banner.create',compact('modules'));
    }

    public function store(BannerRequest $request)
    {
        $data = [
            'module_id' => request('module_id'),
        ];
        if($request->image)
        {
            if($result = $this->uploader->save($request->image,'banners',rand(1000,9999),360))
            {
                $data['image'] = $result['path'];
            }
        };
        $this->repository->createModel($this->banner,$data);
        return Redirect()->route('admin.banner.index')->with(['message' => 'Add Banner Success']);
    }

    public function edit($id)
    {
        $modules = $this->repository->getModelAll($this->module);
        $banner = $this->repository->getModelID($this->banner,$id);
        return view('admin.banner.edit',compact('banner','modules'));
    }

    public function update(BannerRequest $request,$id)
    {
        $data = [
            'module_id' => request('module_id'),
        ];
        if($request->image)
        {
            if($result = $this->uploader->save($request->image,'banners',rand(1000,9999),360))
            {
                $data['image'] = $result['path'];
            }
        };
        $this->repository->updateModel($this->banner,$id,$data);
        return Redirect()->route('admin.banner.index')->with(['message' => 'Update Banner Success']);
    }

    public function destroy()
    {
        $ids = request('ids');
        if(!empty($ids))
        {
            $this->repository->deleteModel($this->banner,$ids);
            return response()->json(['status' => true, 'message'=>"Delete Success!",'data'=>$this->index('ajax')]);
        }
        return response()->json(['status' => false, 'message'=>"Delete Error! Please try again"]);
    }
}
