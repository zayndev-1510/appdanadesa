<?php

namespace App\Http\Requests\admin\master\anggaran;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DetailAnggaranRequest extends FormRequest
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
           "id_anggaran_kegiatan"=>["required"],
           "nama_paket"=>["required","string","max:100"],
           "nilai"=>["required"],
           "id_pola_kegiatan"=>["required"],
           "target"=>["required"],
           "uraian"=>["required","string","max:100"],
           "satuan"=>["required"],
           "id_sumber_dana"=>["required"],
           "sifat_kegiatan"=>["required"],
           "lokasi_kegiatan"=>["required"]
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

            'data' => $validator->errors(),

        ]));
    }
}
