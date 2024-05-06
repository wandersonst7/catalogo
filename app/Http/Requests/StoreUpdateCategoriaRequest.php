<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateCategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'nome'=> [
                'required',
                'unique:categorias',
            ],
        ];

        if($this->method() === 'PUT'){
            $rules = [
                'nome'=> [
                    'required',
                    # Ignorando restrição UNIQUE durante a atualização
                    Rule::unique('categorias')->ignore($this->id),
                ],
            ];
        }

        return $rules;
    }

    public function messages(){
        return [
            'nome' => [
                'required' => 'O nome da categoria é obrigatória.',
                'unique' => 'Já existe uma categoria com este nome.'
            ]
        ];
    }
}
