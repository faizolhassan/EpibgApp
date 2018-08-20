<?php

namespace App\Http\Requests\Api\V1;

use Dingo\Api\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'identification_number' => 'sometimes|required',
            'address' => 'sometimes|required',
            'mother_name' => 'sometimes|required',
            'father_name' => 'sometimes|required',
            'caretaker_name'=> 'sometimes|required',
            'level_standard_study' => 'sometimes|required',
            'telephone_number_caretaker' => 'sometimes|required',
        ];
    }
}
