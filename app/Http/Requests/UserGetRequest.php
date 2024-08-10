<?php

namespace App\Http\Requests;

use App\DataTransferObjects\IdData;
use Illuminate\Foundation\Http\FormRequest;

class UserGetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function toDto(): IdData
    {
        return new IdData($this->id);
    }
}
