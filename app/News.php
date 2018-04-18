<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'type', 'content', 'publish_at', 'from', 'from_url', 'from_publish'];
    protected $dates = ['created_at', 'updated_at', 'publish_at'];

    public function getPublishAtAttribute()
    {
        return Carbon::parse($this->attributes['publish_at'])->toDateString();
    }
}
