<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\SettingRequest;
use App\Setting;

class SettingController extends Controller
{
    protected $repository;
    protected $setting;
    public function __construct(AdminRepository $repository,Setting $setting)
    {
        $this->repository = $repository;
        $this->setting = $setting;
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
            'config_house' => request('config_house'),
            'description'  => request('description'),
            'keywords'     => request('keywords')
        ];
        $this->repository->updateModel($this->setting,$id,$data);
        return redirect()->route('root')->with(['message' => 'Update Setting Success!']);
    }
}
