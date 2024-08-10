<?php

namespace App\Http\Requests;

use App\DataTransferObjects\RegisterUserData;
use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'birthday' => 'required|date_format:Y-m-d',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users'
        ];
    }

    public function toDto(): RegisterUserData
    {
        return new RegisterUserData(
            $this->request->get(RegisterUserData::NAME),
            $this->request->get(RegisterUserData::EMAIL),
            $this->request->get(RegisterUserData::PASSWORD),
            $this->request->get(RegisterUserData::BIRTHDAY),
            $this->request->get(RegisterUserData::PHONE),
        );
    }
}
