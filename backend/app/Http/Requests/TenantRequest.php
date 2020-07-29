<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Tenant;

class TenantRequest extends FormRequest
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
                'email'=>'required|email|unique:tenants,email',
                'password'=>'required|min:6',
                'cpf'=>'required|cpf|unique:tenants,cpf',
                'phoneNumber'=>'required|telefone',
            ];
        }

        if ($this->isMethod('put'))
        {
            return [
                'name'=>'required|string',
                'email'=>'required|email|unique:tenants,email,'.$this->renter->email,
                'password'=>'required|min:6',
                'cpf'=>'required|cpf|unique:tenants,cpf,'.$this->tenant->cpf,
                'phoneNumber'=>'required|telefone',
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
            'cpf.required'=>'CPF field required.',
            'cpf.cpf'=>'CPF needs to be a valid CPF number.',
            'cpf.unique'=>'CPF already in use.',
            'phoneNumber.required'=>'PhoneNumber field required',
            'phoneNumber.telefone'=>'PhoneNumber needs to be a valid telephone number.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),422));
    }
}
