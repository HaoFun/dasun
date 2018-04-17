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
    public function getModelAllByPaginate(Model $model,$num = 10,$orderby_field = 'created_at',$type = 'desc')
    {
        return $model::orderBy($orderby_field,$type)->paginate($num);
    }

    public function getModelAll(Model $model,$orderby_field,$type)
    {
        if($type === 'ASC')
        {
            return $model::all()->sortBy($orderby_field);
        }
        return $model::all()->sortByDesc($orderby_field);
    }

    public function getModelID(Model $model,$id)
    {
        return $model::findOrFail($id);
    }

    public function createModel(Model $model,array $data)
    {
        return $model::create($data);
    }

    public function updateModel($object,array $data)
    {
        return $object->update($data);
    }

    public function deleteModel(Model $model,$ids)
    {
        return $model::whereIn('id',explode(",",$ids))->delete();
    }
}