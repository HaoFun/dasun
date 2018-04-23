@php
    if(isset($news_title))
    {
        echo $news_title.'-'.$setting->config_name;
    }
    else
    {
        if(isset($modules))
        {
            if($module_title = $modules->where('url',substr(parse_url($_SERVER['REQUEST_URI'])['path'],1)))
            {
                try
                {
                    echo $module_title->first()->name.'-'.$setting->config_name;
                }
                catch (Exception $exception)
                {
                    echo $setting->config_name;
                }
            }
            else
            {
                echo $setting->config_name;
            }
        }
        else
        {
            echo $setting->config_name;
        }
    }
@endphp