<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Bedroom;

class BedroomRequest extends FormRequest
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
        if ($this->isMethod('post'))
        {
            return [
                'republic_id'=>'required|integer'
            ];
        }

        if ($this->isMethod('put'))
        {
            return [
                'republic_id'=>'required|integer'
            ];
        }
    }

    public function messages()
    {
        return [
            'republic_id.required'=>'Republic ID required.',
            'republic_id.integer'=>'Republic ID needs to be an integer.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
