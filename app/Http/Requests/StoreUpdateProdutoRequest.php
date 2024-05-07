<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyPermission(['admin', 'func']);
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
                'unique:produtos',
            ],
            'descricao' => [
                'required',
            ],
            'preco' => [
                'required',
            ],
            'imagem' => [
                'required',
                'mimes:jpg,jpeg,png,bmp,svg,webp'
            ],
            'quantidade'=> [
                'required',
            ],
            'categoria_id' => [
                'required'
            ]
        ];

        if($this->method() === 'PUT'){
            $rules = [
                'nome'=> [
                    'required',
                    # Ignorando restrição UNIQUE durante a atualização
                    Rule::unique('produtos')->ignore($this->id),
                ],
            ];
        }

        return $rules;
    }

    public function messages(){
        return [
            'nome' => [
                'required' => 'O nome do produto é obrigatório.',
                'unique' => 'Já existe um produto com este nome.'
            ],
            'descricao' => [
                'required' => 'A descricao do produto é obrigatória.',
            ],
            'preco' => [
                'required' => 'O preco do produto é obrigatório.',
            ],
            'quantidade' => [
                'required' => 'A quantidade do produto é obrigatória.',
            ],
            'imagem' => [
                'required' => 'A imagem do produto é obrigatória.',
                'mimes' => 'Só são permitidosa os formatos: (jpg, jpeg, png, bmp, svg, webp)'
            ],
            'categoria_id' => [
                'required' => 'A categoria é obrigatória.'
            ]
        ];
    }

}
