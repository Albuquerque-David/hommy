<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Renter;


class RenterRequest extends FormRequest
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
                'name'=>'required|string',
                'email'=>'required|email|unique:renters,email',
                'password'=>'required|min:6',
                'city'=>'required|string',
                'state'=>'required|alpha|min:2|max:2',
                'interestedNeighborhood'=>'nullable|string',
                'phoneNumber'=>'required|telefone',
                'bedroom_id'=>'nullable|integer',
            ];
        }

        if ($this->isMethod('put'))
        {
            return [
                'name'=>'required|string',
                'email'=>'required|email|unique:renters,'.$this->renter->email,
                'password'=>'required|min:6',
                'city'=>'required|string',
                'state'=>'required|alpha|min:2|max:2',
                'interestedNeighborhood'=>'nullable|string',
                'phoneNumber'=>'required|telefone',
                'bedroom_id'=>'nullable|integer',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required'=>'Name field required.',
            'name.string'=>'Name needs to be an string value.',
            'email.required'=>'Email field required.',
            'email.email'=>'Needs to be a valid email.',
            'email.unique'=>'Email already in use.',
            'password.required'=>'Password field required.',
            'password.min'=>'Password minimal length is 6.',
            'city.required'=>'City field required',
            'city.string'=>'City needs to be an string value.',
            'state.required'=>'State field required',
            'state.alpha'=>'State needs to be an alphabetic value',
            'state.min'=>'State has a length of 2 characters',
            'state.max'=>'State has a length of 2 characters',
            'interestedNeighborhood.string'=>'InterestedNeighborhood needs to be an string value',
            'phoneNumber.required'=>'PhoneNumber field required',
            'phoneNumber.telefone'=>'PhoneNumber needs to be a valid telephone number.',
            'bedroom_id.integer'=>'Bedroom_id needs to be an integer value.',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
