<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|string|max:50', 
            'email'=>'required|email|string|max:80|unique:providers',  
            'address'=>'nullable|string|max:100', 
            'phone'=>'required|string|max:15|min:10|unique:providers',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Este campo es requerido!',
            'name.string' => 'El valor no es correcto!',
            'name.max' => 'El nombre es demasiado largo!',
            'email.required' => 'Este campo es requerido!',
            'email.string' => 'El valor no es correcto!',
            'email.max' => 'El email es demasiado largo!',
            'email.unique' => 'El email ya esta registrado!',
            'address.string' => 'El valor no es correcto!',
            'address.max' => 'La dirección es demasiado larga!',
            'phone.required' => 'Este campo es requerido!',
            'phone.string' => 'El valor no es correcto!',
            'phone.max' => 'El número es demasiado largo!',
            'phone.unique' => 'Este número ya esta registrado!',
        ];
    }
}
