<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\AdminRepository;
use App\Http\Requests\QuestionRequest;
use App\Question;

class QuestionController extends Controller
{
    protected $repository;
    protected $question;
    public function __construct(AdminRepository $repository,Question $question)
    {
        $this->middleware(['auth']);
        $this->repository = $repository;
        $this->question = $question;
    }

    protected function index($type='default')
    {
        $questions = $this->repository->getModelAllByPaginate($this->question,10,'order',false);
        if($type === 'ajax')
        {
            return view('admin.question.index',compact('questions'))->render();
        }
        return view('admin.question.index',compact('questions'));
    }

    protected function create()
    {
        return view('admin.question.create');
    }

    protected function store(QuestionRequest $request)
    {
        $data = [
            'question'  =>  request('question'),
            'answer'    => request('answer'),
            'order'     =>  request('order')
        ];
        $this->repository->createModel($this->question,$data);
        return Redirect()->route('admin.question.index')->with(['message' => 'Add Question Success']);
    }

    protected function edit($id)
    {
        $question = $this->repository->getModelID($this->question,$id);
        return view('admin.question.edit',compact('question'));
    }

    protected function update(QuestionRequest $request,$id)
    {
        $data = [
            'question'  =>  request('question'),
            'answer'    => request('answer'),
            'order'     =>  request('order')
        ];
        $this->repository->updateModel($this->question,$id,$data);
        return Redirect()->route('admin.question.index')->with(['message' => 'Update Question Success']);
    }

    protected function destroy(QuestionRequest $request)
    {
        $ids = request('ids');
        if(!empty($ids))
        {
            $this->repository->deleteModel($this->question,$ids);
            return response()->json(['status' => true, 'message'=>"Delete Success!",'data'=>$this->index('ajax')]);
        }
        return response()->json(['status' => false, 'message'=>"Delete Error! Please try again"]);
    }
}
