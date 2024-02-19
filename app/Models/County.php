<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    function getAll()  {
        return $this->all()->groupBy('county_name')->map(
            function($item,$key){
                return $item->map(
                    function($item,$key){
                        return $item->sub_county_name;
                })->toArray();
            }
        )->toArray();

    }
}
