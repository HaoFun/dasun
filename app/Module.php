<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'url', 'content', 'order'];

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }
}
