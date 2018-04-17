<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public $banner;
    public function __construct(Banner $banner)
    {
        $this->middleware(['auth']);
        $this->banner = $banner;
    }

    public function index()
    {
        
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
