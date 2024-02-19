<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Beneficiary;
use App\Models\Spouse;


class Validator extends Model
{
    use HasFactory;
    
    public function __construct(Type $var = null) {
          $this->models = [
                'user'=>new User,
                'beneficiary' => new Beneficiary,
                'spouse'=> new Spouse
            ];
    }
  
    #this function will validate the various fieldds from the front end

    function validator($modelName,$fieldName,$value){
        #sisnce the form has various field names we unify them
        if (strpos( $fieldName, 'phoneNumber' )) {
            # code...
            $fieldName = 'phoneNumber';
        }elseif (strpos( $fieldName, 'idNumber' )) {
            # code...
            $fieldName = 'idNumber';
        }
        if ($modelName=='all') {
            $data = collect($this->models)->map(function($item) use($fieldName,$value) {
                return $item->where($fieldName,'=',$value)->first();
            })->filter(function($value,$key){
                return $value != null;
            });
            $data = count($data);
        }else{
            $data = $this->models[$modelName]->where($fieldName,'=',$value)->first();
            
        }
        // dump($data);s
        return $data == null ? 0 : 1 ;
    }
}
  # code...
