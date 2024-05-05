<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateFuncionarioRequest extends FormRequest
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
            'username' => [
                'required',
                'unique:users',
                'min: 5',
                'max: 30'
            ],
            'password' => [
                'required',
                'min: 8'
            ]
            
        ];

        if($this->method() === 'PUT'){
            $rules = [
                'username' => [
                    'required',
                    # Ignorando restrição UNIQUE durante a atualização
                     Rule::unique('users')->ignore($this->id),
                    'min: 5',
                    'max: 30'
                ],
            ];
        }

        return $rules;
    }

    public function messages(){
        return [ 
            'username' => [
                'required' => 'O campo Nome do Usuário é obrigatório.' ,
                'unique' => 'Este nome de usuário já está cadastrado.',
                'min' => 'O campo Nome do Usuário deve conter no mínimo 5 caracteres.',
                'max' => 'O campo do Nome do Usuário não deve exceder 30 caracteres.'
            ],
            'password' => [
                'required' => 'O campo Senha é obrigatório.',
                'min' => 'O campo Senha deve conter no mínimo 8 caracteres.'
            ]
        ]; 
    }
}
