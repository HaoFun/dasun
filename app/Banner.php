<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['module_id','image'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
