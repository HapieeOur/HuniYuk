<?php

namespace App\Http\Requests\Auth;

use App\Enums\RoleName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'     => [
                'required',
                'string',
                Rule::in([RoleName::OWNER_KOS->value, RoleName::PENGHUNI_KOS->value]),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal harus 8 karakter.',
            'password.confirmed'=> 'Konfirmasi password tidak cocok.',
            'role.required'     => 'Role pengguna wajib dipilih.',
            'role.in'           => 'Pilihan role hanya boleh owner_kos atau penghuni_kos.',
        ];
    }
}
