<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Favourites;

class FavouriteRequest extends FormRequest
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
                'renter_id'=>'required|integer',
                'republic_id'=>'required|integer',
            ];
        }

        if ($this->isMethod('put'))
        {
            return [
                'renter_id'=>'required|integer',
                'republic_id'=>'required|integer',
            ];
        }
    }

    public function messages()
    {
        return [
            'republic_id.required'=>'Republic_id field required.',
            'republic_id.integer'=>'Republic_id needs to be an integer value.',
            'renter_id.required'=>'Renter_id field required.',
            'renter_id.integer'=>'Renter_id needs to be an integer value.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
