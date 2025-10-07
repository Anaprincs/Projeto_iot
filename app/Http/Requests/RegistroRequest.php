<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;

class RegistroRequest extends FormRequest
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
            'cod_sensor' => 'required',
            'valor' => 'required|numeric',
            'unidade' => 'required',
            
        ];
    }


    public function faileValidation(Validator $validator){
        if ($this->expectsjson()){
            throw new HttpResponseException(response()->json([
                'success' =>false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors()
            ],422));
        }

        throw new ValidationException($validator);
    }

     public function messages()
    {
        return [
            'cod_sensor.required' => 'O codigo do sensor é obrigatorio',
            'valor.required' => 'Este campo é obrigatorio',
            'unidade.required' => 'Este campo é obrigatorio',
            'valor.numeric' => 'Este campo precisa ser numerico',
        ];
    }

}
