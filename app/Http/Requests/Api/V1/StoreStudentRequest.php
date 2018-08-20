<?php

namespace App\Http\Requests\Api\V1;

use Dingo\Api\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'identification_number' => 'required',
            'address' => 'required',
            'mother_name' => 'required_with:father_name',
            'father_name' => 'required_with:mother_name',
            'caretaker_name'=> 'required_without:father_name',
            'level_standard_study' => 'required',
            'telephone_number_caretaker' => 'required',
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
