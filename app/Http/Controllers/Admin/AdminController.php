<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function call_artisan()
    {
         Artisan::call('dasun:spider-data');
         return Redirect()->route('admin.news.index')->with(['message' => '爬蟲成功!']);
    }

    public function call_storage()
    {
        Artisan::call('storage:link');
        return Redirect()->route('admin.news.index')->with(['message' => '建立成功!']);
    }

    public function toDashboard()
    {
        return redirect()->to(route('admin.user.index'),302);
    }
}
