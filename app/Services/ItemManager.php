<?php

namespace App\Services;

class ItemManager
{
    public static function insert(array $data,$model){
        $input = $model::create($data);

        return $input;
    }

    public static function update(array $data,$id,$model){
        $item = $model::where('id',$id)->update($data);
        return $item;
    }

    public static function updateOrCreate(array $data,$model){
        $item = $model::updateOrCreate($data);
        return $item;
    }

    
}
