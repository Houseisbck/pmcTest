<?php

namespace App\Http\Requests;

use App\DataTransferObjects\RegisterUserData;
use App\DataTransferObjects\UserCreateData;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'birthday' => 'required|date_format:Y-m-d',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users'
        ];
    }

    /***
     * @return UserCreateData
     */
    public function toDto(): UserCreateData
    {
        return new UserCreateData(
            $this->request->get(UserCreateData::NAME),
            $this->request->get(UserCreateData::EMAIL),
            $this->request->get(UserCreateData::PASSWORD),
            $this->request->get(UserCreateData::BIRTHDAY),
            $this->request->get(UserCreateData::PHONE),
        );
    }
}
