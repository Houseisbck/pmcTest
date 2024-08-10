<?php

namespace App\Http\Requests;

use App\DataTransferObjects\UserUpdateData;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'birthday' => 'required|date_format:Y-m-d',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users'
        ];
    }

    /***
     * @return UserUpdateData
     */
    public function toDto(): UserUpdateData
    {
        return new UserUpdateData(
            $this->request->get(UserUpdateData::ID),
            $this->request->get(UserUpdateData::NAME),
            $this->request->get(UserUpdateData::EMAIL),
            $this->request->get(UserUpdateData::BIRTHDAY),
            $this->request->get(UserUpdateData::PHONE),
        );
    }
}
