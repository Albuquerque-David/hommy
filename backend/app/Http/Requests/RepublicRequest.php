<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Republic;

class RepublicRequest extends FormRequest
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
            'name'=>'required|string',
            'description'=>'required|string',
            'city'=>'required|string',
            'state'=>'required|alpha|min:2|max:2',
            'neighborhood'=>'required|string',
            'address'=>'required|string',
            'bathrooms'=>'required|integer',
            'allowedTo'=>'required|string',
            'value'=>'required|numeric',
            'rating'=>'required|numeric',
            'tenant_id'=>'required|integer',
            'file'=>'file',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Name field required.',
            'name.string'=>'Name needs to be an string value.',
            'description.required'=>'Description field required.',
            'email.email'=>'Description needs to be a string value.',
            'city.required'=>'City field required',
            'city.string'=>'City needs to be an string value.',
            'state.required'=>'State field required',
            'state.alpha'=>'State needs to be an alphabetic value',
            'state.min'=>'State has a length of 2 characters',
            'state.max'=>'State has a length of 2 characters',
            'neighborhood.required'=>'Neighborhood field required.',
            'neighborhood.string'=>'Neighborhood needs to be an string value',
            'address.required'=>'Address field required.',
            'address.string'=>'Address needs to be an string value',
            'rating.required'=>'Rating field required.',
            'rating.numeric'=>'Rating needs to be an numeric value',
            'allowedTo.required'=>'AllowedTo field required.',
            'allowedTo.string'=>'AllowedTo needs to be an string value',
            'value.required'=>'Value field required.',
            'value.numeric'=>'Value needs to be an numeric value',
            'tenant_id.required'=>'Tenant_id field required.',
            'tenant_id.integer'=>'Tenant_id needs to be an integer value.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
