<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstRegistration extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'fName' => ['required','string'],
            // 'lName' => ['required','string'],
            // 'phoneNumber' => ['required','string','unique:users'],
            // 'idNumber'=>['string','required','unique:users'],
            // // "idScan" => ['required','mimes:jpg,pdf,png'],
            // 'address'=>['string','required','unique:users'],
            // "indexNumber"=>['required',"max:9"],
            // "resultSlip"=>['required'],
            // "chiefsLttr"=>['required']
        ];
    }
}
