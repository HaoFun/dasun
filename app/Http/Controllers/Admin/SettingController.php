<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\ImageUploadHandler;
use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\SettingRequest;
use App\Setting;

class SettingController extends Controller
{
    protected $repository;
    protected $setting;
    protected $uploader;
    public function __construct(AdminRepository $repository,Setting $setting,ImageUploadHandler $uploader)
    {
        $this->middleware(['auth']);
        $this->repository = $repository;
        $this->setting = $setting;
        $this->uploader = $uploader;
    }

    protected function edit()
    {
        $setting = $this->repository->getModelID($this->setting,$this->repository->getModelFirst($this->setting)->id);
        return view('admin.setting.edit',compact('setting'));
    }

    protected function update(SettingRequest $request,$id)
    {
        $id = $this->repository->getModelFirst($this->setting)->id;
        $data = [
            'config_name'  => request('config_name'),
            'config_phone' => request('config_phone'),
            'config_address' => request('config_address'),
            'config_email' => request('config_email'),
            'config_fax'   => request('config_fax'),
            'config_info' => request('config_info'),
            'description'  => request('description'),
            'keywords'     => request('keywords')
        ];
        if($request->config_image)
        {
            if($result = $this->uploader->save($request->config_image,'setting',rand(1000,9999),1280))
            {
                $data['config_image'] = $result['path'];
            }
        };
        if($request->config_image_title)
        {
            if($result = $this->uploader->save($request->config_image_title,'setting',rand(1000,9999),444))
            {
                $data['config_image_title'] = $result['path'];
            }
        };
        $config_ad_image = [];
        if($request->config_ad_image)
        {
            foreach ($request->config_ad_image as $key => $value)
            {
                if($result = $this->uploader->save($value,'setting',rand(1000,9999),200))
                {
                    $config_ad_image[$key] = $result['path'];
                }
            }
            $data['config_ad_image'] = serialize($config_ad_image);
        };
        $this->repository->updateModel($this->setting,$id,$data);
        return redirect()->route('root')->with(['message' => 'Update Setting Success!']);
    }
}
