<?php

namespace App\Http\Requests\Offer;

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
            'name'=>'string|required|unique:products,name,'. $this->route('product')->id.'|max:255',
            'description'=>'nullable|string|max:250',
            'category_id'=>'integer|required|exists:App\Category,id',
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

            'category_id.required' => 'Este campo es requerido!',
            'category_id.integer' => 'El valor no es correcto!',
            'category_id.exists' => 'El proveedor no existe!',
        ];
    }
}
