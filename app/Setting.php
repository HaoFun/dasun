<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['config_name', 'config_phone', 'config_address', 'config_email', 'config_fax', 'config_house', 'description', 'keywords'];
}
