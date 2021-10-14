<?php

namespace App\Http\Requests\Product;

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
            'name'=>'required|unique:products|string|max:255',
            'description'=>'nullable|string|max:250',
            'provider_id'=>'integer|required|exists:App\Provider,id',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Este campo es requerido!',
            'name.string' => 'El valor no es correcto!',
            'name.unique' => 'El nombre ya existe!',
            'name.max' => 'El nombre es demasiado largo!',

            'description.string' => 'El valor no es correcto!',
            'description.max' => 'La descripción es demasiado larga!',

            'provider_id.required' => 'Este campo es requerido!',
            'provider_id.integer' => 'El valor no es correcto!',
            'provider_id.exists' => 'El proveedor no existe!',
        ];
    }
}
