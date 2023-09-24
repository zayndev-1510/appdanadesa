<?php

namespace App\Http\Requests\admin\master;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RkdRequest extends FormRequest
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
            "id_bidang"=>["required","integer"],
            "id_sub_bidang"=>["required","integer"],
            "id_kegiatan"=>["required","integer"],
            "lokasi"=>["required","string"],
            "keluaran"=>["required","string"],
            "manfaat"=>["required","string"],
            "waktu_pelaksanaan"=>["required","string"],
            "jenis_pelaksanaan"=>["required","string"]
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
