<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\UsersRequest;
use App\User;

class UsersController extends Controller
{
    protected $repository;
    protected $user;
    public function __construct(AdminRepository $repository,User $user)
    {
        $this->middleware(['auth']);
        $this->repository = $repository;
        $this->user = $user;
    }

    protected function index($type = 'default')
    {
        $users = $this->repository->getModelAllByPaginate($this->user,10,'created_at',true,'user');
        if($type === 'ajax')
        {
            return view('admin.user.index',compact('users'))->render();
        }
        return view('admin.user.index',compact('users'));
    }

    protected function create()
    {
        return view('admin.user.create');
    }

    protected function store(UsersRequest $request)
    {
        $data = [
            'name'      => request('name'),
            'email'     => request('email'),
            'password'  => request('password'),
        ];
        $user = $this->repository->createModel($this->user,$data);
        return redirect()->route('admin.user.index')->with(['message' => 'Add Admin Success']);
    }

    protected function edit($id)
    {
        $user = $this->repository->getModelID($this->user,$id);
        return view('admin.user.edit',compact('user'));
    }

    protected function update(UsersRequest $request,$id)
    {
        $data = [
            'name'      => request('name'),
            'email'     => request('email'),
            'password'  => request('password'),
        ];
        $this->repository->updateModel($this->user,$id,$data);
        return redirect()->route('admin.user.index')->with(['message' => 'Update Admin Success']);
    }

    protected function destroy(UsersRequest $request)
    {
        $ids = request('ids');
        if(!empty($ids))
        {
            if(count($this->repository->getModelAll($this->user)) - count($ids) <= 0)
            {
                return response()->json(['status'=> false,'message' => "Delete Error! Can Not All Delete"]);
            }
            $this->repository->deleteModel($this->user,$ids);
            return response()->json(['status' => true,'message'=>"Delete Success!",'data'=>$this->index('ajax')]);
        }
        return response()->json(['status' => false,'message'=>"Delete Error! Please try again"]);
    }
}
