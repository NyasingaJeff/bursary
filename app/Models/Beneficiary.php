<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;
    function create($data,$mainId=null) {
        
        // d($data);
        // dd($mainId);
        $beneficiary = new $this;
        $beneficiary->indexNumber = $data['indexNumber'];
        $beneficiary->resultSlip= $data->file('resultSlip')->storeAs('public/'.$data['indexNumber'], 'resSlip'.$data->file('resultSlip')->extension());
        $beneficiary->name= $data['sfName'].' '.$data['smName'].' '.$data['slName'];
        $beneficiary->location= $data['eWard'].','.$data['eSubcounty'].','.$data['eCounty'].' County';
        $beneficiary->idNo= $data['idNumber'] ?? 'Not Applicable';
        $beneficiary->yrOfCmpltn= $data['yOfComplt'];
        $beneficiary->levelOfCert= $data['cert'];
        $beneficiary->dob= $data['stDob'];
        $beneficiary->fundingLvl= $data['fundType'];
        $beneficiary->mainId= $data['mainId'] ?? $mainId;
        $beneficiary->idNumber= 'Not Applicable';
        $beneficiary->save();
        return $beneficiary;
    }
    function validate($fieldName,$value){
        return $this->where($fieldName,'=',$value)->first();
         
     }
    public function main()
    {
        return $this->belongsTo("App\Models\User","mainId");
    }
}
