<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;
    
    #id, name, phoneNumber, frId, bckId, location, mainId, created_at, updated_at

    function create($data,$mainId)  {
        // dump($data);
        // dd($mainId);
        $spouse  = new $this;
        $spouse->name = $data['mfName'].' '.$data['mMName'].' '.$data['mlName'];
        $spouse->idNumber = $data['midNumber'];
        $spouse->phoneNumber= $data['mphoneNumber'];
        $spouse->mainId= $data['mainId'];
        $spouse->frId = $data->file('mFidScan')->storeAs('public/'.$data['midNumber'], 'frontId.'.$data->file('mFidScan')->extension());
        $spouse->bckId = $data->file('mBidScan')->storeAs('public/'.$data['midNumber'], 'backId.'.$data->file('mBidScan')->extension());
        $spouse->location = $data['mward'].','.$data['msubcounty'].','.$data['mcounty'].' County';
        $spouse->mainId = $mainId;
        $spouse->save();
        return $spouse;

    }
    function validate($fieldName,$value){
       return $this->where($fieldName,'=',$value)->first();
        
    }

    public function main()
    {
        return $this->belongsTo("App\Models\User","mainId");
    }
}
