<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
        //Cargar las validaciones requeridas
        $rules = [
            'user_id'     => 'required|integer',
            'category_id' => 'required|integer',
            'name'        => 'required',
            'slug'        => 'required|unique:posts,slug,' . $this->post->id,
            'body'        => 'required',
            'status'      => 'required|in:DRAFT,PUBLISHED',
            'tags'        => 'required|array',
        ];

        //Agregar la validación de archivos si existen en la nueva entrada
        if($this->post('file')) {
            $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png']);
        }

        //Devolver el resultado
        return $rules;
    }
}
