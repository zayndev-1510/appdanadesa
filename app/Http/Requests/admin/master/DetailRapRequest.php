<?php

namespace App\Http\Requests\admin\master;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DetailRapRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id_rap"=>["required","integer"],
            "id_sumber"=>["required","integer"],
            "no_urut"=>["required","string","max:10"],
            "uraian"=>["required","string","max:200"],
            "jumlah_satuan"=>["required"],
            "harga_satuan"=>["required"],
            "total"=>["required"]
        ];
    }

    /**
     * Summary of failedValidation
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     * @return never
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([

            'success' => false,

            'message' => 'Validation errors',

            'data' => $validator->errors()

        ]));
    }
}
