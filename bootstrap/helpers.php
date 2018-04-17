<?php

function trim_input($string)
{
    return trim($string);
}

/* check route active set */
function active_route_check($name)
{
    return preg_match("/^{$name}/",\Illuminate\Support\Facades\Route::currentRouteName());
}

function make_excerpt($value,$length=100)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/','',strip_tags($value)));
    return str_limit($excerpt,$length);
}
