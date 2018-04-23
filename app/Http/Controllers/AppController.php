<?php

namespace App\Http\Controllers;

use App\Http\Repositories\AppRepository;
use App\Module;
use App\News;
use App\Question;
use App\Service;
use Illuminate\Http\Request;

class AppController extends Controller
{
    protected $repository;
    protected $news;
    protected $service;
    protected $module;
    protected $qa;
    public function __construct(AppRepository $repository,News $news,Service $service,Module $module,Question $qa)
    {
        $this->repository = $repository;
        $this->news = $news;
        $this->service = $service;
        $this->module = $module;
        $this->qa = $qa;
    }

    public function home()
    {
        return redirect()->to(route('tw.home'),302);
    }

    public function index()
    {
        $modules = $this->repository->getModelAll($this->module,'order','ASC');
        $news = $this->repository->getModelNum($this->news,3,'publish_at','DESC');
        $services = $this->repository->getModelAll($this->service,'order','ASC');
        return view('frontend.index',compact('news','services','modules'));
    }

    public function AllModule(Request $request)
    {
        $path = trim($request->path());
        $modules = $this->repository->getModelAll($this->module,'order','ASC');
        $modules_url = $modules->pluck('url')->toArray();
        if(in_array($path,$modules_url))
        {
            $module_content = $this->repository->getModelBy($this->module,'url','=',$path);
            if($module_content)
            {
                return view('frontend.modules',compact('modules','module_content'));
            }
            return abort(404);
        }
        return abort(404);
    }

    public function QA()
    {
        $modules = $this->repository->getModelAll($this->module,'order','ASC');
        return view('frontend.QA',compact('modules'));
    }

    public function News(Request $request)
    {
        $image = $this->repository->getModelBy($this->module,'url','=','tw/news');
        $modules = $this->repository->getModelAll($this->module,'order','ASC');
        if(isset($request->type) && in_array($request->type,['最新消息','最新公告','最新宣導','最新活動']))
        {
            $news = $this->repository->getModelWherePaginate($this->news,'publish_at','DESC',12,'type',$request->type);
            $news_type = $request->type;
            return view('frontend.news',compact('news','modules','image','news_type'));
        }
        else
        {
            $news = $this->repository->getModelAllPaginate($this->news,'publish_at','DESC',12);
            return view('frontend.news',compact('news','modules','image'));
        }
    }

    public function News_content(Request $request)
    {
        $image = $this->repository->getModelBy($this->module,'url','=','tw/news');
        $news = $this->repository->getModelByID($this->news,$request->news);
        $modules = $this->repository->getModelAll($this->module,'order','ASC');
        $news_title = $news->title;
        return view('frontend.news_content',compact('news','modules','image','news_title'));
    }

    public function CarTest()
    {
        $modules = $this->repository->getModelAll($this->module,'order','ASC');
        $module_content = $this->repository->getModelBy($this->module,'url','=','tw/cartest');
        $qas = $this->repository->getModelAll($this->qa,'order','ASC');
        return view('frontend.cartest',compact('modules','module_content','qas'));
    }
}
