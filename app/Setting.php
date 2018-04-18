<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['config_info', 'config_name', 'config_phone', 'config_address', 'config_email', 'config_fax', 'config_house', 'description', 'keywords', 'config_image', 'config_image_title', 'config_ad_image'];
}
