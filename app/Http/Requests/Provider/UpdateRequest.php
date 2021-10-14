<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email'=>'required|email|string|unique:providers,email,' . $this->route('provider')->id . '|max:80', 
            'contact_person'=>'nullable|string|max:50', 
            'address'=>'nullable|string|max:100', 
            'phone'=>'required|string|unique:providers,phone,' . $this->route('provider')->id . '|max:15|min:10',
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
            'contact_person.string' => 'El valor no es correcto!',
            'contact_person.max' => 'El nombre es demasiado largo!',
            'address.string' => 'El valor no es correcto!',
            'address.max' => 'La dirección es demasiado larga!',
            'phone.required' => 'Este campo es requerido!',
            'phone.string' => 'El valor no es correcto!',
            'phone.max' => 'El número es demasiado largo!',
            'phone.unique' => 'Este número ya esta registrado!',
        ];
    }
}
