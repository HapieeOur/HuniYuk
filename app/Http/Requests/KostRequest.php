<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class KostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nama_kost' => 'required|min:15|string',
            'jumlah_kamar' => 'required|integer',
            'status_kamar' => 'required|string'
            //
        ];
    }

    public function messages() {

        return [

            'nama_kost.required' => "nama kost harus diisi",
            'nama_kost.min' => 'nama kost harus kurang dari 15',
            'nama_kost.string' => 'nama kost harus berupa huruf',
            
            'jumlah_kamar.required' => 'jumlah_kamar harus diisi',
            'jumlah_kamar.integer' => 'jumlah kamar harus berupa angka',

            'status_kamar.required' => 'status kamar harus diisi',
            'status_kamar.string' => 'status kamar harus berupa huruf'

        ];

    }
}
