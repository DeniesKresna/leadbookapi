<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait ModelHelper
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function filter_model(Builder $builder, Model $model)
    {
        $data = request()->all();
        $filterable = $model->filterable;
        $filter_columns = [];
        
        $search = request()->input('search',"");

        if($search == ""){
            foreach($data as $key => $value){
                if(in_array($key,$filterable)){
                    array_push($filter_columns,$key);
                }
            }
        }else{
            $filter_columns = $filterable;
        }
        if(count($filter_columns)> 0){
            for($i=0; $i<count($filter_columns); $i++){
                $mode = "where";
                if($i>0) $mode = "orWhere";
                if($search != "") $filter_string = $search;
                else $filter_string = $data[$filter_columns[$i]];
                $builder->$mode($filter_columns[$i], 'like', '%'.$filter_string.'%');
            }
        }
    }
}