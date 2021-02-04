<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'active' => 'required',
            'categories_ids' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Esse campo nome é obrigatório!',
            'price.required' => 'Esse campo preço é obrigatório!',
            'active.required' => 'Esse campo status é obrigatório!',
            'categories_ids.required' => 'Esse campo Categorias é obrigatório!'
        ];
    }
}
