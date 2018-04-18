<?php
/**
 * Created by PhpStorm.
 * User: Hao
 * Date: 2018/4/17
 * Time: 上午 09:58
 */
namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

class AdminRepository
{
    public function getModelAllByPaginate(Model $model,$num = 10,$orderby_field = 'created_at',$order_type = false)
    {
        if($order_type === false)
        {
            return $model::orderBy($orderby_field,'ASC')->paginate($num);
        }
        return $model::orderBy($orderby_field,'DESC')->paginate($num);
    }

    public function getModelAll(Model $model,$orderby_field = 'created_at',$order_type = false)
    {
        if($order_type === false)
        {
            return $model::all()->sortBy($orderby_field);
        }
        return $model::all()->sortByDesc($orderby_field);
    }

    public function getModelWith(Model $model,array $with,$painate = true,$num = 10)
    {
        if($painate)
        {
            return $model::with($with)->paginate($num);
        }
        return $model::with($with);
    }

    public function getModelID(Model $model,$id)
    {
        return $model::findOrFail($id);
    }

    public function getModelFirst(Model $model)
    {
        return $model::first();
    }

    public function createModel(Model $model,array $data)
    {
        return $model::create($data);
    }

    public function updateModel(Model $model,$id,array $data)
    {
        $object = $this->getModelID($model,$id);
        return $object->update($data);
    }

    public function deleteModel(Model $model,$ids)
    {
        return $model::whereIn('id',$ids)->delete();
    }
}