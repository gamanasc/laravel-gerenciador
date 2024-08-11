<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => ['required', 'min:3'],
            'descricao' => ['required', 'min:3']
        ];
    }

    // Mensagens personalizadas para retorno de validação
    public function messages(): array
    {
        return [
            'titulo.required'  => 'Campo "Título" é obrigatório',
            'descricao.required' => 'Campo "Descrição" é obrigatório',
            'titulo.min' => 'Campo "Título" precisa de, no mínimo, :min caracteres',
            'descricao.min' => 'Campo "Descrição" precisa de, no mínimo, :min caracteres',
        ];
    }
}
