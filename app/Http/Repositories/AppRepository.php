<?php
/**
 * Created by PhpStorm.
 * User: Hao
 * Date: 2018/4/17
 * Time: 上午 09:58
 */
namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

class AppRepository
{
    public function getModelNum(Model $model,$num,$order_field,$order = 'DESC')
    {
        return $model::orderBy($order_field,$order)->limit($num)->get();
    }

    public function getModelFirst(Model $model)
    {
        return $model::first();
    }

    public function getModelAll(Model $model,$order_field,$order = 'DESC')
    {
        return $model::orderBy($order_field,$order)->get();
    }

    public function getModelAllPaginate(Model $model,$order_field,$order = 'DESC',$num)
    {
        return $model::orderBy($order_field,$order)->paginate($num);
    }

    public function getModelBy(Model $model,$field,$type,$value)
    {
        return $model::where($field,$type,$value)->first();
    }

    public function getModelByID(Model $model,$id)
    {
        return $model::find($id);
    }

    public function getModelWherePaginate(Model $model,$order_field,$order = 'DESC',$num,$search_field,$search_type)
    {
        return $model::where($search_field,$search_type)->orderBy($order_field,$order)->paginate($num);
    }
}