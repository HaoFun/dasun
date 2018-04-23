<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\ServiceRequest;
use App\Service;

class ServiceController extends Controller
{
    protected $service;
    protected $repository;
    protected $uploader;
    public function __construct(Service $service,AdminRepository $repository,ImageUploadHandler $uploader)
    {
        $this->middleware(['auth']);
        $this->repository = $repository;
        $this->uploader = $uploader;
        $this->service = $service;
    }

    public function index($type='default')
    {
        $services = $this->repository->getModelAllByPaginate($this->service,10,'created_at',true,'service');
        if($type === 'ajax')
        {
            return view('admin.service.index',compact('services'))->render();
        }
        return view('admin.service.index',compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(ServiceRequest $request)
    {
        $data = [
            'title'   => request('title'),
            'content' => request('content'),
            'order'   => request('order'),
        ];
        if($request->image)
        {
            if($result = $this->uploader->save($request->image,'services',rand(1000,9999),86))
            {
                $data['image'] = $result['path'];
            }
        };
        $this->repository->createModel($this->service,$data);
        return Redirect()->route('admin.service.index')->with(['message' => 'Add Service Success']);
    }

    public function edit($id)
    {
        $service = $this->repository->getModelID($this->service,$id);
        return view('admin.service.edit',compact('service'));
    }

    public function update(ServiceRequest $request,$id)
    {
        $data = [
            'title'   => request('title'),
            'content' => request('content'),
            'order'   => request('order'),
        ];
        if($request->image)
        {
            if($result = $this->uploader->save($request->image,'banners',rand(1000,9999),86))
            {
                $data['image'] = $result['path'];
            }
        };
        $this->repository->updateModel($this->service,$id,$data);
        return Redirect()->route('admin.service.index')->with(['message' => 'Update Service Success']);
    }

    public function destroy()
    {
        $ids = request('ids');
        if(!empty($ids))
        {
            $this->repository->deleteModel($this->service,$ids);
            return response()->json(['status' => true, 'message'=>"Delete Success!",'data'=>$this->index('ajax')]);
        }
        return response()->json(['status' => false, 'message'=>"Delete Error! Please try again"]);
    }
}
